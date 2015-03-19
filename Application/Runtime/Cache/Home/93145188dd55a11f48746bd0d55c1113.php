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

<script type="text/javascript" src="<?php echo ($static); ?>/js/publicScript.js"></script>
</body>
</html>