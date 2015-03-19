<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>确认打印</title>
    <link rel="stylesheet" href="<?php echo ($static); ?>/css/user_form.css"/>
    <link rel="stylesheet" href="<?php echo ($static); ?>/css/publicStyle.css"/>

    <script type="text/javascript" src="<?php echo ($static); ?>/js/lib/jquery-1.11.1.js"></script>

</head>
<body>
<div class="user_form my_print">
    <ul class="form_tab">
        <li>用户信息</li>
        <li><a href="create_print.html">新建打印</a></li>
        <li><a href="confirm_order.html">确认订单</a>&emsp;<span>0</span></li>
        <li><a href="history_order.html">历史订单</a></li>
    </ul>
    <div class="color_bar">
        <div class="red_bar"></div>
    </div>
    <div class="new_print">
        <img src="<?php echo ($static); ?>/img/user_print/my_print_1.png"/>
        <span>新建打印任务</span>
    </div>
    <div class="classify_section">
        <div class="column_first">打印任务</div>
        <div class="column_second">份数</div>
        <div class="column_third">打印设置</div>
        <div class="column_fourth">总价（元）</div>
        <div class="column_fifth">取货地点</div>
    </div>
    <div class="mission_operate">
        <button class="multi_choice">多选</button>&emsp;
        <button class="mass_delete">批量删除</button>
    </div>

    <div class="order_list">
        <div class="order_header">
            &emsp;<span class="order_index">打印任务:<span>01</span></span>&emsp;
            <span class="order_date">2014-11-26</span>&emsp;
            <span class="order_number">订单号:<span>000000001</span></span>
            <a href="javascript:;" class="amend_order">修改</a>
        </div>
        <div class="single_order">
            <div class="mission_detail column_first">
                <div class="mission_intro">
                    <div class="mission_thumbnail">
                        <img src="<?php echo ($static); ?>/img/user_print/my_print_3.png" alt="缩略图"/>
                    </div>
                    <div class="mission_name">文件名：淘印印的示例.docx</div>
                    <a href="javascript:;" class="mission_delete">删除</a>
                </div>
            </div>
            <div class="single_mission_num column_second">
                1
            </div>
            <div class="single_mission_set column_third">
                <div class="ament_set">
                    <div class="set_range">
                        <input type="radio" name="print_range" class="print_range" checked/>全部页面<br/>
                        <input type="radio" name="print_range" class="print_range"/>范围
                        <input type="text" name="print_page_min" class="print_page_min"/>
                        -
                        <input type="text" name="print_page_max" class="print_page_max"/>
                    </div>
                    <div class="set_paper_size">
                        纸张大小：
                        <select name="paper_size" class="grey_select">
                            <option value="a4">A4</option>
                        </select>
                    </div>
                    <div class="set_paper_detail">
                        <select name="paper_double" class="set_paper_double grey_select">
                            <!--<option value="single">单面</option>-->
                            <option value="double">双面</option>
                        </select>
                        &emsp;
                        <select name="colorful" class="set_paper_color grey_select">
                            <option value="black_white">黑白</option>
                            <!--<option value="colorful">彩色</option>-->
                        </select>
                    </div>
                </div>
                <div class="set_config">

                </div>
            </div>
            <div class="single_mission_price column_fourth">0</div>
            <div class="single_mission_location column_fifth">

            </div>
        </div>

        <div class="order_submit">
            <input type="submit" class="submit_order" value="确认"/>
        </div>
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
<script type="text/javascript" src="<?php echo ($static); ?>/js/publicScript.js"></script>
</body>
</html>