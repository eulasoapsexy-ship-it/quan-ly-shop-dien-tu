<?php
header('Content-Type: application/json; charset=utf-8');

// Cấu hình kết nối Database
$host = 'localhost';
$dbname = 'ten_database_cua_ban'; // Thay bằng tên DB thực tế
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn lấy danh sách khách hàng
    $stmt = $conn->prepare("SELECT * FROM khach_hang ORDER BY id DESC");
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['status' => 'success', 'data' => $result]);

} catch(PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>