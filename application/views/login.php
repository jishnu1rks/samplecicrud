<div class="container">
	<h1>Login </h1>
	<?php echo validation_errors(); ?>
	<form action="" method="POST" class="form-inline">
		<div class="form-group ">
			<label for="">User Name</label>
			<input type="text" class="form-control" name="uname" placeholder="Enter User Name">
		</div>
		<div class="form-group">
			<label for="">Password</label>
			<input type="password" class="form-control" name="password" placeholder="Enter Password">
		</div>
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="exampleCheck1">
			<label class="form-check-label">Remember</label>
		</div>
		<input type="submit" value="Login" class="btn btn-success" name="login">

		<?php echo @$message ; ?>
	</form>
</div>