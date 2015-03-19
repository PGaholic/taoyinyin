<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>我的打印</title>
    <link rel="stylesheet" href="<?php echo ($static); ?>css/user_form.css"/>
    <link rel="stylesheet" href="<?php echo ($static); ?>css/publicStyle.css"/>
    <script type="text/javascript" src="<?php echo ($static); ?>js/lib/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="<?php echo ($static); ?>js/lib/handlebars.js"></script>
</head>
<body>
<header class="navi_main">
    <div class="taoyinyin_logo">
        <a href="javascript:;">
            <img src="<?php echo ($static); ?>/img/public_img/logo.png"/>
        </a>
    </div>
</header>
<div class="user_form my_print">
    <ul class="form_tab">
        <li><a href="<?php echo U('user_info'); ?>">用户信息</a></li>
        <li><a href="<?php echo U('create_print'); ?>">新建打印</a></li>
        <li><a href="<?php echo U('history_order'); ?>">我的打印</a>&emsp;<span><?php echo ($length); ?></span></li>
    </ul>
    <div class="color_bar">
        <div class="red_bar history_slide_bar"></div>
    </div>
    <div class="classify_section">
        <div class="column_first">打印任务</div>
        <div class="column_second">份数</div>
        <div class="column_third">打印设置</div>
        <div class="column_fourth">总价（元）</div>
        <div class="column_fifth">取地点</div>
    </div>

    <div class="order_list">
    	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$da): $mod = ($i % 2 );++$i; if(is_array($da)): $i = 0; $__LIST__ = $da;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="single_mission">
    			<?php if(in_array(($i), explode(',',"1"))): ?><div class="order_header">
                &nbsp;
                <span class="order_date">下单时间:<span><?php echo ($vo["time"]); ?></span></span>&emsp;
                <span class="order_number">订单号:<span><?php echo ($vo["rcode"]); ?></span></span>
            </div><?php endif; ?>
        
            <div class="single_order">
                <div class="mission_detail history_first">
                    <div class="mission_intro">
                        <div class="mission_thumbnail">
                            <img src="<?php echo ($static); ?>img/user_print/my_print_3.png" alt="缩略图"/>
                        </div>
                        <div class="mission_name">
                            <span><?php echo ($vo["file_name"]); ?></span><br/>
                            <span><?php echo ($vo["paper_size"]); ?>&emsp;
                            	    <?php if($vo["is_double"] == 2): ?>双面<?php else: ?>单面<?php endif; ?>&emsp;
                            	    <?php if($vo["paper_color"] == 0): ?>黑白<?php else: ?>彩印<?php endif; ?>
                            </span>
                        </div>

                        <a href="javascript:;" class="mission_delete">删除</a>
                    </div>
                </div>
                <div class="single_mission_num history_second">
                    1
                </div>
                <div class="single_state history_third">
                    <div class="state_text">打印店已接单，正在打印请稍后...</div>
                </div>
                <div class="single_mission_price history_fourth">0</div>
                <div class="single_mission_location history_fifth">
                    <?php echo ($vo["address"]); ?>
                </div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>

    </div>
</div>
<footer class="footer">
    <div class="about_web">
        <a href="javascript:;">联系我们</a>
        |
        <a href="javascript:;">版权信息</a>
        |
        <a href="javascript:;">反馈信息</a>
    </div>
    <div class="footer_logo">
        <img src="<?php echo ($static); ?>/img/public_img/footer_logo.jpg"/>
    </div>
</footer>
<script type="text/javascript" src="<?php echo ($static); ?>js/publicScript.js"></script>
<script type="text/javascript" src="<?php echo ($static); ?>js/history.js"></script>
</body>
</html>