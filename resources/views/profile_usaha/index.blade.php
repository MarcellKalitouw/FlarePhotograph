@extends('layouts.app')

@section('content')
    <div class="row clearfix"">
                <div class="col-xs-12 col-sm-3">
                    <div class="card card-about-me">
                        <div class="header">
                            <h2>ABOUT NAMA TOKO</h2>
                        </div>
                        <div class="body">
                            <ul>
                                {{-- <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        Education
                                    </div>
                                    <div class="content">
                                        B.S. in Computer Science from the University of Tennessee at Knoxville
                                    </div>
                                </li> --}}
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Location
                                    </div>
                                    <div class="content">
                                        {{ $data->alamat_lengkap }}
                                    </div>
                                </li>
                                {{-- <li>
                                    <div class="title">
                                        <i class="material-icons">edit</i>
                                        Skills
                                    </div>
                                    <div class="content">
                                        <span class="label bg-red">UI Design</span>
                                        <span class="label bg-teal">JavaScript</span>
                                        <span class="label bg-blue">PHP</span>
                                        <span class="label bg-amber">Node.js</span>
                                    </div>
                                </li> --}}
                                <li>
                                    <div class="title">
                                        <i class="material-icons">notes</i>
                                        Description
                                    </div>
                                    <div class="content">
                                        {{ $data->deskripsi_usaha }}
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">image</i>
                                        Profile Image
                                    </div>
                                    <div class="content" >
                                        <img  src="{{ asset('gambar_usaha/'.$data->gambar_usaha) }}" class="img-responsive">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    {{-- <li role="presentation"><a href="#atur_lokasi" aria-controls="settings" role="tab" data-toggle="tab">Atur Lokasi</a></li> --}}
                                    <li role="presentation"><a href="#bank_transfer" aria-controls="settings" role="tab" data-toggle="tab">Bank Transfer</a></li>
                                </ul>

                                <div class="tab-content">

                                    <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ ($data == null) ? route('profile_usaha.store') : route('profile_usaha.update', $data->id) }}">
                                            @csrf
                                            {!! ($data == null) ? "<input type='hidden' value='POST' name='_method'/>" : "<input type='hidden' value='PUT' name='_method'/>" !!}
                                            <div class="form-group">
                                                <label for="NamaUsaha" class="col-sm-2 control-label">Name Usaha</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NamaUsaha" name="nama_usaha" placeholder="Nama Usaha" value="{{ old('nama_usaha', $data['nama_usaha']) }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="AlamatLengkap" class="col-sm-2 control-label">Alamat Lengkap</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <textarea class="form-control" id="AlamatLengkap" name="alamat_lengkap" rows="3" placeholder="Alamat Lengkap">{{ old('alamat_lengkap', $data['alamat_lengkap']) }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="DeskripsiUsaha" class="col-sm-2 control-label">Deskripsi Usaha</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <textarea class="form-control" id="DeskripsiUsaha" name="deskripsi_usaha" rows="3" placeholder="Deskripsi Lengkap">{{ old('deskripsi_usaha', $data['deskripsi_usaha']) }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Gambar" class="col-sm-2 control-label">Foto Profile Usaha</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="file" class="form-control" id="Gambar" name="gambar_usaha">
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="atur_lokasi">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="Longitude" class="col-sm-3 control-label">Longitude</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="Longitude" name="long" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Latitude" class="col-sm-3 control-label">Latitude</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="Latitude" name="lat" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                           

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div role="tabpanel" class="tab-pane fade in" id="bank_transfer">
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    TABEL  Bank Transfer
                                                    <a  href="{{route('bank_transfer.create')}}" class="btn btn-success waves-effect">Tambah Data</a >
                                                </h2>
                                                <ul class="header-dropdown m-r--5">
                                                    <li class="dropdown">
                                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                        <thead>
                                                            <tr>
                                                                <th>Nomor</th>
                                                                <th>Opsi</th>
                                                                <th>Atas nama Rekening</th>
                                                                <th>Nomor Rekening</th>
                                                                <th>Nama Bank</th>
                                                                <th>Created at</th>
                                                                <th>Updated at</th>

                                                                
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Nomor</th>
                                                                <th>Opsi</th>
                                                                <th>Atas nama Rekening</th>
                                                                <th>Nomor Rekening</th>
                                                                <th>Nama Bank</th>
                                                                <th>Created at</th>
                                                                <th>Updated at</th>
                                                                
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                            <?php
                                                            $no = 0;
                                                            ?>
                                                            @foreach ($bank_transfer as $item)

                                                            <tr>
                                                                
                                                                <td>{{$no+=1}}</td>  
                                                                <td>
                                                                    <form action="{{route('bank_transfer.destroy', $item->id)}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn bg-red waves-effect">
                                                                            <i class="material-icons">delete_forever</i>
                                                                        </button>
                                                                        <a href="{{route('bank_transfer.edit', $item->id)}}" class="btn btn-warning waves-effect">
                                                                            <i class="material-icons">create</i>
                                                                        </a>

                                                                    </form>

                                                                </td>
                                                                <td>{{$item->atas_nama}}</td>  
                                                                <td>{{$item->no_rek}}</td>
                                                                <td>{{$item->nama_bank}}</td>
                                                                <td>{{$item->created_at}}</td>
                                                                <td>{{$item->updated_at}}</td>
                                                                
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
                </div>
            </div>
@endsection