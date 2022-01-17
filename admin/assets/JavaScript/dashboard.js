$(function(){
	$('#start_daily').datepicker({
        dateFormat: 'd M yy',
        changeMonth: true,
        changeYear: true,
        maxDate : 'today'
    });

    $('#start_month').datepicker({
        dateFormat: 'M yy',
        changeMonth: true,
        changeYear: true,
        maxDate : 'today'
    });
});

function searchdaily()
{
	var form = $('#formDaily');
    var data = form.serialize();
    var url = form.data('url');
    $.ajax({
        url : url,
        data : data,
        type : 'post',
        dataType : 'json',
        cache : false,
        beforeSend : function(){
            $('.preloader').fadeIn();
        },
        success : function(res){
        	var row = res.Data;
            $('.preloader').fadeOut();
            $('.data-daily').html(row.data);
            $('.price-daily').html(row.price);
        }
    });
}

function searchmonth()
{
	var form = $('#formMonth');
    var data = form.serialize();
    var url = form.data('url');
    $.ajax({
        url : url,
        data : data,
        type : 'post',
        dataType : 'json',
        cache : false,
        beforeSend : function(){
            $('.preloader').fadeIn();
        },
        success : function(res){
        	var row = res.Data;
            $('.preloader').fadeOut();
            $('.data-month').html(row.data);
            $('.price-month').html(row.price);
        }
    });
}

function searchyears()
{
	var form = $('#formYears');
    var data = form.serialize();
    var url = form.data('url');
    $.ajax({
        url : url,
        data : data,
        type : 'post',
        dataType : 'json',
        cache : false,
        beforeSend : function(){
            $('.preloader').fadeIn();
        },
        success : function(res){
        	var row = res.Data;
            $('.preloader').fadeOut();
            $('.data-years').html(row.data);
            $('.price-years').html(row.price);
        }
    });
}