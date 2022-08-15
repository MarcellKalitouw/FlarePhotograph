@extends('layouts.app')
@section('content')
  <!-- Exportable Table -->

<div class="row clearfix">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <div class="card">
           <div class="header">
               <h2>
                   TABEL LAPORAN TRANSAKSI
                   <a  href="{{route('transaksi.create')}}" class="btn btn-success waves-effect">Tambah Data</a >
               </h2>
               <div class="panel-group m-t-15" id="accordion_11" role="tablist" aria-multiselectable="false">
                    <div class="panel panel-col-teal">
                        <div class="panel-heading" role="tab" id="headingOne_11">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_11" href="#collapseOne_11" aria-expanded="false" aria-controls="collapseOne_11">
                                    Filter Data Laporan Transaksi
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne_11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_11">
                            <div class="panel-body">
                                <div class="row">
                                    <form action="{{ route('transaksi.report', ) }}" class="form-horizontal">
                                        @method('GET')
                                        @csrf
                                        {{-- <div class="col-lg-6 ">
                                            <div class="form-line">
                                                <label class="form-label">Nomor HP</label>
                                                <input type="number" class="form-control" name="no_hp" required="" aria-required="true">
                                            </div>
                                        </div> --}}
                                        <div class="">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="myMonth">Bulan</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="month" id="myMonth" class="form-control" placeholder="Enter Month">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                <button type="button" id="myButton" class="btn btn-primary waves-effect">Get Report</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
           </div>
           
           <div class="body">
               
               <div class="table-responsive">
                   <table class="table table-bordered table-striped table-hover ">
                       <thead>
                           <tr>
                               <th>Nomor</th>
                               <th>Nama Pemesan</th>
                               <th>Tanggal Kegiatan</th>
                               <th>Nama Event (Produk)</th>
                               <th>Biaya Tambahan</th>
                               <th>Total Harga</th>
                               <th>Keterangan Pembayaran</th>
                               <th>Created at</th>
                               {{-- <th>Deleted at</th> --}}
                               
                           </tr>
                       </thead>
                       <tfoot>
                           <tr>
                            <th>Nomor</th>
                            <th>Nama Pemesan</th>
                            <th>Tanggal Kegiatan</th>
                            <th>Nama Event (Produk)</th>
                            <th>Biaya Tambahan</th>
                            <th>Biaya Tambahan</th>
                            <th>Total Harga</th>
                            <th>Keterangan Pembayaran</th>
                            <th>Created at</th>
                                {{-- <th>Deleted at</th> --}}
                               
                           </tr>
                       </tfoot>
                       <tbody>
                           <?php
                           $no = 0;
                           ?>
                           
                           @forelse ($transaksiLaporan as $item)

                           <tr>
                               <td>{{$no+=1}}</td>  
                               <td>
                                    {{ $item->nama_pelanggan}} <br>
                                    {{ $item->no_telp }} <br>
                                    {{ $item->email_pelanggan }}
                                </td>  
                               <td>
                                    {{$item->tgl_booking}}
                                    {{$item->jam_booking }}
                                </td>
                               <td >
                                    <ul>
                                        
                                    @foreach ($item->detail_transaksi as $dt)
                                        <li>{{ $dt->nama_produk }} <br>
                                        harga : Rp.{{ number_format($dt->harga, 0) }} <br>
                                        varian : Rp.{{ number_format($dt->harga_varian, 0) }} <br>
                                        <strong> Total ( Rp.{{ number_format($dt->harga + ($dt->harga_varian ? $dt->harga_varian : 0))  }} )</strong>
                                        </li>
                                    @endforeach
                                    </ul>
                               </td>
                               <td>Rp.{{number_format($item->biaya_tambahan, 0)}}</td>
                               <td>Rp.{{number_format($item->total_transaksi, 0)}}</td>
                               <td>{{$item->bentuk_pembayaran}}</td>
                               <td>{{$item->created_at}}</td>
                               {{-- <td>{{$item->updated_at}}</td>
                               <td>{{$item->deleted_at}}</td> --}}
                              
                               
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="9" style="text-align: center">
                                        <strong> 
                                            Tidak ada data
                                        </strong>
                                    </td>
                                </tr>
                            @endforelse
                           
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- #END# Exportable Table -->  
@endsection
  

@push('script')
    <script type="text/javascript">
        document.getElementById("myButton").onclick = function () {
            const month =  document.getElementById("myMonth").value;
            // console.log('getMonth', month);
            location.href = `/transaksi_laporan/${month}`;
        };

    </script>
@endpush