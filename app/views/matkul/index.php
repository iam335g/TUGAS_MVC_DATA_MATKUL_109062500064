<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mata Kuliah</title>
</head>
<body>
    <h2>Daftar Mata Kuliah</h2>
    <a href="index.php?page=matakuliah&action=create">Tambah Data</a>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($matakuliah as $mk): ?>
        <tr>
            <td><?= htmlspecialchars($mk['kode_mk']) ?></td>
            <td><?= htmlspecialchars($mk['nama_mk']) ?></td>
            <td><?= htmlspecialchars($mk['sks']) ?></td>
            <td><?= htmlspecialchars($mk['semester']) ?></td>
            <td>
                <a href="index.php?page=matakuliah&action=edit&id=<?= $mk['id'] ?>">Edit</a>
                <form method="post" action="index.php?page=matakuliah&action=delete" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                    <input type="hidden" name="id" value="<?= $mk['id'] ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>