<?php session_start(); ?>
<!DOCTYPE html>

<html lang="jp">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Note there is no responsive meta tag here -->

    <link rel="shortcut icon" href="./assets/ico/favicon.png">

    <title>misaka Editor AdminTools</title>

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
          <a class="navbar-brand" href="./">misaka editor AdminTools</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          </ul>
	       <ul class="nav pull-right">
	        <li>
		      <a class="navbar-brand"><?php echo "Login user : "; echo $_SERVER['REMOTE_USER'];  ?> </a>
		      </li>
        </div><!--/.nav-collapse -->
      </div>
    </div>

<?php
require_once(dirname(__FILE__) . "/configration.php");

$title = urldecode(strstr($_SERVER["REQUEST_URI"], '='));
$title = str_replace("=", '', $title);

$title = preg_replace("/&.+/", "", $title);
$user = urldecode(strstr($_SERVER["REQUEST_URI"], '&'));
$user = str_replace("&user=", "", $user);

$_SESSION['title'] = $title;
$_SESSION['user'] = $user;

$con = mysql_connect($db_url, $db_user, $db_pass);
$result = mysql_select_db($db_use, $con);
$result = mysql_query('SET NAMES utf8', $con);
$result = mysql_query("SELECT * FROM posts WHERE title='".$title."' and user='".$user."'", $con);
$rows = mysql_num_rows($result);
?>


<div class="container">
<h1> READ MODE: <?php echo "$title"; echo " writed: $user"; ?> </h1>

<hr>

<p>

<?php
if($rows){
    while($row = mysql_fetch_array($result)) {
        $value = htmlspecialchars_decode($row['editor']);
        echo $value;
    }
}
?>

</p>

<?php
$con = mysql_close($con);
?>

<hr>
<h3> Admin Service Menu </h3>
<button class="btn btn-danger" data-toggle="modal" href="#Del">Delete</button>

<!-- Modal -->
<div class="modal fade" id="Del" tabindex="-1" role="dialog" aria-labelledby="DelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="DelLabel">Caution!</h4>
      </div>
      <div class="modal-body">
       現在閲覧しているメモを削除します。よろしいですか?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a href="./del.php" role="button" class="btn btn-danger">Delete</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    </div> <!-- /container -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.js"></script>
    <script>
    $('#myCarousel').carousel({
    interval: 3000;
    });
    </script>
  </body>
</html>
