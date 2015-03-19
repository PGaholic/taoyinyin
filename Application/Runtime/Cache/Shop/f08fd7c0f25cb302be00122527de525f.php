<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
	<title><?php echo ($title); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="<?php echo ($www); ?>assets/css/dpl-min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo ($www); ?>assets/css/main-min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ($www); ?>Public/Css/taoyy.css">
 </head>

 <body class="error_body">
	<div class="main">
		<div class="header"><span><?php echo ($title); ?></span></div>
		<div class="content">
			<p class="error_info"><?php echo ($content); ?></p>
			<p><a href="<?php echo ($jmp); ?>">返回上页</a></p>
		</div>
	</div>
 </body>