@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Tambah Data Satuan</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('satuan.store')}}">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_satuan" required="" aria-required="true">
                                <label class="form-label">Nama Satuan</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Kategori Produk</label>
                            <div class="form-line">
                                <select name="id_kp" class="form-control show-tick">
                                    <option value="">-- Pilih Kategori Produk --</option>
                                    @foreach ($kategori_produk as $item)
                                    <option value="{{$item->id}}">{{$item->nama_kategori}}</option> 
                                    @endforeach
                                
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Validation -->
    
</div>
@endsection