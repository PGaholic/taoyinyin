<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>新建打印</title>
    <link rel="stylesheet" href="<?php echo ($static); ?>css/user_form.css"/>
    <link rel="stylesheet" href="<?php echo ($static); ?>css/publicStyle.css"/>
    <link rel="stylesheet" href="<?php echo ($static); ?>css/uploadify.css"/>
    <script type="text/javascript" src="<?php echo ($static); ?>js/lib/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="<?php echo ($static); ?>js/lib/jquery.uploadify.js"></script>
    <script type="text/javascript" src="<?php echo ($static); ?>js/lib/handlebars.js"></script>
    <script id="form_template" type="text/x-handlebars-template">
        {{#each this}}
        <div class="single_mission">
            <div class="order_header">
                &emsp;<span class="order_index">打印时间:</span>&emsp;
                <span class="order_date">{{file_date}}</span>&emsp;
            </div>
            <div class="single_order">
                <div class="mission_detail column_first">
                    <div class="mission_intro">
                        <div class="mission_thumbnail">
                            <img src="<?php echo ($static); ?>img/user_print/new_file.jpg" alt="缩略图"/>
                        </div>
                        <div class="mission_name">文件名:{{file_name}}</div>
                        <a href="javascript:;" class="mission_delete">删除</a>
                    </div>
                </div>
                <div class="single_mission_num column_second">
                    {{file_num}}
                </div>
                <div class="single_mission_set column_third">
                    {{range print_range min_page max_page}}
                </div>
                <div class="single_mission_price column_fourth">
                    A4&emsp;黑白&emsp;双面&emsp;
                    {{block block_num}}
                </div>
                <div class="single_mission_location column_fifth">
                    0
                </div>
            </div>
            <input type="checkbox" class="delete_checkbox hide" name="delete_checkbox"/>
        </div>
        {{/each}}
    </script>
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
        <div class="red_bar create_slide_bar"></div>
    </div>
    <div class="new_print">
        <img src="<?php echo ($static); ?>img/user_print/my_print_1.png"/>
        <span>新建打印任务</span>
    </div>
    <div class="classify_section">
        <div class="column_first">打印任务</div>
        <div class="column_second">份数</div>
        <div class="column_third">打印范围</div>
        <div class="column_fourth">打印设置</div>
        <div class="column_fifth">总价（元）</div>
    </div>
    <!--<div class="mission_operate">
        <div class="multi_choice">多选</div>
        <div class="delete_state hide">
            <div class="all_choice"><input type="checkbox" class="all_choice_control"/><span>全选</span></div>
            <div class="mass_delete">批量删除</div>
            <div class="exit_delete">退出删除</div>
        </div>
    </div>-->
    <div class="order_list">
        <div class="no_mission_img"><img src="<?php echo ($static); ?>img/user_print/no_mission_alert.png"/> </div>
    </div>

    <div class="order_postscript hide">
        <div class="order_person">
            <label for="pickup_person">&emsp;取货人：</label>
            <input type="text" name="order_message" class="pickup_info" id="pickup_person"/><br/>
            <label for="order_tel">联系电话：</label>
            <input type="tel" name="order_tel" class="order_tel" id="order_tel"/><br/>
            <label for="pickup_loaction">取货地点：</label>
            <select id="pickup_loaction" name="order_location" class="location_choice">
                <option value="aaa">十个字左右以内哈哈哈</option>
                <option value="bbb">十个字左右以内吼吼吼</option>
                <option value="ccc">十个字左右以内666</option>
            </select>
        </div>
        <div class="order_message">
            <label for="message_input">留言：</label>
            <textarea name="order_message" class="message_text" id="message_input" cols="3"></textarea>
        </div>
    </div>
    <div class="order_submit hide">
        <input type="submit" class="submit_order" value="提&emsp;交"/>
    </div>

</div>

<!-- 弹出层 -->
<div class="mask hide"></div>
<div class="new_popout_frame hide">
    <div class="popout_title">
        <div class="popup_title">
            打印设置
        </div>
        <div class="close_popout">
            <img src="<?php echo ($static); ?>img/user_print/new_delete.jpg">
        </div>
    </div>
    <table class="popout_file_info">
        <colgroup class="col1" span="1"></colgroup>
        <colgroup class="col2"></colgroup>
        <thead>
        <tr>
            <td>
                <img src="<?php echo ($static); ?>img/user_print/new_file.jpg"/>
            </td>
            <td>
                <span class="input_file_area"><input type="file" name="new_file" class="popout_new_file" id="popout_new_file"/></span>
                <span class="new_file_name">

                </span>
            </td>
        </tr>
        </thead>
        <tr>
            <td>打印份数</td>
            <td>
                <input type="number" class="file_number" name="new_file_num" value="1" max="5"/>
                <span class="num_description">(暂时只能最多一次打印五份哦~)</span>
            </td>
        </tr>
        <tr>
            <td>打印纸张</td>
            <td>
                <input type="radio" name="new_paper_size" class="new_paper_size" value="a4" checked/>A4
            </td>
        </tr>
        <tr>
            <td>打印色彩</td>
            <td>
                <input type="radio" name="new_colorful" class="new_colorful" value="0" checked/>黑白
            </td>
        </tr>
        <tr>
            <td>单双面</td>
            <td><input type="radio" name="paper_double" class="new_paper_double" value="2" checked/>双面</td>
        </tr>
        <tr>
            <td>打印页</td>
            <td>
                <input type="radio" name="print_range" class="print_range range_all" value="0" checked/>全部页面&emsp;
                <input type="radio" name="print_range" class="print_range range_part" value="1"/>范围
                <input type="text" name="print_page_min" class="print_page_min" disabled/>
                -
                <input type="text" name="print_page_max" class="print_page_max" disabled/>
            </td>
        </tr>
        <tr>
            <td>宫格数</td>
            <td>
                <input type="radio" name="new_print_block" class="new_print_block" value="4" checked/>四宫格&emsp;&emsp;
                <input type="radio" name="new_print_block" class="new_print_block" value="9"/>九宫格
            </td>
        </tr>

    </table>
    <div class="new_order_submit">
        <button class="submit_new">新&emsp;&emsp;建</button>
    </div>

</div>
<!-- 关闭新建订单弹出按钮 -->
<div class="close_warning hide">
    <div class="popout_title">
        <div class="popup_title">
            关闭？
        </div>
    </div>
    <div class="close_alert">
        还有未提交的订单，是否确定关闭？
    </div>
    <div class="close_button">
        <button class="regret_close">不要</button>&emsp;&emsp;
        <button class="ensure_close">确定</button>
    </div>
</div>
<!-- 点击新建订单按钮但未填完的出错提醒框 -->
<div class="submit_warning hide">
    <div class="popout_title">
        <div class="popup_title">
            错啦
        </div>
    </div>
    <div class="close_alert">
        表单还没填完哦~
    </div>
    <div class="close_button">
        <button class="amend_order">继续填</button>
    </div>
</div>
<!-- 点击提交但是订单数为0 -->
<div class="upload_warning_form hide">
    <div class="popout_title">
        <div class="popup_title">
            没有任务！
        </div>
    </div>
    <div class="close_alert">
        你没有新建打印哦，点击左上角的新建打印任务按钮创建打印任务吧~
    </div>
    <div class="upload_warning_botton">
        <button class="close_upload_warning">去新建！</button>
    </div>
</div>

<!-- 点击提交表单之后的确认 -->
<div class="upload_form hide">
    <div class="popout_title">
        <div class="popup_title">
            确认提交？
        </div>
    </div>
    <div class="close_alert">
        准备好提交表单了么？
    </div>
    <div class="upload_botton">
        <button class="close_upload">不要</button>&emsp;&emsp;
        <button class="upload_form_button">提交</button>
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
<script>
	//定义一个front目录
	var static_url='<?php echo ($static); ?>';
	//定义一个表单提交的URL
	var submit_url='<?php echo U('create_print'); ?>';
	//定义一个上传URL
	var upload_url='<?php echo U('create_upload'); ?>';
	//定义一个提交成功的跳转地址
	var success_url='<?php echo U('history_order'); ?>';
</script>
<script type="text/javascript" src="<?php echo ($static); ?>js/publicScript.js"></script>
<script type="text/javascript" src="<?php echo ($static); ?>js/order_manage.js"></script>
</body>
</html>