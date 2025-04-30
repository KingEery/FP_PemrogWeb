// Ambil semua radio button dengan name "kategori"
const radios = document.querySelectorAll('input[name="kategori"]');
const judulCourse = document.getElementById('judulcourse');

// Variabel untuk menyimpan radio yang terakhir dipilih
let lastChecked = null;

// Tambahkan event listener untuk setiap radio button
radios.forEach(radio => {
    radio.addEventListener('click', () => {
        // Jika radio yang sama diklik lagi, hapus centang
        if (lastChecked === radio) {
            radio.checked = false;
            lastChecked = null;

            // Kembalikan judul ke default
            judulCourse.textContent = 'Semua Kursus';
        } else {
            // Jika radio baru dipilih, simpan sebagai lastChecked
            lastChecked = radio;

            // Perbarui judul berdasarkan nilai radio yang dipilih
            judulCourse.textContent = radio.value;
        }
    });
});
