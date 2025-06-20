<?php
session_start();
include 'config.php';

// Ambil ID dari URL
if (!isset($_GET['id'])) {
  echo "<script>alert('ID tidak ditemukan!'); window.location.href='daftar_rangkuman.php';</script>";
  exit;
}

$id = intval($_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM materi WHERE id = $id");
$materi = mysqli_fetch_assoc($query);

if (!$materi) {
  echo "<script>alert('Materi tidak ditemukan!'); window.location.href='daftar_rangkuman.php';</script>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Materi - <?php echo htmlspecialchars($materi['judul']); ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #080808;
      color: white;
      padding: 60px 10%;
    }
    h1 {
      font-size: 3rem;
      color: #5AB2FF;
      margin-bottom: 20px;
    }
    .penjelasan, .output {
      font-size: 1.4rem;
      line-height: 1.8;
      margin-bottom: 20px;
    }
    pre {
      background-color: #131313;
      padding: 20px;
      border-radius: 10px;
      overflow-x: auto;
      font-size: 1.3rem;
      box-shadow: 0 0 15px #5AB2FF;
    }
    .output-box {
      background: #111;
      padding: 15px;
      border-left: 5px solid #5AB2FF;
      font-size: 1.3rem;
      border-radius: 5px;
    }
    a.kembali {
      color: #5AB2FF;
      text-decoration: none;
      display: inline-block;
      margin-top: 20px;
    }
    a.kembali:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1><?php echo htmlspecialchars($materi['judul']); ?></h1>

  <div class="penjelasan">
    <strong>Penjelasan:</strong><br>
    <?php echo nl2br(htmlspecialchars($materi['penjelasan'])); ?>
  </div>

  <div>
    <strong>Kode PHP:</strong>
    <pre><?php echo htmlspecialchars($materi['kode']); ?></pre>
  </div>

  <div class="output">
    <strong>Output:</strong>
    <div class="output-box">
      <?php echo nl2br(htmlspecialchars($materi['output'])); ?>
    </div>
  </div>

  <a class="kembali" href="daftar_rangkuman.php">&larr; Kembali ke Daftar Materi</a>
</body>
</html>
