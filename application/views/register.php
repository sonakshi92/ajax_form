<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h1 align="center"> SIGN UP </h1>
  <h2> Enter Data</h2>
  <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
  <form id="signupForm" name="signupForm" method="POST">
	
	<div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
	<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>
	<div class="form-group">
      <label for="password"> Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" id="butsave">Submit</button><br><br>
</form>
<div class="d-flex justify-content-center links">
	Already have an account?<?php echo anchor("crud/login", "Login"); ?>
</div>
<script>
$(document).ready(function() {
	$('#butsave').on('click', function() {
		var name = $('#name').val();
		var email = $('#email').val();
		var password = $('#password').val();
		if(name!="" && email!="" && password!=""){
			$("#butsave").attr("disabled", "disabled");
			$.ajax({
				url: "<?php echo base_url("Crud/savedata");?>",
				type: "POST",
				data: {
					type: 1,
					name: name,
					email: email,
					password: password
				},
				cache: false,
				success: function(response){
					//console.log(response); return false; 
					// var dataResult = JSON.parse(dataResult);
					// if(dataResult.statusCode==200){
					// 	$("#butsave").removeAttr("disabled");
					// 	$('#fupForm').find('input:text').val('');
					// 	$("#success").show();
					// 	$('#success').html('Data added successfully !'); 						
					// }
					// else if(dataResult.statusCode==201){
					//    alert("Error occured !");
					// }
					if(response == 'success'){
						console.log('coming fine');
						$('#signupForm').trigger("reset");

						$("#success").show();
						$("#butsave").removeAttr("disabled");
						$('#success').html('Data added successfully !');
						$('#signupForm').find('input:text').val(''); 	
					}else{
						console.log('error');
						alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>
</body>
</html>