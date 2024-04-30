$(document).ready(function() {
    // Ketika document sudah siap, jalankan function di dalamnya

     // Tambah
     $('.tampilModalTambah').on('click', function() {
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        // Ganti attribut link
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/tambah');
    });

    // Edit
    $('.tampilModalEdit').on('click', function() {
        $('#judulModal').html('Edit Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Edit Data');

        // Ganti attribut link
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

        // $(this) -> tombol yang diklik
        const id = $(this).data('id');
        // console.log(id);

        // AJAX
        $.ajax({
            // note: parameter ketuker gapapa
            // Parameter 1
            // method: getubah -> mengembalikan data mahasiswa sesuai dengan ID yang dipilih
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        })
    });
});