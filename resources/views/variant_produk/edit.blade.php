@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Edit Data Variant Produk</h2>
                </div>
                <div class="body">
                    <form id="form_validation"  method="POST" novalidate="novalidate" action="{{route('variant_produk.update', $getData->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group form-float">
                            <label class="form-label">Nama Variant</label>
                            <div class="form-line">
                                <input type="text" value="{{ $getData->nama_varian }}"  placeholder="Photobooth, Prawedding..." class="form-control" name="nama_varian" required="" aria-required="true">
                                
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Harga</label>
                            
                            <div class="form-line">
                                <input type="text"  value="{{ $getData->harga }}"  placeholder="100,000 , 200,000 ..." class="form-control" name="harga" required="" aria-required="true">
                                
                            </div>
                        </div>
                        
                        <div class="form-group form-float">
                            <label class="form-label">Deskripsi</label>
                            <div class="form-line">
                                {{-- <input type="text" class="form-control" name="deskripsi" required="" aria-required="true"> --}}
                                <textarea name="deskripsi" class="form-control" id="deskripsi">{{ $getData->deskripsi }}</textarea>
                            </div>
                        </div>

                        <input type="hidden" name="id_produk" value="{{ $getData->id_produk }}">
                        

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

@push('script')

    <script>
        window.action = "submit";

         jQuery(document).ready(function () {
            jQuery(".btn-add").click(function () {
                let markup = jQuery(".invisible").html();
                jQuery(".increment").append(markup);
            });
            jQuery("body").on("click", ".btn-remove", function () {
                jQuery(this).parents(".input-group").remove();
            })
        })

    </script>

@endpush