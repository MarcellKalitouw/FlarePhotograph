@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Tambah Data Warna</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('warna.store')}}">
                        @csrf
                        <div class="form-group form-float">
                            <label class="form-label">Nama Produk</label>
                            <div class="form-line">
                                <select name="id_produk" class="form-control show-tick">
                                    <option value="">-- Pilih Produk --</option>
                                    @foreach ($produk as $item)
                                    <option value="{{$item->id}}">{{$item->nama_produk}}</option> 
                                    @endforeach
                                
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_warna" required="" aria-required="true">
                                <label class="form-label">Nama warna</label>
                            </div>
                        </div>
                        
                        <div class="form-group form-float">
                            <b>Heksa Warna</b>
                            <div class="input-group colorpicker colorpicker-element">
                                <div class="form-line">
                                    <input type="text" name="heksa_warna" class="form-control" value="#00AABB">
                                </div>
                                <span class="input-group-addon">
                                    <i></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Status</label>
                            <div class="form-line">
                                <select name="status" class="form-control show-tick">
                                    <option value="">-- Please select --</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                
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