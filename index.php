<?php 
  mysql_connect("localhost","root","");
    mysql_select_db("iitu");


 ?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
	  <!-- Fonts -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    

    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>

    <link rel="stylesheet" type="text/css" href="css/default.css" />
 


  </head>
  <body>
		<header class="clearfix"> <div class="container">
		    <div class="logo col-md-3"><h2 class="logo-text"><a href="index.php"><img src="img/logo_ru.png"></a></h2></div>
       
		    <nav class="clearfix">
            <ul class="clearfix">
                <li><a href="index.php" class="active">Главная</a></li>
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
      
      <div class="main">
        <div class="mainText">
          <h3>События</h3>
          <?php 
         $qqq = "SELECT * FROM events WHERE del = 0 ORDER BY time DESC LIMIT 3";                
         $query = mysql_query($qqq);
        while ($row = mysql_fetch_array($query)){
         $timestamp = strtotime($row['time']);
         $date = date('d-m-Y', $timestamp);
         ?>
          <h2><?php echo $date ?></h2><span><?php echo $row['theme'] ?></span>
          <?php 
          }
           ?>
          <h2 class="allEvents"><a href="allEvents.php">Все события</a></h2>
        </div>
        <div class="col-md-8">
            <!-- Carousel
            ================================================== -->
            <div id="myCarousel" class="carousel slide">        
                <div class="carousel-inner">           
                    <?php 
                     $qqq = "SELECT * FROM news WHERE del = 0 ORDER BY post_date LIMIT 3";                
                     $query = mysql_query($qqq);
                     $count = 0;
                    while ($row = mysql_fetch_array($query)){ ?>
                      <?php if($count==0){ ?>
                      <div class="item active">
                      <?php }else{ ?>
                      <div class="item">
                      <?php 
                      } ?> 
                      <a href="fullnew.php?id=<?php echo $row['id']; ?>"><img class="thumbnail" src="admin/pages/images/<?php echo $row['image'];?>" style='width:848px; ' alt="Slide1"></a>
                        <div class="caption">
                          <h4><?php echo $row['header']; ?></h4>
                            <p><?php echo $row['part']; ?></p>
                        </div>
                    </div>
                    <?php 
                    $count++;
                      }
                     ?>                                         
                </div>
                 <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>                                                                 
            </div><!-- End Carousel -->  
      </div>
      </div>
    </div>
    </div>
    <!-- ЦИТАТЫ -->
    <div class=" darkblock">
       <div class="container">
          <div class="allNewsText">Новости</div>
          <div class="allNews col-md-8">
            <?php 
                     $qqq = "SELECT * FROM news WHERE del = 0 ORDER BY post_date DESC LIMIT 4";                
                     $query = mysql_query($qqq);
                     $count = 0;
                    while ($row = mysql_fetch_array($query)){ ?>
                      <div class="col-md-6"><a href="fullnew.php?id=<?php echo $row['id']; ?>"><img src="admin/pages/images/<?php echo $row['image'];?>" style='width:350px; '><p><?php echo $row['header']; ?></p></a></div>
            <?php } ?>
          </div>
          <div class="formMainPage col-md-4">
            <h1>Задайте вопрос<br> сейчас</h1>
            <form class="mainForm" action="form.php" method="post">
              <label>Ваш e-mail</label><br>
              <input type="email" name="email" class="formMail"><br>
              <label>Ваше сообщение</label><br>
              <textarea name="message" class="formMessage"></textarea>
              <input type="submit" class="button solid-color" value="ЗАДАТЬ ВОПРОС">
            </form>
              <?php 
                if(isset($_GET['mess'])){
                    echo "<span style='color:red;'>".$_GET['mess']."</span>";
                }
               ?>
           
          </div>

      </div>
    </div>

     <div class="lightblock clearfix">
      <div class="partnersText">Партнёры университета</div>
        <div class="main_partners_cont">
                <div class="main_partners_resize_block">
                    <a href="http://www.akorda.kz" target="_blank"><img src="img/p1.png" width="170" height="50" border="0" alt=""></a>
                </div>
                <div class="main_partners_resize_block">
                    <a href="http://microsoft.com" target="_blank"><img src="img/p2.png" width="170" height="50" border="0" alt=""></a>
                </div>
                <div class="main_partners_resize_block">
                    <a href="http://cisco.com" target="_blank"><img src="img/p3.png" width="170" height="50" border="0" alt=""></a>
                </div>
                <div class="main_partners_resize_block">
                    <a href="http://icarnegie.com" target="_blank"><img src="img/p4.png" width="170" height="50" border="0" alt=""></a>
                </div>    
                <div class="main_partners_resize_block">
                    <a href="http://bnews.kz" target="_blank"><img src="img/p5.png" width="170" height="50" border="0" alt=""></a>
                </div>
                <div class="main_partners_resize_block">
                    <a href="http://kaztube.kz" target="_blank"><img src="img/p6.png" width="170" height="50" border="0" alt=""></a>
                </div>
                <div class="main_partners_resize_block">
                    <a href="http://www.zerde.gov.kz" target="_blank"><img src="img/p7.png" width="170" height="50" border="0" alt=""></a>
                </div>
                <div class="main_partners_resize_block">
                    <a href="/news/2011/10/12/drweb_for_it_students.html"><img src="img/p8.png" width="170" height="50" border="0" alt=""></a>
                </div>
        </div>
    </div>

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
  
  </body>
</html>