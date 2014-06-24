<?php session_start();
$title = $_SESSION['title'];
$user = $_SESSION['user'];
mb_language("uni");
mb_internal_encoding("utf-8");
mb_http_input("auto");
mb_http_output("utf-8");

$site = "./";
header("Location:$site");

require_once(dirname(__FILE__) . "/configration.php");

$title = $_SESSION['title'];
$user = $_SESSION['user'];

$link = mysql_connect( $db_url, $db_user, $db_pass ) or die("MySQLへの接続に失敗しました。");
$sdb = mysql_select_db( $db_use, $link ) or die("データベースの選択に失敗しました。");
$sql = "DELETE FROM `posts` WHERE `title`='".$title."' and `user`='".$user."'";
$result = mysql_query( $sql, $link ) or die("クエリの送信に失敗しました。");
mysql_close($link) or die("MySQL切断に失敗しました。");

?>
