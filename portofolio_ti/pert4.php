<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Mahasiswa TI UIR</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar">
        <div class="nav-logo">MyPortfolio</div>
        <ul class="nav-links">
            <li><a href="#hero">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#todo-app">Todo List</a></li>
        </ul>
        <button id="theme-toggle" class="btn-theme">🌙 Moon</button>
    </nav>

    <main class="container">
        
        <section id="hero" class="hero-section">
            <img src="WhatsApp Image 2026-06-03 at 15.45.19.jpeg" alt="Foto Profil" class="profile-img">
            <div class="hero-text">
                <h2>Halo, Saya Fathir Alfahrezy</h2>
                <p>Web Developer | Informatics Engineering Student at UIR</p>
            </div>
        </section>

        <article id="about" class="about-section">
            <h2>Tentang Saya</h2>
            <p>Saya adalah mahasiswa Teknik Informatika yang sedang mendalami teknologi pengembangan web khususnya di sisi frontend dan juga backend menggunakan HTML5 dan CSS3.</p>
        </article>

        <section id="education" class="edu-section">
            <h2>Riwayat Pendidikan</h2>
            <table class="edu-table">
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Institusi</th>
                        <th>Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024 - Sekarang</td>
                        <td>Universitas Islam Riau</td>
                        <td>Teknik Informatika</td>
                    </tr>
                    <tr>
                        <td>2021 - 2024</td>
                        <td>SMA Negeri 1 Siak Hulu</td>
                        <td>IPS</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="contact" class="contact-section">
            <h2>Hubungi Saya</h2>
            <form action="proses_kontak.php" method="POST" class="contact-form">
                <div class="form-group">
                    <label for="name">Nama Lengkap:</label>
                    <input type="text" id="name" name="nama" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="contoh@email.com" required>
                </div>
                <div class="form-group">
                    <label for="message">Pesan:</label>
                    <textarea id="message" name="pesan" rows="4" placeholder="Tulis pesan Anda di sini" required></textarea>
                </div>
                <button type="submit" name="kirim_pesan" class="btn-submit">Kirim Pesan</button>
            </form>
        </section>

        <section id="todo-app" class="todo-wrapper">
            <h2>My Tasks</h2>
            <form action="proses_todo.php" method="POST" class="todo-input-group">
                <input type="text" name="task_text" id="todo-input" placeholder="Add a new task..." required>
                <button type="submit" name="add_task" id="add-btn">Add</button>
            </form>
            <ul id="todo-list">
                <?php
                // Mengambil data langsung dari tabel database bernama todos
                $tampil = mysqli_query($conn, "SELECT * FROM todos ORDER BY id DESC");
                while ($row = mysqli_fetch_array($tampil)) {
                    $status_class = $row['completed'] == 1 ? 'completed done' : 'normal';
                    echo "<li class='todo-item {$status_class}'>
                            <span class='todo-text' onclick=\"window.location.href='proses_todo.php?toggle={$row['id']}&status={$row['completed']}'\">
                                {$row['task_text']}
                            </span>
                            <button onclick=\"if(confirm('Hapus tugas ini?')) window.location.href='proses_todo.php?delete={$row['id']}'\" class='todo-delete-btn'>
                                &times;
                            </button>
                          </li>";
                }
                ?>
            </ul>
        </section>

    </main>

    <footer class="main-footer">
        <p>&copy; 2026 Teknik Informatika UIR. Disusun oleh Fathir Alfahrezy.</p>
    </footer>

    <script src="skript.js"></script>
</body>
</html>