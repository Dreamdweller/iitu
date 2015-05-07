<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/queries.css">
    <!-- Fonts -->

    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    

    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>

    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <script src="js/modernizr.custom.js"></script>


  </head>
  <body>
    <header class="clearfix"> <div class="container">
        <div class="logo col-md-3"><h2 class="logo-text"><a href="index.php"><img src="img/logo_ru.png"></a></h2></div>
       
        <nav class="clearfix">
            <ul class="clearfix">
                <li><a href="index.php">Главная</a></li>
                <li><a href="about.html">Об университете</a></li>
                <li><a href="chairs.html">Кафедры</a></li>
                <li><a href="solutions.html">Решения</a></li>
                <li><a href="infocenter.html">Инфоцентр</a></li>
                <li><a href="contacts.html" class="last">Контакты</a></li>
            </ul>
        </nav>
        <div class="pullcontainer">
        <a href="#" id="pull"><i class="fa fa-bars fa-2x"></i></a>
        </div> 
        </div>   
    </header>
    <!-- ЦИТАТЫ -->


      <div id="sevenline">
       <div class="container">
        <div id="contacts2">
            Задайте нам вопрос 
            <form action="index.php" method="POST" >
              <input class="fname" type="text" name="name" placeholder="Введите Ваше имя" required><br/>
              <input class="fmail" type="text" name="email" placeholder="Введите Ваш E-mail" required><br/>
              <textarea class="fmessage" placeholder="Введите Ваш вопрос" required></textarea>
              
              <input type="hidden" name="type" value="Главная форма">
              <button class="mainform">Задать!</button>

            </form>
          
        </div>
      </div>
      <div class="mapp">
        <div class="karta">
          <div id="page">

            <div class="gMap-holder" id="map_canvas"></div>
            <script type="text/javascript">
              function loadScript() 
              {
                var script = document.createElement("script");
                script.type = "text/javascript";
                script.src = "http://maps.googleapis.com/maps/api/js?sensor=true&callback=initializeMap";
                document.body.appendChild(script);
              }
              if (window.addEventListener) window.addEventListener("load", loadScript, false);
              else if (window.attachEvent) window.attachEvent("onload", loadScript);

              function initializeMap(){
                var myLatlng = new google.maps.LatLng(43.235099, 76.909655);
                var cen = new google.maps.LatLng(43.234998, 76.908190);
                

                var myOptions = {
                  zoom: 17,
                  scrollwheel: false,
                  center: cen,
                  zoomControl: true,
                  mapTypeId: google.maps.MapTypeId.ROADMAP,
                  mapTypeControlOptions: {
                    position: google.maps.ControlPosition.BOTTOM_LEFT
                  }
                }
                var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                var markerImage = new google.maps.MarkerImage(
                    'img/tip.png',
                    new google.maps.Size(90,90),
                    new google.maps.Point(0,0)
                  
                );
                var marker = new google.maps.Marker({
                  icon: markerImage,
                  position: myLatlng, 
                  map: map,
                  animation: google.maps.Animation.DROP,
                  
                });

                google.maps.event.addListener(marker, 'click', toggleBounce);

                function toggleBounce() {

                  if (marker.getAnimation() != null) {
                    marker.setAnimation(null);
                  } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                  }
                }
      
              }
            </script>

                    
          </div>
        </div>
      </div>
    </div>

         


    <!-- ЦИТАТЫ -->
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <p style="margin-top: 50px;">© Copyright 2010—2015 IITU. Все права защищены.</p>
            </div>
   <!--       <div class="col-md-3">
            <p>aliquam dolor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum consectetur commodo eros, vitae laoreet lectus aliq</p>
          </div>  -->
         <div class="col-md-4">
            <div class="social">
              <div class="socialIcon"><a href="https://twitter.com/iitukz"><img src="img/tw.png" width="50px;"></a></div>
              <div class="socialIcon"><a href="https://vk.com/iitu_kz"><img src="img/vk.png" width="50px;"></a></div>
            </div>
          </div>
        
      </div>  
    </footer>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      $('#myCarousel').carousel({
        interval:   40000
      });
    </script>
    <script src="js/scripts.js"></script>

    <script src="js/unslider.min.js"></script>

    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/scripts2.js"></script>

    <script src="js/jquery.cbpQTRotator.min.js"></script>
    <script>
      $( function() {
        /*
        - how to call the plugin:
        $( selector ).cbpQTRotator( [options] );
        - options:
        {
          // default transition speed (ms)
          speed : 700,
          // default transition easing
          easing : 'ease',
          // rotator interval (ms)
          interval : 8000
        }
        - destroy:
        $( selector ).cbpQTRotator( 'destroy' );
        */

        $( '#cbp-qtrotator' ).cbpQTRotator();

      } );
    </script>

  </body>
</html>