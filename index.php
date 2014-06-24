<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Note there is no responsive meta tag here -->

    <link rel="shortcut icon" href="./assets/ico/favicon.png">

    <title>misaka Editor</title>

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="non-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="./assets/js/html5shiv.js"></script>
      <script src="./assets/js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">misaka editor</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="./">Home</a></li>
            <li><a href="./rlist.php">Read</a></li>
            <li><a href="./wlist.php">Write</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>



<div class="container">
<div class="jumbotron">

<h1>misaka Editor Ver.Clom-0.0.2 </h1>
<p> This Service is Beta test now.....</p>
<h2> Login USER : <?php echo $_SERVER['REMOTE_USER']; ?> </h2>
<a href="./rlist.php" role="button" class="btn btn-success btn-lg">Read</a>
<a href="./wlist.php" role="button" class="btn btn-success btn-lg">Write</a>
<?php
 require_once(dirname(__FILE__) . "/configration.php");
 $con = mysql_connect($db_url, $db_user, $db_pass);
 $result = mysql_select_db($db_use, $con);
 $result = mysql_query('SET NAMES utf8', $con);
 $result = mysql_query("SELECT user FROM admin WHERE user='".$_SERVER['REMOTE_USER']."'",$con);
 while($row = mysql_fetch_array($result)) {
  $value = $row['user'];
     }
 if($value == $_SERVER['REMOTE_USER'])
  echo '<a href="./admin/" role="button" class="btn btn-info btn-lg">Admin</a>';

  $con = mysql_close($con);
  ?>
</div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script>
    $('#myCarousel').carousel({
    interval: 3000;
    });
    </script>
  </body>
</html>
