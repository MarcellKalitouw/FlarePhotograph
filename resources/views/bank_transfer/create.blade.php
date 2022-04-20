@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Tambah Bank Transfer</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('bank_transfer.store')}}">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" value="{{ old('atas_nama') }}" name="atas_nama" required="" aria-required="true">
                                <label class="form-label">Atas Nama Rekening</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" value="{{ old('no_rek') }}" name="no_rek" required="" aria-required="true">
                                <label class="form-label">Nomor Rekening</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="textr" class="form-control" value="{{ old('nama_bank') }}" name="nama_bank" required="" aria-required="true">
                                <label class="form-label">Nama Bank</label>
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