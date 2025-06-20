<?php
session_start();
include "config.php"; // koneksi ke database
$current = basename($_SERVER['PHP_SELF']);

// Ambil data materi dari database
$query = "SELECT * FROM materi";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Daftar Materi PHP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    nav a {
      color: white;
      text-decoration: none;
      margin-left: 30px;
      font-weight: 500;
      position: relative;
      transition: color 0.3s;
    }

    nav a::after {
      content: '';
      position: absolute;
      width: 0%;
      height: 2px;
      background: #42a5f5;
      left: 0;
      bottom: -4px;
      transition: 0.3s;
    }

    nav a:hover,
    nav a.active {
      color: #42a5f5;
    }

    nav a:hover::after,
    nav a.active::after {
      width: 100%;
    }

    .container {
      padding: 120px 80px 40px;
    }

    h1 {
      font-size: 3rem;
      color: #42a5f5;
      margin-bottom: 30px;
      text-shadow: 0 0 10px #42a5f5;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 30px;
    }

    .card {
      background: #111;
      border-radius: 15px;
      padding: 30px 20px;
      text-align: center;
      box-shadow: 0 0 10px rgba(66, 165, 245, 0.4);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 0 20px rgba(66, 165, 245, 0.7);
    }

    .card i {
      font-size: 40px;
      color: #42a5f5;
      margin-bottom: 15px;
    }

    .card a {
      color: white;
      text-decoration: none;
      font-weight: 600;
      display: block;
    }

    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    border: none;
    outline: none;
    scroll-behavior: smooth;
    font-family: "Poppins", sans-serif;
    }

    :root {
    --bg-color: #080808;
    --second-bg-color: #131313;
    --text-color: white;
    --main-color: #5AB2FF;
    }

    html {
    font-size: 60%;
    overflow-x: hidden;
    }

    body {
    background: var(--bg-color);
    color: var(--text-color);
    }

    .header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 4rem 12% 4rem;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 5;
    }

    .logo {
    font-size: 1.6rem;
    font-weight: 600;
    color: white;
    position: relative;
    transition: color 0.3s ease;
  }

    .logo:hover {
    transform: scale(1.1);
    }

    .logo span {
    color: white;
    transition: 0.3s;
  }

    .navbar a {
    font-size: 1.5rem;
    color: var(--text-color);
    margin-left: 4rem;
    font-weight: 500;
    transition: 0.3s ease;
    border-bottom: 3px solid transparent;
    }

    .navbar a:hover,
    .navbar a.active {
    color: var(--main-color);
    border-bottom: 3px solid var(--main-color);
    }

    #menu-icon {
    font-size: 3.6rem;
    color: var(--main-color);
    display: none;
    }

    section {
    min-height: 100vh;
    padding: 10rem 12% 10rem;
    }

    .home {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15rem;
    }

    .home-content {
    display: flex;
    flex-direction: column;
    align-items: baseline;
    text-align: left;
    justify-content: center;
    margin-top: 3rem;
    }

    span {
    color: var(--main-color);
    }

    .logo span {
    color: var(--main-color);
    }

    .home-content h3 {
    margin-bottom: 2rem;
    margin-top: 1rem;
    font-size: 2.5rem;
    }

    .home-content h1 {
    font-size: 6rem;
    font-weight: 600;
    margin-top: 1.5rem;
    line-height: 1;
    }

    .home-img {
    border-radius: 50%;
    }

    .home-img img {
    position: relative;
    top: 3rem;
    width: 22vw;
    height: 22vw;
    margin-left: 150px;
    border-radius: 50%;
    cursor: pointer;
    transition: 0.4s ease-in-out;
    box-shadow: 0 0 25px var(--main-color);
    }

    .home-img img:hover {
    box-shadow: 0 0 25px var(--main-color),
        0 0 50px var(--main-color),
        0 0 100px var(--main-color);
    }

    .home-content p {
    font-size: 1.5rem;
    font-weight: 500;
    line-height: 1.8;
    max-width: 1000px;
    }

    .btn {
    display: inline-block;
    padding: 1rem 2.8rem;
    background: var(--main-color);
    border-radius: 4rem;
    font-size: 1.6rem;
    color: black;
    border: 2px solid transparent;
    letter-spacing: 0.1rem;
    font-weight: 600;
    transition: 0.3s ease-in-out;
    cursor: pointer;
    }

    .btn-hover {
    transform: scale(1.05);
    box-shadow: 0 0 50px var(--main-color);
    }

    .btn-group {
    display: flex;
    justify-content: center;
    gap: 1.5rem;
    margin: 2rem 0;
    }

    .btn-group a:nth-of-type(2) {
    background-color: black;
    color: var(--main-color);
    border: 2px solid var(--main-color);
    box-shadow: 0 0 25px transparent;
    }

    .btn-group a:nth-of-type(2):hover {
    box-shadow: 0 0 25px var(--main-color);
    background-color: var(--main-color);
    color: rgb(0, 0, 0);
    }

    @keyframes cursor {
    to {
        border-left: 2px solid var(--main-color);
    }
    }

.content-about {
    max-width: 800px;
}

.content-about h2 {
    font-size: 6rem;
    font-weight: 600;
    margin-bottom: 4rem;
    color: var(--main-color);
}

.content-about p {
    font-size: 1.6rem;
    line-height: 1.8;
    margin-bottom: 2rem;
    text-align: justify;
}

.card {
    background-color: var(--second-bg-color);
    border: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 0 25px var(--main-color);
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 0 50px var(--main-color);
}

.card-img-top {
    height: 100%;
    object-fit: cover;
    border-radius: 0.5rem;
    transition: transform 0.3s ease;
}

.card-img-top:hover {
    box-shadow: 0 0 25px var(--main-color),
        0 0 50px var(--main-color),
        0 0 100px var(--main-color);
}

.card-title {
    color: var(--main-color);
    font-size: 1.8rem;
}

.card-text {
    font-size: 1.5rem;
    line-height: 1.6;
    color: var(--text-color);
}

.carousel-inner {
    padding: 20px;
    box-shadow: 0 0 25px var(--main-color);
}

.poster-img {
    width: 100%;
    height: 250px;
    border-radius: 10px;
    transition: transform 0.3s;/
}

.poster-img:hover {
    transform: scale(1.05);
    box-shadow: 0 0 25px var(--main-color),
        0 0 50px var(--main-color),
        0 0 100px var(--main-color);
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: var(--main-color);
    border-radius: 50%;
}

.carousel-control-prev,
.carousel-control-next {
    width: 50px;
}
  </style>
</head>
<body>

<header class="header">
  <a href="daftar_rangkuman.php" class="logo <?php echo $current == 'daftar_rangkuman.php' ? 'active' : ''; ?>">
    <span>Daftar-Daftar Materi</span>
  </a>
  <nav class="navbar">
    <a href="dashboard.php" class="<?php echo $current == 'dashboard.php' ? 'active' : ''; ?>">Home</a>
    <a href="daftar_rangkuman.php" class="<?php echo $current == 'daftar_rangkuman.php' ? 'active' : ''; ?>">Materi</a>
    <a href="logout.php" class="<?php echo $current == 'logout.php' ? 'active' : ''; ?>">Logout</a>
  </nav>
</header>

<div class="container">
  <h1>Materi PHP</h1>
  <div class="grid">
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <div class="card">
        <i class="fa-solid <?php echo $row['ikon']; ?>"></i>
        <a href="materi_detail.php?id=<?php echo $row['id']; ?>">
          <?php echo htmlspecialchars($row['judul']); ?>
        </a>
      </div>
    <?php } ?>
  </div>
</div>

</body>
</html>
