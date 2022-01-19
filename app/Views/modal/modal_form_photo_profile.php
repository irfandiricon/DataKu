<div class="row padtop-10">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<input type="file" name="userfile" id="file_url">
	</div>
</div>

<style type="text/css">
	.file-caption{
		border: none !important;
	}
</style>

<script type="text/javascript">
	$(function(){
		$('button#submit').attr('type','submit');
		$('button#submit').removeAttr('onclick');

		$("#file_url").fileinput({
	        showUpload: false,
	        showBrowse: false,
	        allowedFileTypes: ['image'],
	        browseOnZoneClick: true,
	        validateInitialCount: true,
	        overwriteInitial: false,
	        elErrorContainer: "#errorBlock",
	        initialPreviewShowDelete: true,
	        fileActionSettings: {showZoom: false},
	        maxFileSize: 6000,
	    }).on('fileerror', function(event, data, msg) {
	        Swal.fire({
	            type: 'error',
	            title: msg
	        });
	    });

	    $("form#formDataModal").submit(function(e) {
	        e.preventDefault();   
	        var form = $('form#formDataModal');
	        var Url = form.data('url');

	        var formData = new FormData(this);

	        $.ajax({
	            url: Url,
	            type: 'POST',
	            data: formData,
	            dataType: 'json',
	            beforeSend : function(){
	                $('.preloader').fadeIn();
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
	                	$('.preloader').fadeOut();
	                   Swal.fire({
	                        position: 'center',
	                        icon: 'success',
	                        title: ErrorMessage,
	                        showConfirmButton: false,
	                        timer: 1500
	                    })
	                    setTimeout(function(){
	                    	$('.preloader').fadeIn();
	                        window.location.reload();
	                    },1500);
	                }
	            },
	            cache: false,
	            contentType: false,
	            processData: false
	        });
	    });
	});
</script>