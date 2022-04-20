@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Ubah Data Satuan Produk</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('satuan_produk.update', $getData->id)}}">
                        @csrf
                        @method('put')

                        {{-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_p" required="" aria-required="true" value="{{$getData->id_p}}">
                                <label class="form-label">Nama Produk</label>
                            </div>
                        </div> --}}

                        <div class="form-group form-float">
                            <label class="form-label">Nama Produk</label>
                            <div class="form-line">
                                <select name="id_p" class="form-control show-tick">
                                    <option value="">-- Pilih Produk --</option>
                                    @foreach ($produk as $item)
                                    @if ($item->id == $getData->id_p)
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
                                <input type="text" class="form-control" name="id_satuan" required="" aria-required="true" value="{{$getData->id_satuan}}">
                                <label class="form-label">Nama Satuan Produk</label>
                            </div>
                        </div> --}}

                        <div class="form-group form-float">
                            <label class="form-label">Nama Satuan Produk</label>
                            <div class="form-line">
                                <select name="id_satuan" class="form-control show-tick">
                                    <option value="">-- Pilih Satuan Produk --</option>
                                    @foreach ($satuan as $item)
                                    @if ($item->id == $getData->id_satuan)
                                    <option selected value="{{$item->id}}">{{$item->nama_satuan}}</option> 
                                        
                                    @else  
                                    <option value="{{$item->id}}">{{$item->nama_satuan}}</option> 
                                    
                                    @endif
                                    @endforeach
                                
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