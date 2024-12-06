<?php
    include('db.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password_confirm = $_POST["password_confirm"];

        // Şifrelerin eşleşip eşleşmediğini kontrol et
        if ($password !== $password_confirm) {
            echo json_encode(['success' => false, 'message' => 'Şifreler eşleşmiyor!']);
            exit;
        }

        // Kullanıcı adı kontrolü
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo json_encode([
                'success' => false,
                'message' => 'Bu kullanıcı adı zaten alınmış.'
            ]);
            $stmt->close();
            exit;
        }

        // Aynı e-posta ile kayıt kontrolü
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo json_encode(['success' => false, 'message' => 'Bu e-posta zaten kayıtlı.']);
            exit;
        }

        // Şifreyi hash'le ve kullanıcıyı kaydet
        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_pass);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Kayıt başarılı!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Kayıt sırasında bir hata oluştu.']);
        }
        exit;
    }
?>
