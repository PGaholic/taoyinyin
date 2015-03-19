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
<form class="form-inline definewidth m20" method="get">  
    商户名称：
    <input type="text" name="name" class="abc input-default" placeholder="查找打印店" value="<?php echo (htmlspecialchars($_GET['name'])); ?>">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增商户</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>账号</th>
        <th>商户名称</th>
        <th>地址</th>
        <th>电话</th>
        <th>操作</th>
    </tr>
    </thead>
        <?php if(is_array($shop)): $i = 0; $__LIST__ = $shop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><tr>
         	<td><?php echo ($s["sname"]); ?></td>
            <td><?php echo ($s["shopname"]); ?></td>
            <td><?php echo ($s["address"]); ?></td>
            <td><?php echo ($s["mobile"]); ?></td>
            <td>
                <?php $editurl = U('edit', array('sid' => $s['sid'])); ?>
                  <a href="<?php echo ($editurl); ?>">编辑</a>  
            </td>
         </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
<div class="inline pull-right page">
    <?php echo ($page); ?>
</div>

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
		
		
		if(confirm("确定要删除吗？"))
		{
		
			var url = "index.html";
			
			window.location.href=url;		
		
		}
	
	
	
	
	}
</script>