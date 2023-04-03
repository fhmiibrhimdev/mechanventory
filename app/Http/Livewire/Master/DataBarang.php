<?php

namespace App\Http\Livewire\Master;

use DNS1D;
use App\Models\Rak;
use App\Models\Jenis;
use App\Models\Merek;
use App\Models\Satuan;
use Livewire\Component;
use App\Models\Kategori;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\DataBarang as ModelsDataBarang;

class DataBarang extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $listeners = [
        'deleteConfirmed' => 'delete',
    ];
    public $dataId, $kode_item, $nama_item, $keterangan;
    public $id_jenis, $id_merek, $id_satuan, $id_kategori, $id_rak, $gambar, $gambarLama;
    public $edit_id_jenis, $edit_id_merek, $edit_id_satuan, $edit_id_kategori, $edit_id_rak;
    public $searchTerm, $lengthData;
    public $updateMode = false;
    public $idRemoved = null;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $this->generateKode();

        $searchTerm = '%' . $this->searchTerm . '%';
        $lengthData = $this->lengthData;

        // $jenis = Jenis::select('id', 'nama_jenis')->get();
        // $mereks = Merek::select('id', 'nama_merek')->get();
        // $satuans = Satuan::select('id', 'nama_satuan')->get();
        $kategoris = Kategori::select('id', 'nama_kategori')->get();
        $raks = Rak::select('id', 'nama_rak')->get();

        $tersedia = ModelsDataBarang::select(DB::raw('COUNT(id) AS tersedia'))->first()->tersedia;
        $stok_sedikit = ModelsDataBarang::select(DB::raw('COUNT(id) AS stok_sedikit'))->where('stock', '<=', '5')->where('stock', '>=', '1')->first()->stok_sedikit;
        $stok_tersedia = ModelsDataBarang::select(DB::raw('COUNT(id) AS stok_tersedia'))->where('stock', '>', '5')->first()->stok_tersedia;
        $stok_habis = ModelsDataBarang::select(DB::raw('COUNT(id) AS stok_habis'))->where('stock', '0')->first()->stok_habis;

        $data = ModelsDataBarang::select('data_barang.id', 'data_barang.gambar', 'data_barang.kode_item', 'data_barang.nama_item', 'data_barang.keterangan', 'data_barang.stock', 'kategori.kode_kategori', 'rak.nama_rak', 'users.name')
            ->join('kategori', 'kategori.id', 'data_barang.id_kategori')
            ->join('users', 'users.id', 'data_barang.id_user')
            ->join('rak', 'rak.id', 'data_barang.id_rak')
            ->where(function ($query) use ($searchTerm) {
                $query->where('data_barang.kode_item', 'LIKE', $searchTerm);
                $query->orWhere('data_barang.nama_item', 'LIKE', $searchTerm);
                $query->orWhere('users.name', 'LIKE', $searchTerm);
                $query->orWhere('kategori.kode_kategori', 'LIKE', $searchTerm);
                $query->orWhere('rak.nama_rak', 'LIKE', $searchTerm);
                $query->orWhere('data_barang.keterangan', 'LIKE', $searchTerm);
                $query->orWhere('data_barang.stock', 'LIKE', $searchTerm);
            })
            ->orderBy('id', 'DESC')
            ->paginate($lengthData);

        return view('livewire.master.data-barang', compact('data', 'kategoris', 'raks', 'tersedia', 'stok_sedikit', 'stok_tersedia', 'stok_habis'))
            ->extends('layouts.apps', ['title' => 'Master Data - Barang']);;
    }

    private function generateKode()
    {
        $kodeBarang = ModelsDataBarang::max('kode_item');
        $urutan = (int)substr($kodeBarang, 4, 4);
        $urutan++;
        $huruf = 'BRG-';
        $kodeBarang = $huruf . sprintf("%04s", $urutan);

        $this->kode_item = $kodeBarang;
    }

    public function mount()
    {
        $this->nama_item    = '';
        $this->id_kategori  = Kategori::min('id');
        $this->id_rak       = Rak::min('id');
        $this->keterangan   = '-';
    }

    private function resetInputFields()
    {
        $this->nama_item = '';
        $this->gambar = '';
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    private function validateInput()
    {
        $this->validate([
            'kode_item'  => 'required',
            'nama_item'  => 'required',
            'gambar'     => 'nullable|mimes:png,jpg,jpeg,gif,svg|max:4096',
        ]);
    }

    public function store()
    {
        $this->validateInput();

        switch ($this->gambar) {
            case '':
                $imagePath = '';
                break;
            
            default:
                $imagePath = $this->gambar->store('images', 'public');
                break;
        }

        ModelsDataBarang::create([
            'id_user'       => Auth::user()->id,
            'gambar'        => $imagePath,
            'kode_item'     => $this->kode_item,
            'nama_item'     => strtoupper($this->nama_item),
            'id_jenis'      => '1',
            'id_merek'      => '1',
            'id_satuan'     => '1',
            'id_kategori'   => $this->id_kategori,
            'id_rak'        => $this->id_rak,
            'keterangan'    => strtoupper($this->keterangan),
            'stock'         => '0',
        ]);
        $this->alertSuccess('insert');
    }

    public function edit($id)
    {
        $this->updateMode   = true;
        $data = ModelsDataBarang::where('id', $id)->first();
        $this->dataId       = $id;
        $this->gambarLama   = $data->gambar;
        $this->kode_item    = $data->kode_item;
        $this->nama_item    = $data->nama_item;
        $this->id_jenis     = $data->id_jenis;
        $this->id_merek     = $data->id_merek;
        $this->id_satuan    = $data->id_satuan;
        $this->id_kategori  = $data->id_kategori;
        $this->id_rak       = $data->id_rak;
        $this->keterangan   = $data->keterangan;
    }

    public function update()
    {
        $this->validateInput();
        if ($this->dataId) {

            switch ($this->gambar) 
            {
                case '':
                    $imagePath = $this->gambarLama;
                    break;
                
                default:
                    $imagePath = $this->gambar->store('images', 'public');
                    switch ($this->gambarLama) 
                    {
                        case '':
                            break;
                        
                        default:
                            unlink('storage/'.$this->gambarLama);
                            break;
                    }
                    break; 
            }

            $data = ModelsDataBarang::findOrFail($this->dataId);
            $data->update([
                'id_user'       => Auth::user()->id,
                'gambar'        => $imagePath,
                'nama_item'     => strtoupper($this->nama_item),
                'id_jenis'      => '1',
                'id_merek'      => '1',
                'id_satuan'     => '1',
                'id_kategori'   => $this->id_kategori,
                'id_rak'        => $this->id_rak,
                'keterangan'    => strtoupper($this->keterangan),
            ]);
            $this->alertSuccess('update');
        }
    }

    public function deleteConfirm($id)
    {
        $this->idRemoved = $id;
        $this->dispatchBrowserEvent('swal');
    }

    public function delete()
    {
        $data = ModelsDataBarang::findOrFail($this->idRemoved);
        unlink('storage/'.$data->gambar);
        $data->delete();
    }

    private function alertSuccess($status)
    {
        switch ($status) {
            case 'insert':
                $text = 'Data Inserted Successfully!.';
                break;
            case 'update':
                $this->updateMode = false;
                $text = 'Data Updated Successfully!.';
                break;
            default:
                break;
        }
        $this->dispatchBrowserEvent('swal:modal', [
            'type'      => 'success',
            'message'   => 'Successfully!',
            'text'      => $text,
        ]);
        $this->resetInputFields();
        $this->emit('dataStore');
    }
}
