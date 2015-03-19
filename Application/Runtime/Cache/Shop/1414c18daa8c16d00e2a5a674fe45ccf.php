<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
	<title><?php echo ($cache["site_name"]); ?> - 后台管理</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="<?php echo ($www); ?>assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo ($www); ?>assets/css/bui-min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo ($www); ?>assets/css/main-min.css" rel="stylesheet" type="text/css" />
 </head>

 <body>

	<div class="header">
    
		<div class="dl-title">
		<!--<img src="/chinapost/Public/assets/img/top.png">-->
		</div>

		<div class="dl-log">
			欢迎您，<span class="dl-log-user"><?php echo ($myadmin["sname"]); ?></span>
			<a href="<?php echo U('logout'); ?>" title="退出系统" class="dl-log-quit">[退出]</a>
		</div>
	</div>
	
	<div class="content">
		<div class="dl-main-nav">
			<div class="dl-inform">
				<div class="dl-inform-title">
					<s class="dl-inform-icon dl-up"></s>
				</div>
			</div>
			
			<ul id="J_Nav"  class="nav-list ks-clear">   
				<li class="nav-item dl-selected"><div class="nav-item-inner nav-cost">个人管理</div></li>
                <li class="nav-item dl-selected"><div class="nav-item-inner nav-order">订单管理</div></li>
			</ul>
		</div>
    
		<ul id="J_NavContent" class="dl-tab-conten">
		</ul>
	</div>

	<script type="text/javascript" src="<?php echo ($www); ?>assets/js/jquery-1.8.1.min.js"></script>
	<script type="text/javascript" src="<?php echo ($www); ?>assets/js/bui-min.js"></script>
	<script type="text/javascript" src="<?php echo ($www); ?>assets/js/common/main-min.js"></script>
	<script type="text/javascript" src="<?php echo ($www); ?>assets/js/config-min.js"></script>
	<script>
		BUI.use('common/main',function(){
			var config = [ {id:'1',homePage:'2',menu:[{text:'个人管理',items:[{id:'2',text:'个人管理',href:'<?php echo ($config[0]); ?>'}]}]},
						   {id:'3',homePage:'4',menu:[{text:'订单管理',items:[{id:'4',text:'订单列表',href:'<?php echo ($config[1]); ?>'}]}]}
						 ];
			new PageUtil.MainPage({ modulesConfig : config});			   
		});
	</script>
 </body>
</html>