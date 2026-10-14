<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../app/models/Matakuliah.php';
require __DIR__ . '/../app/controllers/MatakuliahController.php';

$db         = (new Database())->connect();
$model      = new Matakuliah($db);
$controller = new MatakuliahController($model);

$page   = $_GET['page']   ?? 'matakuliah';
$action = $_GET['action'] ?? 'index';

if ($page !== 'matakuliah') {
    http_response_code(404);
    exit('Halaman tidak ditemukan.');
}

match ($action) {
    'index'  => $controller->index(),
    'create' => $controller->create(),
    'store'  => $controller->store(),
    'edit'   => $controller->edit(),
    'update' => $controller->update(),
    'delete' => $controller->delete(),
    default  => (function () {
        http_response_code(404);
        exit('Action tidak ditemukan.');
    })()
};