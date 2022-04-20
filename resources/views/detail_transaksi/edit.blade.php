@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Tambah Data Detail Transaksi</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('detail_transaksi.update', $getData->id)}}">
                        @csrf
                        @method('put')
                        {{-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="id_produk" required="" aria-required="true" value="{{$getData->id_produk}}">
                                <label class="form-label">Id Produk</label>
                            </div>
                        </div> --}}

                        <div class="form-group form-float">
                            <label class="form-label">Id Produk</label>
                            <div class="form-line">
                                <select name="id_produk" class="form-control show-tick">
                                    <option value="">-- Pilih Id Produk --</option>
                                    @foreach ($produk as $item)
                                    @if ($item->id == $getData->id_produk)
                                    <option selected value="{{$item->id}}">{{$item->id}}</option> 
                                        
                                    @else  
                                    <option value="{{$item->id}}">{{$item->id}}</option> 
                                    
                                    @endif
                                    @endforeach
                                
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_produk" required="" aria-required="true" value="{{$getData->nama_produk}}">
                                <label class="form-label">Nama Produk</label>
                            </div>
                        </div> --}}

                        <div class="form-group form-float">
                            <label class="form-label">Nama Produk</label>
                            <div class="form-line">
                                <select name="id_produk" class="form-control show-tick">
                                    <option value="">-- Pilih Produk --</option>
                                    @foreach ($produk as $item)
                                    @if ($item->id == $getData->id_produk)
                                    <option selected value="{{$item->id}}">{{$item->nama_produk}}</option> 
                                        
                                    @else  
                                    <option value="{{$item->id}}">{{$item->nama_produk}}</option> 
                                    
                                    @endif
                                    @endforeach
                                
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_transaksi" required="" aria-required="true" value="{{$getData->id_transaksi}}">
                                <label class="form-label">Transaksi</label>
                            </div>
                        </div>   --}}

                        <div class="form-group form-float"> 
                            <label class="form-label">Transaksi</label>
                            <div class="form-line">
                                <select name="id_transaksi" class="form-control show-tick">
                                    <option value="">-- Pilih Transaksi --</option>
                                    @foreach ($transaksi as $item)
                                    @if ($item->id == $getData->id_transaksi)
                                    <option selected value="{{$item->id}}">{{$item->id}}</option> 
                                        
                                    @else  
                                    <option value="{{$item->id}}">{{$item->id}}</option> 
                                    
                                    @endif
                                    @endforeach
                                
                                </select>
                            </div>
                        </div> 

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="harga" required="" aria-required="true" value="{{$getData->harga}}">
                                <label class="form-label">Harga</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="total" required="" aria-required="true" value="{{$getData->total}}">
                                <label class="form-label">Total</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="kode_verifikasi" required="" aria-required="true" value="{{$getData->kode_verifikasi}}">
                                <label class="form-label">Kode Verifikasi</label>
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