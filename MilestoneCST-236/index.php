<?php
?>
<html>
<body>
	<h1>Welcome to the Shirt Shack!</h1><br>
	<section>
		<nav>
			<h4>Login or Register</h4>
				<button onclick="login()">Login</button>
				<button onclick="register()">Register</button>
				<br><br>
			<div id="login" style="display: none">
				<h3>Welcome Back!</h3>
				<form method="post">
					<input type="text" name="login_name" placeholder="User Name"><br>
					<input type="password" name="login_password" placeholder="Password">
					<input type="submit" formaction="login.php" value="Submit" name="submit"><br>
				</form>
			</div>
			<div id="register" style="display: none">
				<form method="post">
					<div>
						<input type="text" placeholder="User Name" name="login_name" required><br>
						<input type="password" placeholder="Password" name="login_password" required><br>
						<input type="text" placeholder="First Name" name="first_name" required><br>
						<input type="text" placeholder="Last Name" name="last_name" required><br>
						<input type="text" placeholder="Email" name="email" required><br>
						<input type="text" placeholder="Phone Number" name="phone_number" required><br>
						<input type="text" placeholder="Address" name="address" required><br>
						<input type="text" placeholder="City" name="city" required><br>
						<input type="text" placeholder="State" name="state" required><br>
						<input type="text" placeholder="Zip Code" name="zip_code" required><br>
						<input type="text" placeholder="Country" name="country" required><br>
						<input type="submit" formaction="register.php" value="Submit"><br>
					</div>
				</form>
				<?php 
				if (isset($_POST['submit'])) {
				    $userName = $_POST['userName'];
				    $_SESSION['userName'] = $userName;
				    $role = $_POST['role'];
				    $_SESSION['role'] = $role;
				}
				?>
			</div>
		</nav>
		<br><br>
		<div>
          <img src="Pictures/anomaly.jpg" class="card-img-top" alt="" width="200px" height="200px">
          <div>
            <h5 class="card-title">Your quick and easy source for quality shirts!</h5>
          </div>
		</div>
	</section>
	<script>
		function login() {
			var x = document.getElementById("login");
			if (x.style.display === "none") {
				x.style.display = "block";
			} else {
				x.style.display = "none";
			}
		}
		function register() {
			var x = document.getElementById("register");
			if (x.style.display === "none") {
				x.style.display = "block";
			} else {
				x.style.display = "none";
			}
		}
	</script>
</body>
</html>