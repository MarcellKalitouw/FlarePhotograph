@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Tambah Data Transaksi</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('transaksi.store')}}">
                        @csrf
                        {{-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="id_user" required="" aria-required="true">
                                <label class="form-label">Nama Pengguna</label>
                            </div>
                        </div> --}}

                        <div class="form-group form-float">
                            <label class="form-label">Nama Pengguna</label>
                            <div class="form-line">
                                <select name="id_user" class="form-control show-tick">
                                    <option value="">-- Pilih Nama Pengguna --</option>
                                    @foreach ($users as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option> 
                                    @endforeach
                                
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="no_hp" required="" aria-required="true">
                                <label class="form-label">Nomor HP</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="alamat" required="" aria-required="true">
                                <label class="form-label">Alamat</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Waktu Pemesanan</label>
                            <div class="form-line">
                                <input type="date" class="form-control" name="jam_booking" required="" aria-required="true">
                                
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">jam Mulai</label>
                            <div class="form-line">
                                <input type="date" class="form-control" name="jam_mulai" required="" aria-required="true">
                                
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="total_order" required="" aria-required="true">
                                <label class="form-label">Total Pesanan</label>
                            </div>
                        </div>
                         {{-- <div class="form-group form-float"> 
                            <div class="form-line">
                                <input type="text" class="form-control" name="status" required="" aria-required="true">
                                <label class="form-label">Status</label>
                            </div>
                        </div>  --}}
                        <div class="form-group form-float"> 
                            <label class="form-label">Status</label>
                            <div class="form-line">
                                <select name="status" class="form-control show-tick">
                                    <option value="">-- Please select --</option>
                                    <option value="Konfirmasi DP 1">Konfirmasi DP 1</option>
                                    <option value="Konfirmasi DP 2">Konfirmasi DP 2</option>
                                    <option value="Selesai">Selesai</option>
                                
                                </select>
                            </div>
                        </div> 

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="catatan" required="" aria-required="true">
                                <label class="form-label">Catatan</label>
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