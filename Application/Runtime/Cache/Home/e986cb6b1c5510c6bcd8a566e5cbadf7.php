<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>淘印印登陆</title>
    <link rel="stylesheet" href="<?php echo ($static); ?>/css/login.css"/>
    <link rel="stylesheet" href="<?php echo ($static); ?>/css/publicStyle.css"/>
    <link rel="stylesheet" href="<?php echo ($static); ?>/css/common_style.css">
    <script type="text/javascript" src="<?php echo ($static); ?>/js/lib/jquery-1.11.1.js"></script>
</head>
<body>
<header class="navi_main">
    <div class="taoyinyin_logo">
        <a href="javascript:;">
            <img src="<?php echo ($static); ?>/img/public_img/logo.png"/>
        </a>
    </div>
    <div class="navi_button">
        <div class="navi_log_in">
            <input type="button" class="login_button" onclick="location.href='<?php echo U('/Home/Sign/login'); ?>';" />
        </div>
        <div class="navi_sign_up">
            <input type="button" class="sign_up_button" onclick="location.href='<?php echo U('/Home/Sign/register'); ?>';" />
        </div>
    </div>
</header>
<div class="full_screen">
    <div class="out_frame login_frame">
        <div class="frame_title">
            <span>淘印印会员登录</span>
        </div>
        <form class="frame_form" action="" method="post">
            <div class="form_input">
                <div class="form_input_single">
                    <span>&nbsp;手机号：</span>
                    <input type="text" class="user_name" name="uname"/>
                </div>
                <div class="form_input_single">
                    <span>&nbsp;密&emsp;码：</span>
                    <input type="password" class="user_passw" name="upass" />
                </div>
            </div>
            <div class="login_state">
                <input type="checkbox" name="loginState"/>
                <span class="state_text">保持登录状态？</span>
            </div>
            <div class="submitButton">
                <input type="submit" class="login_submit" value="登陆"/>
            </div>
        </form>
    </div>
</div>
<footer class="footer">
    <div class="about_web">
        <a href="javascript:;">联系我们</a>
        |
        <a href="javascript:;">版权信息</a>
        |
        <a href="javascript:;">反馈信息</a>
    </div>
    <div class="footer_logo">
        <img src="<?php echo ($static); ?>/img/public_img/footer_logo.jpg"/>
    </div>
</footer>
<script type="text/javascript" src="<?php echo ($static); ?>/js/login.js"></script>
<script type="text/javascript" src="<?php echo ($static); ?>/js/publicScript.js"></script>
</body>
</html>