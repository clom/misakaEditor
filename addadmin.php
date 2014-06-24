<?php

   $site = "./";
   header("Location:$site");


require_once(dirname(__FILE__) . "/configration.php");

if (!empty($_POST))
{
    $link = mysql_connect( $db_url, $db_user, $db_pass ) or die("MySQLへの接続に失敗しました。");
    $sdb = mysql_select_db( $db_use, $link ) or die("データベースの選択に失敗しました。");
    $sql = "INSERT INTO `clom-6`.`admin` (`user`) VALUES ('".$_SERVER['REMOTE_USER']."')";
    $result = mysql_query( $sql, $link ) or die("クエリの送信に失敗しました。");
    mysql_close($link) or die("MySQL切断に失敗しました。");
}
else
echo "no data";

?>
