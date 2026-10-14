<?php
class Matakuliah
{
    public function __construct(private PDO $db) {}

    // 1. Membaca seluruh data mata kuliah
    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT id, kode_mk, nama_mk, sks, semester FROM matakuliah ORDER BY semester ASC, nama_mk ASC'
        );
        return $stmt->fetchAll();
    }

    // 2. Mengambil satu data mata kuliah berdasarkan ID
    public function findById(int $id): array | false
    {
        $stmt = $this->db->prepare(
            'SELECT id, kode_mk, nama_mk, sks, semester FROM matakuliah WHERE id = :id'
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // 3. Menambahkan data mata kuliah baru
    public function insert(array $data): bool
    {
        $sql = 'INSERT INTO matakuliah (kode_mk, nama_mk, sks, semester) 
                VALUES (:kode_mk, :nama_mk, :sks, :semester)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':kode_mk'  => $data['kode_mk'],
            ':nama_mk'  => $data['nama_mk'],
            ':sks'      => $data['sks'],
            ':semester' => $data['semester']
        ]);
    }

    // 4. Memperbarui data mata kuliah berdasarkan ID
    public function update(int $id, array $data): bool
    {
        $sql = 'UPDATE matakuliah 
                SET kode_mk = :kode_mk, nama_mk = :nama_mk, sks = :sks, semester = :semester 
                WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id'        => $id,
            ':kode_mk'  => $data['kode_mk'],
            ':nama_mk'  => $data['nama_mk'],
            ':sks'      => $data['sks'],
            ':semester' => $data['semester']
        ]);
    }

    // 5. Menghapus data mata kuliah berdasarkan ID
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare(
            'DELETE FROM matakuliah WHERE id = :id'
        );
        return $stmt->execute(['id' => $id]);
    }
}
?>