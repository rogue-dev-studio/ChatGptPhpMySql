<?php
$servername = "server_host";
$username = "username_server";
$password = "your_password";
$dbname = "nama_db";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Operasi database

// Contoh: Mengambil data dari tabel
$sql = "SELECT * FROM table_name";
$result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // Menampilkan data
//     while ($row = $result->fetch_assoc()) {
//         if($row["user_id"]==1){
//             echo "ID: " . $row["user_id"] . " - Nama: " . $row["user_name"] . "<br>";
//         }
//     }
// } else {
//     echo "Tidak ada data yang ditemukan.";
// }

// Contoh: Menyisipkan data ke dalam tabel
// $sql = "INSERT INTO nama_tabel (nama, email) VALUES ('John Doe', 'john@example.com')";
// if ($conn->query($sql) === true) {
//     echo "Data berhasil disisipkan.";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// // Contoh: Memperbarui data dalam tabel
// $sql = "UPDATE nama_tabel SET nama='Jane Doe' WHERE id=1";
// if ($conn->query($sql) === true) {
//     echo "Data berhasil diperbarui.";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// // Contoh: Menghapus data dari tabel
// $sql = "DELETE FROM nama_tabel WHERE id=1";
// if ($conn->query($sql) === true) {
//     echo "Data berhasil dihapus.";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// Menutup koneksi
$conn->close();
?>
