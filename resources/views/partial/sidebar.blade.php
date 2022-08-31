<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    {{-- <img src="{{asset ('template/images/user.png') }}" width="48" height="48" alt="User" /> --}}
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session()->get('nama') }}</div>
                    <div class="email">Admin Flare Photgraph</div>
                    {{-- <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="{{ request()->segment(1) == 'dashboard-admin' ? 'active' : '' }}">
                        <a href="{{ route('dashboard-admin.index') }}">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{route('produk.index')}}">
                            <i class="material-icons">text_fields</i>
                            <span>Daftar Produk</span>
                        </a>
                    </li> --}}
                    <li class="{{ (request()->segment(1) == 'produk' || request()->segment(1) == 'kategori_produk' || request()->segment(1) == 'satuan_produk' || request()->segment(1) == 'satuan' || request()->segment(1) == 'warna')   ? 'active' : ''}}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Produk</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                               <a href="{{route('produk.index')}}">Daftar Produk</a>
                            </li>

                            <li>
                                <a href="{{route('kategori_produk.index')}}">Kategori Produk</a>
                             </li>

                             {{-- <li>
                                <a href="{{route('satuan_produk.index')}}">Satuan Produk</a>
                             </li>

                             <li>
                                <a href="{{route('satuan.index')}}">Satuan</a>
                             </li> --}}

                             <li>
                                <a href="{{route('warna.index')}}">Warna Produk</a>
                             </li>
                            
                        </ul>
                    </li>

                    <li class="{{ (request()->segment(1) == 'transaksi'   || request()->segment(1) == 'detail_transaksi'   || request()->segment(1) == 'notifikasi'  ) ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Transaksi</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                               <a href="{{route('transaksi.index')}}">Daftar Transaksi</a>
                            </li>
                            <li>
                               <a href="{{route('transaksi.report')}}">Laporan Transaksi</a>
                            </li>

                            {{-- <li>
                                <a href="{{route('detail_transaksi.index')}}">Detail Transaksi</a>
                             </li> --}}
                            <li>
                                <a href="{{route('bank_transfer.index')}}">Bank Transfer</a>
                             </li>
                             <li>
                                <a href="{{route('notifikasi.index')}}">Notifikasi</a>
                             </li>
                             <li>
                               <a href="{{route('lokasi_tersedia.index')}}">Lokasi yang tersedia</a>
                            </li>
                            
                            
                        </ul>
                    </li>
                    
                    <li class="{{( request()->segment(1) == 'users')   ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="material-icons">account_box</i>
                            <span>Pengguna</span>
                        </a>
                    </li>
                     <li class="{{ (request()->segment(1) == 'profile_usaha')   ? 'active' : '' }}">
                        <a href="{{ route('profile_usaha.index') }}">
                            <i class="material-icons">account_balance</i>
                            <span>Profile Usaha</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('logout') }}">
                             <i class="material-icons">input</i>
                            <span>Keluar</span>
                        </a>
                    </li>
                  
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
           
            <!-- #Footer -->
        </aside>