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
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('transaksi.update', $getData->id)}}">
                        @csrf
                        @method('put')
                        {{-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="id_user" required="" aria-required="true" value="{{$getData->id_user}}">
                                <label class="form-label">Nama Pengguna</label>
                            </div>
                        </div> --}}

                        <div class="form-group form-float">
                            <label class="form-label">Nama Pengguna</label>
                            <div class="form-line">
                                <select name="id_user" class="form-control show-tick">
                                    <option value="">-- Pilih Nama Pengguna --</option>
                                    @foreach ($users as $item)
                                    @if ($item->id== $getData->id_user)
                                    <option selected value="{{$item->id}}">{{$item->nama}}</option> 
                                        
                                    @else
                                    <option value="{{$item->id}}">{{$item->nama}}</option> 
                                        
                                    @endif
                                    @endforeach
                                
                                </select>
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
                            <label class="form-label">Waktu Pemesanan</label>
                            <div class="form-line">
                                <input type="date" class="form-control" name="jam_booking" required="" aria-required="true" value="{{$getData->jam_booking}}">
                                
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">jam Mulai</label>
                            <div class="form-line">
                                <input type="date" class="form-control" name="jam_mulai" required="" aria-required="true" value="{{$getData->jam_mulai}}">
                                
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="total_order" required="" aria-required="true" value="{{$getData->total_order}}">
                                <label class="form-label">Total Pesanan</label>
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
                                    @if ($getData->status == 'Konfirmasi DP 1')
                                        <option {{$selected}} value="Konfirmasi DP 1">Konfirmasi DP 1</option>
                                        <option value="Konfirmasi DP 2">Konfirmasi DP 2</option>
                                        <option value="Selesai">Selesai</option>

                                    @elseif ($getData->status == 'Konfirmasi DP 2')
                                        <option value="Konfirmasi DP 1">Konfirmasi DP 1</option>
                                        <option {{$selected}} value="Konfirmasi DP 2">Konfirmasi DP 2</option>
                                        <option value="Selesai">Selesai</option>

                                    @else
                                        <option value="Konfirmasi DP 1">Konfirmasi DP 1</option>
                                        <option value="Konfirmasi DP 2">Konfirmasi DP 2</option>
                                        <option {{$selected}} value="Selesai">Selesai</option>
                                    @endif
                                    
                                
                                </select>
                            </div>
                        </div> 
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="catatan" required="" aria-required="true" value="{{$getData->catatan}}">
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