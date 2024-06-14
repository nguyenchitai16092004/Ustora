<?php
$pages = 'signup';

$connect = mysqli_connect('localhost', 'root', '', 'qlbh');
if ($connect) {
	mysqli_query($connect, "SET NAMES 'UTF8'");
} else {
	echo 'Kết nối thất bại';
}

$err = [];


if (isset($_POST['user_name'])) {
	$user_name = $_POST['user_name'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$rPassword = $_POST['rPassword'];

	if (empty($user_name)) {
		$err['user_name'] = 'Bạn chưa nhập Tên đăng nhập';
	}
	if (empty($name)) {
		$err['name'] = 'Bạn chưa nhập Họ tên';
	}
	if (empty($email)) {
		$err['email'] = 'Bạn chưa nhập Email';
	}
	if (empty($password)) {
		$err['password'] = 'Bạn chưa nhập Mật khẩu';
	}
	if ($password != $rPassword) {
		$err['rPassword'] = 'Mật khẩu nhập lại không đúng';
	}


	if (empty($err)) {
		$check_user_query = "SELECT * FROM account WHERE user_name = '$user_name'";
		$check_user_result = mysqli_query($connect, $check_user_query);

		if (mysqli_num_rows($check_user_result) > 0) {
			$err['user_name'] = 'Đã có tài khoản với tên đăng nhập: ' . $user_name;
		} else {
			$sql = "INSERT INTO account (user_name, name, email, password) VALUES ('$user_name','$name','$email','$password')";


			$query = mysqli_query($connect, $sql);

			if ($query) {
				echo '<script>alert("Tài khoản đăng ký thành công. Hãy đăng nhập lại"); window.location.href = "../../../../../../ustora/pages/signin.php";</script>';
				exit;
			}
		}
	}
}

?>
<div class="header-w3l">
	<h1 style="position: relative;
	bottom: 60px;">User Sign Up </h1>
</div>
<div style="position: relative;
bottom:100px;" class="main-w3layouts-agileinfo">
	<div class="wthree-form">
		<h2>Fill out the form below to login</h2>
		<form action="#" method="post">

			<div class="form-sub-w3">
				<input type="text" id="" name="user_name" placeholder="User Name" title="Please enter your User Name" value="<?php echo isset($_POST['user_name']) ? $_POST['user_name'] : ''; ?>">
				<div class="icon-w3">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
			</div>
			<div class="ha-error">
				<span style="color:red;"><?php echo (isset($err['user_name'])) ? $err['user_name'] : '' ?></span>
			</div>

			<div class="form-sub-w3">
				<input type="text" id="" name="name" placeholder="Name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" title="Please enter your Name">
				<div class="icon-w3">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
			</div>
			<div class="ha-error">
				<span style="color:red;"><?php echo (isset($err['name'])) ? $err['name'] : '' ?></span>
			</div>

			<div class="form-sub-w3">
				<input type="email" id="" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" placeholder="mail@example.com" title="Please enter a valid email">
				<div class="icon-w3">
					<i class="fa fa-solid fa-envelope" aria-hidden="true"></i>
				</div>
			</div>
			<div class="ha-error">
				<span style="color:red;"><?php echo (isset($err['email'])) ? $err['email'] : '' ?></span>
			</div>

			<div class="form-sub-w3">
				<input type="password" id="" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" placeholder="Password" />
				<div class="icon-w3">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</div>
			</div>
			<div class="ha-error">
				<span style="color:red;"><?php echo (isset($err['password'])) ? $err['password'] : '' ?></span>
			</div>

			<div class="form-sub-w3">
				<input type="password" id="" class="lock" name="rPassword" placeholder="Confirm Password">
				<div class="icon-w3">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</div>
			</div>
			<div class="ha-error">
				<span style="color:red;"><?php echo (isset($err['rPassword'])) ? $err['rPassword'] : '' ?></span>
			</div>

			<div class="form-sub-w3">
				<input type="file" id="profile_image" name="profile_image" accept="image/*">
				<div style="position: relative;
				bottom:3.5vh; left:22vw;" class="icon-w3">
					<i class="fa fa-image" aria-hidden="true"></i>
				</div>
			</div>

			<div class="form-sub-w3">
				<img style="width:100px; height:100px;" id="preview_image" src="../../../../ustora/img/images.jpg" alt="Default Image">
			</div>

			<div>
				<label style="	display: flex;
						column-gap: 20px;" class="anim">
					<div>Do you already have an account?</div>
					<a class="user_si" href="<?php echo $level . PAGES_PATH . 'signin.php' ?>">Sign in</a>
				</label>
				<div class="submit-agileits">
					<input type="submit" value="Sign up">
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	document.getElementById('profile_image').addEventListener('change', function() {
		var preview = document.getElementById('preview_image');
		var file = this.files[0];
		if (file) {
			preview.src = URL.createObjectURL(file);
		} else {
			preview.src = 'default_image.jpg';
		}
	});
</script>