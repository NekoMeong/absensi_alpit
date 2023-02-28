<?php
$koneksi = mysqli_connect("localhost", "root", "", "absensi");
$data = mysqli_query($koneksi, "SELECT * FROM absen");
$result = mysqli_fetch_assoc($data);
?>

<div class="Hasil">
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=laporan_absen-excel.xls");
    ?>
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


