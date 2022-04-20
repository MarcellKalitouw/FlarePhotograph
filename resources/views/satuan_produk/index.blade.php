@extends('layouts.app')
@section('content')
  <!-- Exportable Table -->

<div class="row clearfix">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <div class="card">
           <div class="header">
               <h2>
                   TABEL SATUAN PRODUK
                   <a  href="{{route('satuan_produk.create')}}" class="btn btn-success waves-effect">Tambah Data</a >
               </h2>
               
           </div>
           <div class="body">
               <div class="table-responsive">
                   <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                       <thead>
                           <tr>
                               <th>Nomor</th>
                               <th>Opsi</th>
                               <th>Nama Produk</th>
                               <th>Nama Satuan Produk</th>
                               <th>Created at</th>
                               <th>Updated at</th>
                               <th>Deleted at</th>

                               
                           </tr>
                       </thead>
                       <tfoot>
                           <tr>
                                <th>Nomor</th>
                               <th>Opsi</th>
                               <th>Nama Produk</th>
                               <th>Nama Satuan Produk</th>
                               <th>Created at</th>
                               <th>Updated at</th>
                               <th>Deleted at</th>
                               
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
                                <form action="{{route('satuan_produk.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-red waves-effect">
                                    <i class="material-icons">delete_forever</i>
                                </button>
                                <a href="{{route('satuan_produk.edit', $item->id)}}" class="btn btn-warning waves-effect">
                                    <i class="material-icons">create</i>
                                </a>

                                </form>
                            
                                </td>
                               
                           
                               <td>{{$item->nama_produk}}</td>  
                               <td>{{$item->nama_satuan}}</td>
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
  

