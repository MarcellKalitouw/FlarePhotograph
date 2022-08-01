<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('template/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('template/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('template/plugins/animate-css/animate.css')}}" rel="stylesheet" />

     <!-- Colorpicker Css -->
    <link href="{{asset ('template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet" />

     <!-- Bootstrap Tagsinput Css -->
    <link href="{{asset ('template/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">

     <!-- Bootstrap Spinner Css -->
    <link href="{{asset ('template/plugins/jquery-spinner/css/bootstrap-spinner.css') }}" rel="stylesheet">

    <!-- Sweetalert Css -->
    <link href="{{asset ('template/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('template/plugins/morrisjs/morris.css')}}" rel="stylesheet" />
    
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

   
     <!-- Bootstrap Select Css -->
     <link href="{{ asset('template/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="{{ asset('template/plugins/nouislider/nouislider.min.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('template/css/themes/all-themes.css') }}" rel="stylesheet" />
</head>

<body class="theme-blue" onload="showAlert()">

    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    @include('partial.topbar')
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
       @include('partial.sidebar')
            <!-- #Menu -->
            <!-- Footer -->
           @include('partial.footer')
            <!-- #Footer -->
       
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        {{-- <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside> --}}
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            
            @yield('content')
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.js') }}"></script>
    
    @stack('script')
    <!-- Select Plugin Js -->
    <script src="{{ asset('template/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('template/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset ('template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
    <!-- Select Plugin Js -->
    <script src="{{ asset('template/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{ asset('template/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('template/plugins/node-waves/waves.js') }}"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="{{asset ('template/plugins/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('template/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('template/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('template/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('template/plugins/chartjs/Chart.bundle.js')}}"></script>

     <!-- Jquery DataTable Plugin Js -->
     <script src="{{ asset('template/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
     <script src="{{ asset('template/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    
      <!-- Custom Js -->
    <script src="{{ asset('template/js/admin.js') }}"></script>
    <script src="{{ asset('template/js/pages/ui/notifications.js') }}"></script>
    <script src="{{ asset('template/js/pages/ui/dialogs.js') }}"></script>
    <script src="{{ asset('template/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('template/js/pages/forms/advanced-form-elements.js') }}"></script>
    <script src="{{ asset('template/js/pages/forms/basic-form-elements.js')}}"></script>
    

    <!-- Demo Js -->
    <script src="{{ asset('template/js/demo.js') }}"></script>

    

</body>

</html>
