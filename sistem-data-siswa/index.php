<?php

require_once 'controllers/SiswaController.php';

$controller = new SiswaController();
$dataSiswa = $controller->index();

include 'views/siswa_view.php';
