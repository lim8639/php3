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

	location.href="register.php";

	}
//还未找到错误此处
/*function log() {

        var user_name = document.getElementById("user_name")[0].value;
        var user_pass = document.getElementById("user_pass")[0].value;
        if (user_name.trim().length < 1 ) {
            alert("请输入用户名！");
            location.href = "login.php";
            return false;

        }
        if (user_pass== "" || user_pass == NULL) {
            alert("请输入密码！");
            return false;
            location.href = "login.php";
        }
    }*/

</script>
</head>

<body>

<div style="height:500px;">
<form class="login_form_a" action="log_check.php" method="post">
    <div class="login_img">
      <img src="images/1234.png" alt="图片丢失" style="border-radius:50%;width:40%">
    </div>

    <div style="padding:16px;">

      <div class="form-group">
      <label for="exampleInputEmail1"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user_name" id="user_name" class="form-control">
       </div>
       
        <div class="form-group">
      <label for="exampleInputEmail1"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="user_pass"  id="user_pass" class="form-control">
        </div>
        
      <button type="submit" id="submit">登陆</button>
      <input type="checkbox" checked="checked"> 记住我
    </div>

    <div style="background-color:#f1f1f1;padding:16px;">
      <button type="button"  onClick="log_or_reg()" class="login_register_btn">注册</button>
      <span style="float: right;padding-top:16px;">Forgot <a href="#">password?</a></span>
  </div>
  </form>
</div>
</body>
</html>