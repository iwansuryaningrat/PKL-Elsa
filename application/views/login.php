
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Perpustakaan SMAN 2 Cileungsi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="shortcut icon" href="<?php echo base_url(); ?>temp/logo.jpeg">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themlog/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themlog/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themlog/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themlog/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themlog/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themlog/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themlog/css/main.css">
<!--===============================================================================================-->
</head>
<body  style="background:url(<?php echo base_url(); ?>temp/back.jpg);
no-repeat center center fixed; background-size: cover;
 -webkit-background-size: cover; 
 -moz-background-size: cover; -o-background-size: cover;">

	<div class="bg-contact3" style="background-image: url('');">
		<div class="container-contact3">
			<div class="wrap-contact3" style="background: blue;">
				<form method="post" action="<?php echo base_url('clogin/ceklog'); ?>" class="contact3-form validate-form">
					<span class="contact3-form-title">
						<img src="<?php echo base_url(); ?>temp/logo.png" height="120px" ><br/>
					Perpustakaan 
					<p style="color: white;">SMAN 2 CILEUNGSI<br/></p style="color: white;">
					</span>

					<div class="wrap-input3 validate-input" data-validate="Name is required">
						<input class="input3" type="text" name="user" placeholder="Username" autofocus="" autocomplete="off" required="">
						<span class="focus-input3"></span>
					</div>

					<div class="wrap-input3 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input3" type="password" name="password" placeholder="Password" autocomplete="off">
						<span class="focus-input3"></span>
					</div>

					<div class="container-contact3-form-btn">
						<button class="contact3-form-btn btn btn-block">
							 Masuk
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>themlog/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>themlog/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>themlog/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>themlog/vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
