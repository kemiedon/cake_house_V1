<?php
require_once("../connection/database.php");
if(isset($_POST['MM_login']) && $_POST['MM_login'] == 'LOGIN'){
	$sth = $db->query("SELECT * FROM users WHERE account='".$_POST['account']."' AND password='".$_POST['password']."'");

	$user = $sth->fetch(PDO::FETCH_ASSOC);

	if (isset($user) && $user != null){
		$_SESSION['account'] = $user['account'];
		header('Location: news/list.php');
	}else{
		$msg = '登入錯誤，請重新登入';
		header('Location: login.php?msg='.$msg);
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sweet House後台管理系統</title>

<!--STYLESHEETS-->
<link href="css/login_form.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="../js/jquery.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});

	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="login.php" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1>Sweet House</h1><!--END TITLE-->
    <!--DESCRIPTION--><span>後台管理系統</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->

	<!--CONTENT-->
    <div class="content">
	<!--USERNAME--><input name="account" type="text" class="input username" value="Username" onfocus="this.value=''" /><!--END USERNAME-->
    <!--PASSWORD--><input name="password" type="password" class="input password" value="Password" onfocus="this.value=''" /><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->

    <!--FOOTER-->
    <div class="footer">
			<?php if(isset($_GET['msg']) && $_GET['msg'] != null){ ?>
			<div class="alert alert-danger">
			  <strong><?php echo $_GET['msg']; ?></strong>
			</div>
		<?php } ?>
			<input type="hidden" name="MM_login" value="LOGIN">
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="登入" class="button" /><!--END LOGIN BUTTON-->

    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>
