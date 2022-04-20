@extends('users-view.layout')

@push('style')
  <style>
      li .list-item{
        padding:0px 0px;
      }

      .select {
        display:flex;
        flex-direction: column;
        position:relative;
        width:250px;
        height:40px;
      }

      .option {
        padding:0 30px 0 10px;
        min-height:40px;
        display:flex;
        align-items:center;
        color:white;
        /* background:#333; */
        border-top:#222 solid 1px;
        position:absolute;
        top:0;
        width: 100%;
        pointer-events:none;
        order:2;
        z-index:1;
        transition:background .4s ease-in-out;
        box-sizing:border-box;
        overflow:hidden;
        white-space:nowrap;
        
      }

      .option:hover {
        background:#666;
      }

      .select:focus .option {
        position:relative;
        pointer-events:all;
      }

      .selectopt {
        opacity:0;
        position:absolute;
        left:-99999px;
      }

      .selectopt:checked + label {
        order: 1;
        z-index:2;
        background:#666;
        border-top:none;
        position:relative;
      }

      .selectopt:checked + label:after {
        content:'';
        width: 0; 
        height: 0; 
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid white;
        position:absolute;
        right:10px;
        top:calc(50% - 2.5px);
        pointer-events:none;
        z-index:3;
      }

      .selectopt:checked + label:before {
        position:absolute;
        right:0;
        height: 40px;
        width: 40px;
        content: '';
        background:#666;
      }
      

  </style>
    
@endpush

@section('content')
    <!-- Page Content -->
    <div class="page-heading header-text" style="padding: 0px;
    text-align: center;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;">
      {{-- <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>contact us</h4>
              <h2>let’s get in touch</h2>
            </div>
          </div>
        </div>
      </div> --}}
    </div>


    {{-- <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Location on Maps</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div id="map">
              <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="330px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="left-content">
              <h4>About our office</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti.</p>
              <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    
    <div class="send-message" style="margin-top:0px;padding-top:100px">
      <div class="container">
        <form id="contact" action="{{ route('users-view.transaction-checkout') }}" method="post">
          @csrf
        <div class="row">
          
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Data Pengiriman</h2>
            </div>
            <div id="message-body">
            </div>
            @if ($errors->any()) 
            <div class="alert alert-danger"  id="error-message">
                <strong>Whoops!</strong> Ada masalah dengan transaksi anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif 

          </div>
          <div class="col-md-7">
            <div class="contact-form">
              
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
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <label for="">Tanggal Booking</label>
                    <fieldset>
                      <input name="tgl_booking" type="date" class="form-control"  value=""  id="subject" placeholder="Nomor Telepon" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <label for="">Jam Booking</label>
                    <fieldset>
                      <input name="jam_booking" type="time" class="form-control"  value=""  id="subject" placeholder="Nomor Telepon" required="">
                    </fieldset>
                  </div>
                  
                  
                  <div class="col-lg-12">
                    <label for="">Lokasi Yang Tersedia</label>
                    <fieldset>
                      <select onchange="getExtraCost()" name="biaya_tambahan" class="form-control show-tick" id="extraCost">
                          <option value="0">-- Pilih Lokasi Yang Tersedia --</option>
                          @foreach ($lokasi_tersedia as $item)
                          <option value="{{$item->harga}}">{{$item->nama_lokasi}}</option> 
                          @endforeach
                      </select>
                    </fieldset>
                  </div>
                  
                  <div class="col-lg-12">
                    <label for="">Alamat Lengkap</label>
                    <fieldset>
                      <textarea name="alamat" rows="6" class="form-control" id="message" placeholder="Alamat Lengkap" required=""></textarea>
                    </fieldset>
                  </div>
                  
                  <div class="col-lg-12">
                    <label for="">Bentuk Pembayaran</label>
                    <fieldset>
                      <select required onchange="getExtraCost()" name="bentuk_pembayaran" class="form-control show-tick" id="extraCost">
                          <option value="0">-- Pilih Bentuk Pembayaran --</option>
                          <option value="dp"> Cicil </option>
                          <option value="lunas"> Lunas </option>
                          
                           
                      </select>
                    </fieldset>
                  </div>
                  {{-- <div class="col-lg-12">
                    <label for="">Bentuk Pembayaran</label>
                    <fieldset>
                      
                    </fieldset>
                  </div> --}}
                    

                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <label for="">Catatan</label>
                    <fieldset>
                      <input name="catatan" type="text" class="form-control"  id="subject" placeholder="Catatan..." required="">
                    </fieldset>
                  </div>


                </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <h4>Keranjang Belanja</h4>
            <ul class="">
              @foreach ($getDetailTransactionWithProduk as $item)
                   <li style="border-bottom: 1px solid gray">
                      <a class="active">{{ $item->nama_produk }}</a>
                      
                      <div class="content" style="display: block">
                        <div id="detail-produk" style="display:flex; justify-content:space-between;">
                          <div class="gambar_produk" style="margin-right: 30px;margin-bottom:10px">
                              <img src="{{asset('storage/'. $item->gambar_produk[0]->file)  }}" width="auto" height="100px" alt="" srcset="" >
                              <div class="btn-option" style="display: flex;margin-top:5px;">

                                <a type="button" onclick="handleDeleteProduk({{ $item->id }})"  onclick=""  class="btn btn-danger" style="margin-right: 10px;color:white;">Hapus Produk<i class="material-icons">delete</i></a>
                                {{-- <a type="button" onclick="editDetailProduk({{ $item->id }} )"  class="btn btn-warning" style="color:white;"><i class="material-icons">edit</i></a> --}}
                              </div>
                          </div>
                          <div class="body-product" >
                            <ul >
                              {{-- <li class="list-item" style="display: flex;border-top:0px;"><p style="font-size: 16px;font-weight:400"> Warna  : {{ $item->warna->nama_warna }}</p>  <div class="warna_preview" style="background-color: {{ $item->warna->heksa_warna }};height:25px;width:25px;margin-left:10px"></div></li> --}}
                              <li class="list-item" style="display: flex;border-top:0px;">
                                {{-- <select  class="form-control show-tick" id="select-color">
                                    <option value="0">-- Pilih Bentuk Pembayaran --</option>
                                    {{!! $selected='selected' !!}}
                                    @foreach ($cekWarna as $c)
                                        @if ($c->id == $item->id_warna)
                                            <option {{ $selected }} value="0" onmouseover="changeOptionColor()" style="color:white;background-color: {{ $c->heksa_warna }} ;">
                                              {{ $c->nama_warna }}
                                              <span class="warna_preview" style="background-color: {{ $item->warna->heksa_warna }};height:25px;width:25px;margin-left:10px"></span>
                                            </option>
                                        @else
                                            <option value="0" style="color:white;background-color: {{ $c->heksa_warna }} !important;">
                                              {{ $c->nama_warna }}
                                              <span class="warna_preview" style="background-color: {{ $item->warna->heksa_warna }};height:25px;width:25px;margin-left:10px"></span>
                                            </option>
                                        @endif
                                        
                                    @endforeach

                                    
                                    
                                </select> --}}
                                @if ($item->available_color != null && count($item->available_color) != 0)
                                    <div class="warna-tersedia" style="display: flex;">
                                      @foreach ($item->available_color as $c)
                                        <div onclick="handleCheckListItem('{{$c->heksa_warna }}','{{ $c->id }}', '{{ $item->id }}')" class="warna" style="background-color: {{ $c->heksa_warna }};height:50px;width:50px;margin-right:20px;cursor:pointer;">
                                        
                                        </div>
                                        @if ($c->id == $item->id_warna)
                                            <div class="check-list">
                                              <i id="checkList-{{trim($c->heksa_warna,"#")}}-{{ $item->id }}" class="material-icons" style="color: rgb(59, 245, 59);font-size:40px;">done</i>
                                            </div>
                                            <input type="hidden" name="heksa_warna" id="heksa_warna_{{$item->id }}" value="{{ $c->heksa_warna }}">
                                            <input type="hidden" name="id_warna" id="id_warna_{{$item->id }}" value="{{ $c->id }}">
                                        @else
                                            <div class="check-list">
                                              <i id="checkList-{{trim($c->heksa_warna,"#")}}-{{ $item->id }}" class="material-icons" style="color: rgb(59, 245, 59);font-size:40px;"></i>
                                            </div>
                                        @endif
                                        
                                        
                                      @endforeach
                                    </div>
                                @else
                                    -
                                @endif
                                {{-- <div class="select" tabindex="{{$item->id_warna  }}">
                                  @foreach ($cekWarna as $c)
                                      @if ($c->id == $item->id_warna)
                                        <input  class="selectopt {{ $c->id }} " name="test" type="radio" id="opt{{ $c->id }}" checked>
                                        <label style="margin-bottom: 0px;background-color:{{ $c->heksa_warna }}" for="opt{{ $c->id }}" class="option">{{ $c->nama_warna }}</label>
                                      @else
                                        <input  class="selectopt {{ $c->id }}" name="test" type="radio" id="opt{{ $c->id }}">
                                        <label  style="margin-bottom: 0px;background-color:{{ $c->heksa_warna }}" for="opt{{ $c->id }}" class="option">{{ $c->nama_warna }}</label>
                                      @endif
                                  @endforeach
                                  
                                  
                                </div> --}}
                                
                              </li>
                              <li class="list-item">Status : {{ $item->status }}</li>
                              <li class="list-item">harga : Rp. {{number_format($item->harga, 0)  }}</li>
                              <li class="list-item">Qty  : {{ $item->qty }}</li>
                              <li class="list-item">Diskon  : Rp. {{number_format($item->diskon, 0) }}</li>
                              <li class="list-item">Total  : Rp. {{ number_format($item->total, 0) }}</li>
                            </ul>
                          </div>
                        </div>
                        {{-- <p>{{ $item->deskripsi }}</p> --}}
                      </div>
                      
                  </li>
              @endforeach
              
              
              
              <li style="margin-top:20px;border-bottom:2px solid gray">
                <ul class="summary-pricing">
                  <li style="display: flex; justify-content:space-between">
                    <b>Total harga produk : </b>
                    <p style="font-size: 1rem">Rp. {{ number_format($summaryPrice->totalHarga, 0) }}</p>
                  </li>
                  <li style="display: flex; justify-content:space-between">
                    <b>Potongan Harga : </b>
                    <p style="font-size: 1rem" >Rp. {{ number_format($summaryPrice->discount, 0) }}</p>
                  </li>
                  <li style="display: flex; justify-content:space-between">
                    <b>Tambahan biaya : </b>
                    <p style="font-size: 1rem" id="tambahanBiaya">Rp. {{ number_format($summaryPrice->extraPay,0) }}</p>
                  </li>
                </ul>
              </li>
              <li style="display: flex; justify-content:space-between;margin-top:20px;">
                <h3><b>Grand Total :</b></h3>
                <p style="font-size:24px;">Rp. <b id="textGrand">{{ number_format($summaryPrice->grandTotal, 0)  }}</b></p>
              </li>
             
              {{-- <li>
                  <a class="active">Second Title Here</a>
                  <div class="content" style="display: block">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti elite.</p>
                  </div>
              </li> --}}
              
            </ul>
          </div>
          <div class="col-lg-12 contact-form">
            <input class="valDiskon" type="hidden" name="total_diskon" value="{{ $summaryPrice->discount }}">
            <input class="valExtraCost" type="hidden" name="biaya_tambahan" value="{{ $summaryPrice->extraPay }}">
            <input class="valGrandTotal" type="hidden" name="total_transaksi" value="{{ $summaryPrice->grandTotal }}">
            <fieldset>
              
              <button type="submit" id="form-submit" class="filled-button">Make Transaction</button>
            </fieldset>
          </div>
        </div>
        </form>
      </div>
    </div>
    <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> --}}

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}
@endsection

@push('footer')
    <footer >
      <div class="container">
      <div class="row">
          <div class="col-md-12">
          <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
          
          - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
          </div>
          </div>
      </div>
      </div>
  </footer>
@endpush

@push('script')
  <script>
    // $('#myModal').on('shown.bs.modal', function () {
    //   $('#myInput').trigger('focus')
      
    // })
    

    $('#exampleModalCenter').modal({
      show:false
    })


    const killMessageError = setTimeout(processKillMessageError, 2000);

    function processKillMessageError(){
      // let messageError = document.getElementById("error-message");
      // messageError.remove();
      $("#updated-message").fadeOut(3000, "swing");
    }

    function editDetailProduk(id){
      let baseUrl = '{{ url('/') }}';
      let url = baseUrl + `/editDetailTransaction/${id}`;
      let modalBody = $('.modal-body');
      console.log('testing', url);
      $.get(url, function(data){
        alert(data);
        let allData = '';
        console.log('data',data);
        data.map((i) => {
          document.createElement("div");


           console.log('warna', i.heksa_warna)
           let a =
             `<div  class="warna" style="background-color: ${i.heksa_warna};height:75px;width:75px;margin-left:20px;cursor:pointer;">
              
              </div>`;
            allData += a;
        });
        modalBody.html(allData);

        $('#exampleModalCenter').modal('show');
      })
    }

    function getExtraCost(){
        let extraCost = parseInt($("#extraCost option:selected").val()) ;
        let setGrandTotal = $("#textGrand");
        let setTambahanBiaya = $("#tambahanBiaya");
        let grandTotal = {{ $summaryPrice->grandTotal }};
        let newGrandTotal = extraCost + grandTotal;
        let valueExtraCost = $(".valExtraCost");
        let valueDiskon = $(".valDiskon");
        let valueGrandTotal = $(".valGrandTotal");


        valueExtraCost.val(extraCost);
        valueDiskon.val({{ $summaryPrice->discount }});
        valueGrandTotal.val(newGrandTotal);
        setGrandTotal.text(newGrandTotal.toLocaleString("id-ID"));
        setTambahanBiaya.text(`Rp. ${extraCost.toLocaleString("id-ID")}`);


        console.log('extraCost', extraCost,'grandTotal', grandTotal, 'newGrandTotal', newGrandTotal);
    }
    function editWarnaController(idWarna, idDetail){
        let baseUrl = '{{ url('/') }}';
        let url = baseUrl + `/editDetailTransaction/${idDetail}/${idWarna}`;
        let messageBody = $('#message-body');
        console.log('msg', messageBody);
        $.get(url, function(data){
          // alert(data);
          console.log('data',data);
          messageBody.html(data);
        });
    }
    function handleCheckListItem(itemWarna, idWarna, idDetail){
            
            let warna = itemWarna;
            let warnaId = idWarna;
            let stringValueWarna = `#heksa_warna_${idDetail}`;
            let stringValueIdWarna = `#id_warna_${idDetail}`;
            let getValueWarna =  $(stringValueWarna);
            let getIdWarna = $(stringValueIdWarna)
            let valueWarna = getValueWarna.val();
            console.log('getWarna', getValueWarna.val(), 'warna', warna,'valueWarna',valueWarna);
            if(getValueWarna.val() == ''){
                getValueWarna.val(`${warna}`);
                getIdWarna.val(`${warnaId}`);
                const replaceWarna = warna.replace('#','');
                console.log('getWarnaReplace IF', getValueWarna.val());
                let setCheckList = $(`#checkList-${replaceWarna}-${idDetail}`).append("done");

            }else {
              if (valueWarna !== warna) {
                  getValueWarna.val(`${warna}`);
                  getIdWarna.val(`${warnaId}`);
                  const replaceWarna = warna.replace('#','');
                  const removeWarna = valueWarna.replace('#','');
                  let setCheckList = $(`#checkList-${replaceWarna}-${idDetail}`).append("done");
                  const removeCheckList = $(`#checkList-${removeWarna}-${idDetail}`).empty();
                  console.log('valueWarna', valueWarna, 'warna', warna, 'rmvChlist', removeCheckList);
                  editWarnaController(idWarna, idDetail);

                } 
              //  else{
              //     const replaceWarna = warna.replace('#','');
              //     const removeCheckList = $(`#checkList-${replaceWarna}`).empty();
              //   } 
              }

        }

        function handleDeleteProduk(id){
            let baseUrl = '{{ url('/') }}';
            let url = baseUrl + `/deleteDetailTransaction/${id}`;
            let messageBody = $('#message-body');

            $.get(url, function(data){
              // alert(data);
              
              location.reload()
              

            })
            // .then((data) => {
            //   messageBody.html(data);
            // });
            
        }
    
  </script>
    
@endpush