<form action="/dashboard/{{ $dosen->id }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="nik">nik:</label>
        <input type="number" name="nik" id="nik" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="gambar">gambar</label>
        <input type="file" name="gambar" id="gambar" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Edit Data</button>
</form>
