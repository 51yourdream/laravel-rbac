/**
 * Created by Administrator on 2016/3/10.
 */
$("[role='open-iframe']").click(function(){
    var title,shadeClose,shade,w,h,content;
    title = $(this).attr('title') ? $(this).attr('title') : false;
    shadeClose = parseFloat($(this).attr('shadeClose')) ? true : false;
    shade = parseFloat($(this).attr('shade')) ? parseFloat($(this).attr('shade')) : 0;
    w = $(this).attr('with') ? $(this).attr('with') : '600px';
    h = $(this).attr('height') ? $(this).attr('height') : '400px';
    content = $(this).attr('content') ? $(this).attr('content') : '';
    layer.open({
        type:2,
        title: title,
        shadeClose: shadeClose,
        shade: shade,
        area: [w,h],
        content: content
    });
});

//ajax 删除单条数据操作 type=DELETE
$('[role="ajax-delete"]').click(function () {
    var url = $(this).attr('data-href'),index;
    index = layer.confirm('确定要删除?', {
        btn: ['确定','取消'] //按钮
    }, function(){
        layer.close(index);
        $.ajax({
            type:'DELETE',
            url:url,
            success:function(data){
                if(data.status){
                    layer.msg('删除成功!',{icon:6});
                    window.location.reload();
                }else{
                    layer.msg('删除失败!',{icon:5});
                }
            }
        });
    });
});