<style>
    .detail-mahasiswa {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 150px;
    }
    .card-detail {
        display: flex;
        flex-direction: column;
        margin: 0 5px;
    }
</style>

<div class="container detail-mahasiswa">
    <br>
    
    <center><h3>Detail Mahasiswa</h3></center>

    <br>
    <div class="card" style="width: 18rem;">
        <div class="card-body card-detail">
            <h5 class="card-title"><?= $data['mhs']['nama']; ?></h5>
            <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['mhs']['nim']; ?></h6>
            <p class="card-text"><?= $data['mhs']['email']; ?></p>
            <p class="card-text"><?= $data['mhs']['jurusan']; ?></p>
            <a href="<?= BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
        </div>
    </div>

</div>