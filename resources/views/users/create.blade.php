@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Tambah Data {{ $tipe == 'pengguna' ? 'Pengguna' : 'Admin' }}</h2>
                </div>
                <div class="body">
                    @if ($tipe == 'pengguna')
                        <form id="form_validation" method="POST"  action="{{route('users.store')}}">
                        @csrf
                        <div class="form-group form-float">
                            <label class="form-label">Nama Pengguna</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama" required aria-required="true">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <label class="form-label">Email</label>
                            <div class="form-line">
                                <input type="email" class="form-control" name="email" required aria-required="true">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Password</label>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" required aria-required="true">
                                
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <label class="form-label">Nomor HP</label>
                            <div class="form-line">
                                <input type="number" class="form-control" name="no_hp" required aria-required="true">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <label class="form-label">Alamat</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="alamat" required aria-required="true">
                            </div>
                        </div>
                        
                        <input type="hidden" name="tipe" value="Pengguna">

                    @elseif($tipe == 'admin').
                        <form id="form_validation" method="POST"  action="{{route('users.store')}}">
                        @csrf
                        <div class="form-group form-float">
                            <label class="form-label">Nama Pengguna</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama" required aria-required="true">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <label class="form-label">Email</label>
                            <div class="form-line">
                                <input type="email" class="form-control" name="email" required aria-required="true">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Password</label>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" required aria-required="true">
                                
                            </div>
                        </div>

                        
                        {{-- <div class="form-group form-float"> 
                            <label class="form-label">Tipe Pengguna</label>
                            <div class="form-line">
                                <select name="tipe" class="form-control show-tick">
                                    <option value="">-- Pilih Tipe Pengguna --</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Pengguna">Pengguna</option>
                                   
                                </select>
                            </div>
                        </div> --}}
                        <input type="hidden" name="tipe" value="Admin">

                    @endif
                    
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