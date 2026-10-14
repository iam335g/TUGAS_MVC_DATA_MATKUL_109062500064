<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mata Kuliah</title>
</head>
<body>
    <h2>Edit Mata Kuliah</h2>
    <form method="post" action="index.php?page=matakuliah&action=update">
        <input type="hidden" name="id" value="<?= $matakuliah['id'] ?>">

        <label>Kode MK</label><br>
        <input type="text" name="kode_mk" value="<?= htmlspecialchars($matakuliah['kode_mk']) ?>" required><br><br>

        <label>Nama Mata Kuliah</label><br>
        <input type="text" name="nama_mk" value="<?= htmlspecialchars($matakuliah['nama_mk']) ?>" required><br><br>

        <label>SKS</label><br>
        <input type="number" name="sks" value="<?= htmlspecialchars($matakuliah['sks']) ?>" required><br><br>

        <label>Semester</label><br>
        <input type="number" name="semester" value="<?= htmlspecialchars($matakuliah['semester']) ?>" required><br><br>

        <button type="submit">Update</button>
        <a href="index.php?page=matakuliah">Kembali</a>
    </form>
</body>
</html>