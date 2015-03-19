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
	<form class="form-inline definewidth m20" action="index.html" method="get">  
    管理员账号：<input type="text" name="rolename" id="rolename"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增管理员</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>账号</th>
        <th>登录IP</th>
        <th>操作</th>
    </tr>
    </thead>
    	<?php if(is_array($admin)): $i = 0; $__LIST__ = $admin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($i % 2 );++$i; $url = U('/Manage/System/Edit', array('aid' => $ad['aid'])); ?>
	     <tr>
            <td><?php echo ($ad["name"]); ?></td>
            <td><?php echo ($ad["lastip"]); ?></td>
            <td><a href="<?php echo ($url); ?>">编辑</a> | <a href="javascript:del('<?php echo ($ad["aid"]); ?>')">删除用户</a></td>
         </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
		</body>
		</html>

<script>
    $(function () {
		$('#addnew').click(function(){
				window.location.href="add.html";
		 });
    });

	function del(id)
	{
		<?php $del = U('/Manage/System/Del'); ?>
		if(confirm("确定要删除吗？"))
		{
			var url = '<?php echo ($del); ?>?aid=' + id;
			window.location.href=url;		
		}	
	}
</script>