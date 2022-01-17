$(function(){
    var host = window.location.origin;
    var pathname = window.location.pathname.split('/');
    var path = pathname[1];
    var url = host+'/'+path+'/';

    $('.btn-menu').click(function(){
        var data = $(this).attr('data');
        window.location.href = url+data;
    });
});