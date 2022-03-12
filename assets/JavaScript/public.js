$(function(){
    $("form#formDataLogin").submit(function(e) {
        e.preventDefault();   
        var form = $('form#formDataLogin');
        var Url = form.data('url');

        var formData = new FormData(this);

        $.ajax({
            url: Url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            beforeSend : function(){
                $('.preloader').fadeIn();
                $('.alert-danger').css({'display':'none'});
            },
            success: function (res) {
                var ErrorCode = res.ERROR_CODE;
                var ErrorMessage = res.ERROR_MESSAGE;
                if(ErrorCode != "EC:0000"){
                    $('.preloader').fadeOut();
                    Swal.fire({
                        icon: 'error',
                        html: ErrorMessage,
                        confirmButton: true,
                        confirmButtonColor : '#1FB3E5',
                        confirmButtonText : 'Close'
                    });
                }else{
                    var UrlPage = res.UrlPage;
                    window.location.href = UrlPage;
                }
            },  
            cache: false,
            contentType: false,
            processData: false
        });
    });
});

$(function(){
    var firebaseConfig = {
        apiKey: "AIzaSyDFNMiADR_muAqD__UM67ACxnw7fKsN5tE",
        authDomain: "pusat-evoucher.firebaseapp.com",
        projectId: "pusat-evoucher",
        storageBucket: "pusat-evoucher.appspot.com",
        messagingSenderId: "890004997602",
        appId: "1:890004997602:web:47862b20642b79e9d9e5bb",
        measurementId: "G-9RGHMMHQ1B",
        databaseURL: "pusat-evoucher.firebaseio.com"
    };
      
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
});

function google(url){
    $('.preloader').fadeIn();
    var provider = new firebase.auth.GoogleAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function(result) {
        var token = result.credential.accessToken;
        var user = result.user;
        var data = {
            'email' : user.email,
            'fullname' : user.displayName,
            'photoURL' : user.photoURL,
            'phoneNumber' : user.phoneNumber,
            'emailVerified' : user.emailVerified
        }

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
                var ErrorCode = res.ERROR_CODE;
                var ErrorMessage = res.ERROR_MESSAGE;
                if(ErrorCode != "EC:0000"){
                    $('.preloader').fadeOut();
                    Swal.fire({
                        icon: 'error',
                        html: ErrorMessage,
                        confirmButton: true,
                        confirmButtonColor : '#1FB3E5',
                        confirmButtonText : 'Close'
                    });
                }else{
                    var UrlPage = res.UrlPage;
                    window.location.href = UrlPage;
                }
            }
        });
    }).catch(function(error) {
        var errorCode = error.code;
        var errorMessage = error.message;
        var email = error.email;
        var credential = error.credential;
        $('.preloader').fadeOut();
        Swal.fire({
            icon: 'warning',
            html: errorMessage,
            cancelButton: true,
            cancelButtonColor : '#1FB3E5',
            cancelButtonText : 'CLOSE',
            allowOutsideClick : false,
            allowEscapeKey : false
        });
    });
}

function facebook(){
    $('.preloader').fadeIn();
    var provider = new firebase.auth.FacebookAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function(result) {
        var token = result.credential.accessToken;
        var user = result.user;
        var data = {
            'email' : user.email,
            'fullname' : user.displayName,
            'photoURL' : user.photoURL,
            'phoneNumber' : user.phoneNumber,
            'emailVerified' : user.emailVerified
        }
        $.ajax({
            url : 'register/facebook',
            data : data,
            type : 'post',
            dataType : 'json',
            cache : false,
            beforeSend : function(){
                $('.preloader').fadeIn();
            },
            success : function(res){
                var ErrorCode = res.ERROR_CODE;
                var ErrorMessage = res.ERROR_MESSAGE;
                if(ErrorCode != "EC:0000"){
                    $('.preloader').fadeOut();
                    Swal.fire({
                        icon: 'error',
                        html: ErrorMessage,
                        confirmButton: true,
                        confirmButtonColor : '#1FB3E5',
                        confirmButtonText : 'Close'
                    });
                }else{
                    var UrlPage = res.UrlPage;
                    window.location.href = UrlPage;
                }
            }
        });
    }).catch(function(error) {
        $('.preloader').fadeOut();
        var errorCode = error.code;
        var errorMessage = error.message;
        var email = error.email;
        var credential = error.credential;
        Swal.fire({
            icon: 'warning',
            html: errorMessage,
            cancelButton: true,
            cancelButtonColor : '#1FB3E5',
            cancelButtonText : 'CLOSE',
            allowOutsideClick : false,
            allowEscapeKey : false
        });
    });
}

function modal(modal, title, file, row, action, base_url){
    var protocol = window.location.protocol;
    var hostname = window.location.hostname;
    var pathname = window.location.pathname;
    var split = pathname.split("/");
    var directory = split[1];
    // var base_url = protocol+'//'+hostname+'/'+directory+"/";

    var rows = JSON.parse(atob(row));
    var data = {
        title : title,
        file : file,
        rows : rows,
        modal : modal,
        action : action
    }

    $.ajax({
        url : base_url+'/modal',
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
                var URL = res.URL;
                var NOREFRESH = res.NOREFRESH;
                if(NOREFRESH == "" || NOREFRESH == undefined){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: error_message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout(function(){
                        if(URL == "" || URL == undefined){
                            window.location.reload();
                        }else{
                            window.location.reload();
                        }
                    },1500);
                }else{
                    Swal.fire({
                        icon: 'success',
                        position: 'center',
                        html: error_message,
                        confirmButton: true,
                        confirmButtonColor : '#1FB3E5',
                        confirmButtonText : 'Close'
                    });
                    document.getElementById('formData').reset();
                }
            }
        }
    });
}

function submitformmodal(){
    var form = $('#formDataModal');
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
                    timer : 1500
                });
                setTimeout(function(){
                    $('.preloader').fadeIn();
                    window.location.reload();
                },1500);

            }
        }
    });
}

function submitformtransaksi(){
    var form = $('#formDataModal');
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
                $('#price-list div').remove();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: error_message,
                    showConfirmButton: true
                });
                $('.modal').modal('hide');

            }
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