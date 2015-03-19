$('.mission_delete').on('click',function(){
    $(this).closest('.single_mission').hide(300,function(){
        $(this).remove();
    });
})
