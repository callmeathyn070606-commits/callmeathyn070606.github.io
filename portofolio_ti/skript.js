const themeToggle = document.getElementById('theme-toggle');

// Memeriksa status tema dari penyimpanan browser saat halaman dimuat
if (localStorage.getItem('theme') === 'dark') {
    document.body.classList.add('dark-theme');
    themeToggle.textContent = '☀️ Light';
}

// Logika interaksi tombol pengubah tema
themeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme');
    
    if (document.body.classList.contains('dark-theme')) {
        localStorage.setItem('theme', 'dark');
        themeToggle.textContent = '☀️ Light';
    } else {
        localStorage.setItem('theme', 'light');
        themeToggle.textContent = '🌙 Moon';
    }
});