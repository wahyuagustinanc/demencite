$(document).on('click', '#btn-edit', function(){
    $('.modal-body #id_pasien').val($(this).data('id'));
    $('.modal-body #nama').val($(this).data('nama'));
    $('.modal-body #jenis_kelamin').val($(this).data('jenis_kelamin'));
    $('.modal-body #umur').val($(this).data('umur'));
    $('.modal-body #pendidikan').val($(this).data('pendidikan'));
    $('.modal-body #pekerjaan').val($(this).data('pekerjaan'));
    $('.modal-body #riwayat_penyakit').val($(this).data('riwayat_penyakit'));
})