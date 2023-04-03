<div>
    <div class="section-header tw-rounded-lg tw-text-black tw-shadow-md tw-shadow-gray-300">
        <h4 class="tw-text-lg">Dashboard |
            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $bulanSekarang)->isoFormat('dddd, D MMMM Y') }} &mdash;
            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $bulanDepan)->isoFormat('dddd, D MMMM Y') }}</h4>
    </div>

    <div class="section-body">

        <div class="tw-mt-[-10px] mb-3">
            <h6 class="section-title tw-text-sm">Ringkasan <span class="tw-text-xs" data-toggle="modal"
                    data-target="#ubahDataModal" wire:click="edit({{ $id }})">( Setting tanggal )</span></h6>
            <p class="section-lead tw-text-xs">Ringkasan pendapatan</p>
        </div>
        <div class="tw-grid tw-gap-x-2 tw-grid-cols-1 md:tw-grid-cols-3 tw-text-black tw-text-xs md:tw-text-sm">
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Pendapatan</p>
                    <h6 class="tw-text-base tw-font-bold">Rp{{ number_format($pendapatanHariIni) }}</h6>
                    <p class="tw-text-gray-500">pada hari ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Pendapatan</p>
                    <h6 class="tw-text-base tw-font-bold">Rp{{ number_format($pendapatanMingguIni) }}</h6>
                    <p class="tw-text-gray-500">pada minggu ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Pendapatan</p>
                    <h6 class="tw-text-base tw-font-bold">Rp{{ number_format($pendapatanBulanIni) }}</h6>
                    <p class="tw-text-gray-500">pada bulan ini</p>
                </div>
            </div>
        </div>

        <div class="tw-grid tw-gap-x-2 tw-grid-cols-1 md:tw-grid-cols-3 tw-text-black tw-text-xs md:tw-text-sm">
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Pengeluaran</p>
                    <h6 class="tw-text-base tw-font-bold">Rp{{ number_format($pengeluaranHariIni) }}</h6>
                    <p class="tw-text-gray-500">pada hari ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Pengeluaran</p>
                    <h6 class="tw-text-base tw-font-bold">Rp{{ number_format($pengeluaranMingguIni) }}</h6>
                    <p class="tw-text-gray-500">pada minggu ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Pengeluaran</p>
                    <h6 class="tw-text-base tw-font-bold">Rp{{ number_format($pengeluaranBulanIni) }}</h6>
                    <p class="tw-text-gray-500">pada bulan ini</p>
                </div>
            </div>
        </div>

        <div class="tw-grid tw-gap-x-2 tw-grid-cols-1 md:tw-grid-cols-3 tw-text-black tw-text-xs md:tw-text-sm">
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Pendapatan - Pengeluaran</p>
                    <h6 class="tw-text-base tw-font-bold">
                        Rp{{ number_format($pendapatanHariIni - $pengeluaranHariIni) }}</h6>
                    <p class="tw-text-gray-500">pada hari ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Pendapatan - Pengeluaran</p>
                    <h6 class="tw-text-base tw-font-bold">
                        Rp{{ number_format($pendapatanMingguIni - $pengeluaranMingguIni) }}</h6>
                    <p class="tw-text-gray-500">pada minggu ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Pendapatan - Pengeluaran</p>
                    <h6 class="tw-text-base tw-font-bold">
                        Rp{{ number_format($pendapatanBulanIni - $pengeluaranBulanIni) }}</h6>
                    <p class="tw-text-gray-500">pada bulan ini</p>
                </div>
            </div>
        </div>

        <div class="tw-mt-[-10px] mb-3">
            <h6 class="section-title tw-text-sm">Ringkasan</h6>
            <p class="section-lead tw-hidden tw-text-xs lg:tw-block">Ringkasan transaksi pada hari ini, minggu ini, dan
                bulan ini</p>
            <p class="section-lead tw-text-xs tw-mt-[-20px] lg:tw-hidden">Ringkasan transaksi pada hari ini</p>
        </div>
        <div class="tw-grid tw-gap-x-2 tw-grid-cols-2 md:tw-grid-cols-4 tw-text-black tw-text-xs md:tw-text-sm">
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Jumlah transaksi</p>
                    <h6 class="tw-text-base tw-font-bold">{{ $transaksiHariIni }}</h6>
                    <p class="tw-text-gray-500">pada hari ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Sedang produksi</p>
                    <h6 class="tw-text-base tw-font-bold">{{ $produksiHariIni }}</h6>
                    <p class="tw-text-gray-500">pada hari ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Selesai finising</p>
                    <h6 class="tw-text-base tw-font-bold">{{ $finishingHariIni }}</h6>
                    <p class="tw-text-gray-500">pada hari ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Sudah diambil</p>
                    <h6 class="tw-text-base tw-font-bold">{{ $diambilHariIni }}</h6>
                    <p class="tw-text-gray-500">pada hari ini</p>
                </div>
            </div>
        </div>

        <div class="tw-mt-[-10px] mb-3 lg:tw-hidden">
            <h6 class="section-title tw-text-sm">Ringkasan</h6>
            <p class="section-lead tw-text-xs">Ringkasan transaksi pada minggu ini</p>
        </div>
        <div class="tw-grid tw-gap-x-2 tw-grid-cols-2 md:tw-grid-cols-4 tw-text-black tw-text-xs md:tw-text-sm">
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Jumlah transaksi</p>
                    <h6 class="tw-text-base tw-font-bold">{{ $transaksiMingguIni }}</h6>
                    <p class="tw-text-gray-500">pada minggu ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Sedang produksi</p>
                    <h6 class="tw-text-base tw-font-bold">{{ $produksiMingguIni }}</h6>
                    <p class="tw-text-gray-500">pada minggu ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Selesai finising</p>
                    <h6 class="tw-text-base tw-font-bold">{{ $finishingMingguIni }}</h6>
                    <p class="tw-text-gray-500">pada minggu ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Sudah diambil</p>
                    <h6 class="tw-text-base tw-font-bold">{{ $diambilMingguIni }}</h6>
                    <p class="tw-text-gray-500">pada minggu ini</p>
                </div>
            </div>
        </div>

        <div class="tw-mt-[-10px] mb-3 lg:tw-hidden">
            <h6 class="section-title tw-text-sm">Ringkasan</h6>
            <p class="section-lead tw-text-xs">Ringkasan transaksi pada bulan ini</p>
        </div>
        <div class="tw-grid tw-gap-x-2 tw-grid-cols-2 md:tw-grid-cols-4 tw-text-black tw-text-xs md:tw-text-sm">
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Jumlah transaksi</p>
                    <h6 class="tw-text-base tw-font-bold">{{ $transaksiBulanIni }}</h6>
                    <p class="tw-text-gray-500">pada bulan ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Sedang produksi</p>
                    <h6 class="tw-text-base tw-font-bold">{{ $produksiBulanIni }}</h6>
                    <p class="tw-text-gray-500">pada bulan ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Selesai finising</p>
                    <h6 class="tw-text-base tw-font-bold">{{ $finishingBulanIni }}</h6>
                    <p class="tw-text-gray-500">pada bulan ini</p>
                </div>
            </div>
            <div class="card tw-rounded-lg tw-mb-[7px] tw-shadow-md tw-shadow-gray-300">
                <div class="card-body px-3 py-1 lg:tw-p-3">
                    <p>Sudah diambil</p>
                    <h6 class="tw-text-base tw-font-bold">{{ $diambilBulanIni }}</h6>
                    <p class="tw-text-gray-500">pada bulan ini</p>
                </div>
            </div>
        </div>


        <div class="tw-mt-[-10px] mb-3">
            <h6 class="section-title tw-text-sm">Status Order</h6>
            <p class="section-lead tw-text-xs">Merekap semua data transaksi order dari status.</p>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card tw-rounded-lg tw-shadow-md tw-shadow-gray-300">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="dariTanggal">Tanggal Order</label>
                            <input type="date" wire:model='dariTanggal' id="dariTanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sampaiTanggal">s/d Tanggal</label>
                            <input type="date" wire:model='sampaiTanggal' id="sampaiTanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status">Status Order {{ $idStatus }}</label>
                            <select wire:model='idStatus' id="status" class="form-control">
                                <option value="0">All</option>
                                <option value="1">Sedang Produksi (1)</option>
                                <option value="2">Selesai Finishing (2)</option>
                                <option value="3">Selesai Belum Di-Ambil (3)</option>
                                <option value="4">Selesai Sudah Di-Ambil (4)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idCustomer">Customer {{ $idCustomer }}</label>
                            <div wire:ignore>
                                <select wire:model='idCustomer' id="idCustomer" class="form-control">
                                    <option selected value="0">-- Selected Option --</option>
                                    @foreach($customer as $cust)
                                    <option value="{{ $cust->id }}">{{ $cust->nama_customer }} - {{ $cust->no_telepon }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card tw-rounded-lg tw-shadow-md tw-shadow-gray-300">
                    <div class="card-body px-0">
                        <div class="row mb-3 px-4">
                            <div class="col-4 col-lg-2">
                                <select class="form-control" wire:model='lengthData'>
                                    <option value="0" selected>-</option>
                                    <option value="1" selected>1</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                            <div class="col-8 col-lg-4 ml-auto">
                                <input wire:model="searchTerm" type="search" class="form-control ml-auto"
                                    placeholder="Search here.." wire:model='searchTerm'>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="tw-table-fixed tw-w-full tw-text-black tw-text-sm tw-border-t mt-4">
                                <thead>
                                    <tr class="tw-bg-white tw-border-b tw-text-xs text-center text-uppercase">
                                        <th class="p-3">TGL</th>
                                        <th class="p-3">Nm File</th>
                                        <th class="p-3">Printer</th>
                                        <th class="p-3">Nm Pkrjn</th>
                                        <th class="p-3">Ukuran</th>
                                        <th class="p-3">Qty</th>
                                        <th class="p-3">St</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data->groupBy('id_order_kerja') as $row)
                                    <tr class="tw-border-b hover:tw-bg-gray-50">
                                        <td class="p-3" colspan="6">
                                            <h3>
                                                <b>
                                                    ID: {{ $row[0]['id_order_kerja'] }} | {{ $row[0]['nama_customer'] }}
                                                    @if($row[0]['bayar_dp'] == 0)

                                                    @elseif($row[0]['bayar_dp'] >= 0)
                                                    <span class="text-warning tw-text-xs">
                                                        ( Bayar DP )
                                                    </span>
                                                    @endif
                                                    @if($row[0]['status_lunas'] == "0")

                                                    @elseif($row[0]['status_lunas'] == "1")
                                                    <i class="fas fa-check text-success"></i>
                                        </td>
                                        @endif
                                        </b>
                                        </h3>
                                        </td>
                                        <td class="text-center p-3">
                                            @if( $row[0]['sisa_kurang'] == 0 )

                                            @else
                                            @if($row[0]['status_lunas'] == "0")
                                            <button wire:click.prevent="lunas({{ $row[0]['id'] }})"
                                                class="btn btn-sm btn-outline-warning">Lunaskan</button>
                                            @elseif($row[0]['status_lunas'] == "1")
                                            <button wire:click.prevent="batalkanLunas({{ $row[0]['id'] }})"
                                                class="btn btn-sm btn-outline-danger">Batalkan</button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    @foreach ($row as $item)
                                    <tr class="tw-bg-white tw-border-b hover:tw-bg-gray-50">
                                        <td class="p-3">{{ $item['tanggal'] }} <br> <span
                                                class="text-primary">{{ $item['name'] }}</span> </td>
                                        <td class="p-3">{{ $item['nama_file'] }}</td>
                                        <td class="p-3 text-center">{{ $item['nama_printer'] }}</td>
                                        <td class="p-3">{{ $item['nama_pekerjaan'] }}</td>
                                        <td class="p-3 text-center">{{ $item['ukuran'] }}</td>
                                        <td class="p-3 text-right">{{ $item['qty'] }}.00</td>
                                        <td class="p-3 text-center">
                                            @if ( $item['status'] == '1' )
                                            <button wire:click.prevent="konf({{ $item['id'] }})"
                                                class="btn btn-sm btn-outline-info">Produksi</button>
                                            @elseif($item['status'] == '3')
                                            <button wire:click.prevent="konfirmasi({{ $item['id'] }})"
                                                class="btn btn-sm btn-outline-success">TakingIt</button>
                                            @elseif($item['status'] == '4')
                                            <span class="badge tw-bg-green-200 tw-text-green-900">Selesai</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive p-3">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" wire:ignore.self id="ubahDataModal" tabindex="-1" aria-labelledby="ubahDataModalLabel"
            aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ubahDataModalLabel">Edit Tanggal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <input type="hidden" wire:model='dataId'>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="number" wire:model="tanggal" id="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button wire:click.prevent="update()" wire:loading.attr="disabled" type="button"
                                class="btn btn-primary">Save Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function () {
        $('#idCustomer').select2();
        $('#idCustomer').on('change', function (e) {
            var data = $('#idCustomer').select2("val");
            @this.set('idCustomer', data);
        });
    });
</script>
@endpush