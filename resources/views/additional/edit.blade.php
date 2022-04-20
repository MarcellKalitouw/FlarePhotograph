@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Tambah Data Tambahan</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('additional.update', $getData->id)}}">
                        @csrf
                        @method('put')
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="id_produk" required="" aria-required="true" value="{{$getData->id_produk}}">
                                <label class="form-label">Nama Produk</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="id_dt" required="" aria-required="true" value="{{$getData->id_dt}}">
                                <label class="form-label">Detail Transaksi</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_transaksi" required="" aria-required="true" value="{{$getData->id_transaksi}}">
                                <label class="form-label">Transaksi</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama" required="" aria-required="true" value="{{$getData->nama}}">
                                <label class="form-label">Nama</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="harga" required="" aria-required="true" value="{{$getData->harga}}">
                                <label class="form-label">Harga</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="qty" required="" aria-required="true" value="{{$getData->qty}}">
                                <label class="form-label">Kuantitas</label>
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