<?php
$dsn = "sqlsrv:Server=localhost,1433;Database=QLSV";
$username = "cse486_project";
$password = "Quang@17062004";

try {
    $pdo = new PDO($dsn, $username, $password);
    echo "Kết nối thành công!";
} catch (PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
}
?>
