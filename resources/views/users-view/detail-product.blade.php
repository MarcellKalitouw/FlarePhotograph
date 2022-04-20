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


    <div class="best-features" style="margin-top:0px;">
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
            <div class="section-heading">
              <h2>{{ $produk->nama_produk }}</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        {{-- {{ dd($produk->gambar_produk) }} --}}
                        @for ($i = 0; $i < count($produk->gambar_produk); $i++)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="active"></li>
                        @endfor
                        
                    </ol>
                    <div class="carousel-inner">

                        @for ($i = 0; $i < count($produk->gambar_produk); $i++)
                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }} ">
                                <img class="d-block w-100" src="{{asset ('storage/'.$produk->gambar_produk[$i]) }}" alt="First slide">
                                
                            </div>
                        @endfor

                        
                            
                            {{-- <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset ('template_users/assets/images/team_03.jpg') }}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset ('template_users/assets/images/team_02.jpg') }}" alt="Third slide">
                            </div>                         --}}
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
              {{-- <img src="{{asset ('storage/'.$produk->gambar_produk[0]) }}" alt=""> --}}
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>{{ $produk->nama_produk }}</h4>
              
              <p><b>Kegiatan : </b> {{ $produk->kegiatan }}</p>
              <p><b>Studio : </b> {{ $produk->studio }}</p>
              <p><b>Status : </b> {{ $produk->status }}</p>
              <p><b>Deskripsi : </b> {{ $produk->deskripsi }}</p>
              <p ><b>Warna : </b> 
                @if (count($getWarna) != 0)
                    <div class="warna-tersedia" style="display: flex;">
                      @foreach ($getWarna as $item)
                        <div onclick="handleCheckListItem('{{$item->heksa_warna }}','{{ $item->id }}')" class="warna" style="background-color: {{ $item->heksa_warna }};height:75px;width:75px;margin-left:20px;cursor:pointer;">
                        
                        </div>
                        
                        <div class="check-list">
                          <i id="checkList-{{trim($item->heksa_warna,"#")}}" class="material-icons" style="color: rgb(59, 245, 59);font-size:40px;"></i>
                        </div>
                      @endforeach
                    </div>
                @else
                    -
                @endif

                
                </p>
              <form action="{{ route('users-view.insert-cart', $produk->id) }}" method="post">
                @csrf
                <input type="hidden" name="heksa_warna" id="heksa_warna" value="">
                <input type="hidden" name="id_warna" id="id_warna" value="">
                <button type="submit" class="order-now" style="cursor: pointer">Order Now</button>
                {{-- <button type="button" onclick="makeOrderProduct({{ $produk->id }})" class="order-now" style="cursor: pointer">Order Now</button> --}}
              </form>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>

    
    

    {{-- <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Produk yang menyerupai</h2>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="{{asset ('template_users/assets/images/team_01.jpg') }}" alt="">
                
              </div>
              <div class="down-content">
                <h4>Johnny William</h4>
                <span>CO-Founder</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_02.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Karry Pitcher</h4>
                <span>Product Expert</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_03.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Michael Soft</h4>
                <span>Chief Marketing</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_04.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Mary Cool</h4>
                <span>Product Specialist</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_05.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>George Walker</h4>
                <span>Product Photographer</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_06.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Kate Town</h4>
                <span>General Manager</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
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
        const killMessageError = setTimeout(processKillMessageError, 2000);

        function processKillMessageError(){
          // let messageError = document.getElementById("error-message");
          // messageError.remove();
          $("#error-message").fadeOut(3000, "swing");
        }
        function makeOrderProduct(id){
          let baseUrl = '{{ url('/') }}';
          let url = baseUrl + `/insertUserCart/${id}`;
          let getValueWarna =  $("#heksa_warna").val();
          let getIdWarna = $("#id_warna").val();
          $.post(url, {
            'id_warna' : `${getIdWarna}`
          }, function(data){
            
            location.reload();
          });

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
    </script>
@endpush