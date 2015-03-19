<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>淘印印用户注册</title>
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
    <div class="out_frame sign_up_frame" id="base-form">
        <div class="frame_title">
            <span>淘印印用户注册</span>
        </div>
        <form class="frame_form" method="post" id="inputin">
            <div class="form_input">
                <div class="form_input_single">
                    <span>&nbsp;手&ensp;机&ensp;号：</span>
                    <input type="phone" class="user_name" name="uname" />
                </div>
                <div class="form_input_single">
                    <span>&nbsp;密&emsp;&emsp;码：</span>
                    <input type="password" class="user_passw" name="upass" />
                </div>
                <div class="form_input_single">
                    <span>&nbsp;重复密码：</span>
                    <input type="password" class="user_passw passw_repeat" name="repass" />
                </div>
                <div class="form_input_single">
                    <span>&nbsp;验&ensp;证&ensp;码：</span>
                    <input type="text" class="user_captcha" name="captcha" />
                    <div class="sign_up_captcha"><img src="<?php echo U('captcha'); ?>" style="cursor: pointer;" onclick="this.src='<?php echo U('captcha'); ?>?' + Math.random()"></div>
                </div>
            </div>
            <div class="sign_up_agree">
                <input type="checkbox" name="agrement"/>
                <span class="state_text">我已阅读最终用户许可协议，并同意协议相关内容。</span>
            </div>
            <div class="submitButton">
                <input type="button" class="login_submit" id="convert" value="注册"/>
            </div>
        </form>
    </div>
    <div class="out_frame phone_certificate_frame" id="mobile-form">
        <div class="frame_title">
            <span>手机验证</span>
        </div>
        <form class="frame_form" action="" method="post">
            <div class="form_input">
                <div class="form_input_single">
                    <span>&nbsp;手机号：</span>
                    <input type="text" id="checkname" disabled />
                    <div class="send_captcha">
                        <input type="button" class="captcha_button" id="send-mcode" value="发送验证"/>
                    </div>
                </div>
                <div class="form_input_single">
                    <span>&nbsp;验证码：</span>
                    <input type="password" class="user_passw" name="mobile_code"/>
                </div>
            </div>
            <div class="not_receive">
                <span class="not_receive_text">没有收到？<br/>
                    60s后可以<a href="javascript:;">重新发送</a>验证码</span>
            </div>
            <div class="submitButton">
                <input type="submit" class="login_submit" value="验证"/>
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
<script type="text/javascript">
$(document).ready(function(){
    $("#convert").click(function(){
        var post = $("#inputin").serialize();
        $.ajax({
            'dataType': 'json',
            'data': post,
            'type': 'post',
            'url': '<?php echo U('checksign'); ?>',
            'success': function(data){
                if ( parseInt(data.succ) > 0 ) {
                    var uname = $("input[name='uname']").val();
                    $("#checkname").val(uname);
                    $("#base-form").fadeOut('normal', function(){
                        $("#mobile-form").fadeIn('normal');
                    });
                }else{
                    alert(data.info);
                }                
            }
        })
    });
    $("#send-mcode").click(function(){
        $.ajax({
            'dataType': 'text',
            'data': '',
            'type': 'post',
            'url': '<?php echo U('send_mcode'); ?>',
            'success': function(data){
                data = parseInt(data);
                if (data > 0) {
                    $("#send-mcode").attr('disabled', true);
                    setTimeout(function(){
                        $("#send-mcode").attr('disabled', false);
                    }, 60000);
                }
            }
        });
    }); 
});
</script>
<script type="text/javascript" src="<?php echo ($static); ?>/js/publicScript.js"></script>
</body>
</html>