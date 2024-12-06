<?php 
include ('config.php');


// Veritabanı bağlantısını oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn->set_charset('utf8mb4')){
    die("Bağlantı karakter yapısı uygun değil: " . $conn->connect_error);
};
//echo 'bu:' . $conn->character_set_name() . "\n";

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}

?>