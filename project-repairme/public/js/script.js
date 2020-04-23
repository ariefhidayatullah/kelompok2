$(function(){

	$('.tombolTambahData').on('click', function(){

		$('#judulModal').html('Tambah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Tambah Data');
	});	


	$('.tampilModalUbah').on('click', function(){

		$('#judulModal').html('Ubah Data Mahasiswa');
		$('.modal-footer button[type=submit]').html('Ubah Data');
		
		const id = $(this).data('id');
		
		$.ajax({
			url: 'http://localhost/php/phpmvc/public/mahasiswa/getUbah',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data){
				console.log('okee');
			
			}
		});


	});
});