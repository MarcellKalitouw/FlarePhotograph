@extends('layouts.app')
@section('content')
  <!-- Exportable Table -->

<div class="row clearfix">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <div class="card">
           <div class="header">
               <h2>
                   TABEL NOTIFIKASI
                   <a  href="{{route('notifikasi.create')}}" class="btn btn-success waves-effect">Tambah Data</a >
               </h2>
               
           </div>
           <div class="body">
               <div class="table-responsive">
                   <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                       <thead>
                           <tr>
                               <th>Nomor</th>
                               <th>Opsi</th>
                               <th>Kode Transaksi</th>
                               <th>Keterangan</th>
                               <th>Status Notifikasi</th>
                               <th>Created at</th>
                               <th>Updated at</th>
                               <th>Deleted at</th>

                               
                           </tr>
                       </thead>
                       <tfoot>
                           <tr>
                            <th>Nomor</th>
                            <th>Opsi</th>
                            <th>Kode Transaksi</th>
                            <th>Keterangan</th>
                            <th>Status Notifikasi</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Deleted at</th>                           </tr>
                       </tfoot>
                       <tbody>
                           <?php
                           $no = 0;
                           ?>
                           @foreach ($data as $item)

                           <tr>
                               <td>{{$no+=1}}</td>  
                               <td> 
                                    <form action="{{route('notifikasi.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn bg-red waves-effect">
                                        <i class="material-icons">delete_forever</i>
                                    </button>
                                    <a href="{{route('notifikasi.edit', $item->id)}}" class="btn btn-warning waves-effect">
                                        <i class="material-icons">create</i>
                                    </a>

                                    </form>
                                </td>
                               <td>{{$item->kode_transaksi}}</td>  
                               <td>{{$item->keterangan}}</td>
                               <td>{{$item->status_notifikasi}}</td>
                               <td>{{$item->created_at}}</td>
                               <td>{{$item->updated_at}}</td>
                               <td>{{$item->deleted_at}}</td>
                               
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
  

