<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
    $fullname=$_POST['fullname'];
$mobile=$_POST['mobileno'];
$email=$_POST['emailid'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$blodgroup=$_POST['bloodgroup'];
$address=$_POST['address'];
$message=$_POST['message'];
$status=1;
    $password=md5($_POST['password']);
    $ret="select EmailId from tblblooddonars where EmailId=:email";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="INSERT INTO  tblblooddonars(FullName,MobileNumber,EmailId,Age,Gender,BloodGroup,Address,Message,status,Password) VALUES(:fullname,:mobile,:email,:age,:gender,:blodgroup,:address,:message,:status,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':blodgroup',$blodgroup,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script>alert('لقد قمت بالتسجيل بنجاح');</script>";
}
else
{

echo "<script>alert('.حدث خطأ ما. أعد المحاولة من فضلك');</script>";
}
}
 else
{

echo "<script>alert('معرف البريد الإلكتروني موجود بالفعل. حاول مرة اخرى');</script>";
}
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>نظام إدارة بنك الدم للتبرع | معلومات عنا </title>
	<!-- Meta tag Keywords -->
	
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //Web-Fonts -->

</head>

<body dir="rtl">
	<?php include('includes/header.php');?>

	<!-- banner 2 -->
	<div class="inner-banner-w3ls">
		<div class="container">

		</div>
		<!-- //banner 2 -->
	</div>
	<!-- page details -->
	<div class="breadcrumb-agile">
		<div aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">الصفحة الرئيسية</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">اشتراك</li>
			</ol>
		</div>
	</div>
	<!-- //page details -->

	<!-- about -->
	<section class="about py-5">
		<div class="container py-xl-5 py-lg-3">
 <div class="login px-4 mx-auto mw-100">
                            <h5 class="text-center mb-4">سجل الان</h5>
                            <form action="#" method="post"  name="signup" onsubmit="return checkpass();">
                                <div class="form-group">
                                    <label>الاسم الكامل</label>
                                     <input type="text" class="form-control" name="fullname" id="fullname" placeholder="الاسم الكامل">
                                </div>
                                <div class="form-group">
                                    <label>رقم الهاتف المحمول</label>
                                    <input type="text" class="form-control" name="mobileno" id="mobileno" required="true" placeholder="رقم الهاتف المحمول" maxlength="10" pattern="[0-9]+">
                                </div>
                                
                                <div class="form-group">
                                    <label class="mb-2">عنوان الايميل</label>
                                    <input type="email" name="emailid" class="form-control" placeholder="عنوان الايميل">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">العمر</label>
                                    <input type="text" class="form-control" name="age" id="age" placeholder="العمر" required="">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">الجنس</label>
                                    <select name="gender" class="form-control" required>
<option value="">يختار</option>
<option value="ذكر">ذكر</option>
<option value="أنثى">أنثى</option>
</select>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">فصيلة الدم</label>
                                    <select name="bloodgroup" class="form-control" required>
<?php $sql = "SELECT * from  tblbloodgroup ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->BloodGroup);?>"><?php echo htmlentities($result->BloodGroup);?></option>
<?php }} ?>
</select>
                                </div>
                               
                                <div class="form-group">
                                    <label>العنوان</label>
                                    <input type="text" class="form-control" name="address" id="address" required="true" placeholder="العنوان">
                                </div>
                                <div class="form-group">
                                    <label>رسالة</label>
                                    <textarea class="form-control" name="message" required> </textarea>
                                </div>
                                <div class="form-group">
                                    <label>كلمة المرور</label>
                                    <input type="password" class="form-control" name="password" id="password" required="">
                                </div>
                               
                                <button type="submit" class="btn btn-primary submit mb-4" name="submit">يسجل</button>
                              
                                 <p class="account-w3ls text-center pb-4" style="color:#000">
								 مسجل بالفعل؟
                                    <a href="login.php" >قم بتسجيل دخولك الآن</a>
                                </p>
                            </form>
                        </div>
			
		</div>
	</section>
	<!-- //about -->



	<?php include('includes/footer.php');?>


	<!-- Js files -->
	<!-- JavaScript -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- Default-JavaScript-File -->

	<!-- banner slider -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>
	<!-- //banner slider -->

	<!-- fixed navigation -->
	<script src="js/fixed-nav.js"></script>
	<!-- //fixed navigation -->

	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- move-top -->
	<script src="js/move-top.js"></script>
	<!-- easing -->
	<script src="js/easing.js"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="js/medic.js"></script>

	<script src="js/bootstrap.js"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

	<!-- //Js files -->

</body>

</html>