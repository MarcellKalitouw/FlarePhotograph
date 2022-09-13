@extends('layouts.app')

@push('style')
    <style>
        .transaksi-list li {
            display:flex;

        }
    </style>
@endpush

@section('content')

<x-alert></x-alert>
<div class="row clearfix">
    
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-blue-grey">
                    <h2>
                        Detail Transaksi 
                        {{-- <small>Description text here...</small> --}}
                    </h2>
                        
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <ul class="list-group">
                                <li class="list-group-item">Kode Transaksi :<span class="badge bg-blue-grey">{{$getTransaksi->kode_transaksi}}</span></li>
                                <li class="list-group-item">Nama Pengguna :<span class="badge bg-blue-grey">{{$getTransaksi->nama_user}}</span></li>
                                <li class="list-group-item">Nomor Handphone  :<span class="badge bg-blue-grey">{{$getTransaksi->no_hp}}</span></li>
                                <li class="list-group-item">Alamat :<span class="badge bg-blue-grey">{{$getTransaksi->alamat}}</span></li>
                                <li class="list-group-item">Hari / Tanggal Booking :
                                    <span class="badge bg-blue-grey" style="display: flex;align-items: center;justify-content: start;">
                                        <i class="material-icons">event_note</i> {{date( 'l, d F Y', strtotime($getTransaksi->tgl_booking))}}
                                    </span>
                                    
                                </li>
                               
                                <li class="list-group-item">
                                    Jam Booking :
                                    <span class="badge bg-blue-grey" style="display: flex;align-items: center;justify-content: start;">
                                        <i class="material-icons">access_time</i>{{$getTransaksi->jam_booking}}
                                    </span>
                                </li>
                               <li class="list-group-item">Bentuk Pembayaran :<span class="badge bg-blue-grey">{{$getTransaksi->bentuk_pembayaran}}</span></li>
                                <li class="list-group-item">Status Transaksi :<span class="badge bg-blue-grey">{{$getTransaksi->status_transaksi}}</span></li>
                                <li class="list-group-item">Biaya Tambahan :<span class="badge bg-blue-grey">Rp. {{number_format($getTransaksi->biaya_tambahan, 2)}}</span></li>
                                <li class="list-group-item">Total Diskon :<span class="badge bg-blue-grey">Rp. {{number_format($getTransaksi->total_diskon, 2)}}</span></li>
                                <li class="list-group-item">Total Transaksi :<span class="badge bg-blue-grey">Rp. {{number_format($getTransaksi->total_transaksi, 2)}}</span></li>
                                <li class="list-group-item">Catatan :<span class="badge bg-blue-grey">{{$getTransaksi->catatan}}</span></li>
                                <li class="list-group-item">Created At :<span class="badge bg-blue-grey">{{$getTransaksi->created_at}}</span></li>
                                <li class="list-group-item">Updated At :<span class="badge bg-blue-grey">{{$getTransaksi->updated_at}}</span></li>
                                <li class="list-group-item">Deleted At :<span class="badge bg-blue-grey">{{$getTransaksi->deleted_at}}</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="header bg-blue-grey">
                                <h2>Produk yang diorder</h2>
                            </div>
                            @foreach ($getDetailTransactionWithProduk as $item)
                                <div class="media">
                                    <div class="media-left">
                                        <a href="javascript:void(0);">
                                            <img class="media-object" style="object-fit: contain;" src="{{ asset('storage/'.$item->gambar_produk[0]->file) }}" width="150" height="150">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $item->nama_produk }}</h4>
                                        <p>
                                           {{ $item->deskripsi }}
                                        </p>
                                        <ul>
                                            <li >
                                                <div style="display: flex;">
                                                    <strong>Warna</strong> : {{ $item->warna ? $item->warna->nama_warna : "-"}}
                                                    <div class="warna" style="background-color: {{ $item->warna ? $item->warna->heksa_warna : "-"}};height:25px;width:25px;margin-left:10px;cursor:pointer;">
                                                    
                                                    </div>
                                                </div>
                                            </li>
                                            <li><strong>Kegiatan</strong> : Rp.{{$item->kegiatan}}</li>
                                            <li><strong>Studio</strong> : Rp.{{$item->kegiatan == 'true' ? 'Ya' : 'Tidak'}}</li>
                                            <li><strong>Diskon</strong> : Rp.{{number_format($item->diskon)}}</li>
                                            <li><strong>Varian Produk</strong> : {{$item->nama_varian ? $item->nama_varian : "-"}}</li>
                                            <li><strong>Harga Varian</strong> : Rp.{{$item->harga_varian ? number_format($item->harga_varian) : "-"}}</li>
                                            <li><strong>Harga Pokok</strong> : Rp.{{number_format($item->harga)}}</li>
                                            <li><strong>Total </strong> : Rp.{{number_format($item->total)}}</li>
                                            
                                        </ul>
                                    </div>
                                    
                                        
                                    
                                </div>
                            @endforeach
                            <div style="display: flex">
                                <p>UPDATE STATUS TRANSAKSI : </p>
                                <div class="btn-group " style="margin-left: 5%; display:block;width:100%;height:30px">
                                    
                                    <button style="width: 100%" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ubah Status <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="js-sweetalert">
                                            <?php $diterima='Diterima'?>
                                            @php
                                                foreach ($getRiwayatTransaksi as $grt ) {
                                                    // dd($grt);
                                                    // switch ($grt->status) {
                                                    //     case 'Diterima':
                                                    //         $btnDiterima = '<button class="btn btn-primary waves-effect " data-type="Diterima" disabled> 
                                                    //                     Diterima';
                                                    //         break;
                                                        
                                                    //     default:
                                                    //         $btnDiterima = '<button class="btn btn-primary waves-effect " data-type="Diterima" > 
                                                    //                     Diterima
                                                    //                 </button>';
                                                    //         break;
                                                    // }
                                                    if($grt->status == 'Diterima' || $grt->status == 'Ditolak'  ){
                                                        $btnDiterima = '<button class="btn btn-primary waves-effect " data-type="Diterima" disabled> 
                                                                        Diterima
                                                                    </button>';
                                                        break;
                                                    }else{
                                                        $btnDiterima = '<button class="btn btn-primary waves-effect " data-type="Diterima" > 
                                                                        Diterima
                                                                    </button>';
                                                        
                                                    }
                                                    // while ($grt->status == 'Diterima' ) {
                                                    //     $btnDiterima = '<button class="btn btn-primary waves-effect " data-type="Diterima" disabled> 
                                                    //                     Diterima
                                                    //                 </button>';
                                                    // }
                                                    // $btnDiterima = '';

                                                }
                                            @endphp
                                                {!! $btnDiterima !!}
                                                {{-- <button class="btn btn-primary waves-effect " data-type="Diterima" disabled> 
                                                    Diterima
                                                </button> --}}
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a class="js-sweetalert">
                                                
                                                <?php $diproses='Diproses'?>

                                                 @php
                                                    foreach ($getRiwayatTransaksi as $grt ) {
                                                        // dd($grt);
                                                        // if ($grt->status == 'Diterima') {
                                                        //     # code...
                                                        //     $btnDiproses = '<button class="btn btn-primary waves-effect " data-type="Diproses" > 
                                                        //                         Diproses
                                                        //                     </button>';
                                                        //     break;
                                                        // }
                                                        if($grt->status == 'Menunggu Konfirmasi'){
                                                            $btnDiproses = '<button class="btn btn-primary waves-effect " data-type="Diproses" disabled> 
                                                                                Diproses
                                                                            </button>';
                                                            
                                                        }else{
                                                            if($grt->status == 'Diproses' || $grt->status == 'Ditolak' || $grt->status == 'Menunggu Pelunasan' || $grt->status == 'Menunggu Pembayaran Pertama' || $grt->status == 'Selesai' ){
                                                            $btnDiproses = '<button class="btn btn-primary waves-effect " data-type="Diproses" disabled> 
                                                                                Diproses
                                                                            </button>';
                                                                break;
                                                            }else{
                                                                $btnDiproses = '<button class="btn btn-primary waves-effect " data-type="Diproses" > 
                                                                                    Diproses
                                                                                </button>';
                                                            }
                                                        }
                                                        
                                                        

                                                    }
                                                @endphp
                                                    {!! $btnDiproses !!}
                                                
                                                
                                            </a>
                                        </li>
                                        <?php $menunggupembayaran='Menunggu Pembayaran Pertama'?>
                                        @if ($getTransaksi->bentuk_pembayaran == 'dp')
                                            <li>
                                                <a class="js-sweetalert">
                                                    @php
                                                        foreach ($getRiwayatTransaksi as $grt ) {
                                                            // dd($grt);

                                                            if($grt->status == 'Menunggu Konfirmasi'){
                                                                $btnMenungguPembayaran = '<button class="btn btn-primary waves-effect " data-type="MenungguPembayaran" disabled> 
                                                                                        Menunggu Pembayaran
                                                                                    </button>';
                                                            }else{
                                                                if($grt->status == 'Menunggu Pembayaran Pertama' || $grt->status == 'Ditolak' )
                                                                {
                                                                    $btnMenungguPembayaran = '<button class="btn btn-primary waves-effect " data-type="MenungguPembayaran" disabled> 
                                                                                        Menunggu Pembayaran
                                                                                    </button>';
                                                                    break;

                                                                }else{
                                                                    $btnMenungguPembayaran = '<button class="btn btn-primary waves-effect " data-type="MenungguPembayaran" > 
                                                                                        Menunggu Pembayaran
                                                                                    </button>';
                                                                }
                                                            }

                                                            
                                                            

                                                        }
                                                    @endphp
                                                    {!! $btnMenungguPembayaran !!}
                                                    
                                                    
                                                </a>
                                            </li>
                                        @endif
                                        
                                        <li>
                                            <a class="js-sweetalert">
                                                <?php $menunggupelunasan='Menunggu Pelunasan'?>

                                                @php
                                                    foreach ($getRiwayatTransaksi as $grt ) {
                                                        // dd($grt);
                                                        if($grt->status == 'Menunggu Konfirmasi' || $grt->status == 'Diterima' || $grt->status == 'Diproses'){
                                                            if ($grt->bentuk_pembayaran == 'dp') {
                                                                $btnMenungguPelunasan = '<button class="btn btn-primary waves-effect " data-type="MenungguPelunasan" disabled> 
                                                                                Menunggu Pelunasan
                                                                            </button>';    # code...
                                                            }else{
                                                                if ($grt->status == 'Menunggu Konfirmasi' || $grt->status == 'Diproses' || $grt->status == 'Ditolak') {
                                                                    $btnMenungguPelunasan = '<button class="btn btn-primary waves-effect " data-type="MenungguPelunasan" disabled> 
                                                                                Menunggu Pelunasan
                                                                            </button>';
                                                                }else {
                                                                    $btnMenungguPelunasan = '<button class="btn btn-primary waves-effect " data-type="MenungguPelunasan" > 
                                                                                Menunggu Pelunasan
                                                                            </button>';
                                                                }
                                                                
                                                            }
                                                            
                                                                            
                                                        }
                                                        else{
                                                            // if($grt->bentuk_pembayaran == 'dp' ){
                                                                
                                                            //     if($grt->status == 'Menunggu Pelunasan' || $grt->status == 'Ditolak' || $grt->status == 'Diterima' && $grt->status == 'Menunggu Pembayaran Pertama'  ){
                                                                    
                                                            //             $btnMenungguPelunasan = '<button class="btn btn-primary waves-effect " data-type="MenungguPelunasan" disabled> 
                                                            //                             Menunggu Pelunasan 456
                                                            //                         </button>';
                                                            //             break;
                                                                    

                                                            //     }else{

                                                            //         if($grt->status == 'Diterima'){
                                                            //             $btnMenungguPelunasan = '<button class="btn btn-primary waves-effect " disabled data-type="MenungguPelunasan" > 
                                                            //                             Menunggu Pelunasan 123
                                                            //                         </button>';
                                                            //             break;
                                                            //         }
                                                            //         else{
                                                            //             $btnMenungguPelunasan = '<button class="btn btn-primary waves-effect " data-type="MenungguPelunasan" > 
                                                            //                 Menunggu Pelunasan
                                                            //             </button>';
                                                            //         }
                                                            //     }
                                                                
                                                            // }

                                                            if($grt->status == 'Menunggu Pelunasan' || $grt->status == 'Ditolak' ){
                                                                $btnMenungguPelunasan = '<button class="btn btn-primary waves-effect " data-type="MenungguPelunasan" disabled> 
                                                                                Menunggu Pelunasan
                                                                            </button>';
                                                                break;

                                                            }else{
                                                                $btnMenungguPelunasan = '<button class="btn btn-primary waves-effect " data-type="MenungguPelunasan" > 
                                                                        Menunggu Pelunasan
                                                                    </button>';
                                                            }
                                                        }
                                                        
                                                        

                                                    }
                                                @endphp
                                                {!! $btnMenungguPelunasan !!}
                                                
                                                
                                            </a>
                                        </li>
                                        <li>
                                            <a class="js-sweetalert">
                                                <?php $sls='Selesai'?>

                                                @php
                                                    foreach ($getRiwayatTransaksi as $grt ) {
                                                        // dd($grt);
                                                        if($grt->status == 'Menunggu Konfirmasi'){
                                                            $btnSelesai = '<button class="btn btn-primary waves-effect " data-type="Selesai" disabled > 
                                                                                Selesai
                                                                            </button>';
                                                        }else{
                                                            if($grt->status == 'Selesai' || $grt->status == 'Ditolak' ){
                                                                $btnSelesai = '<button class="btn btn-primary waves-effect " data-type="Selesai" disabled > 
                                                                                Selesai
                                                                            </button>';
                                                                break;

                                                            }else{
                                                                $btnSelesai = '<button class="btn btn-primary waves-effect " data-type="Selesai" > 
                                                                                Selesai
                                                                            </button>';
                                                            }
                                                        }
                                                        
                                                        

                                                    }
                                                @endphp
                                                {!! $btnSelesai !!}
                                                
                                                
                                            </a>
                                        </li>
                                        <li>
                                            <a class="js-sweetalert">
                                                <?php $dtlk='Ditolak'?>
                                                @php
                                                    foreach ($getRiwayatTransaksi as $grt ) {
                                                        // dd($grt);
                                                        if($grt->status == 'Menunggu Pembayaran Pertama' || $grt->status == 'Menunggu Pelunasan' || $grt->status == 'Diterima'){
                                                            $btnDitolak = '<button class="btn btn-primary waves-effect " data-type="Ditolak" disabled> 
                                                                                Ditolak
                                                                            </button>';
                                                            break;

                                                        }else{
                                                            $btnDitolak = '<button class="btn btn-primary waves-effect " data-type="Ditolak" > 
                                                                            Ditolak
                                                                        </button>';
                                                        }
                                                        

                                                    }
                                                @endphp
                                                {!! $btnDitolak !!}
                                                
                                                
                                            </a>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="javascript:void(0);">Ubah Status</a></li>
                                    </ul>
                                </div>
                            </div>
                                
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header bg-blue">
                                <h2>Riwayat Pembayaran</h2>
                            </div>
                            <div class="body table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Transaksi</th>
                                            <th>Status Pembayaran</th>
                                            <th>Total Bayar</th>
                                            <th>Total Lunas</th>
                                            <th>Tujuan Bank Transfer</th>
                                            <th>Nama Rekening Pengirim</th>
                                            <th>Bank Pengirim</th>
                                            <th>Tanggal Transfer</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    @if (count($getRiwayatPembayaran) > 0)
                                        @foreach ($getRiwayatPembayaran as $item)
                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        {{-- <img src="{{ asset('bukti_transfer/'.$item->bukti_transfer) }}" alt=""> --}}
                                                        <a href="{{ asset('bukti_transaksi/'.$item->bukti_transfer) }}" target="_blank" class="btn btn-primary waves-effect">
                                                            <i class="material-icons">remove_red_eye</i>
                                                        </a>
                                                    </th>
                                                    <td>{{ $item->kode_transaksi }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>Rp. {{ number_format($item->total_bayar) }}</td>
                                                    <td>Rp. {{ number_format($item->total_lunas) }}</td>
                                                    <td>{{ $item->transfer_di }}</td>
                                                    <td>{{ $item->atasnama_pengirim }}</td>
                                                    <td>{{ $item->bank_pengirim }}</td>
                                                    <td>{{ $item->tgl_transfer }}</td>
                                                    <td>{{ $item->catatan }}</td>
                                                </tr>
                                                
                                            </tbody>
                                        @endforeach
                                        
                                    @else
                                        <tbody>
                                            <tr >
                                                <td colspan="10" style="text-align: center">
                                                <strong> Data Riwayat Pembayaran masih kosong </strong> 
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endif
                                    
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header bg-indigo">
                                <h2>Riwayat Transaksi</h2>
                            </div>
                            <div class="body table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Transaksi </th>
                                            <th>Nama Pembeli</th>
                                            <th>Status Transaksi</th>
                                            <th>Tanggal Dibuat</th>
                                        </tr>
                                    </thead>
                                    @if (count($getRiwayatTransaksi) > 0)
                                        <?php $no = 0?>
                                        @foreach ($getRiwayatTransaksi as $item)
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{ $no += 1 }}</th>
                                                    <td>{{ $item->kode_transaksi }}</td>
                                                    <td>{{ $item->nama_user }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                </tr>
                                                
                                            </tbody>
                                        @endforeach
                                        
                                    @else
                                        <tbody>
                                            <tr colspan="5">
                                                <td>Data Riwayat Transaksi masih kosong</td>
                                            </tr>
                                        </tbody>
                                    @endif
                                    
                                </table>
                            </div>
                        </div>

                    </div>
                    
                  
                    
                </div>
            </div>
        </div>
</div>
@endsection

@push('script')
    <script>
            $(function () {
                $('.js-sweetalert button').on('click', function () {
                        var type = $(this).data('type');
                        if (type === 'Diterima') {
                            statusDiterimaDialog();
                        }
                        else if (type === 'MenungguPembayaran') {
                            statusMenungguPembayaran();
                        }
                        else if (type === 'MenungguPelunasan') {
                            statusMenungguPelunasan();
                        }
                        else if (type === 'Diproses') {
                            statusDiprosesDialog();
                        }
                        else if (type === 'Selesai') {
                            statusSelesaiDialog();
                        }
                        else if (type === 'Ditolak') {
                            statusDitolak();
                        }
                        
                    });
                });
                //These codes takes from http://t4t5.github.io/sweetalert/
                
                function statusDiterimaDialog() {
                    swal({
                        title: `Apakah anda yakin mengganti status laporan ini ke Status Transaksi telah 'Diterima'`,
                        text: "Jika ya, klik tombol OK",
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    }, function () {
                        setTimeout(function () {
                            swal("Pergantian Status Transaksi sedang diproses");
                            document.location.href = `{{route('transaksi.update-status',['id' => $getTransaksi->id, 'status'=>$diterima])}}`;
                            
                        }, 3000);
                    });
                }
                function statusMenungguPembayaran() {
                    swal({
                        title: `Apakah anda yakin mengganti status laporan ini ke Status Transaksi 'Menunggu Pembayaran Pertama' `,
                        text: "Jika ya, klik tombol OK",
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    }, function () {
                        setTimeout(function () {
                            swal("Pergantian Status Transaksi sedang diproses");
                            document.location.href = `{{route('transaksi.update-status',['id' => $getTransaksi->id, 'status'=>$menunggupembayaran])}}`;
                        }, 3000);
                    });
                }
                function statusMenungguPelunasan() {
                    swal({
                        title: `Apakah anda yakin mengganti status laporan ini ke Status Transaksi 'Menunggu Pelunasan' `,
                        text: "Jika ya, klik tombol OK",
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    }, function () {
                        setTimeout(function () {
                            swal("Pergantian Status Transaksi sedang diproses");
                            document.location.href = `{{route('transaksi.update-status',['id' => $getTransaksi->id, 'status'=>$menunggupelunasan])}}`;
                           
                        }, 3000);
                    });
                }
                function statusDiprosesDialog() {
                    swal({
                        title: `Apakah anda yakin mengganti status laporan ini ke Status telah 'Diproses' `,
                        text: "Jika ya, klik tombol OK",
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    }, function () {
                        setTimeout(function () {
                            swal("Pergantian Status Transaksi sedang diproses");
                            document.location.href = `{{route('transaksi.update-status',['id' => $getTransaksi->id, 'status'=>$diproses])}}`;
                            
                        }, 3000);
                    });
                }
                function statusSelesaiDialog() {
                    swal({
                        title: `Apakah anda yakin mengganti status laporan ini ke Status Transaksi telah 'Selesai' `,
                        text: "Jika ya, klik tombol OK",
                        type: "success",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    }, function () {
                        setTimeout(function () {
                            swal("Pergantian Status Transaksi sedang diproses");
                            document.location.href = `{{route('transaksi.update-status',['id' => $getTransaksi->id, 'status'=>$sls])}}`;
                            
                        }, 3000);
                    });
                }
                function statusDitolak() {
                    swal({
                        title: `Apakah anda yakin mengganti status laporan ini ke Status Transaksi telah 'Ditolak'`,
                        text: "Jika ya, klik tombol OK",
                        type: "warning",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    }, function () {
                        setTimeout(function () {
                            swal("Pergantian Status Transaksi sedang diproses");
                            document.location.href = `{{route('transaksi.update-status',['id' => $getTransaksi->id, 'status'=>$dtlk])}}`;
                            
                        }, 3000);
                    });
                }
                
        </script>
    
@endpush