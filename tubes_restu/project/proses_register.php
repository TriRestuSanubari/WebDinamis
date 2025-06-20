<?php
include 'config.php';

// Ambil data dari form
$full_name = $_POST['full_name'];
$username  = $_POST['username'];
$email     = $_POST['email'];
$password  = $_POST['password'];
$confirm   = $_POST['confirm_password'];

// Validasi password
if ($password !== $confirm) {
    echo "<script>
            alert('Password dan Konfirmasi tidak cocok!');
            window.location.href='register.php';
          </script>";
    exit;
}

// Cek apakah username/email sudah digunakan
$check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' OR email='$email'");
if (mysqli_num_rows($check) > 0) {
    echo "<script>
            alert('Username atau Email sudah digunakan!');
            window.location.href='register.php';
          </script>";
    exit;
}

// Simpan ke database
$query = "INSERT INTO users (full_name, username, email, password, role, created_at)
          VALUES ('$full_name', '$username', '$email', '$password', 'user', NOW())";

if (mysqli_query($conn, $query)) {
    echo "<script>
            alert('Registrasi berhasil! Silakan login.');
            window.location.href='login.php';
          </script>";
} else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}
?>