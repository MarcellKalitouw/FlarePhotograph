 @extends('layouts.app')
 @section('content')
   <!-- Exportable Table -->

 <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    EXPORTABLE TABLE
                    <a  href="{{route('users.create')}}" class="btn btn-success waves-effect">Tambah Data Pengguna</a >
                    <a  href="{{route('create.admin')}}" class="btn btn-success waves-effect">Tambah Data Admin</a >
                </h2>
                
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Opsi</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No.HP</th>
                                <th>Alamat</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nomor</th>
                                <th>Opsi</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No.HP</th>
                                <th>Alamat</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                           $no = 0;
                           ?>
                                @foreach ($data as $item)
                            <tr>
                                <td>{{$no+=1}}</td>  
                                <td>
                                    <form action="{{route('users.destroy', $item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn bg-red waves-effect">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                        <a href="{{route('users.edit', $item->id)}}" class="btn btn-warning waves-effect">
                                            <i class="material-icons">create</i>
                                        </a>
    
                                    </form>
                                </td>
                                <td>{{$item->nama}}</td>  
                                <td>{{$item->email}}</td>
                                <td>{{$item->no_hp}}</td>
                                <td>{{$item->alamat}}</td>
                                
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->  
 @endsection
 