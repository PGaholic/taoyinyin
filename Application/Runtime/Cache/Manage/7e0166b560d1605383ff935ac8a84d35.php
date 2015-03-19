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
    用户名：
    <input type="text" name="uname" class="abc input-default" placeholder="支持模糊查询" value="<?php echo (htmlspecialchars($_GET['uname'])); ?>">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增用户</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>ID</th>
        <th>手机号</th>
        <th>邮箱</th>
        <th>积分</th>
        <th>学校</th>
        <th>年级</th>
        <th>操作</th>
    </tr>
    </thead>
        <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><tr>
         	<td><?php echo ($u["uid"]); ?></td>
            <td><?php echo ($u["uname"]); ?></td>
            <td><?php echo ($u["email"]); ?></td>
            <td><?php echo ($u["point"]); ?></td>
            <td><?php echo ($u["school"]); ?></td>
            <td><?php echo ($u["grade"]); ?></td>
            <td>
                <?php $edit = U('edit', array('id' => $u['uid'])); ?>
                <a href="<?php echo ($edit); ?>">编辑</a>
                  
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