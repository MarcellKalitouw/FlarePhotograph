    <header class="" style="position: absolute">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
            <a class="navbar-brand" href="index.html"><h2 style="font-size: 18px">Flare <em>Photography</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->segment(1) == 'landingPage' && request()->segment(2) == null ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('landingPage.index') }}">Beranda
                    <span class="sr-only">(current)</span>
                    </a>
                </li> 
                <li class="nav-item {{ request()->segment(1) == 'ourProduct' ? 'active' : ''  }}">
                    <a class="nav-link" href="{{route ('users-view.ourproduct') }}">Produk </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="about.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li> --}}
                @if (session()->has('email') && session()->get('tipe') == 'Pengguna')
                    
                    
                    
                    <li class="nav-item">
                        <a href="{{ route('users-view.history-transaction') }}" class="nav-link {{ request()->segment(1) == 'historyTransaction' ? 'active' : ''  }}" style="display: flex;align-items:center;justify-content:space-between">
                            <i class="material-icons">account_circle</i>
                         Profil</a>
                    </li>
                    {{--<li class="nav-item">
                        <a href="{{ route('users-view.history-transaction') }}" class="nav-link {{ request()->segment(1) == 'historyTransaction' ? 'active' : ''  }}" style="display: flex;align-items:center;justify-content:space-between">
                            <i class="material-icons"></i>Omega</a>
                    </li>--}}
                    <li class="nav-item {{ request()->segment(1) == 'users-cart' ? 'active' : ''  }}">
                        <a href="{{ route('users-view.cart') }}" class="nav-link" >
                            <i style="font-size: 18px;" class="material-icons">shopping_cart</i>
                            <?php 
                                // use App\Models\DetailTransaksi;
                                
                                $countCart = DB::table('detail_transaksis')->where('id_user', session()->get('id_user'))->where('status','Dalam Keranjang')->get()->count();
                                // dd($countCart);
                            ?>
                            {{ $countCart }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Keluar </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.index') }}">Masuk</a>
                    </li>

                @endif
                
                
                </ul>
            </div>
            </div>
        </nav>
    </header>