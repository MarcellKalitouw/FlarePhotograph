@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Ubah Data Lokasi Tersedia</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('lokasi_tersedia.update', $lk->id)}}">
                        @csrf
                        @method('put')
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_lokasi" value="{{ $lk->nama_lokasi }}" required="" aria-required="true">
                                <label class="form-label">Nama Lokasi</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="harga" value="{{ $lk->harga }}" required="" aria-required="true">
                                <label class="form-label">Harga Ongkir</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Catatan</label>
                            <div class="form-line">
                                <textarea name="catatan" rows="4" class="form-control no-resize" placeholder="Masukkan catatan...">{{ $lk->catatan }}</textarea>
                            </div>
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

                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Validation -->
    
</div>
@endsection