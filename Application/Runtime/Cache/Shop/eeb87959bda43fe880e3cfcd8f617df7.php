<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title><?php echo ($cache["site_name"]); ?> - 后台登录</title>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo ($www); ?>/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ($www); ?>/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ($www); ?>/Public/Css/style.css" />
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 300px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }
        .captcha input[type="text"]{
            margin: 0;
        }
        .captcha img{
            margin: 0;
        }

    </style>  
</head>
<body>
<div class="container">
    <form class="form-signin" method="post">
        <h2 class="form-signin-heading">登录系统</h2>
        <p><?php echo ($alert); ?></p>
        <input type="text" name="uname" class="input-block-level" placeholder="账号">
        <input type="password" name="upass" class="input-block-level" placeholder="密码">
        <span class="captcha">
            <input type="text" name="captcha" class="input-medium" placeholder="验证码">
            <img src="<?php echo U('captcha'); ?>" style="width:120px;height:auto;cursor:pointer;" onclick="this.src='<?php echo U('captcha'); ?>?' + Math.random();">
        </span>
        <p style="margin-top: 10px;"><button class="btn btn-large btn-primary" type="submit">登录</button></p>
    </form>

</div>
</body>
</html>