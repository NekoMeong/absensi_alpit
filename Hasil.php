<?php
$koneksi = mysqli_connect("localhost", "root", "", "absensi");
$data = mysqli_query($koneksi, "SELECT * FROM absen");
$result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Absensi Raffa</title>
</head>
<body>
    <header>Website Absensi</header>
        <div class="navbar">
            <div class="logo">
                <a href="https://repl.it/@NekoMeong"><img src ="images/bot.png" alt="logo">Hamori</a>
            </div>
            <ul class="menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="register.php">Daftar</a></li>
            <li><a href="gambar.php">Daftar Wajah</a></li>
            <li><a href="absen.php">Absen</a></li>
            <li><a href="#">Hasil</a></li>
            <li><a href="Kontak.html">Kontak</a></li>
        </ul> 
    </div>

    <div class="Hasil">
        <h1>Data Absensi</h1>
        <center><table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>no</th> 
                <th>Nama</th> 
                <th>Waktu</th> 
                <th>Status</th>
            </tr>
            <?php 
            $no = 1;
            while($result = mysqli_fetch_assoc($data)): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $result['name'] ?></td>
                <td><?php echo $result['waktu'] ?></td>
                <td><?php echo $result['status'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table></center>

        <p align="center">
            <input type="button" value="Export Excel" onclick="window.open('laporan-absensi.php')">
        </p>
    </div>

    <footer>
        <div class="footer-content">
            <h2>Absensi Absensi</h2>
            <p>Website ini dibuat oleh kelompok KECEBONG (Kece Ga Boong) dan dikembangkan oleh Hamori. Website ini berfungsi untuk membantu guru dalam mengabsen siswa.</p>
            <ul class="sosial">
                <li><a href="https://www.facebook.com/raf.fa.9237?mibextid=ZbWKwL"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/Bwaruwn?t=aKj_Am6uMatIN3me1vgjnw&s=09"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://instagram.com/hamori.1305?igshid=ZDdkNTZiNTM="><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://github.com/NekoMeong"><i class="fa fa-github"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2023 KECEBONG. designed by <span>Hamori</span></p>
        </div>
    </footer>
</body>
</html>

