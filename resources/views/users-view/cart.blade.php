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
              <h4>Tentang Flare Photography</h4>
              <h2>our company</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="best-features" style="margin-top:0px;">
      <div class="container"> 
          <div class="col-md-12">
            <h4>Keranjang Belanja</h4>
            <ul class="">
              @if (count($getOrderProduct) > 0)
                  @foreach ($getOrderProduct as $item)
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
                                    Warna :
                                    @if ($item->available_color != null &&  count($item->available_color) != 0)
                                        <div class="warna-tersedia" style="display: flex;margin-left:5px">
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
                                  <li class="list-item">Varian Produk : {{ $item->varian_produk ? $item->varian_produk->nama_varian : '-'}}</li>
                                  <li class="list-item">Harga Varian : Rp. {{ $item->varian_produk ? number_format($item->varian_produk->harga, 0) : "-"}}</li>
                                  <li class="list-item">Status : {{ $item->status }}</li>
                                  <li class="list-item">harga : Rp. {{number_format($item->harga, 0)  }}</li>
                                  <li class="list-item">Qty  : {{ $item->qty }}</li>
                                  <li class="list-item">Diskon  : Rp. {{number_format($item->diskon, 0) }}</li>
                                  <li class="list-item">Total  : Rp. {{ number_format($item->total , 0) }}</li>
                                </ul>
                              </div>
                            </div>
                            {{-- <p>{{ $item->deskripsi }}</p> --}}
                          </div>
                          
                      </li>
                  @endforeach
              @else
                  <li style="display:flex;justify-content: center;">
                    <h4 style="color:black;text-transform:uppercase">Tidak ada produk</h4>
                  </li>
              @endif
              
              
              
              
              {{-- <li style="margin-top:20px;border-bottom:2px solid gray">
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
                    <p style="font-size: 1rem" id="tambahanBiaya">Rp. 0</p>
                  </li>
                </ul>
              </li>
              <li style="display: flex; justify-content:space-between;margin-top:20px;">
                <h3><b>Grand Total :</b></h3>
                <p style="font-size:24px;">Rp. <b id="textGrand">{{ number_format($summaryPrice->grandTotal, 0)  }}</b></p>
              </li> --}}
             
              
            </ul>
            @if (count($getOrderProduct) > 0)
              <div class="col-lg-12 contact-form" style="display: flex;align-items:center;justify-content:end">
              
                  <a href="{{ route('users-view.transaction') }}" id="form-submit" class="filled-button">Lanjut Bayar</a>
                
              </div>
              
            @endif
            
          </div>
    </div>

    


    
@endsection
@push('footer')
    <footer >
      <div class="container">
      <div class="row">
          <div class="col-md-12">
          <div class="inner-content">
              <p>Copyright &copy; 2020 Flare Photography</p>
          </div>
          </div>
      </div>
      </div>
  </footer>
@endpush

@push('script')
    <script>
        const killMessageError = setTimeout(processKillMessageError, 2000);

        function processKillMessageError(){
          // let messageError = document.getElementById("error-message");
          // messageError.remove();
          $("#error-message").fadeOut(3000, "swing");
        }
        function handleCheckListItem(itemWarna, idWarna){
            let warna = itemWarna;
            let warnaId = idWarna;
            let getValueWarna =  $("#heksa_warna");
            let getIdWarna = $("#id_warna")
            let valueWarna = getValueWarna.val();
            console.log('getWarna', getValueWarna.val(), 'id', warnaId);
            if(getValueWarna.val() == ''){
                getValueWarna.val(`${warna}`);
                getIdWarna.val(`${warnaId}`);
                const replaceWarna = warna.replace('#','');
                console.log('getWarnaReplace IF', getValueWarna.val());
                let setCheckList = $(`#checkList-${replaceWarna}`).append("done");

            }else {
              if (valueWarna !== warna) {
                  getValueWarna.val(`${warna}`);
                  getIdWarna.val(`${warnaId}`);
                  const replaceWarna = warna.replace('#','');
                  const removeWarna = valueWarna.replace('#','');
                  let setCheckList = $(`#checkList-${replaceWarna}`).append("done");
                  const removeCheckList = $(`#checkList-${removeWarna}`).empty();
                  console.log('valueWarna', valueWarna, 'warna', warna, 'rmvChlist', removeCheckList);
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