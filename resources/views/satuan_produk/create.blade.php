@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Tambah Data Satuan Produk</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('satuan_produk.store')}}">
                        @csrf
                        {{-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_p" required="" aria-required="true">
                                <label class="form-label">Nama Produk</label>
                            </div>
                        </div> --}}
                        <div class="form-group form-float">
                            <label class="form-label">Nama Produk</label>
                            <div class="form-line">
                                <select name="id_p" class="form-control show-tick">
                                    <option value="">-- Pilih Nama Produk --</option>
                                    @foreach ($produk as $item)
                                    <option value="{{$item->id}}">{{$item->nama_produk}}</option> 
                                    @endforeach
                                
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_sp" required="" aria-required="true">
                                <label class="form-label">Nama Satuan Produk</label>
                            </div>
                        </div> --}}
                        <div class="form-group form-float">
                            <label class="form-label">Nama Satuan Produk</label>
                            <div class="form-line">
                                <select name="id_satuan" class="form-control show-tick">
                                    <option value="">-- Pilih Satuan Produk --</option>
                                    @foreach ($satuan_produk as $item)
                                    <option value="{{$item->id}}">{{$item->nama_satuan}}</option> 
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