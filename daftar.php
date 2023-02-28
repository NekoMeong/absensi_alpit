<html>
<head>
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css" />
    <script defer src ="https://pyscript.net/alpha/pyscript.js"></script>
    <title>Absensi Raffa</title>
</head>
<body>
    <header>Website Absensi</header>
        <div class="navbar">
            <div class="logo">
                <a href="https://instagram.com/hamori.1305?igshid=ZDdkNTZiNTM="><img src ="images/bot.png" alt="logo">Hamori</a>
            </div>
            <ul class="menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Daftar</a></li>
            <li><a href="absen.php">Absen</a></li>
            <li><a href="Hasil.html">Hasil</a></li>
            <li><a href="Kontak.html">Kontak</a></li>
        </ul> 
    </div>
    <div class="konten">
        <h1>Daftar Nama</h1>
        <div class="daftar">
            <form action="register.php" method="get">
            <div class="Nama">
                Nama: <input type="text" name="name"><br>
            </div>
            <div class="ID">
                ID: <input type="text" name="id"><br>
            </div>
            <div class="Tombol-Daftar">
                <input type="submit" value="Daftar">
            </div>
            <h3>
            Welcome <?php echo $_GET["name"]; ?><br>
            ID: <?php echo $_GET["id"]; ?>
            <?php 
            $nama_txt = fopen("nama_register.txt", "w") or die("Unable to open file!");
            fwrite($nama_txt,  $_GET["name"]);
            fclose($nama_txt);
            $id_txt = fopen("id_register.txt", "w") or die("Unable to open file!");
            fwrite($id_txt,  $_GET["id"]);
            fclose($id_txt);
            ?>
        </div>
    </div>

    <div class="gambar">
        <h1>Daftar Wajah</h1>
        <div class="daftar-wajah">
            <from method="post">
                <input type="submit" name="submit" value="run">
            </from>
            <?php
                if (isset($_POST['submit'])) {
                    
                }
            ?>
        </div>
    </div>
    

    <footer>
        <div class="footer-content">
            <h3>Absensi Absensi</h3>
            <p>Website ini dibuat oleh kelompok KECEBONG (Kece Ga Boong) dan dikembangkan oleh Hamori. Website ini berfungsi untuk membantu guru dalam mengabsen siswa.</p>
            <ul class="sosial">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-github"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2023 KECEBONG. designed by <span>Hamori</span></p>
        </div>
    </footer>
</body>
</html>