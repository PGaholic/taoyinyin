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
<table class="table table-bordered table-hover ">
    <tr>
        <td width="10%" class="tableleft">订单号</td>
		<td ><?php echo ($order["rcode"]); ?></td>
    </tr>
     <tr>
        <td class="tableleft">提交时间</td>
		<td ><?php echo ($order["time"]); ?></td>
    </tr>
    <tr>
        <td class="tableleft">用户名（邮箱）</td>
        <td ><?php echo ($user["email"]); ?></td>
    </tr> 
    <tr>
        <td class="tableleft">收件人</td>
        <td ><input type="text" name="recvname" value="<?php echo ($order["recvname"]); ?>" /></td>
    </tr>  
    <tr>
        <td class="tableleft">订单手机号</td>
        <td ><input type="text" name="mobile" value="<?php echo ($order["order_mobile"]); ?>" /></td>
    </tr> 
    <tr>
        <td class="tableleft">配送地址</td>
        <td ><input type="text" name="address" style="width: 50%;" value="<?php echo ($order["order_address"]); ?>" /></td>
    </tr> 
    <tr>
        <td class="tableleft">用户留言</td>
        <td ><?php echo ($order["message"]); ?></td>
    </tr> 
    <tr>
        <td class="tableleft">商家名称</td>
        <td ><?php echo ($order["shopname"]); ?></td>
    </tr> 
    <tr>
        <td class="tableleft">金额</td>
        <td ><input type="text" name="money" style="width: 10%;" value="<?php echo ($order["order_money"]); ?>" /></td>
    </tr> 
    <tr>
        <td class="tableleft">份数</td>
        <td ><input type="text" name="amount" style="width: 10%;" value="<?php echo ($order["amount"]); ?>" /></td>
    </tr> 
    <tr>
        <td class="tableleft">文档下载</td>
        <td ><a target="_blank" href="<?php echo U('/Manage/Attachment/Download', array('id' => $order['attach'])); ?>">点击下载</a></td>
    </tr>  
    <tr>
        <?php $status = array('','','','');$status[$order['status']] = 'checked'; ?>
        <td class="tableleft">订单状态</td>
        <td >
        	<input type="radio" name="status" value="0" <?php echo ($status[0]); ?> /> 已提交&nbsp;&nbsp;
            <input type="radio" name="status" value="1" <?php echo ($status[1]); ?> /> 已支付&nbsp;&nbsp;
        	<input type="radio" name="status" value="2" <?php echo ($status[2]); ?> /> 已完成&nbsp;&nbsp;
      		<input type="radio" name="status" value="3" <?php echo ($status[3]); ?> /> 用户已取消
        </td>
    </tr>
    <?php if($order[status] > 1): ?><tr>
        <td class="tableleft">完成时间</td>
        <td ><?php echo ($order["finish_time"]); ?></td>
        </tr><?php endif; ?>
    <tr>
        <td class="tableleft"></td>
        <td>
        	<button type="submit" class="btn btn-primary">保存</button>&nbsp;&nbsp;
            <button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            <button type="button" class="btn btn-danger" name="delete" id="delete">删除</button>
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
		$('#delete').click(function(){
			if(confirm("确定要删除吗？")){
				$("#form1").attr("action","");
				$("#form1").submit();
				var url = "index.html";	
				window.location.href=url;	
			}
		});
    });
</script>