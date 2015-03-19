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
<style type="text/css">
input{width:40%;}
</style>
<body>
<form method="post" class="definewidth m20">
<input type="hidden" name="id" value="" />
<table class="table table-bordered table-hover ">
    <tr>
        <td width="20%" class="tableleft">SEO设置</td>
      	<td></td>
    </tr>
    <tr>
        <td class="tableleft">标题</td>
        <td ><input type="text" name="title" value="<?php echo ($option["site_name"]); ?>"/></td>
    </tr>  
    <tr>
        <td class="tableleft">描述</td>
        <td ><textarea rows="3" style="resize:none;width:40%;" name="description"><?php echo ($option["site_descript"]); ?></textarea></td>
    </tr> 
    <tr>
        <td class="tableleft">关键词</td>
        <td ><input type="text" name="keyword" value="<?php echo ($option["site_keyword"]); ?>"/></td>
    </tr> 
    <tr>
        <td class="tableleft">网站设置</td>
        <td ></td>
    </tr> 
    <tr>
        <td class="tableleft">地址</td>
        <td ><input type="text" name="domain" value="<?php echo ($option["site_url"]); ?>" placeholder="http://xxxx/" /></td>
    </tr> 
    <tr>
        <td class="tableleft">管理员邮箱</td>
        <td ><input type="text" name="adminemail" value="<?php echo ($option["root_email"]); ?>"/></td>
    </tr> 
    <tr>
        <td class="tableleft">备案号</td>
        <td ><input type="text" name="icpcode" value="<?php echo ($option["icp_code"]); ?>"/></td>
    </tr> 
    <tr>
        <td class="tableleft">统计代码</td>
        <td ><textarea rows="5" style="resize:none;width:40%;" name="statcode"><?php echo ($option["stat_code"]); ?></textarea></td>
    </tr> 
    <tr>
        <td class="tableleft">随机安全码</td>
        <td ><input type="text" name="authkey" value="<?php echo ($auth_key); ?>" /></td>
    </tr> 
    <tr>
        <?php $check = array('', '');$check[$option['web_open']] = 'checked'; ?>
        <td class="tableleft">网站开关</td>
        <td >
            <input type="radio" name="web_open" value="1" <?php echo ($check[1]); ?> /> 启用
           <input type="radio" name="web_open" value="0" <?php echo ($check[0]); ?> /> 禁用
        </td>
    </tr>
    <tr>
        <?php $check = array('', '');$check[$option['reg_open']] = 'checked'; ?>
        <td class="tableleft">注册开关</td>
        <td >
            <input type="radio" name="reg_open" value="1" <?php echo ($check[1]); ?> /> 启用
           <input type="radio" name="reg_open" value="0" <?php echo ($check[0]); ?> /> 禁用
        </td>
    </tr>
    <tr>
        <?php $check = array('', '');$check[$option['print_open']] = 'checked'; ?>
        <td class="tableleft">打印业务</td>
        <td >
            <input type="radio" name="print_open" value="1" <?php echo ($check[1]); ?> /> 启用
           <input type="radio" name="print_open" value="0" <?php echo ($check[0]); ?> /> 禁用
        </td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary">保存</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="index.html";
		 });

    });
</script>