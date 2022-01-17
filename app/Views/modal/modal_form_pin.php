<div class="row padtop-10">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<span class="f-size-20">PIN Baru</span>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
		<input type="number" class="form-control" id="pin" name="pin" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return hanyaAngka(this.value)">
	</div>
</div>

<div class="row padtop-10">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<span class="f-size-20">Konfirmasi PIN</span>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
		<input type="number" class="form-control" id="cpin" name="cpin" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return hanyaAngka(this.value)">
	</div>
</div>