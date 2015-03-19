<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>淘印印</title>
    <link rel="stylesheet" href="<?php echo ($static); ?>/css/index.css"/>
    <link rel="stylesheet" href="<?php echo ($static); ?>/css/publicStyle.css"/>
    <script type="text/javascript" src="<?php echo ($static); ?>/js/lib/jquery-1.11.1.js"></script>

    <script type="text/javascript" src="<?php echo ($static); ?>/js/lib/bootstrap-3.0.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo ($static); ?>/js/lib/bootstrap-3.0.3/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo ($static); ?>/js/lib/bootstrap-3.0.3/css/bootstrap-theme.css"/>
</head>
<body>
<header class="navi_main">
    <div class="taoyinyin_logo">
        <a href="javascript:;">
            <img src="<?php echo ($static); ?>/img/public_img/logo.png"/>
        </a>
    </div>
    <div class="navi_button">
        <div class="navi_log_in">
            <input type="button" class="login_button" onclick="location.href='<?php echo U('/Home/Sign/login'); ?>';" />
        </div>
        <div class="navi_sign_up">
            <input type="button" class="sign_up_button" onclick="location.href='<?php echo U('/Home/Sign/register'); ?>';" />
        </div>
    </div>
</header>
<div class="index_body">
    <div class="index_info">
        <!--图片轮播-->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active index_page1">
                    <div class="page1_content">
                        <div class="page1_slogan">
                            <p>不用<span class="font_red">排队</span></p>

                            <p>不用<span class="font_red">下楼</span></p>

                            <p>全部<span class="font_red">免费</span></p>

                            <p>赶快<img src="<?php echo ($static); ?>/img/index/text_taoyinyin.png"/></p>

                        </div>
                        <div class="page1_pic">
                            <img src="<?php echo ($static); ?>/img/index/page1_lc.png"/>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <!--<div class="carousel-caption">
                        123
                    </div>-->
                </div>
                <div class="item">
                    <!--<div class="carousel-caption">
                        234243243
                    </div>-->
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<div class="upload_now">
    <span class="upload_slogan">教练，我想现在就...</span>

    <div class="upload_box">
        <span>上传文件</span>
        <input type="button" class="upload_file" id="upload_file" name="upload_file">
    </div>
</div>
<div class="avail_info">
    <!--<h2>现在可以公开的情报</h2>-->
    <div class="step_intro">
        <div class="step_bar">
            <img src="<?php echo ($static); ?>/img/index/step_bar.png"/>
        </div>
        <div class="step_detail step1">
            <h3>Step1</h3>

            <p class="step_describe">用户登陆后，在线提交需要打印的文件，或去<a href="javascript:;" class="font_red">文库</a>选择所需文件打印。</p>

            <p class="add_text">
                *支持的格式包括：
                doc,docx,ppt,pptx,pdf,csv,xls,txt
            </p>
        </div>
        <div class="step_detail step2">
            <h3>Step2</h3>

            <p class="step_describe">在线编辑、确认。设置打印格式，属性。</p>

            <div class="add_img">
                <img src="<?php echo ($static); ?>/img/index/step_2.jpg"/>
            </div>
        </div>
        <div class="step_detail step3">
            <h3>Step3</h3>
            <p class="step_describe">在线提交文件到打印店。</p>

            <div class="add_img">
                <img src="<?php echo ($static); ?>/img/index/step_3.png"/>
            </div>
        </div>
        <div class="step_detail step4">
            <h3>Step4</h3>

            <p class="step_describe">按照约定的时间，线下领取打印的资料。</p>

            <div class="add_img">
                <img src="<?php echo ($static); ?>/img/index/step_4.png"/>
            </div>
        </div>
    </div>
</div>
<div class="reason_bar">
    <span>淘印印如何做到零元打印？</span>
</div>
<div class="reason_free">
    <p class="reason_text">
        广告商需要在学校投放广告，宣传自己同学们需要打印资料，印资料需要花钱所以我们希望通过这样一个模式，把这两者结合既能满足广告商们的打响自己知名度的需求也能帮助大家直接不花钱得打印资料
        <br/>免费的代价，就是存在广告，但同样作为学生，我们更能体会大家的感受所以把广告放在不影响大家阅读的地方。
    </p>

    <div class="reason_img">
        <img src="<?php echo ($static); ?>/img/index/reason_img.jpg"/>
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
$(function(){
	$('#upload_file').click(function(){
	  $.post('<?php echo U('uploadFile'); ?>','',function(data){
	    if(parseInt(data)>0) window.location.href="<?php echo U('/Home/User'); ?>";
	    else window.location.href="<?php echo U('Sign/Login'); ?>";	
	  });	
	});
});
</script>
<script src="<?php echo ($static); ?>/js/publicScript.js"></script>
<script type="text/javascript" src="<?php echo ($static); ?>/js/index.js"></script>
</body>
</html>