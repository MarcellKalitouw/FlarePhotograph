<!DOCTYPE html>

<html lang="en">

  <head>

        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset ('template_users/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset ('template_users/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{asset ('template_users/assets/css/templatemo-sixteen.css') }}">
    <link rel="stylesheet" href="{{asset ('template_users/assets/css/owl.css') }}">

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

        table, th, td {
            border: 4px solid black;
            border-collapse: collapse;
        }
    </style>
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <div class="products" style="margin-top: 25px">
        <div class="container">
            <div class="row">
            
            <div class="col-md-12" >
                <div class="filters-content">
                    <div class="row grid" >
                       
                        <div class="col-lg-12 col-md-4 all history-transaksi" hidden style="position: static" >
                        <div class="product-item" >
                            <a href="#"><img src="assets/images/product_02.jpg" alt=""></a>
                            <div class="" style="padding:0 30px">
                            <h4>Your History Transaction</h4>
                            <ul class="accordion" >
                               
                                        <li style="border-top:0px">
                                         Kode Transaksi : {{ $getTransaksi->kode_transaksi }}
                                        <div class="content">
                                            <table class="table table-hover">
                                            <thead>
                                                <tr style="text-align: center">
                                                    <th scope="col" colspan="4">Produk Yang di Pesan</th>
                                                    
                                                </tr>
                                                <tr>
                                                    <th scope="col">Produk</th>
                                                    <th scope="col">varian</th>
                                                    <th scope="col">Harga</th>
                                                    {{-- <th scope="col">Total Transaksi</th> --}}
                                                </tr>
                                                </thead>
                                                
                                                <tbody>
                                                @foreach ($getTransaksi->detail_transaksi as $data)
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
                                                        {{ $getTransaksi->status_transaksi }}
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
                                                    <th scope="col" colspan="4">Transaksi di tanggal : {{date_format($getTransaksi->created_at, "d F Y - H:i:s")  }}</th>
                                                    
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
                                                    <p>{{ $getTransaksi->tgl_booking }}</p>
                                                    <p>{{ $getTransaksi->jam_booking }}</p>
                                                    </td>
                                                    <td>{{ $getTransaksi->bentuk_pembayaran }}</td>
                                                    
                                                    <td>
                                                    {{ $getTransaksi->status_transaksi }}
                                                    </td>
                                                    <td>
                                                    <p>Biaya Tambahan : {{ number_format($getTransaksi->biaya_tambahan, 2)  }}</p>
                                                    <p>Total Diskon : {{ number_format($getTransaksi->total_diskon)  }}</p>
                                                    <p style="font-weight: 500"> Total : {{ number_format($getTransaksi->total_transaksi)  }}</p>
                                                    </td>
                                                </tr>
                                                
                                                </tbody>
                                            </table>
                                            <!-- timeline getTransaksi 1 -->
                                           
                                            {{-- Modal --}}
                                            
    
                                        </div>
                                    </li>
                                    
                                
                                
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
    
        <!-- Bootstrap core JavaScript -->
        <script src="{{asset ('template_users/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{asset ('template_users/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


        <!-- Additional Scripts -->
        <script src="{{asset ('template_users/assets/js/custom.js') }}"></script>
        <script src="{{asset ('template_users/assets/js/owl.js') }}"></script>
        <script src="{{asset ('template_users/assets/js/slick.js') }}"></script>
        <script src="{{asset ('template_users/assets/js/isotope.js') }}"></script>
        <script src="{{asset ('template_users/assets/js/accordions.js') }}"></script>


        <script language = "text/Javascript"> 
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
            }
        }
        </script>

  </body>

</html>




    

    


    
