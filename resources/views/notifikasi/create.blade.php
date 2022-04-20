@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Tambah Data Notifikasi</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('notifikasi.store')}}">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="total_bayar" required="" aria-required="true">
                                <label class="form-label">Total Bayar</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="metode_pembayaran" required="" aria-required="true">
                                <label class="form-label">Metode Pembayaran</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_dt" required="" aria-required="true">
                                <label class="form-label">Detail Transaksi</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_transaksi" required="" aria-required="true">
                                <label class="form-label">Transaksi</label>
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