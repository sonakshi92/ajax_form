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
<h1 align="center">LOGIN PAGE</h1>
  <h2>Enter Login Details</h2>
  <form class="w3-container" method="post">
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	
	<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="uemail" placeholder="Enter Email" >
    </div>
	<div class="form-group">
      <label for="password"> Password:</label>
      <input type="password" class="form-control" id="upassword" placeholder="Enter Password" >
    </div>
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
 <div class="d-flex justify-content-center links">
	Don't have an account?<?php echo anchor("crud/register", "Register Yourself"); ?>
</div>
</div>
<div id='err_msg' style='display: none'>  
    <div id='content_result'>  
    <div id='err_show' class="w3-text-red">  
    <div id='msg'> </div>  
  </div></div>
</div>  
</form>

<script type="text/javascript">  
  
    // Ajax post  
    $(document).ready(function(){  
    $("#submit").click(function(){  
    var email = $("#uemail").val();  
    var password = $("#upassword").val(); 
    //echo "asaasas";

    // Returns error message when submitted without req fields.  
    if(email==''||password=='')  
    {  
    jQuery("div#err_msg").show();  
    jQuery("div#msg").html("All fields are required");  
    }  
    else  
    {  
    // AJAX Code To Submit Form.  
    $.ajax({  
    type: "POST",  
    url:  "<?php echo base_url("crud/check_login"); ?>" + "",  
    data: {uemail: email, upassword: password},  
    cache: false,  
    success: function(result){
     // console.log("result");  
        if(result!=0){  
            // On success redirect.  
        window.location.replace(result);  
        }  
        else  
            jQuery("div#err_msg").show();  
            jQuery("div#msg").html("Login Failed");  
    }  
    });  
    }
    return false;  
    });  
    });  
</script> 

</body>
</html>