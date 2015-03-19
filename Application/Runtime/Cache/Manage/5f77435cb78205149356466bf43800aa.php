<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo ($www); ?>Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ($www); ?>Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ($www); ?>Public/Css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ($www); ?>Public/Css/taoyy.css" />
    <script type="text/javascript" src="<?php echo ($www); ?>Public/Js/jquery-1.9.1.min.js"></script>

    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
/*        #delete {
            float: right;
        }*/
    </style>
</head>
<body>
<form method="post">
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft">ID</td>
        <td></td>
    </tr>
    <tr>
        <td class="tableleft">用户名（手机号）</td>
        <td ><input type="text" name="uname" value=""/></td>
    </tr>  
    <tr>
        <td class="tableleft">密码</td>
        <td ><input type="password" name="passwd" value=""/></td>
    </tr> 
    <tr>
        <td class="tableleft">邮箱</td>
        <td ><input type="text" name="email" value=""/></td>
    </tr> 
    <tr>
        <td class="tableleft">地址</td>
        <td ><input type="text" name="address" value=""/></td>
    </tr> 
    <tr>
        <td class="tableleft">学校</td>
        <td ><input type="text" name="school" value=""/></td>
    </tr> 
    <tr>
        <td class="tableleft">年级</td>
        <td ><input type="text" name="grade" value=""/></td>
    </tr> 
    <tr>
        <td class="tableleft">积分</td>
        <td ><input type="text" name="point" value=""/></td>
    </tr> 
    <tr>
        <td class="tableleft">状态</td>
        <td>
            <input type="radio" name="used" value="1" checked/> 启用
            <input type="radio" name="used" value="0"/> 禁用
        </td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">保存</button>&nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="<?php echo ($default_page); ?>";
		 });

    });
</script>