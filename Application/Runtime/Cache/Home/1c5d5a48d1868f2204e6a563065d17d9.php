<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>用户信息</title>
    <link rel="stylesheet" href="<?php echo ($static); ?>css/user_form.css"/>
    <link rel="stylesheet" href="<?php echo ($static); ?>css/publicStyle.css"/>
    <script type="text/javascript" src="<?php echo ($static); ?>js/lib/jquery-1.11.1.js"></script>
</head>
<body>
<header class="navi_main">
    <div class="taoyinyin_logo">
        <a href="javascript:;">
            <img src="<?php echo ($static); ?>/img/public_img/logo.png"/>
        </a>
    </div>
</header>
<div class="user_form my_print">
    <ul class="form_tab">
        <li><a href="<?php echo U('user_info'); ?>">用户信息</a></li>
        <li><a href="<?php echo U('create_print'); ?>">新建打印</a></li>
        <li><a href="<?php echo U('history_order'); ?>">我的打印</a>&emsp;<span><?php echo ($length); ?></span></li>
    </ul>

    <div class="color_bar">
        <div class="red_bar"></div>
    </div>

    <form class="form_info" action="" method="post">
        <table class="info_table">
            <thead>
            <tr>
                <td>
                    <input type="submit" class="btn confirm" value="确认修改" />
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td id="username">
                    <span>用户名 ：</span>
                    <div><input type="text" name="nickname" maxlength="20" value="<?php echo ($list["nickname"]); ?>"/></div>
                </td>
            </tr>
            <tr>
                <td id="tel">
                    <span>电话 ：</span>
                    <div><input type="text" name="tel" maxlength="11" value="<?php echo ($list["uname"]); ?>" disabled="disabled" /></div>
                </td>
            </tr>
            <tr>
                <td id="sex">
                    <span>性别 ：</span>
                    <div>
                    	<?php if($list["sex"] == 1): ?><input type="radio" name="sex" value="1" checked="checked"/> 男
                        <input type="radio" name="sex" value="0" /> 女
                      <?php else: ?>
                      	<input type="radio" name="sex" value="1" /> 男
                        <input type="radio" name="sex" value="0" checked="checked"/> 女<?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td id="school">
                    <span>学校 ：</span>
                    <div><input type="text" name="school" maxlength="40" value="<?php echo ($list["school"]); ?>"/></div>
                </td>
            </tr>
            <tr>
                <td id="major">
                    <span>专业 ：</span>
                    <div><input type="text" name="major" maxlength="30" value="<?php echo ($list["major"]); ?>"/></div>
                </td>
            </tr>
            <tr>
                <td id="grade">
                    <span>年级 ：</span>
                    <div>
                        <select name="grade">
                        	<?php $__FOR_START_17896__=0;$__FOR_END_17896__=5;for($i=$__FOR_START_17896__;$i < $__FOR_END_17896__;$i+=1){ if($list["grade"] == $i): ?><option value="<?php echo ($i); ?>" selected="selected">
                            <?php else: ?><option value="<?php echo ($i); ?>"><?php endif; ?>
                            	<?php switch($i): case "0": ?>请选择年级<?php break;?>
                            		<?php case "1": ?>大一<?php break;?>
                            		<?php case "2": ?>大二<?php break;?>
                            		<?php case "3": ?>大三<?php break;?>
                            		<?php case "4": ?>大四<?php break; endswitch;?>
                            </option><?php } ?>
                        <option value="-1">其它</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td id="mail">
                    <span>邮箱 ：</span>
                    <div><input type="email" name="email" maxlength="20" value="<?php echo ($list["email"]); ?>"/></div>
                    <span id="error_mail">邮箱格式不正确！</span>
                </td>
            </tr>
            </tbody>
        </table>
    </form>

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
<script type="text/javascript" src="<?php echo ($static); ?>js/publicScript.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        if ( $("input[type='email']").attr("type") == "email" ) return false;
        $(".confirm").click(function() {
            var search_str = /^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
            var email_val = $("input[type='email']").val();
            if (!search_str.test(email_val) && email_val) {
                $(".form_info").submit(function() { return false; });
                $("#error_mail").css("display", "block");
                $("input[type='email']").focus();
                return false;
            }
        });
    });
</script>
</body>
</html>