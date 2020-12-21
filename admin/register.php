<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员登录</title>
<link href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
<link href="css/login.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">
<script type="application/javascript">
function log_or_reg(){
	location.href="login.php";
	}
</script>
</head>
<body>
<div style="height:500px;">
<form class="login_form_a" action="reg_check.php" method="post">
    <div class="login_img">
      <img src="images/1234.png" alt="图片丢失" style="border-radius:50%;width:40%">
    </div>

    <div style="padding:16px;">
    
    <div class="form-group">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user_name" class="form-control">
      </div>

      <div class="form-group">
      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="user_pass" class="form-control">
      </div>
      
      
      <div class="form-group">
       <label><b>makesure Password</b></label>
      <input type="password" placeholder="Enter Password" name="user_pass2" class="form-control">
      </div>

       
       <div class="form-group">
       <label><b>email</b></label>
      <input type="email" placeholder="Enter email" name="user_email" class="form-control">
      </div>
        
      <button type="submit" >注册</button>
      <input type="checkbox" checked="checked"> 记住我
    </div>

    <div style="background-color:#f1f1f1;padding:16px;">
      <button type="button"  onClick="log_or_reg()" class="login_register_btn">登录</button>
      <span style="float: right;padding-top:16px;">Forgot <a href="#">password?</a></span>
  </div>
  </form>
</div>
</body>
</html>