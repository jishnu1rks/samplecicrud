
	<div class="container">
		<h1>Registration Form</h1>
		<form action="" method="POST">
		<div class="form-group">
			<label for="">Full Name</label>
			<input type="text" name="fullname" placeholder="Enter Full Name" id="fullname" required="">
		</div>
		<div class="form-group">
			<label for="">User Name</label>
			<input type="text" name="username" placeholder="Enter User Name" id="username" required="">
		</div>
		<div class="form-group">
			<label for="">Password</label>
			<input type="password" name="password" placeholder="Enter Password" id="password" required="">
		</div>
		<input type="hidden" id="log_id" name="login_id">
		<input type="submit" value="Submit" class="btn btn-success" id="add" name="add">
	
	</form>


		
	<a href="<?php echo base_url().'home/login'; ?>"><em>Click here to Login</em></a>
	

		<h1>View Registrated Candidates</h1>
		<hr>
	<table class="table ">
		<thead>
			<tr>
				<th>Sl.NO</th>
				<th>Full Name</th>
				<th>User Name</th>
				<th>Password</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$i = 1 ;
				foreach($candidates as $candidate){
					$id = $candidate->login_id;
					$name = $candidate->login_fullname;
					$uname = $candidate->login_username;
					$password = $candidate->login_password;
			 ?>
			<tr>
				<td><?php  echo $i ; ?></td>
				<td><?php echo $name; ?></td>
				<td><?php echo $uname; ?></td>
				<td><?php echo $password; ?></td>
				<td style="width:20%;">
					<button class="btn btn-warning" onclick="update(<?php echo $id; ?>,'<?php echo $name ; ?>','<?php echo $uname ; ?>','<?php echo $password ; ?>')">Update</button>
					&emsp;
					<form action="" method="POST" style="display:inline;"><input type="submit" class="btn btn-danger" value="Delete" name="del"><input type="hidden" name="cand_id" value="<?php echo $id; ?>"></form>
				</td>
			</tr>
			<?php 

				$i++;
			}
			 ?>
		</tbody>
	</table>

	</div>

	<script>
		function update(id,name,uname,password){
			$('#fullname').val(name);
			$('#username').val(uname);
			$('#password').val(password);
			$('#log_id').val(id);
			$('#add').val('Update');

		}
	</script>
