<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hata ve başarı mesajları için değişkenler
    $loginError = null; 
    $loginSuccess = null; 

    // Formdan gelen verileri al
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Veritabanında kullanıcıyı e-posta adresiyle ara
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Kullanıcı bulunamadıysa
        $loginError = "Bu e-posta adresi ile kayıtlı bir kullanıcı bulunamadı.";
    } else {
        // Kullanıcı bulundu, bilgilerini al
        $user = $result->fetch_assoc();

        // Şifre doğrulama
        if (password_verify($password, $user['password'])) {
            // Şifre doğru
            $loginSuccess = "Giriş başarılı! Hoş geldiniz, {$user['username']}.";
        } else {
            // Şifre yanlış
            $loginError = "Hatalı şifre. Lütfen tekrar deneyin.";
        }
    }

    $stmt->close();
} 

