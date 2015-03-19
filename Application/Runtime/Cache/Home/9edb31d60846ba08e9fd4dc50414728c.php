<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" href="<?php echo ($static); ?>/css/login.css"/>
    <link rel="stylesheet" href="<?php echo ($static); ?>/css/common_style.css"/>
    <link rel="stylesheet" href="<?php echo ($static); ?>/css/publicStyle.css"/>
    <script src="<?php echo ($static); ?>/js/lib/jquery-1.11.1.js"></script>
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
            <input type="button" class="login_button"/>
        </div>
        <div class="navi_sign_up">
            <input type="button" class="sign_up_button"/>
        </div>
    </div>
</header>
<div class="full_screen">
    <div class="out_frame certificate_frame">
        <div class="frame_title">
            <span><?php echo ($title); ?></span>
        </div>
        <div class="certificate_img">
            <img src="<?php echo ($static); ?>/img/login/certificate_fail.png"/>
        </div>
        <div class="cetificate_text" style="text-align:center;">
            <?php echo ($content); ?>
        </div>
        <div class="certificate_return">
            <input type="button" class="certificate_return_button" value="返回" onclick="location.href='<?php echo ($jmp); ?>';" />
        </div>
    </div>
</div>
<footer class="taoyinyin_footer">
    <div class="about_web">
        <a href="javascript:;">联系我们</a>
        |
        <a href="javascript:;">版权信息</a>
        |
        <a href="javascript:;">反馈信息</a>
    </div>
    <div class="footer_logo">
        <img src="../img/public_img/footer_logo.jpg"/>
    </div>
</footer>
<script type="text/javascript" src="<?php echo ($static); ?>/js/publicScript.js"></script>
</body>
</html>