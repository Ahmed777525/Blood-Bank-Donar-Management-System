<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT Email FROM tbladmin WHERE Email=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbladmin set Password=:newpassword where Email=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('تم تغيير كلمة المرور الخاصة بك بنجاح');</script>";
}
else {
echo "<script>alert('معرف البريد الإلكتروني أو رقم الجوال غير صالح');</script>"; 
}
}

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>نظام إدارة بنك الدم والمتبرعين | هل نسيت كلمة السر</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("كلمة المرور الجديدة وحقل تأكيد كلمة المرور غير متطابقين !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>

<body>
	
	<div class="login-page bk-img" style="background-image: url(img/banner.png);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">نظام إدارة بنك الدم والمتبرعين نسيت كلمة المرور</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post" name="chngpwd" onsubmit="return checkpass();">

									<label for="" class="text-uppercase text-sm">البريد إلكتروني </label>
									
									<input type="email" class="form-control mb" placeholder="عنوان البريد الإلكتروني" required="true" name="email">

									<label for="" class="text-uppercase text-sm">قم الهاتف المحمول</label>
								<input type="text" class="form-control mb"  name="mobile" placeholder="قم الهاتف المحمول" required="true" maxlength="10" pattern="[0-9]+">

								<label for="" class="text-uppercase text-sm">كلمة المرور الجديدة</label>
								<input class="form-control mb" type="password" name="newpassword" placeholder="كلمة المرور الجديدة" required="true"/>

								<label for="" class="text-uppercase text-sm">تأكيد كلمة المرور</label>
								<input class="form-control mb" type="password" name="confirmpassword" placeholder="تأكيد كلمة المرور" required="true" />

									<button class="btn btn-primary btn-block" name="submit" type="submit">إعادة ضبط</button>
<a href="index.php" >تسجيل الدخول</a>
								</form>
								<div class="card-footer text-center" style="padding-top: 30px;">
                                        <div class="small"><a href="../index.php" class="btn btn-primary">العودة إلى الصفحة الرئيسية</a></div>
                                    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>