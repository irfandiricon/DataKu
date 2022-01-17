function modal(modal, title, file, row, action){
    var protocol = window.location.protocol;
    var hostname = window.location.hostname;
    var pathname = window.location.pathname;
    var split = pathname.split("/");
    var directory = split[1];
    var base_url = protocol+'//'+hostname+'/'+directory+"/admin/";

    var rows = JSON.parse(atob(row));
    var data = {
        title : title,
        file : file,
        rows : rows,
        modal : modal,
        action : action
    }

    $.ajax({
        url : base_url+'modal',
        data : data,
        type : 'post',
        cache : false,
        beforeSend : function(){
            $('.preloader').fadeIn();
        },
        success : function(res){
            $('.preloader').fadeOut();
            $('#modal').html(res);
            $('#modal').modal('show');
        }
    });
}

function closeModal(){
    $('#modal').modal('hide');
}

function submitform(){
    var form = $('#formData');
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
            $('.preloader').fadeOut();
            var error_message = res.ERROR_MESSAGE;
            var error_code = res.ERROR_CODE;
            if(error_code != "EC:0000"){
                Swal.fire({
                    icon: 'error',
                    html: error_message,
                    confirmButton: true,
                    confirmButtonColor : '#1FB3E5',
                    confirmButtonText : 'Close'
                });
            }else{
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: error_message,
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function(){
                    window.location.reload();
                },1500);
            }
        }
    });
}

function deleterow(param){
    var data = JSON.parse(atob(param));
    var url = data['url'];
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
        if (result.isConfirmed) {
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
                    $('.preloader').fadeOut();
                    var error_message = res.ERROR_MESSAGE;
                    var error_code = res.ERROR_CODE;
                    if(error_code != "EC:0000"){
                        Swal.fire({
                            icon: 'error',
                            html: error_message,
                            confirmButton: true,
                            confirmButtonColor : '#1FB3E5',
                            confirmButtonText : 'Close'
                        });
                    }else{
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: error_message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function(){
                            window.location.reload();
                        },1500);
                    }
                }
            });
        }
    });
}

function statusrow(param, msg)
{
    var data = JSON.parse(atob(param));
    var url = data['url'];
    Swal.fire({
        title: 'Apakah anda yakin?',
        html: "Status data ini akan diperbaharui !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, ubah!'
        }).then((result) => {
        if (result.isConfirmed) {
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
                    $('.preloader').fadeOut();
                    var error_message = res.ERROR_MESSAGE;
                    var error_code = res.ERROR_CODE;
                    if(error_code != "EC:0000"){
                        Swal.fire({
                            icon: 'error',
                            html: error_message,
                            confirmButton: true,
                            confirmButtonColor : '#1FB3E5',
                            confirmButtonText : 'Close'
                        });
                    }else{
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: error_message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function(){
                            window.location.reload();
                        },1500);
                    }
                }
            });
        }
    });
}

function formatRupiah(angka, prefix)
{
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split = number_string.split(','),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
}

function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
    return true;
}