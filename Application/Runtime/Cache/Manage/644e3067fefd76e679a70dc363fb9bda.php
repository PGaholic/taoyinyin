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
<style type="text/css">
.tyy-3{color:red;}.tyy-1{color:blue;}.tyy-2{color:green;}.tyy-0{color:grey;}
</style>
<form class="form-inline definewidth m20" method="post">
    <select name="query" class="selector">  
        <option value="onum">订单号</option>  
        <option value ="user">用户email</option> 
        <option value ="shop">商户账号</option>   
        <option value="mobile">电话</option>  
    </select>
    =
    <input type="text" name="value" class="abc input-default" placeholder="支持模糊查询" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>
</form>
<form id="main-form" method="post" action="<?php echo U('status'); ?>">
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
    	<th></th>
        <th>订单号</th>
        <th>提交时间</th>
        <th>打印店</th>
        <th>收件人</th>
        <th>金额</th>
        <th>修改订单状态</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody id="main-table">
        <?php if(is_array($orders)): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$od): $mod = ($i % 2 );++$i;?><tr>
         	<td><input type="checkbox" class="ids" name="order_id[]" value="<?php echo ($od["rid"]); ?>" /></td>
         	<td><?php echo ($od["rcode"]); ?></td>
            <td><?php echo ($od["time"]); ?></td>
            <td><?php echo ($od["shopname"]); ?></td>
            <td><?php echo ($od["recvname"]); ?></td>
            <td><?php echo ($od["money"]); ?></td>
            <?php $status = array('','','','');$status[$od['status']] = 'selected'; ?>
            <td>
            	<select class="tyy-<?php echo ($od["status"]); ?>" name="<?php echo ($od["rid"]); ?>">  
 					<option value="0" class="tyy-0" <?php echo ($status[0]); ?>>已提交</option>  
                    <option value ="1" class="tyy-1" <?php echo ($status[1]); ?>>已支付</option> 
                    <option value ="2" class="tyy-2" <?php echo ($status[2]); ?>>已完成</option>   
  					<option value="3" class="tyy-3" <?php echo ($status[3]); ?>>用户已取消</option>  
				</select> 
            </td>
            <td>
                <?php $url = U('edit', array('id' => $od['rid'])); ?>
                  <a href="<?php echo ($url); ?>">详情</a> / <a href="<?php echo ($url); ?>">编辑</a>         
            </td>
         </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
    </table>
    <div class="definewidth">
    	<div class="inline pull-left page">
     		<label class="tail"><a href="javascript:void(0)" id="select_all" />全选</a> &nbsp;&nbsp;&nbsp;&nbsp;选中项 : </label>
            <select id="edits" class="selector bottom_batch" name="status">  
				<option value="-1">选择状态</option>  
                <option value="0">已提交</option>  
                <option value ="1">已支付</option> 
                <option value ="2">已完成</option>   
				<option value="3">用户已取消</option>  
			</select>
    	</div>
		<div class="inline pull-right page">
     		<?php echo ($page); ?>
    	</div>
    </div>
</form>
</body>
</html>
<script> 
    $(function () {
        var ch = true;
        $("#main-table select").change(function(e){
            var t = e.currentTarget;
            var status = parseInt($(t).val());
            var rid = t.name;
            $(t).attr('class', 'tyy-' + status);
            $.ajax({
                'url': '<?php echo U("status"); ?>',
                'dataType': 'json',
                'type': 'POST',
                'data': {
                    'ajax': 1,
                    'status': status,
                    'order_id[]': rid
                },
                'success': function(data){
                    //alert(data.info);
                }
            })
        });
        $("#edits").change(function(e){
            $("#main-form").submit();
        });
        $("#select_all").click(function(){
            var list = document.getElementsByClassName("ids");
            for(var i in list){
                list[i].checked = ch;
            }
            ch = !ch;
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