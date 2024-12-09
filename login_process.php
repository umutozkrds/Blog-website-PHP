<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hata ve başarı mesajları için değişkenler
    $loginError = null; 
    $loginSuccess = null; 

    // Formdan gelen verileri al
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Veritabanında kullanıcıyı e-posta adresiyle ara
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Kullanıcı bulunamadıysa
        $loginError = "Bu kullanıcı adı ile kayıtlı bir kullanıcı bulunamadı.";
    } else {
        // Kullanıcı bulundu, bilgilerini al
        $user = $result->fetch_assoc();
        $_SESSION["username"] = $username;
 
        // Şifre doğrulama
        if (password_verify($password, $user['password'])) {
            // Şifre doğru
            $_SESSION["password"] = $password;
            header("Location: index.php");

        } else {
            // Şifre yanlış
            $loginError = "Hatalı şifre. Lütfen tekrar deneyin.";
        }
    }

    $stmt->close();
} 

