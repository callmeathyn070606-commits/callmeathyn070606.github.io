<?php
include 'koneksi.php';

if (isset($_POST['kirim_pesan'])) {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $pesan = trim($_POST['pesan']);

    $nama = mysqli_real_escape_string($conn, $nama);
    $email = mysqli_real_escape_string($conn, $email);
    $pesan = mysqli_real_escape_string($conn, $pesan);

    if (!empty($nama) && !empty($email) && !empty($pesan)) {
        $query = "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
        $simpan = mysqli_query($conn, $query);

        if ($simpan) {
            echo "<script>
                    alert('Pesan Anda berhasil dikirim dan tersimpan!');
                    window.location.href = 'pert4.php#contact';
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Gagal mengirim pesan. Silakan coba lagi.');
                    window.location.href = 'pert4.php#contact';
                  </script>";
            exit();
        }
    }
}
?>