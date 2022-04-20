@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Ubah Data Warna</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('warna.update', $getData->id)}}">
                        @csrf
                        @method('put')
                        {{-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_produk" required="" aria-required="true" value="{{$getData->id_produk}}">
                                <label class="form-label">Nama Produk</label>
                            </div>
                        </div> --}}
                        
                        <div class="form-group form-float">
                            <label class="form-label">Nama Produk</label>
                            <div class="form-line">
                                <select name="id_produk" class="form-control show-tick">
                                    <option value="">-- Pilih Produk --</option>
                                    @foreach ($produk as $item)
                                    @if ($item->id== $getData->id_produk)
                                    <option selected value="{{$item->id}}">{{$item->nama_produk}}</option> 
                                        
                                    @else  
                                    <option value="{{$item->id}}">{{$item->nama_produk}}</option> 
                                    
                                    @endif
                                    @endforeach
                                
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_warna" required="" aria-required="true" value="{{$getData->nama_warna}}">
                                <label class="form-label">Nama warna</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="heksa_warna" required="" aria-required="true" value="{{$getData->heksa_warna}}">
                                <label class="form-label">Heksa Warna</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Status</label>
                            <div class="form-line">
                                <select name="status" class="form-control show-tick">
                                    <option value="">-- Please select --</option>
                                            {{!! $selected='selected'; !!}}
                                    @if ($getData->status == 'Tersedia')
                                            <option {{$selected}} value="Tersedia">Tersedia</option>
                                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                                    @else
                                            <option value="Tersedia">Tersedia</option>
                                            <option {{$selected}} value="Tidak Tersedia">Tidak Tersedia</option>
                                    @endif
                                    
                                    
                                
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