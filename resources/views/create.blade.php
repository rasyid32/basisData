<form action="/dashboard" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="nik">NIK:</label>
        <input type="number" name="nik" id="nik" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="foto_profil">foto_profil</label>
        <input type="file" name="foto_profil" id="foto_profil" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Tambah Data</button>
</form>
