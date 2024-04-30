<div class="container index-mahasiswa">
    <br>


    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-4 button-tambah">
      <div class="col-6">
        <button type="button" class="btn btn-primary tampilModalTambah" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah data mahasiswa
        </button>
      </div>
    </div>
<!-- BASEURL; /mahasiswa/cari -->
    <div class="row mb-3 keyword-cari">
      <div class="col-6">
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari nama mahasiswa" name="keyword" id="keyword" autofocus autocomplete="off">
            <button class="btn btn-primary" type="submit" id="tombol-cari">Cari <i class="bi bi-search"></i></button>
          </div>
        </form>
      </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-lg-12">

        <center><h3><?= $data["judul"]; ?></h3></center>
        <br>

        <div id="list-tabel">
          <table class="table table-striped table-info">
            <thead>
              <tr>
                <th scope="col"><center>Nama Mahasiswa</center></th>
                <th scope="col"><center>Tombol Pengaturan</center></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <?php foreach ($data['mhs'] as $mhs) : ?>
                <tr>
                  <td><center><?= $mhs['nama']; ?></center></td>
                  <td>
                    <center>
                      <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge text-bg-info float-right ml-2" style="text-decoration: none;">Detail</a> |
                      <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge text-bg-warning float-right ml-2 tampilModalEdit" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs["id"]; ?>">Edit</a> |
                      <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge text-bg-danger float-right ml-2" style="text-decoration: none;" onclick="return confirm('Apakah yakin ingin dihapus?');">Hapus</a>
                    </center>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah data mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
            <input type="hidden" name="id" id="id">
          
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan nama mahasiswa">

            <label for="nim" class="form-label">NIM</label>
            <input type="text" id="nim" class="form-control" name="nim" placeholder="Masukkan NIM mahasiswa">

            <label for="email" class="form-label">E-mail</label>
            <input type="text" id="email" class="form-control" name="email" placeholder="Masukkan e-mail mahasiswa">

            <label for="jurusan" class="form-label">Jurusan</label>
            <select class="form-select form-select-md mb-3" aria-label="Default select example" id="jurusan" name="jurusan">
                <option selected value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                <option value="Jurnalistik">Jurnalistik</option>
                <option value="Manajemen">Manajemen</option>
                <option value="Akuntansi">Akuntansi</option>
            </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah data</button>
        </form>
      </div>
    </div>
  </div>
</div>