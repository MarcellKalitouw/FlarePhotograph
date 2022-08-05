@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{{ route('produk.index') }}" style="text-decoration: none;">
                <div class="info-box bg-cyan hover-expand-effect" style="cursor:pointer;">
                    <div class="icon">
                        <i class="material-icons">collections_bookmark</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL PRODUK</div>
                        <div class="number count-to" data-from="0" data-to="{{$produk }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{{ route('transaksi.index') }}" style="text-decoration: none;">
                <div class="info-box bg-light-green hover-expand-effect" style="cursor:pointer;">
                    <div class="icon">
                        <i class="material-icons">attach_money</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL TRANSAKSI</div>
                        <div class="number count-to" data-from="0" data-to="{{ $transaksi }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{{ route('users.index') }}" style="text-decoration: none;">
                <div class="info-box bg-orange hover-expand-effect" style="cursor:pointer;">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL PENGGUNA</div>
                        <div class="number count-to" data-from="0" data-to="{{ $pengguna }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <!-- #END# Widgets -->
        <!-- CPU Usage -->
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="display: flex;justify-content:space-between">
                            <h2>BAR CHART</h2>
                            {{-- <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <select class="dropdown-menu pull-right">
                                        <option><a href="javascript:void(0);">Action</a></option>
                                        <option><a href="javascript:void(0);">Another action</a></option>
                                        <option><a href="javascript:void(0);">Something else here</a></option>
                                    </select>
                                </li>
                            </ul> --}}
                            <select onchange="getTransaksiSelesaiByYear()" name="tahunTransaksi" id="tahunTransaksi" class="">
                                <option value="" selected disabled>
                                   Pilih Tahun
                                </option>
                                 <?php
                                for ($year = (int)date('Y'); 2020 <= $year; $year--): ?>
                                    <option value="<?=$year;?>"><?=$year;?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Bar Chart -->
            </div>
        <!-- #END# CPU Usage -->
        
    </div>    
@endsection

@push('script')
    <script>

        $(function () {
            // new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
            new Chart(
                document.getElementById("bar_chart").getContext("2d"),
                getChartJs("bar")
            );
            // new Chart(document.getElehmentById("radar_chart").getContext("2d"), getChartJs('radar'));
            // new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));
        });
        
        // var chart = new Chart(
        //         document.getElementById("bar_chart").getContext("2d"),
        //          {
        //             type: "bar",
        //             data: {},
        //             options: {}
        //     }
        // );

        function getTransaksiSelesaiByYear(){
            let getYear = $("#tahunTransaksi").val();
            
            

            $.ajax({
                type:"POST",
                url: "{{ route('ajax.ts-byyear') }}",
                data: {_token:`{{ csrf_token() }}`, year: getYear },
                dataType: 'json',
                success: function(res){
                    alert("Success");
                    console.log('data', res,'label',res.data.y,'jlh', res.data.jumlah);
                    
                    let newData = {
                        label: [],
                        jumlah: []
                    };
                    // let label = [];
                    // let jumlah = [];
                    res.data.map((v) => {
                        // jumlah = [...jumlah, v.jumlah];
                        // label = [...label, v.y];
                        newData.label.push(v.y);
                        newData.jumlah.push(v.jumlah);

                        // newData = [...newData, {
                        //     label: [v.y],
                        //     jumlah: [v.jumlah]
                        // }]   
                    });
                    console.log('newData', newData);

                   var ctx = document.getElementById("bar_chart").getContext('2d');
                        var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels:newData.label,
                            datasets: [{
                                label: 'Data Transaksi Yang Selesai',
                                data: newData.jumlah,
                                borderWidth: 1,
                                backgroundColor: "rgba(0, 188, 212, 0.8)",
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            }
                        }
                    });
                    
                }
            });
        }

        function getChartJs(type) {
            var config = null;

             if (type === "bar") {
                config = {
                    type: "bar",
                    data: {
                        labels: [
                            // "January",
                            // "February",
                            // "March",
                            // "April",
                            // "May",
                            // "June",
                            // "July",
                        ],
                        datasets: [
                        //     {
                        //         label: "My First dataset",
                        //         data: [65, 59, 80, 81, 56, 55, 40],
                        //         backgroundColor: "rgba(0, 188, 212, 0.8)",
                        //     },
                        //     {
                        //         label: "My Second dataset",
                        //         data: [28, 48, 40, 19, 86, 27, 90],
                        //         backgroundColor: "rgba(233, 30, 99, 0.8)",
                        //     },
                        ],
                    },
                    options: {
                        responsive: true,
                        legend: false,
                    },
                };
            } 
            return config;
        }

    </script>
@endpush