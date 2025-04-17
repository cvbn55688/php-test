<?php
$host = 'localhost';
$dbname = 'test';
$user = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user);
} catch (PDOException $e) {
    die("資料庫連線失敗：" . $e->getMessage()); 
} 

$username = $_POST['username'];
$password = $_POST['password']; 

if ($username && $password) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo "<script>alert('註冊失敗：帳號已存在'); window.location.href='fail.html';</script>";
        exit;
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $hashedPassword])) {
        echo "<script>alert('註冊成功'); window.location.href='success.html';</script>";
    }
} else {
    echo "<script>alert('錯誤');</script>";
}
?>