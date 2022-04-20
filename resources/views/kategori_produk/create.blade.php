@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Tambah Data Kategori Produk</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" enctype="multipart/form-data" action="{{route('kategori_produk.store')}}">
                        @csrf
                        <div class="form-group form-float">
                            <label class="form-label">Nama Kategori</label>
                            <div class="form-line"> 
                                <input type="text" class="form-control" placeholder="photobooth, birthday party ..." name="nama_kategori" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Deskripsi</label>
                            <div class="form-line">
                                <textarea name="deskripsi" rows="4" class="form-control no-resize" placeholder="Masukkan deskripsi kategori produk..."></textarea>

                                
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">File Gambar</label>
                            <div class="form-line">
                                <input type="file" class="form-control" name="gambar" >
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                    </form>
                </div>
                 @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif  
            </div>
        </div>
    </div>
    <!-- #END# Basic Validation -->
    
</div>
@endsection