@extends('users-view.layout')

@section('content')
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new arrivals</h4>
              <h2>sixteen products</h2>
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
                  <li class="active" data-filter="*">All Products</li>
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
                                  <img src="{{asset ('storage/'.$item->gambar_produk) }}" style="max-height: 200px;object-fit:contain" alt=""></a>
                                <div class="down-content">
                                  <a href="{{ route('users-view.detailproduct', $item->id) }}"><h4>{{ $item->nama_produk }}</h4></a>
                                  
                                  <h7>Rp.{{ number_format($item->harga) }}   </h7>
                                  <p style="overflow: hidden;
                                  display: -webkit-box;
                                  -webkit-line-clamp: 3;
                                  -webkit-box-orient: vertical;
                                  ">{{ $item->deskripsi }}</p>
                                  <ul class="stars">
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>`
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                  </ul>
                                  <span>Reviews (12)</span>
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
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
          
          - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
          </div>
          </div>
      </div>
      </div>
  </footer>
@endpush