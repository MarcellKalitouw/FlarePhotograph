@extends('layouts.app')
@section('content')
  <!-- Exportable Table -->

<x-alert></x-alert>

<div class="row clearfix">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <div class="card">
           <div class="header">
               <h2>
                   TABEL PRODUK
                   <a  href="{{route('produk.create')}}" class="btn btn-success waves-effect">Tambah Data</a >
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
                               <th>Kategori Produk</th>
                               <th>Deskripsi</th>
                               <th>Kegiatan</th>
                               <th>Status</th>
                               <th>Gambar</th>
                               <th>Studio</th>
                               <th>Harga</th>
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
                            <th>Kategori Produk</th>
                            <th>Deskripsi</th>
                            <th>Kegiatan</th>
                            <th>Status</th>
                            <th>Gambar</th>
                            <th>Studio</th>
                            <th>Harga</th>
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
                                <form action="{{route('produk.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn bg-red waves-effect" onclick="return confirm('Are You sure?')">
                                        <i class="material-icons">delete_forever</i>
                                    </button>
                                    <a href="{{route('produk.edit', $item->id)}}" class="btn btn-warning waves-effect">
                                        <i class="material-icons">create</i>
                                    </a>
    
                                    </form>
                               </td>
                               <td>{{$item->nama_produk}}</td>  
                               <td>{{$item->kategori_produk}}</td>  
                               <td>{{$item->deskripsi}}</td>
                               <td>{{$item->kegiatan}}</td>
                               <td>{{$item->status}}</td>
                               <td style="display:flex ">
                                    @foreach ($item->gambar_produk as $gambar_item)
                                        <img src="{{asset('storage/'.$gambar_item->file)}}" alt="" width="100px" height="100px" style="object-fit:contain;">
                                    @endforeach
                                </td>
                               <td>{{$item->studio}}</td>
                               <td>{{$item->harga}}</td>
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
  
@push('script')
    
@endpush