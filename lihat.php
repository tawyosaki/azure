<?php require_once('../Connections/ediary.php'); ?>
<?php require_once('../Connections/ediary.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_timeline = 1;
$pageNum_timeline = 0;
if (isset($_GET['pageNum_timeline'])) {
  $pageNum_timeline = $_GET['pageNum_timeline'];
}
$startRow_timeline = $pageNum_timeline * $maxRows_timeline;

mysql_select_db($database_ediary, $ediary);
$query_timeline = "SELECT * FROM catatan";
$query_limit_timeline = sprintf("%s LIMIT %d, %d", $query_timeline, $startRow_timeline, $maxRows_timeline);
$timeline = mysql_query($query_limit_timeline, $ediary) or die(mysql_error());
$row_timeline = mysql_fetch_assoc($timeline);

if (isset($_GET['totalRows_timeline'])) {
  $totalRows_timeline = $_GET['totalRows_timeline'];
} else {
  $all_timeline = mysql_query($query_timeline);
  $totalRows_timeline = mysql_num_rows($all_timeline);
}
$totalPages_timeline = ceil($totalRows_timeline/$maxRows_timeline)-1;

$colname_sessionuser = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_sessionuser = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysql_select_db($database_ediary, $ediary);
$query_sessionuser = sprintf("SELECT * FROM `user` WHERE username = '%s'", $colname_sessionuser);
$sessionuser = mysql_query($query_sessionuser, $ediary) or die(mysql_error());
$row_sessionuser = mysql_fetch_assoc($sessionuser);
$totalRows_sessionuser = mysql_num_rows($sessionuser);

$colname_profile = "-1";
if (isset($_SESSION['username'])) {
  $colname_profile = (get_magic_quotes_gpc()) ? $_SESSION['username'] : addslashes($_SESSION['username']);
}
mysql_select_db($database_ediary, $ediary);
$query_profile = sprintf("SELECT * FROM `user` WHERE username = '%s'", $colname_profile);
$profile = mysql_query($query_profile, $ediary) or die(mysql_error());
$row_profile = mysql_fetch_assoc($profile);
$totalRows_profile = mysql_num_rows($profile);

$queryString_timeline = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_timeline") == false && 
        stristr($param, "totalRows_timeline") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_timeline = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_timeline = sprintf("&totalRows_timeline=%d%s", $totalRows_timeline, $queryString_timeline);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.boxrounded
{
background : #00ff00;
width  : 200px;
height:100px;
border-radius : 10px 10px 10px 10px;
-moz-border-radius : 10px 10px 10px 10px;
-webkit-border-radius : 10px 10px 10px 10px;
 }

.style21 {	font-family: "Segoe UI Light";
	font-size: 36px;
	color: #FFFFFF;
}
#Layer1 {	position:absolute;
	left:1px;
	top:1px;
	width:1133px;
	height:148px;
	z-index:1;
}
#Layer1 {	position:absolute;
	left:1px;
	top:-1px;
	width:1146px;
	height:100px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:5px;
	top:109px;
	width:831px;
	height:34px;
	z-index:2;
}
#Layer3 {
	position:absolute;
	left:28px;
	top:113px;
	width:791px;
	height:39px;
	z-index:3;
	background-color: #333333;
}
.boxrounded {background : #00ff00;
width  : 200px;
height:100px;
border-radius : 10px 10px 10px 10px;
-moz-border-radius : 10px 10px 10px 10px;
-webkit-border-radius : 10px 10px 10px 10px;
}
.boxrounded2
{
background : #333333;
width  : 450px;
height:250px;
border-radius : 20px 20px 20px 20px;
-moz-border-radius : 20px 20px 20px 20px;
-webkit-border-radius : 20px 20px 20px 20px;
 }
 .boxrounded12
{
background : #333333;
width  : 250px;
height:150px;
border-radius : 20px 20px 20px 20px;
-moz-border-radius : 20px 20px 20px 20px;
-webkit-border-radius : 20px 20px 20px 20px;
 }
#Layer4 {
	position:absolute;
	left:28px;
	top:156px;
	width:790px;
	height:573px;
	z-index:4;
	background-color: #333333;
}
#Layer5 {
	position:absolute;
	left:655px;
	top:170px;
	width:115px;
	height:40px;
	z-index:5;
	background-color: #CCCCCC;
}
.style22 {font-family: "Segoe UI Light"}
.boxrounded1 {background : #00ff00;
width  : 200px;
height:100px;
border-radius : 10px 10px 10px 10px;
-moz-border-radius : 10px 10px 10px 10px;
-webkit-border-radius : 10px 10px 10px 10px;
}
.boxrounded1 {background : #00ff00;
width  : 200px;
height:100px;
border-radius : 10px 10px 10px 10px;
-moz-border-radius : 10px 10px 10px 10px;
-webkit-border-radius : 10px 10px 10px 10px;
}
.style28 {font-size: 18px}
.style39 {font-family: "Segoe UI Light"; color: #000000; font-size: 24; }
.style40 {font-size: 24}
.style41 {color: #FFFFFF}
#Layer6 {
	position:absolute;
	left:836px;
	top:113px;
	width:300px;
	height:183px;
	z-index:6;
}
.boxrounded121 {background : #333333;
width  : 250px;
height:100px;
border-radius : 20px 20px 20px 20px;
-moz-border-radius : 20px 20px 20px 20px;
-webkit-border-radius : 20px 20px 20px 20px;
}
.style48 {color: #CCCCCC}
.style49 {font-size: 24; font-family: "Segoe UI Light"; color: #CCCCCC; }
#Layer7 {
	position:absolute;
	left:649px;
	top:113px;
	width:207px;
	height:611px;
	z-index:7;
	background-color: #CCCCCC;
}
#Layer8 {
	position:absolute;
	left:836px;
	top:328px;
	width:250px;
	height:398px;
	z-index:8;
	background-color: #CCCCCC;
}
.style54 {font-size: 24px; font-family: "Segoe UI Light"; }
.style55 {color: #333333}
-->
</style>
</head>

<body>
<div id="Layer1">
  <table width="1168" height="97" border="0" bgcolor="#333333">
    <tr>
      <td width="1136" height="79"><span class="style21">E-Diary </span></td>
    </tr>
  </table>
</div>
<div id="Layer3" class="boxrounded"><span class="style28 style41 style22">Welcome, <?php echo $row_sessionuser['username']; ?></span><span class="style22"><a href="<?php echo $logoutAction ?>"></a></span></div>
<div id="Layer4" class="boxrounded2">
  <p>&nbsp;</p>
  <div align="center">
    <table width="773" height="299" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333" bgcolor="#FFFFFF">
      <tr>
        <td width="257" height="43" bgcolor="#CCCCCC"><span class="style22 style55">Title : <?php echo $row_timeline['judul']; ?></span></td>
        <td colspan="2" bgcolor="#CCCCCC"><span class="style22 style55">Date : <?php echo $row_timeline['tgl']; ?></span></td>
      </tr>
    
      <tr>
        <td height="157" colspan="3" bgcolor="#FFFFFF"><p class="style22"><?php echo $row_timeline['isi']; ?></p>
          <p class="style22">&nbsp;</p>
          <p class="style22">&nbsp;</p>
          <p>&nbsp;</p>      </td>
      </tr>
      <tr>
        <td height="42" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><span class="style22"><a href="delete.php"></a></span></td>
        <td width="123" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><div align="right"><a href="<?php printf("%s?pageNum_timeline=%d%s", $currentPage, max(0, $pageNum_timeline - 1), $queryString_timeline); ?>" class="style22">&lt;&lt; Previous_ </a></div></td>
        <td width="70" bordercolor="#FFFFFF" bgcolor="#CCCCCC"><a href="<?php printf("%s?pageNum_timeline=%d%s", $currentPage, min($totalPages_timeline, $pageNum_timeline + 1), $queryString_timeline); ?>" class="style22">_Next&gt;&gt;</a></td>
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<div id="Layer6">
  <table width="284" border="0" class="boxrounded12">
    <tr>
      <td width="13"><p align="left" class="style39 style41"><span class="style48"></span></p></td>
      <td width="214">&nbsp;</td>
      <td width="10">&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center" class="style41">
          <div align="left"><span class="style48"></span></div>
      </div></td>
      <td><span class="style39 style48"><?php echo $row_sessionuser['nama']; ?></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center" class="style41">
          <div align="left"><span class="style48"></span></div>
      </div></td>
      <td><span class="style49"><?php echo $row_sessionuser['jk']; ?></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center" class="style41">
          <div align="left"><span class="style48"></span></div>
      </div></td>
      <td><span class="style49"><?php echo $row_sessionuser['tgllahir']; ?></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center" class="style41">
          <div align="left"><span class="style48"></span></div>
      </div></td>
      <td><span class="style40"><span class="style49"><?php echo $row_sessionuser['status']; ?></span></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="23"><div align="left"><span class="style41"></span></div></td>
      <td><span class="style49"><?php echo $row_sessionuser['about']; ?></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="50"><div align="left"><span class="style21"><span class="style28"><a href="<?php echo $logoutAction ?>"></a></span></span></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<div class="boxrounded12" id="Layer8">
  <p>&nbsp;</p>
  <ul><li class="style54"><a href="cat/catat.php">Create new diary</a></li>
    <li class="style54"><a href="lihat.php">My Diary</a> </li>
    <li class="style54"><a href="home.php">Home</a></li>
    <li class="style54"><a href="<?php echo $logoutAction ?>">Log out</a></li>
  </ul>
  <p>&nbsp;</p>
</div>
</body>
</html>
<?php
mysql_free_result($timeline);

mysql_free_result($sessionuser);

mysql_free_result($profile);
?>
