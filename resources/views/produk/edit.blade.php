@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Tambah Edit Produk</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('produk.update', $getData->id)}}">
                        @csrf
                        @method('put')
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_produk" required="" aria-required="true" value="{{$getData->nama_produk}}">
                                <label class="form-label">Nama Produk</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Deskripsi</label>
                            <div class="form-line">
                                {{-- <input type="text" class="form-control" name="deskripsi" required="" aria-required="true"> --}}
                                <textarea name="deskripsi" class="form-control" id="deskripsi">{{$getData->deskripsi}}</textarea>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="kegiatan" required="" aria-required="true" value="{{$getData->kegiatan}}">
                                <label class="form-label">Kegiatan</label>
                            </div>
                        </div>
                        {{-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="status" required="" aria-required="true" value="{{$getData->status}}">
                                <label class="form-label">Status</label>
                            </div>
                        </div> --}}

                        <div class="form-group form-float"> 
                            <label class="form-label">Status</label>
                            <div class="form-line">
                                <select name="status" class="form-control show-tick">
                                    <option value="">-- Please select --</option>
                                            {{!! $selected='selected'; !!}}
                                    @if ($getData->status == 'tersedia')
                                            <option {{$selected}} value="tersedia">Tersedia</option>
                                            <option value="tidak_tersedia">Tidak Tersedia</option>
                                        
                                    @else
                                    <option value="tersedia">Tersedia</option>
                                    <option {{$selected}} value="tidak_tersedia">Tidak Tersedia</option>
                                    @endif

                                
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-group form-float">
                            <label class="form-label">Gambar</label>
                            <div class="form-line">
                                <input type="file" class="form-control" name="gambar" required="" aria-required="true" value="{{$getData->gambar}}">
                            </div>
                        </div> --}}
                        {{-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="studio" required="" aria-required="true" value="{{$getData->studio}}">
                                <label class="form-label">Studio</label>
                            </div>
                        </div> --}}
                        <div class="form-group form-float"> 
                            <label class="form-label">Studio</label>
                            <div class="form-line">
                                <select name="studio" class="form-control show-tick">
                                    <option value="">-- Please select --</option>
                                    {{!! $selected='selected'; !!}}
                                    @if ($getData->studio == 'true')
                                    <option {{$selected}} value="true">Ya</option>
                                    <option value="False">Tidak</option>
                                        
                                    @else
                                    <option value="true">Ya</option>
                                    <option {{$selected}} value="false">Tidak</option>
                                    @endif

                                
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="harga" required="" aria-required="true" value="{{$getData->harga}}">
                                <label class="form-label">Harga</label>
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