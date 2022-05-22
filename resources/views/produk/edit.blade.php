@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <x-alert></x-alert>
    
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Form Tambah Edit Produk</h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('produk.update', $getData->id)}}">
                        @csrf
                        @method('put')
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_produk" required="" aria-required="true" value="{{$getData->nama_produk}}">
                                <label class="form-label">Nama Produk</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Deskripsi</label>
                            <div class="form-line">
                                {{-- <input type="text" class="form-control" name="deskripsi" required="" aria-required="true"> --}}
                                <textarea name="deskripsi" class="form-control" id="deskripsi">{{$getData->deskripsi}}</textarea>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="kegiatan" required="" aria-required="true" value="{{$getData->kegiatan}}">
                                <label class="form-label">Kegiatan</label>
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
                                    @if ($getData->status == 'tersedia')
                                            <option {{$selected}} value="tersedia">Tersedia</option>
                                            <option value="tidak_tersedia">Tidak Tersedia</option>
                                        
                                    @else
                                    <option value="tersedia">Tersedia</option>
                                    <option {{$selected}} value="tidak_tersedia">Tidak Tersedia</option>
                                    @endif

                                
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-group form-float">
                            <label class="form-label">Gambar</label>
                            <div class="form-line">
                                <input type="file" class="form-control" name="gambar" required="" aria-required="true" value="{{$getData->gambar}}">
                            </div>
                        </div> --}}
                        {{-- <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="studio" required="" aria-required="true" value="{{$getData->studio}}">
                                <label class="form-label">Studio</label>
                            </div>
                        </div> --}}
                        <div class="form-group form-float"> 
                            <label class="form-label">Studio</label>
                            <div class="form-line">
                                <select name="studio" class="form-control show-tick">
                                    <option value="">-- Please select --</option>
                                    {{!! $selected='selected'; !!}}
                                    @if ($getData->studio == 'true')
                                    <option {{$selected}} value="true">Ya</option>
                                    <option value="False">Tidak</option>
                                        
                                    @else
                                    <option value="true">Ya</option>
                                    <option {{$selected}} value="false">Tidak</option>
                                    @endif

                                
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="harga" required="" aria-required="true" value="{{$getData->harga}}">
                                <label class="form-label">Harga</label>
                            </div>
                        </div>
                        
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <!-- #END# Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        TABEL VARIANT PRODUK
                        <a  href="{{route('variant_produk.create', $getData->id)}}" class="btn btn-success waves-effect">Tambah Data</a >
                    </h2>
                    
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                        <th>Nomor</th>
                                        <th>Opsi</th>
                                        <th>Nama Variant</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Deleted at</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                        <th>Nomor</th>
                                        <th>Opsi</th>
                                        <th>Nama Variant</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Deleted at</th>
                                        
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $no = 0;
                                ?>
                                @foreach ($getVariant as $item)

                                <tr>
                                    <td>{{$no+=1}}</td>  
                                    <td>
                                        <form action="{{route('variant_produk.destroy', [$getData->id, $item->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn bg-red waves-effect" onclick="return confirm('Are You sure?')">
                                                <i class="material-icons">delete_forever</i>
                                            </button>
                                            <a href="{{route('variant_produk.edit', $item->id)}}" class="btn btn-warning waves-effect">
                                                <i class="material-icons">create</i>
                                            </a>
            
                                            </form>
                                    </td>
                                    <td>{{$item->nama_varian}}</td>  
                                    <td>{{$item->harga}}</td>  
                                    <td>{{$item->deskripsi}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td>{{$item->deleted_at}}</td>
                                    
                                    
                                    </tr>
                                    @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection