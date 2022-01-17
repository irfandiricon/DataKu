$(function(){
	$('.table-users').DataTable();
});

function checkpass(){
	var chk_pass = document.getElementById('chk_pass');
	if(chk_pass.checked){
		$('#password').prop({'type':'text'});
		$('#repassword').prop({'type':'text'});
		$('#show_hide_pass').html('Hide Password');
	}else{
		$('#password').prop({'type':'password'});
		$('#repassword').prop({'type':'password'});
		$('#show_hide_pass').html('Show Password');
	}
}