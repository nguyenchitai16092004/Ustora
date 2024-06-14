<?php
$pages = 'signin';
?>
<div class="header-w3l">
	<h1 style="position: relative;
	bottom: 60px;">User Login </h1>
	<?php if (isset($_GET['error'])) { ?>
		<p style="background:#F2DEDE;
color: #A94442;
padding:5px;
width:22%;
border-radius:5px;
position:relative;
left:37%;
bottom:55px;" class="error"><?php echo $_GET['error']; ?></p>
	<?php } ?>
</div>
<div style="position: relative;
bottom:100px;" class="main-w3layouts-agileinfo">
	<div class="wthree-form">
		<form action="si.php" method="post">
			<div class="form-sub-w3">
				<input type="text" name="uname" placeholder="Username " required="" />
				<div class="icon-w3">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
			</div>
			<div class="form-sub-w3">
				<input type="password" name="password" placeholder="Password" required="" />
				<div class="icon-w3">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</div>
			</div>
			<label class="anim">
				<input type="checkbox" class="checkbox">
				<span>Remember Me</span>
				<a class="user_su" style="margin-left: 90px;" href="<?php echo $level . PAGES_PATH . 'signup.php' ?>">Sign up</a>
				<a class="forgot_pw" href="#">Forgot Password?</a>
			</label>
			<div class="clear"></div>
			<div class="submit-agileits">
				<input type="submit" name="dangnhap" value="ĐĂNG NHẬP">
			</div>
		</form>
	</div>
</div>