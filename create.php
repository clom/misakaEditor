<?php
session_start();

if (!isset($_POST) || $_POST["title"] == "" || $_POST["title"] == " "){
 $_SESSION["error"] = "空欄が存在します";
 $site = "./wlist.php";
 header("Location:$site");
}
else{
$_SESSION["error"] = "";
$site = "./write.php?title=".$_POST["title"]."";
header("Location:$site");
mb_language("uni");
mb_internal_encoding("utf-8");
mb_http_input("auto");
mb_http_output("utf-8");

if (!empty($_POST))
{
 $title =$_POST["title"];

 require_once(dirname(__FILE__) . "/configration.php"); 
 $link = mysql_connect( $db_url, $db_user, $db_pass );
 $sdb = mysql_select_db( $db_use, $link );
 $sql = "select `title` from posts where title='".$title."'and user='".$_SERVER['REMOTE_USER']."'";
 $result = mysql_query( $sql, $link);
 $rows = mysql_num_rows($result);
 if($rows){
    while($row = mysql_fetch_array($result)) {
        $value = htmlspecialchars_decode($row['editor']);
    }
 }
 else{
 $sql = "INSERT INTO `$db_use`.`posts` (`title`, `user`) VALUES('".$title."', '".$_SERVER['REMOTE_USER']."')";
 $result = mysql_query( $sql, $link );
 mysql_close($link);
}

}

}

?>
