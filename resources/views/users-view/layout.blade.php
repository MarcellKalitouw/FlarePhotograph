<!DOCTYPE html>

<html lang="en">

  <head>

    @include('users-view.partial.head')
    @stack('style')
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

    <!-- Header -->
    @include('users-view.partial.header')
    
    <!-- Page Content -->
    @yield('content')
    <!-- End Page Content -->
    @stack('footer')
    
    {{-- @include('users-view.partial.footer') --}}
    
    @include('users-view.partial.script')
    @stack('script')
    <script>
        var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?3807';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        var options = {
      "enabled":true,
      "chatButtonSetting":{
          "backgroundColor":"#4dc247",
          "ctaText":"",
          "borderRadius":"25",
          "marginLeft":"0",
          "marginBottom":"50",
          "marginRight":"50",
          "position":"right"
      },
      "brandSetting":{
          "brandName":"FLARE PHOTOGRAPH",
          "brandSubTitle":"mohon bersabar menunggu respon admin",
          "brandImg":"https://cdn.clare.ai/wati/images/WATI_logo_square_2.png",
          "welcomeText":"Hi !\nAda yang bisa saya bantu?",
          "messageText":"Hallo, saya pertanyaan seputar Flare Photograph",
          "backgroundColor":"#ff4747",
          "ctaText":"Start Chat",
          "borderRadius":"25",
          "autoShow":false,
          "phoneNumber":"6289609689368"
      }
    };
        s.onload = function() {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script>

  </body>

</html>
