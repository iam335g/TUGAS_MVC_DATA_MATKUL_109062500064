<?php
class MatakuliahController
{
    public function __construct(private Matakuliah $model) {}

    // 1. Menampilkan daftar mata kuliah
    public function index(): void
    {
        $matakuliah = $this->model->getAll();
        require __DIR__ . '/../views/matakuliah/index.php';
    }

    // 2. Menampilkan form tambah data
    public function create(): void
    {
        require __DIR__ . '/../views/matakuliah/create.php';
    }

    // 3. Menyimpan data baru
    public function store(): void
    {
        $data = $this->validateInput($_POST);
        $this->model->insert($data);
        header('Location: index.php?page=matakuliah');
        exit;
    }

    // 4. Menampilkan form edit data berdasarkan ID
    public function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $matakuliah = $this->model->findById($id);

        if (!$matakuliah) {
            http_response_code(404);
            exit('Data mata kuliah tidak ditemukan.');
        }

        require __DIR__ . '/../views/matakuliah/edit.php';
    }

    // 5. Memperbarui data
    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        $data = $this->validateInput($_POST);
        $this->model->update($id, $data);
        header('Location: index.php?page=matakuliah');
        exit;
    }

    // 6. Menghapus data
    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        $this->model->delete($id);
        header('Location: index.php?page=matakuliah');
        exit;
    }

    // 7. Validasi input form
    private function validateInput(array $input): array
    {
        $data = [
            'kode_mk'  => trim($input['kode_mk'] ?? ''),
            'nama_mk'  => trim($input['nama_mk'] ?? ''),
            'sks'      => (int) ($input['sks'] ?? 0),
            'semester' => (int) ($input['semester'] ?? 0)
        ];

        if ($data['kode_mk'] === '' || $data['nama_mk'] === '' || $data['sks'] <= 0 || $data['semester'] <= 0) {
            exit('Semua field wajib diisi dengan benar.');
        }

        return $data;
    }
}
?>