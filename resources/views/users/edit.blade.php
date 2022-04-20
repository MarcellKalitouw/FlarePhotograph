@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Edit Data Pengguna</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('users.update', $getData->id)}}">
                        @csrf
                        @method('put')
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="nama" required="" aria-required="true" value="{{$getData->nama}}">
                                <label class="form-label">Nama Pengguna</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="email" class="form-control" name="email" required="" aria-required="true" value="{{$getData->email}}">
                                <label class="form-label">Email</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="no_hp" required="" aria-required="true" value="{{$getData->no_hp}}">
                                <label class="form-label">Nomor HP</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="alamat" required="" aria-required="true" value="{{$getData->alamat}}">
                                <label class="form-label">Alamat</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <label class="form-label">Password</label>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" required="" aria-required="true" value="{{$getData->password}}">
                                
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