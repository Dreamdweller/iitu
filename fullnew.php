<?php 
  mysql_connect("localhost","root","");
  mysql_select_db("iitu");

 ?>
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
                <li><a href="abiturient.html">Абитуриенту</a></li>
                <li><a href="contacts.html" class="last">Контакты</a></li>
            </ul>
        </nav>
        <div class="pullcontainer">
        <a href="#" id="pull"><i class="fa fa-bars fa-2x"></i></a>
        </div> 
        </div>   
    </header>
    <!-- ЦИТАТЫ -->
    <div class="lightblock">
    <div class="container">
        <?php 
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                     }else{
                        header("Location:index.php");
                     }
                     $qqq = "SELECT * FROM news WHERE del = 0 AND id={$id}";                
                     $query = mysql_query($qqq);
                     $count = 0;
                    if($row = mysql_fetch_array($query)){ ?>
                  
                    <div class="archiveText"><?php echo $row['header']; ?></div>
                    <div class="events">
                      <img style="width: 800px;" src="admin/pages/images/<?php echo $row['image'];?>" style=''/>
                      <br><span>Опубликовано <?php echo $row['post_date']; ?></span>
                      <p><?php echo $row['content']; ?></p>
                    </div>
                    <?php } ?>
         
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