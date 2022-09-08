@extends('layouts.app')
@section('content')
  <!-- Exportable Table -->

<div class="row clearfix">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <div class="card">
           <div class="header">
               <h2>
                   TABEL TRANSAKSI
                   {{-- <a  href="{{route('transaksi.create')}}" class="btn btn-success waves-effect">Tambah Data</a > --}}
               </h2>
           </div>
           <div class="body">
               <div class="table-responsive">
                   <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                       <thead>
                           <tr>
                               <th>Nomor</th>
                               <th style="width:12%">Opsi</th>
                               <th>Pengguna</th>
                               <th>No. Hp</th>
                               <th>Alamat</th>
                               <th>Tamggal & Jam Booking</th>
                               <th>Total_Order</th>
                               <th>Bentuk Pembayaran</th>
                               <th>Status Transaksi</th>
                               <th>Catatan</th>
                               <th>Created at</th>
                               {{-- <th>Updated at</th>
                               <th>Deleted at</th> --}}
                               

                               
                           </tr>
                       </thead>
                       <tfoot>
                           <tr>
                            <th>Nomor</th>
                            <th>Opsi</th>
                            <th>Pengguna</th>
                            <th>No. Hp</th>
                            <th>Alamat</th>
                            <th>Tanggal & Jam Booking</th>
                            <th>Total_Order</th>
                            <th>Bentuk Pembayaran</th>
                            <th>Status Transaksi</th>
                            <th>Catatan</th>
                            <th>Created at</th>
                            {{-- <th>Updated at</th>
                            <th>Deleted at</th> --}}
                               
                           </tr>
                       </tfoot>
                       <tbody>
                           <?php
                           $no = 0;
                           ?>
                           @foreach ($data as $item)

                           <tr>
                               <td>{{$no+=1}}</td>  
                               <td>
                                    <form action="{{route('transaksi.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn bg-red waves-effect">
                                        <i class="material-icons">delete_forever</i>
                                    </button>
                                    
                                    {{-- <a href="{{route('transaksi.edit', $item->id)}}" class="btn btn-warning waves-effect">
                                        <i class="material-icons">create</i>
                                    </a> --}}
                                    <a href="{{route('transaksi.show', $item->id)}}" class="btn btn-primary waves-effect">
                                        <i class="material-icons">remove_red_eye</i>
                                    </a>

                                    </form>
                                </td>
                               <td>{{$item->nama_user}}</td>  
                               <td>{{$item->no_hp}}</td>
                               <td>{{$item->alamat}}</td>
                               <td style="align-items:flex-start">
                                   <p style=" display: flex;align-items: center;justify-content: start;"><i class="material-icons">event_note</i> {{$item->tgl_booking}}</p>
                                   <p style="display: flex;align-items: center;justify-content: start;"><i class="material-icons">access_time</i>{{$item->jam_booking}}</p> 
                               </td>
                               <td>{{number_format($item->total_transaksi, 0)}}</td>
                               <td>{{$item->status_transaksi}}</td>
                               <td>{{$item->status_transaksi}}</td>
                               <td>{{$item->catatan}}</td>
                               <td>{{$item->created_at}}</td>
                               {{-- <td>{{$item->updated_at}}</td>
                               <td>{{$item->deleted_at}}</td> --}}
                              
                               
                            </tr>
                            @endforeach
                           
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- #END# Exportable Table -->  
@endsection
  

