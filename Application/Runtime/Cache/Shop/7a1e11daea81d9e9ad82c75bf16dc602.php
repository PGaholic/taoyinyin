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
<form method="post" class="definewidth m20">
<input type="hidden" name="id" value="" />
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft">账户</td>
        <td ><?php echo ($shop["sname"]); ?></td>
    </tr>  
    <tr>
        <td class="tableleft">密码</td>
        <td ><input type="password" name="upass" placeholder="不修改则不需填写" /></td>
    </tr> 
    <tr>
        <td class="tableleft">商户名称</td>
        <td ><input type="text" name="shopname" value="<?php echo ($shop["shopname"]); ?>"/></td>
    </tr>
    <tr>
        <td class="tableleft">电话</td>
        <td ><input type="text" name="mobile" value="<?php echo ($shop["mobile"]); ?>"/></td>
    </tr> 
    <tr>
        <td class="tableleft">地址</td>
        <td ><input type="text" name="address" value="<?php echo ($shop["address"]); ?>"/></td>
    </tr> 
    <tr>
        <td class="tableleft">负责人姓名</td>
        <td ><input type="text" name="boss" value="<?php echo ($shop["boss"]); ?>"/></td>
    </tr> 
    <tr>
        <td class="tableleft">邮箱</td>
        <td ><input type="text" name="email" value="<?php echo ($shop["email"]); ?>"/></td>
    </tr>
    <tr>
        <td class="tableleft">简介</td>
        <td><textarea name="detail" rows="5" style="width:40%;resize: none;"><?php echo ($shop["detail"]); ?></textarea></td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary">保存</button>&nbsp;&nbsp;
        </td>
    </tr>
</table>
</form>
</body>
</html>