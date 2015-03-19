
/* 点击新建之后存储用户数据 */
$(function(){
    var user_order=new Print_order();
    user_order.createOrder();
    resetForm();
})
function Print_order(){
    this.order_data=[];
    this.file_upload_data=[];
    this.errorIndex=0;
}
Print_order.prototype.createOrder=function(){
    var obj=this;
    $('.submit_new').on('click',function(){
        var file_num=$('.file_number').val();
        var paper_size=$('input[name=new_paper_size]:checked').val();
        var is_colorful=$('input[name=new_colorful]:checked').val();
        var is_double=$('input[name=paper_double]:checked').val();
        var print_range=$('input[name=print_range]:checked').val();
        var min_page=$('.print_page_min').val();
        var max_page=$('.print_page_max').val();
        var block_num=$('input[name=new_print_block]:checked').val();
        if(!file_num||(print_range==1&&(!min_page||!max_page))){
            $('.submit_warning').removeClass('hide');
        }
        else{
            $('.submit_new').attr('disabled','disabled');
            $('.new_popout_frame').addClass('hide');
            $('.mask').addClass('hide');
            resetForm();
            var user_single_data={file_num:file_num,paper_size:paper_size,is_colorful:is_colorful,
                is_double:is_double,print_range:print_range,min_page:min_page,max_page:max_page,
                block_num:block_num,file_date:oData.upload.time,file_id:oData.upload.tid,
                file_name:oData.upload.name};
            obj.order_data.push(user_single_data);
            /* handlebars封装 */
            Handlebars.registerHelper('range',function(v1,v2,v3){
                if(v1==0){
                    return '全部页面';
                }
                else if(v1==1){
                    return v2+'页 至 '+v3+'页';
                }
            })
            Handlebars.registerHelper('block',function(v1){
                if(!v1){
                    return;
                }
                else if(v1==4){
                    return '四宫格';
                }
                else if(v1==9){
                    return '九宫格';
                }
            })
            var myTemplate = Handlebars.compile($("#form_template").html());
            $('.order_list').html(myTemplate(obj.order_data))

        }
    });



    /* 单个项目删除功能 */
    var order_list=$('.order_list');
    order_list.delegate('.mission_delete','click',function(event){
        var e=event||window.event;
        var target=$(e.target);
        target.closest('.single_mission').hide(400,function(){
            var thisObj=$(this);
            obj.order_data.splice(thisObj.index(),1);
            $(this).remove()
        })
    })

    /* 多个项目删除功能 */
    /*$('.multi_choice').on('click',function(){
        $('.delete_checkbox').removeClass('hide');
        $(this).addClass('hide');
        $('.delete_state').removeClass('hide');
        $('.order_submit').addClass('hide')
    })
    $('.exit_delete').on('click',function(){
        $('.delete_checkbox').addClass('hide');
        $('.multi_choice').removeClass('hide');
        $('.delete_state').addClass('hide');
        $('.order_submit').removeClass('hide')
    })
    $('.all_choice').on('click',function(){
        var all_choice=$('.all_choice_control');
        $('.delete_checkbox').each(function(){
            $(this).attr('checked',true)
        })
    })
    $('.mass_delete').on('click',function(){
        $('.delete_checkbox').each(function(){
            if($(this).prop('checked')===true){
                var thisObj=$(this);
                delete obj.order_data[thisObj.closest('.single_mission').index()]
                $(this).closest('.single_mission').hide(400,function(){
                    $(this).remove()
                })
            }

        });
        for(var i=obj.order_data.length;i>0;i--){
            if (!obj.order_data) {
                obj.order_data.splice(i,1)
            }
        }
    });*/


    /* 弹出层事件处理 */
    $('.new_print').on('click',function(){
        $('.new_popout_frame').removeClass('hide');
        $('.mask').removeClass('hide');
    });
    $('.close_popout').on('click',function(){
        if($('.popout_new_file').val()!=='') {
            $('.close_warning').removeClass('hide');
        }
        else{
            $('.new_popout_frame').addClass('hide');
            $('.mask').addClass('hide');
            resetForm();
        }
    });
    $('.ensure_close').on('click', function () {
        $('.new_popout_frame').addClass('hide');
        $('.mask').addClass('hide');
        $('.close_warning').addClass('hide');
        resetForm();
    });
    $('.regret_close').on('click',function(){
        $('.close_warning').addClass('hide');
    });
    $('.popout_new_file').on('change', function () {
        $('.new_file_name').html($(this).val())
    });

    $('.amend_order').on('click',function(){
        $('.submit_warning').addClass('hide');
    })

    /* 范围选择框的范围 */
    $('.print_range').on('change',function(){
        if($('input[name=print_range]:checked').val()==='0'){
            $('.print_page_min').attr('disabled','true').val('');
            $('.print_page_max').attr('disabled','true').val('');
        }
        else{
            $('.print_page_min').removeAttr('disabled');
            $('.print_page_max').removeAttr('disabled');
        }
    });

    /* 表单和提交按钮是否出现 */
    $('.order_list,.submit_new').on('click',function(){
        if(obj.order_data.length===0){
            $('.order_postscript').addClass('hide');
            $('.order_submit').addClass('hide');
            $('.no_mission_img').removeClass('hide');
        }
        else{
            $('.order_postscript').removeClass('hide');
            $('.order_submit').removeClass('hide');
            $('.no_mission_img').addClass('hide');
        }
    })

    /* 点击提交按钮之后的事件 */
    $('.submit_order').on('click',function(){
        if(obj.order_data.length===0){
            $('.upload_warning_form').removeClass('hide');
            $('.mask').removeClass('hide');
        }
        else{
            $('.upload_form').removeClass('hide');
            $('.mask').removeClass('hide');
        }
    });
    $('.close_upload_warning').on('click',function(){
        $('.upload_warning_form').addClass('hide');
        $('.mask').addClass('hide');
    });
    $('.close_upload').on('click',function(){
        $('.upload_form').addClass('hide');
        $('.mask').addClass('hide');
    });
    /* 开始上传！ */
    $('.upload_form_button').on('click',function(){
        $(this).attr('disabled','disabled');
        var user_info={pickup_person:$('.pickup_info').val(),connect_phone:$('.order_tel').val(),
        message_board:$('.message_text').val(),location:$('.location_choice').val()}
        obj.order_data.push(user_info);
        $.post(submit_url,{data:obj.order_data},function(callbackNum){
          if(callbackNum) window.location.href=success_url;
          else alert('提交失败，请刷新后重试！');
        })
    })

    /* 限制输入框为数字 */
    $('.print_page_min,.print_page_max,.file_number').on('keydown',function(even){
        if(!(event.keyCode>=48&&event.keyCode<=57)&&!(event.keyCode>=96&&event.keyCode<=105)){
            window.event.returnValue=false;
        }
    })
    /* 限制份数 */
    $('.file_number').on('blur',function(){
        if(parseInt($(this).val())>=5){
            $(this).val(5);
        }
        else if(parseInt($(this).val())==0){
            $(this).val(1)
        }
    })
}
/* 重置表单 */
var oData={}
function resetForm(){
    $('.input_file_area').html('<input type="file" name="new_file" class="popout_new_file" id="popout_new_file"/>');
    $('.file_number').val('1');
    $('input[name=new_paper_size]').eq(0).prop('checked',true);
    $('input[name=new_colorful]').eq(0).prop('checked',true);
    $('input[name=paper_double]').eq(0).prop('checked',true);
    $('input[name=print_range]').eq(0).prop('checked',true);
    $('input[name=new_print_block]').eq(0).prop('checked',true);
    $('.submit_new').removeAttr('disabled')
    $('.print_page_min').attr('disabled','true').val('');
    $('.print_page_max').attr('disabled','true').val('');

    $('#popout_new_file').uploadify({
        'swf'      : static_url+'img/uploadify/uploadify.swf',
				'uploader' : upload_url,
        'onUploadSuccess':function(file,data,response){
            oData.upload=JSON.parse(data);  /*重要*/
        }

    });
}

/* 只允许输入数字 */
function numberOnly(element){
    return element.val().match(/^[0-9]+$/g)
}