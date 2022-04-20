@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Tambah Data Produk</h2>
                </div>
                <div class="body">
                    <form id="form_validation" enctype="multipart/form-data" method="POST" novalidate="novalidate" action="{{route('produk.store')}}">
                        @csrf
                        <div class="form-group form-float">
                            <label class="form-label">Nama Produk</label>
                            <div class="form-line">
                                <input type="text" placeholder="Photobooth, Prawedding..." class="form-control" name="nama_produk" required="" aria-required="true">
                                
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Kategori Produk</label>
                            <div class="form-line">
                                <select name="id_kategori" class="form-control show-tick">
                                    <option value="">-- Pilih Nama Kategori Produk --</option>
                                    @foreach ($kategori_produk as $item)
                                    <option value="{{$item->id}}">{{$item->nama_kategori}}</option> 
                                    @endforeach
                                
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Deskripsi</label>
                            <div class="form-line">
                                {{-- <input type="text" class="form-control" name="deskripsi" required="" aria-required="true"> --}}
                                <textarea name="deskripsi" class="form-control" id="deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Kegiatan</label>

                            <div class="form-line">
                                <input type="text" placeholder="Wisuda, Birthday Party, Wedding Party" class="form-control" name="kegiatan" required="" aria-required="true">
                            </div>
                        </div>
                        {{-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="status" required="" aria-required="true">
                                <label class="form-label">Status</label>
                            </div>
                        </div> --}}
                        <div class="form-group form-float"> 
                            <label class="form-label">Status</label>
                            <div class="form-line">
                                <select name="status" class="form-control show-tick">
                                    <option value="">-- Please select --</option>
                                    <option value="tersedia">Tersedia</option>
                                    <option value="tidak_tersedia">Tidak Tersedia</option>
                                   
                                
                                </select>
                            </div>
                        </div>
                        
                        
                        {{-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="studio" required="" aria-required="true">
                                <label class="form-label">Studio</label>
                            </div>
                        </div> --}}
                        <div class="form-group form-float"> 
                            <label class="form-label">Studio</label>
                            <div class="form-line">
                                <select name="studio" class="form-control show-tick">
                                    <option value="">-- Please select --</option>
                                    <option value="true">Ya</option>
                                    <option value="false">Tidak</option>
                                
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Harga</label>
                            
                            <div class="form-line">
                                <input type="text" placeholder="100,000 , 200,000 ..." class="form-control" name="harga" required="" aria-required="true">
                                
                            </div>
                        </div>

                        <div class="row m-b-0">
                            <div class="col-sm-6 " style="margin-bottom: 0;">
                                <div class="form-group form-float increment" style="margin-bottom: 0;">
                                    <label class="form-label">Gambar</label>
                                    {{-- <div class="form-line">
                                        <input type="file" class="form-control" name="gambar[]" multiple aria-required="true">
                                    </div> --}}
                                    
                                    <div class="input-group " style="margin-bottom: 0;">
                                        
                                        <div class="form-line">
                                            <input type="file" name="gambar[]" class="form-control">
                                        </div>
                                        <div class="input-group-addon ">
                                            
                                            <button type="button" class="btn bg-blue waves-effect btn-add">
                                                <i class="material-icons">add_box</i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="clone invisible" style="margin-bottom: 0;">
                                        <div class="input-group " style="margin-bottom: 0;">
                                            <div class="form-line">
                                                <input type="file" name="gambar[]" class="form-control">
                                            </div>
                                            <div class="input-group-addon ">
                                                
                                                <button type="button" class="btn bg-red waves-effect btn-remove">
                                                    <i class="material-icons">indeterminate_check_box</i>
                                                </button>
                                            </div>
                                        </div>
                                </div>
                                
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