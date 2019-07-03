$(document).ready(function() {
	
	let total = 0;
	let alamat = "";
	let alamatPck = "";

	// reset form
	$('#alamatBaru').prop('disabled', true);
	$('#alamatBaruPck').prop('disabled', true);
	$('#form_order').trigger('reset');
	$('#rst').on('click', function() {
		$('#alamatBaru').prop('disabled', true);
		$('#alamatBaruPck').prop('disabled', true);
		$('#alamatLama').prop('disabled', false);
		$('#alamatLamaPck').prop('disabled', false);
	});

	// tambah form
	$('#tambah_form').on('click', function() {
		if ($('input[name=namaPenerima]').val() == '' || $('input[name=barang]').val() == '' || $('input[name=kategori]').val() == '' || $('input[name=jumlah]').val() == '' || $('input[name=berat]').val() == '' || $(alamat+'[name=alamat]').val() == '' || $(alamatPck+'[name=alamatPck]').val() == '') {
			alert('Form tidak boleh kosong');
			return false;
		}
		total++;
		$('#tabel_order').append('<tbody><tr class="baris_order">'+
			'<td>'+total+'</td>'+
			'<td><textarea class="form-control" name="namaPenerima[]" placeholder="Nama penerima" style="resize:vertical;" readonly="">'+$('input[name=namaPenerima]').val()+'</textarea></td>'+
			'<td><textarea class="form-control" name="barang[]" placeholder="Nama barang" style="resize:vertical;" readonly="">'+$('input[name=barang]').val()+'</textarea>'+
			'<td><textarea class="form-control" name="kategori[]" placeholder="Kategori Barang" style="resize:vertical;" readonly="">'+$('input[name=kategori]').val()+'</textarea>'+
			'<td><input class="form-control" type="number" name="jumlah[]" value="'+$('input[name=jumlah]').val()+'" placeholder="Jumlah barang" readonly=""></td>'+
			'<td><input class="form-control" type="number" name="berat[]" value="'+$('input[name=berat]').val()+'" placeholder="Berat" readonly=""></td>'+
			'<td><textarea class="form-control" name="alamat[]" placeholder="Alamat Pengiriman" style="resize:vertical;" readonly="">'+$(alamat+'[name=alamat]').val()+'</textarea>'+
			'<td><textarea class="form-control" name="alamatPck[]" placeholder="Alamat Pickup" style="resize:vertical;" readonly="">'+$(alamatPck+'[name=alamatPck]').val()+'</textarea>'+
			'<td><button class="hapus_form btn btn-warning" onclick="event.preventDefault();"> - Hapus pengiriman</button>'+
		'</tr></tbody>');
		if ($('.baris_order').length > 0) {
			$('#kirim').prop('disabled', false);
		}
		$("html, body").animate({
	        scrollTop: 0
	    }, 500);  
	});

	// hapus form
	$(document).on('click', '.hapus_form', function(event) {
		total--;
		$(this).parent().parent().remove();
		if ($('.baris_order').length <= 0) {
			$('#kirim').prop('disabled', true);
		}
	});

	// pilih alamat
	$('input[name=alm]').on('click', function() {
		if ($(this).val() == "1") {
			$('#alamatLama').prop('disabled', false);
			$('#alamatBaru').prop('disabled', true);
			alamat = "select";
		} else {
			$('#alamatLama').prop('disabled', true);
			$('#alamatBaru').prop('disabled', false);
			alamat = "textarea";
		}
	});
	$('input[name=almPck]').on('click', function() {
		if ($(this).val() == "1") {
			$('#alamatLamaPck').prop('disabled', false);
			$('#alamatBaruPck').prop('disabled', true);
			alamatPck = "select";
		} else {
			$('#alamatLamaPck').prop('disabled', true);
			$('#alamatBaruPck').prop('disabled', false);
			alamatPck = "textarea";
		}
	});

	// role option & phone number
	$('#role').on('change', function() {
		if ($(this).val() == 'Operator') {
			$('.office').css('display', 'flex');
			$('#office').prop('disabled', false);
		} else {
			$('.office').css('display', 'none');
			$('#office').prop('disabled', true);
		}
	});


});

var loadFile = function(event) {
    var output = document.getElementById('prevImage');
    output.src = URL.createObjectURL(event.target.files[0]);
  };