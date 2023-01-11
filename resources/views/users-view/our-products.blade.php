@extends('users-view.layout')

@section('content')
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
            {{--<h4>new arrivals</h4>--}}
<<<<<<< HEAD
              <h2>Produk Flare </h2>
=======
              <h2>PRODUK FLARE</h2>
>>>>>>> c572a6db6fefbafb98dd257c4afff4b71fc95ef3
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="active" data-filter="*">Semua Produk</li>
                  @foreach ($kp as $item)
                    <li data-filter=".{{$item->nama_kategori}}">{{ $item->nama_kategori }}</li>
                      
                  @endforeach
                  {{-- <li data-filter=".des">Featured</li>
                  <li data-filter=".dev">Flash Deals</li>
                  <li data-filter=".gra">Last Minute</li>
                  <li data-filter=".new">New Product</li> --}}
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid">
                    @foreach ($produk as $item)
                        <div class="col-lg-4 col-md-4 all {{ $item->kategori_produk }}">
                            <div class="product-item">
                                <a href="{{ route('users-view.detailproduct', $item->id) }}">
                                  <img src="{{asset ('storage/'.$item->gambar_produk) }}" style="height: 200px;object-fit:contain" alt=""></a>
                                <div class="down-content">
                                  <a href="{{ route('users-view.detailproduct', $item->id) }}"><h4>{{ $item->nama_produk }}</h4></a>
                                  
                                  <h7>Rp.{{ number_format($item->harga) }}   </h7>
                                  <p style="overflow: hidden;
                                  display: -webkit-box;
                                  -webkit-line-clamp: 3;
                                  -webkit-box-orient: vertical;
                                  ">{{ $item->deskripsi }}</p>
                                  {{-- <ul class="stars">
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>`
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                  </ul>
                                  <span>Reviews (12)</span> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach 
                    
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
@push('footer')
    <footer >
      <div class="container">
      <div class="row">
          <div class="col-md-12">
          <div class="inner-content">
              <p>Copyright &copy; 2022 Flare Photography
          </p>
          </div>
          </div>
      </div>
      </div>
  </footer>
@endpush