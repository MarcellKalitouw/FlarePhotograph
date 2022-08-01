@extends('users-view.layout')

@push('style')
<style>

  .warna:hover{
    border: 3px solid rgb(197, 197, 197);
  }
  button.order-now{
    background-color: #f33f3f;
    color: #fff;
    font-size: 14px;
    text-transform: capitalize;
    font-weight: 300;
    padding: 10px 20px;
    border-radius: 5px;
    display: inline-block;
    transition: all 0.3s;
    border: #f33f3f solid 1px;
  }
</style>

@endpush
@section('content')
    <div class="page-heading header-text" style="padding: 0px;
    text-align: center;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>about us</h4>
              <h2>our company</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="products" style="margin-top: 25px">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            @if ($errors->any()) 
              <div class="alert alert-danger"  id="error-message">
                  <strong>Whoops!</strong> Ada masalah dengan pemesanan anda.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif 
            <x-alert></x-alert> 

            <div class="filters">
              <ul>
                  <li class="active" data-filter=".profile">Profile</li>
                  <li data-filter=".history-transaksi">Riwayat Transaksi</li>
              </ul>
            </div>
          </div>
          <div class="col-md-12" >
            <div class="filters-content">
                <div class="row grid" >
                    <div class="col-lg-12 col-md-4 all profile" >
                      <div class="product-item" >
                        <a href="#"><img src="assets/images/product_01.jpg" alt=""></a>
                        <div class="down-content">
                          <a href="#"><h4>Your Profile</h4></a>
                          {{-- <h6>$18.25</h6> --}}
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                              <label for="">Nama</label>
                              <fieldset>
                                <input name="name" type="text" value="{{ $getUser->nama }}" class="form-control" id="name" placeholder="Nama Pemesan" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                              <label for="">Email</label>
                              <fieldset>
                                <input name="email" type="text" class="form-control" value="{{ $getUser->email }}" id="email" placeholder="Alamat Email" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                              <label for="">Nomor Telepon</label>
                              <fieldset>
                                <input name="no_hp" type="text" class="form-control"  value="{{ $getUser->no_hp }}"  id="subject" placeholder="Nomor Telepon" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-12 contact-form" style="margin-top: 2%">
                              <fieldset>
                                <button type="submit" id="form-submit" class="btn btn-warning">Update</button>
                              </fieldset>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-4 all history-transaksi" hidden style="position: static" >
                      <div class="product-item" >
                        <a href="#"><img src="assets/images/product_02.jpg" alt=""></a>
                        <div class="" style="padding:0 30px">
                          <h4>Your History Transaction</h4>
                          <ul class="accordion" >
                            @if (count($allTransaksi) > 0)
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($allTransaksi as $item)
                                    <li style="border-top:0px">
                                      <a>{{$no += 1  }}. Kode Transaksi : {{ $item->kode_transaksi }}</a>
                                      <div class="content">
                                        <table class="table table-hover">
                                          <thead>
                                              <tr style="text-align: center">
                                                <th scope="col" colspan="4">Produk Yang di Pesan</th>
                                                
                                              </tr>
                                              <tr>
                                                <th scope="col">Produk</th>
                                                <th scope="col">Warna</th>
                                                <th scope="col">Harga</th>
                                                {{-- <th scope="col">Total Transaksi</th> --}}
                                              </tr>
                                            </thead>
                                            
                                            <tbody>
                                              @foreach ($item->detail_transaksi as $data)
                                                  <tr>
                                                    {{-- <th scope="row">1</th> --}}
                                                    <td>
                                                      <p>{{ $data->nama_produk }}</p>
                                                      <p>{{ $data->nama_varian ? $data->nama_varian : "-"}}</p>
                                                    </td>
                                                    <td>
                                                        <div style="display: flex;">
                                                             {{ $data->warna ? $data->warna->nama_warna : "-"}}
                                                            <div class="" style="background-color: {{ $data->warna ? $data->warna->heksa_warna : "-"}};height:25px;width:25px;margin-left:10px;">
                                                            
                                                            </div>
                                                        </div>
                                                    </td>
                                                    
                                                    <td>
                                                      {{ $item->status_transaksi }}
                                                    </td>
                                                    <td>
                                                      <p>Harga Varian  : Rp.{{$data->harga_varian ? number_format($data->harga_varian) : "-"}}</p>
                                                      <p>Harga Pokok : Rp.{{number_format($data->harga)}}</p>
                                                      <p>Total  : Rp.{{number_format($data->total)}}</p>
                                                    </td>
                                                  </tr>
                                              @endforeach
                                              
                                              
                                            </tbody>
                                            <thead>
                                              <tr style="text-align: center">
                                                <th scope="col" colspan="4">Transaksi di tanggal : {{date_format($item->created_at, "d F Y - H:i:s")  }}</th>
                                                
                                              </tr>
                                              <tr>
                                                <th scope="col">Hari/Jam</th>
                                                <th scope="col">Bentuk Pembayaran</th>
                                                <th scope="col">Status Transaksi</th>
                                                <th scope="col">Total Transaksi</th>
                                              </tr>
                                            </thead>
                                            
                                            <tbody>
                                              <tr>
                                                {{-- <th scope="row">1</th> --}}
                                                <td>
                                                  <p>{{ $item->tgl_booking }}</p>
                                                  <p>{{ $item->jam_booking }}</p>
                                                </td>
                                                <td>{{ $item->bentuk_pembayaran }}</td>
                                                
                                                <td>
                                                  {{ $item->status_transaksi }}
                                                </td>
                                                <td>
                                                  <p>Biaya Tambahan : {{ number_format($item->biaya_tambahan, 2)  }}</p>
                                                  <p>Total Diskon : {{ number_format($item->total_diskon)  }}</p>
                                                  <p style="font-weight: 500"> Total : {{ number_format($item->total_transaksi)  }}</p>
                                                </td>
                                              </tr>
                                              
                                            </tbody>
                                          </table>
                                          <!-- timeline item 1 -->
                                          @foreach ($item->riwayat_transaksi as $rt)
                                          <div class="row">
                                            <div class="col-auto text-center flex-column d-none d-sm-flex">
                                              <div class="row h-50">
                                                <div class="col">&nbsp;</div>
                                                <div class="col">&nbsp;</div>
                                              </div>
                                              <h5 class="m-2">
                                                <span class="badge badge-pill  border {{$rt->status ? 'bg-primary' : 'bg-light' }}">&nbsp;</span>
                                              </h5>
                                              <div class="row h-50">
                                                <div class="col border-right">&nbsp;</div>
                                                <div class="col">&nbsp;</div>
                                              </div>
                                            </div>
                                            <div class="col py-2">
                                              <div class="card">
                                                <div class="card-body">
                                                  <div class="float-right ">{{  date('l, d F Y',strtotime($rt->created_at)) }}</div>
                                                  <h4 class="card-title">{{ $rt->status }}</h4>
                                                  {{-- @if ($item->bentuk_pembayaran == 'dp')
                                                      @if ($rt->status == 'Menunggu Konfirmasi')
                                                        <p class="card-text">Mohon bersabar menunggu konfirmasi dari admin.</p>
                                                      @endif
                                                      @if ($rt->status == 'Menunggu Konfirmasi')
                                                        <p class="card-text">Mohon bersabar menunggu konfirmasi dari admin.</p>
                                                      @elseif ($rt->status == 'Menunggu Pembayaran Pertama')
                                                        <p class="card-text">Silahkan konfirmasi pembayaran anda sebelum transaksi akan diproses.</p>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{ $rt->id }}" data-whatever="@mdo">Konfirmasi Pembayaran Pertama</button>
                                                      @else
                                                        <p>Tidak ada</p>
                                                      @endif
                                                      @if ($rt->status == 'Diterima')
                                                        <p class="card-text">Transaksi anda telah diterima, silahkan melanjutkan ke proses transaksi selanjutnya.</p>
                                                      @endif

                                                      @if ($rt->status == 'Menunggu Pembayaran Pertama')
                                                        <p class="card-text">Silahkan konfirmasi pembayaran anda sebelum transaksi akan diproses.</p>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{ $rt->id }}" data-whatever="@mdo">Konfirmasi Pembayaran Pertama</button>
                                                      @endif
                                                      @if ($rt->status == 'Menunggu Pelunasan')
                                                        <p class="card-text">Silahkan konfirmasi pelunasannnn anda sebelum transaksi akan diproses.</p>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{ $rt->id }}" data-whatever="@mdo">Konfirmasi Pelunasan</button>
                                                      @endif
                                                  @else
                                                      @if ($rt->status == 'Menunggu Pelunasan')
                                                        <p class="card-text">Silahkan konfirmasi 111pelunasan anda sebelum transaksi akan diproses.</p>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{ $rt->id }}" data-whatever="@mdo">Konfirmasi Pelunasan</button>
                                                      @endif
                                                  @endif --}}
                                                  {{-- @if ($item->bentuk_pembayaran == 'dp' && $rt->status == 'Menunggu Konfirmasi')
                                                    <p class="card-text">Mohon bersabar menunggu konfirmasi dari admin.</p>
                                                  @elseif($item->bentuk_pembayaran == 'dp' || $rt->status == 'Menunggu Pembayaran Pertama')
                                                    <p class="card-text">Silahkan konfirmasi pembayaran anda sebelum transaksi akan diproses.</p>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{ $rt->id }}" data-whatever="@mdo">Konfirmasi Pembayaran Pertama</button>
                                                  @else
                                                    <p class="card-text">Transaksi anda telah diterima, silahkan melanjutkan ke proses transaksi selanjutnya.</p>
                                                        
                                                  @endif --}}
                                                  {{-- @if ($item->bentuk_pembayaran == 'dp'  )
                                                    @if ($rt->status == 'Menunggu Pembayaran Pertama')
                                                      <p class="card-text">Silahkan konfirmasi pembayaran anda sebelum transaksi akan diproses.</p>
                                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{ $rt->id }}" data-whatever="@mdo">Konfirmasi Pembayaran Pertama</button>
                                                    @endif
                                                  @endif --}}

                                                  @php
                                                    if($item->bentuk_pembayaran == 'dp'){
                                                      if($rt->status == 'Menunggu Konfirmasi'){
                                                        echo "<p class='card-text'>Mohon bersabar menunggu konfirmasi dari admin.</p>";
                                                      }
                                                      if($rt->status == 'Diproses') {
                                                        echo "<p class='card-text'>Transaksi anda telah diproses, silahkan melanjutkan ke proses transaksi selanjutnya.</p>";
                                                      }
                                                      if($rt->status == 'Diterima') {
                                                        echo "<p class='card-text'>Transaksi anda telah diterima, silahkan melanjutkan ke proses transaksi selanjutnya.</p>";
                                                      }
                                                      if($rt->status == 'Menunggu Pembayaran Pertama' && $item->status_transaksi != 'Menunggu Pelunasan' && $item->status_transaksi != 'Selesai'){
                                                        echo "
                                                          <p class='card-text'>Silahkan konfirmasi pembayaran anda sebelum transaksi akan diproses.</p>
                                                          <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal_$rt->id_transaksi' data-whatever='@mdo'>Konfirmasi Pembayaran Pertama</button>
                                                        ";
                                                      }
                                                      if($rt->status == 'Menunggu Pelunasan' && $item->status_transaksi != 'Selesai'){
                                                        echo "
                                                          <p class='card-text'>Silahkan konfirmasi 111pelunasan anda sebelum transaksi akan diproses.</p>
                                                          <button type='button' class='btn btn-primary' data-toggle='moda' data-target='#exampleModal_$rt->id_transaksi' data-whatever='@mdo'>Konfirmasi Pelunasan</button>
                                                        ";
                                                      }
                                                      if($rt->status == 'Ditolak') {
                                                        echo "<p class='card-text'>Mohon maaf transaksi anda telah ditolak.</p>";
                                                      }
                                                      if($rt->status == 'Selesai') {
                                                        echo "<p class='card-text'>Transaksi anda telah selesai, terimakasih sudah mempercayai kami.</p>";
                                                      }
                                                    }
                                                    if($item->bentuk_pembayaran == 'lunas'){
                                                      if($rt->status == 'Menunggu Konfirmasi'){
                                                        echo "<p class='card-text'>Mohon bersabar menunggu konfirmasi dari admin.</p>";
                                                      }
                                                      if($rt->status == 'Diproses') {
                                                        echo "<p class='card-text'>Transaksi anda telah diproses, silahkan melanjutkan ke proses transaksi selanjutnya.</p>";
                                                      }
                                                      if($rt->status == 'Diterima') {
                                                        echo "<p class='card-text'>Transaksi anda telah diterima, silahkan melanjutkan ke proses transaksi selanjutnya.</p>";
                                                      }
                                                      if($rt->status == 'Menunggu Pembayaran Pertama' && $item->status_transaksi != 'Menunggu Pelunasan' && $item->status_transaksi != 'Selesai'){
                                                        echo "
                                                          <p class='card-text'>Silahkan konfirmasi pembayaran anda sebelum transaksi akan diproses.</p>
                                                          <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal_$rt->id_transaksi' data-whatever='@mdo'>Konfirmasi Pembayaran Pertama</button>
                                                        ";
                                                      }
                                                      if($rt->status == 'Menunggu Pelunasan' && $item->status_transaksi != 'Selesai'){
                                                        echo "
                                                          <p class='card-text'>Silahkan konfirmasi 111pelunasan anda sebelum transaksi akan diproses.</p>
                                                          <button type='button' class='btn btn-primary' data-toggle='moda' data-target='#exampleModal_$rt->id_transaksi' data-whatever='@mdo'>Konfirmasi Pelunasan</button>
                                                        ";
                                                      }
                                                      if($rt->status == 'Ditolak') {
                                                        echo "<p class='card-text'>Mohon maaf transaksi anda telah ditolak.</p>";
                                                      }
                                                      if($rt->status == 'Selesai') {
                                                        echo "<p class='card-text'>Transaksi anda telah selesai, terimakasih sudah mempercayai kami.</p>";
                                                      }
                                                    }
                                                  @endphp
                                                    
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          {{-- Modal --}}
                                          
                                          
                                          @endforeach
                                          <div class="modal fade" id="exampleModal_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Form Konfirmasi Pembayaran</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <form method="POST" enctype="multipart/form-data"  action="{{ route('users-view.transaction-confirmationpayment', $item->id) }}">
                                                  @csrf
                                                  <div class="modal-body">
                                                      <div class="form-group">
                                                        <label for="kode_transaksi" class="col-form-label">Kode Transaksi:</label>
                                                        <input readonly type="text" class="form-control" name="kode_transaksi" id="kode_transaksi"  value="{{ $item->kode_transaksi }}">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="total_bayar" class="col-form-label">Total Bayar:</label>
                                                        <input readonly type="text" class="form-control"  id="total_bayar"  value="{{ number_format($item->total_dp1) }}">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="total_lunas" class="col-form-label">Total yang masih perlu dilunasi:</label>
                                                        <input readonly type="text" class="form-control"  id="total_lunas"  value="{{ number_format($item->total_pelunasan) }}">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="bukti_transfer" class="col-form-label">Bukti Transfer:</label>
                                                        <input type="file" class="form-control" id="bukti_transfer" name="bukti_transfer">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="transfer_bank" class="col-form-label">Transfer ke Bank:</label>
                                                        <select class="form-control" id="transfer_bank" name="transfer_di" >
                                                          <option value="0" selected disabled> Transfer ke Bank:</option>
                                                          @foreach ($bankTransfer as $item)
                                                              <option value="{{ $item->id }}"> Bank {{ $item->nama_bank }} - {{ $item->atas_nama }} - {{ $item->no_rek }}</option>
                                                          @endforeach
                                                          {{-- <option value="1"> Bank BNI - Flare - 01232194213</option>
                                                          <option value="2"> Bank BCA - Flare - 02244459213</option>
                                                          <option value="3"> Bank BRI - Flare - 124244459213</option> --}}
                                                        </select>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="bank_pengirim" class="col-form-label">Transfer dari Bank:</label>
                                                        <input type="text" class="form-control" name="bank_pengirim" id="bank_pengirim" >

                                                      </div>
                                                      <div class="form-group">
                                                        <label for="atasnama_pengirim" class="col-form-label">Rekening atas nama :</label>
                                                        <input type="text" name="atasnama_pengirim" class="form-control" id="atasnama_pengirim" >

                                                      </div>
                                                      <div class="form-group">
                                                        <label for="tgl_transfer" class="col-form-label">Tanggal Transfer :</label>
                                                        <input type="date" name="tgl_transfer" class="form-control" id="tgl_transfer" min="{{ date("Y-m-d") }}">

                                                      </div>
                                                      <div class="form-group">
                                                        <label for="catatan" class="col-form-label">Catatan:</label>
                                                        <textarea name="catatan" class="form-control" id="catatan"></textarea>
                                                      </div>
                                                      <input type="hidden" name="total_bayar" value="{{ $item->total_dp1 }}">
                                                      <input type="hidden" name="total_lunas" value="{{ $item->total_pelunasan }}">
                                                      <input type="hidden" name="id_user" value="{{ $item->id_user }}">
                                                      <input type="hidden" name="id_transaksi" value="{{ $item->id }}">
                                                      @if ($rt->status == 'Menunggu Pembayaran Pertama')
                                                        <input type="hidden" name="status" value="dp1">
                                                      @else
                                                        <input type="hidden" name="status" value="lunas">
                                                      @endif
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Send message</button>
                                                  </div>
                                                  
                                                </form>
                                                  
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                  </li>
                                  
                                @endforeach
                            @else
                                
                            @endif
                            
                            
                          </ul>
                        </div>
                        
                      </div>
                    </div>
                    
                    
                </div>
            </div>
          </div>
          {{-- <div class="col-md-12">
            <ul class="pages">
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
          </div> --}}
        </div>
      </div>
    </div>

    


    
@endsection


@push('script')
    <script>
        const killMessageError = setTimeout(processKillMessageError, 2000);
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').trigger('focus')
        })

        function processKillMessageError(){
          // let messageError = document.getElementById("error-message");
          // messageError.remove();
          $("#error-message").fadeOut(3000, "swing");
        }
        
    </script>
@endpush