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
      <table class="table table-bordered table-hover definewidth m10">
        <tr>
          <td width="10%" class="tableleft">管理员账户</td>
          <td><input type="text" name="uname"/></td>
        </tr>
         <tr>
          <td width="10%" class="tableleft">密码</td>
          <td><input type="password" name="upass"/></td>
        </tr>
        <tr>
          <td class="tableleft">状态</td>
          <td><input type="radio" name="status" value="1" checked/>
            启用
            <input type="radio" name="status" value="0"/>
            禁用 </td>
        </tr>
        <tr>
          <td class="tableleft">权限</td>
          <td><ul>
              <li>
              <label class='checkbox inline'>
                  <input type='checkbox' name='user[]' value='' />
                  用户管理</label>
              <ul>
                  <li>
                  <label class='checkbox inline'>
                      <input type='checkbox' name='user[]' value='9' />
                      用户列表</label>
                </li>
                  <li>
                  <label class='checkbox inline'>
                      <input type='checkbox' name='user[]' value='10' />
                      用户添加</label>
                </li>
                  <li>
                  <label class='checkbox inline'>
                      <input type='checkbox' name='user[]' value='11' />
                      用户编辑</label>
                </li>
                  <li>
                  <label class='checkbox inline'>
                      <input type='checkbox' name='user[]' value='12' />
                      用户删除</label>
                </li>
                </ul>
            </li>
              <li>
              <label class='checkbox inline'>
                  <input type='checkbox' name='merchant[]' value='' />
                  商户管理</label>
              <ul>
                  <li>
                  <label class='checkbox inline'>
                      <input type='checkbox' name='merchant[]' value='13' />
                      商户列表</label>
                </li>
                  <li>
                  <label class='checkbox inline'>
                      <input type='checkbox' name='merchant[]' value='14' />
                      商户新增</label>
                </li>
                  <li>
                  <label class='checkbox inline'>
                      <input type='checkbox' name='merchant[]' value='15' />
                      商户编辑</label>
                </li>
                  <li>
                  <label class='checkbox inline'>
                      <input type='checkbox' name='merchant[]' value='16' />
                      商户删除</label>
                </li>
                </ul>
            </li>
              <li>
              <label class='checkbox inline'>
                  <input type='checkbox' name='order[]' value='' />
                  订单管理</label>
              <ul>
                  <li>
                  <label class='checkbox inline'>
                      <input type='checkbox' name='order[]' value='5' />
                      订单列表列表</label>
                </li>
                  <li>
                  <label class='checkbox inline'>
                      <input type='checkbox' name='order[]' value='6' />
                      订单添加</label>
                </li>
                  <li>
                  <label class='checkbox inline'>
                      <input type='checkbox' name='order[]' value='7' />
                      订单编辑</label>
                </li>
                  <li>
                  <label class='checkbox inline'>
                      <input type='checkbox' name='order[]' value='8' />
                      订单删除</label>
                </li>
                </ul>
            </li>
            </ul></td>
        </tr>
        <tr>
          <td class="tableleft"></td>
          <td><button type="submit" class="btn btn-primary">保存</button>
            &nbsp;&nbsp;
            <button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button></td>
        </tr>
      </table>
    </form>
</body>
</html>
<script>
    $(function () {
        $(':checkbox[name="user[]"],:checkbox[name="merchant[]"],:checkbox[name="order[]"]').click(function () {
            $(':checkbox', $(this).closest('li')).prop('checked', this.checked);
        });

		$('#backid').click(function(){
				location.href='<?php echo ($default_page); ?>';
		 });
    });
</script>