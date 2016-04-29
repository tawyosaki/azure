<?php require_once('../Connections/ediary.php'); ?><?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "username";
  $MM_redirectLoginSuccess = "home.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_ediary, $ediary);
  	
  $LoginRS__query=sprintf("SELECT username, password, username FROM user WHERE username='%s' AND password='%s'",
  get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $ediary) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'username');
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:1px;
	top:1px;
	width:1133px;
	height:148px;
	z-index:1;
}
body {
	background-color: #FFFFFF;
}
#Layer2 {
	position:absolute;
	left:2px;
	top:134px;
	width:1133px;
	height:55px;
	z-index:2;
}
#Layer3 {
	position:absolute;
	left:5px;
	top:-78px;
	width:459px;
	height:360px;
	z-index:3;
}
#Layer4 {
	position:absolute;
	left:22px;
	top:176px;
	width:640px;
	height:228px;
	z-index:4;
}
*{margin:auto;padding:0;}
 body{font-family:helvetica;background:#fff;}
 #con{background:#333333;width:350px;padding:30px;margin-top:200px;border-radius:20px;border:1 solid #eee;box-shadow:2px 6px 10px #333333;}
 h2{text-align:center;margin-bottom:15px;}
 p{margin-bottom:10px;}
 label{display:inline-block;width:100px;}
 input[type=submit]{border:none;color:#fff;background:linear-gradient(top, #333 0%, #777 100%);background:-moz-linear-gradient(top, #fff 0%, #777 100%);background:-webkit-linear-gradient(top, #333 0%, #777 100%);height:30px;width:100px;border-radius:5px;}
 input[type=submit]:active{background:linear-gradient(top, #888 0%, #bbb 100%);background:-moz-linear-gradient(top, #888 0%, #fff 100%);background:-webkit-linear-gradient(top, #888 0%, #fff 100%);}
        #Layer1 {
	position:absolute;
	left:1px;
	top:-1px;
	width:1146px;
	height:100px;
	z-index:1;
}
.style16 {
	color: #FFFFFF;
	font-family: "Segoe UI Light";
}
#Layer5 {
	position:absolute;
	left:7px;
	top:571px;
	width:1165px;
	height:38px;
	z-index:5;
	background-color: #333333;
}
#Layer6 {
	position:absolute;
	left:26px;
	top:478px;
	width:633px;
	height:31px;
	z-index:5;
	background-color: #333333;
}
#Layer7 {
	position:absolute;
	left:448px;
	top:123px;
	width:618px;
	height:370px;
	z-index:4;
}
.style18 {color: #FFFFFF}
.style21 {
	font-family: "Segoe UI Light";
	font-size: 36px;
	color: #FFFFFF;
}
.boxrounded
{
background : #FFCC33;
width  : 200px;
height:100px;
border-radius : 10px 10px 10px 10px;
-moz-border-radius : 10px 10px 10px 10px;
-webkit-border-radius : 10px 10px 10px 10px;
 }
#Layer8 {
	position:absolute;
	left:29px;
	top:320px;
	width:412px;
	height:176px;
	z-index:5;
	background-color: #CCCCCC;
}
.style22 {
	background: #FFCC33;
	width: 200px;
	height: 100px;
	border-radius: 10px 10px 10px 10px;
	font-family: "Segoe UI Light";
	font-size: 24px;
	color: #FFFFFF;
}
.style25 {color: #333333}
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
<div id="Layer3">
  <div id="con">
    <form ACTION="<?php echo $loginFormAction; ?>" method="POST">
      <p><label><span class="style16">Username</span></label>
        <span class="style16">
        <input type="text" name="username"/>
        </span></p>
 <p>
   <span class="style16">
   <label>Password</label>
   </span>
  <input type="password" name="password"/>
 </p>
 <p>
  <label></label>
  <input type="submit" name="submit" Value="Sign in"/>
 </p>
 </form>

    <span class="style18"><a href="user/daftar.php"></a></span> </div>
</div>
<div id="Layer7" class="boxrounded">
  <p>&nbsp;</p>
  <table width="429" border="0" align="center" bgcolor="#FFCC33">
    <tr>
      <td width="567"><form id="form2" name="form2" method="post" action="">
        
          <div align="center">
            <input name="imageField" type="image" src="12.gif" align="middle" />
          </div>
      </form>
      </td>
    </tr>
  </table>
</div>
<div class="style22" id="Layer8">
  <div align="center">
    <p class="style25">E-diary is a virtual online diary for everyone, make your life simple and easier. <a href="user/daftar.php">Join us?</a> </p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="">
</form>
</body>
</html>
