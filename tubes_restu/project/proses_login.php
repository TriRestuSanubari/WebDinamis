<?php
session_start();
include 'config.php';

// Ambil inputan dari form
$username_or_email = $_POST['username'];
$password = $_POST['password'];

// Query ke database berdasarkan username atau email
$query = "SELECT * FROM users WHERE username = '$username_or_email' OR email = '$username_or_email'";
$result = mysqli_query($conn, $query);

if ($user = mysqli_fetch_assoc($result)) {
    // Bandingkan langsung tanpa hash
    if ($password === $user['password']) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['full_name'] = $user['full_name'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>
            alert('Password salah!');
            window.location.href = 'login.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Username atau Email tidak ditemukan!');
        window.location.href = 'login.php';
    </script>";
}
?>