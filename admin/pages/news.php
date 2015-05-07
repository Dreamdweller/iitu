<?php 
    session_start();
    mysql_connect("localhost","root","");
    mysql_select_db("iitu");


$logged = false;

    if(isset($_SESSION['user_id'])){

        $logged = true;
        
    }else{
        header("Location: login.php");
    }

    if(isset($_GET['act'])){
            if($_GET['act']=='logout'){

                unset($_SESSION['user_id']);

                header("Location:login.php");

            }
            if($_GET['act']=='deleteNews'){
                
                $id = $_GET['id'];
                mysql_query("UPDATE news SET del = 1 WHERE id = '$id'") or mysql_error();

                header("Location:news.php");

            }
        }


         if(!empty($_FILES)){
            $target_dir = "images/";
            $target_dir = $target_dir . basename( $_FILES["uploadFile"]["name"]);
            
            if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir)) {
                
                header("Location:news.php?uploadFile=".$_FILES["uploadFile"]["name"]);
                /*$sql = "UPDATE user_info SET picture = '$target_dir' WHERE id = '$id'";
                                         
                $result = mysql_query($sql) or die("Something went wrong: " . mysql_error());  */             
            } else {
            header("Location:?step=yes&message=Sorry, there was an error uploading your file.");
            }
        }

         if (!empty($_POST)){
        if(!empty($_POST['header']) && !empty($_POST['content']) && !empty($_POST['image']) && !empty($_POST['part'])){
                
                $header = $_POST['header'];
                $part = $_POST['part'];
                $content=$_POST['content'];
                $image=$_POST['image'];
                $now = date('Y-d-m');

               mysql_query("INSERT INTO news VALUES (NULL,'$header','$part','$content','$image',0,'$now')") or mysql_error();
/*
                echo $header." ".$content." ".$image; die;
*/                    }else{
                        header("Location:news.php?error=Fill inputs");
                    }
                }

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IITU Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
      

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin Panel IITU</a>
            </div>
            <!-- /.navbar-header -->

          
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Добавление событий</a>
                        </li>
                        <li>
                            <a href="news.php"><i class="fa fa-edit fa-fw"></i> Добавление новостей <span class="fa arrow"></span></a>
                        </li>
                        <li>
                            <a href="news.php?act=logout">Выйти</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Новости IITU</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Все Новости:
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Заголовок</th>
                                                    <th>Краткое описание</th>
                                                    <th>Контент</th>
                                                    <th>Изображение</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $qqq = "SELECT * FROM news WHERE del = 0";                
                                                $query = mysql_query($qqq);
                                                while ($row = mysql_fetch_array($query))
                                                {
                                                ?>
                                                <tr>
                                                <td><?php echo $row['id']; ?><br><a href="news.php?act=deleteNews&id=<?php echo $row['id']; ?>">Удалить</a></td>
                                                    <td><?php echo $row['header']; ?></td>
                                                    <td><?php echo $row['part']; ?></td>
                                                    <td><?php echo substr($row['content'], 0, 200)."..."; ?></td>
                                                    <td><a href="<?php echo 'images/'.$row['image']; ?>"><?php echo $row['image']; ?></a></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                    
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Добавление новостей:
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="table-responsive">
                                        <form action="news.php" method="post">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Заголовок новости:</th>
                                                    <th>Краткое описание:</th>
                                                    <th>Контент:</th>
                                                    <th>Изображение:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name='header'></td>
                                                    <td><textarea name="part" id="" cols="30" rows="10"></textarea></td>
                                                    <td><textarea id="tiny"style="width:100%" name="content" id="" cols="30" rows="10"></textarea></td>
                                                    <button type="submit" name="all" class="btn">Сохранить</button>
                                                    <br>
                                                    <br>
                                                    
                                                    <td>
                                                        <?php 
                                                            if(isset($_GET['uploadFile'])){
                                                                echo "<input readonly type='hidden' name='image' value='".$_GET['uploadFile']."'/><img src='images/".$_GET['uploadFile']."' width='250px' height='300px'></form>";
                                                            }else{
                                                         ?>
                                                            </form>
                                                            <form action="news.php" method="post" enctype="multipart/form-data">
                                                              Please choose a file: <br /><input type="file" name="uploadFile"><br><br />
                                                              <button type="submit" class="btn">Upload</button>
                                                            </form>
                                                        <?php 
                                                            }
                                                         ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                        
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                    
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>
<script type="text/javascript" src="../dist/js/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: "#tiny",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        </script>

</html>
