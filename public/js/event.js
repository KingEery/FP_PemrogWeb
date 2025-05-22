document.addEventListener('DOMContentLoaded', function() {
  // Fungsi toggle untuk dropdown (buka/tutup isi dropdown)
  window.toggleDropdown = function() {
    const content = document.getElementById('dropdownContent');
    const icon = document.getElementById('dropdownIcon');

    // Jika dropdown sedang tertutup, buka dropdown
    if (content.style.maxHeight === "0px" || !content.style.maxHeight) {
      content.style.maxHeight = content.scrollHeight + "px";
      icon.classList.add('rotate-180'); // Putar ikon 180 derajat
    } else {
      // Jika dropdown sedang terbuka, tutup dropdown
      content.style.maxHeight = "0px";
      icon.classList.remove('rotate-180'); // Kembalikan ikon ke posisi awal
    }
  };

  // Set kondisi awal dropdown menjadi tertutup
  const dropdownContent = document.getElementById('dropdownContent');
  if (dropdownContent) {
    dropdownContent.style.maxHeight = "0px";
  }
  // Tambahkan event listener untuk tombol radio kategori
  const radioButtonsCategory = document.querySelectorAll('input[name="category"]');
  radioButtonsCategory.forEach(radio => {
    radio.addEventListener('change', function() {
      const selectedCategory = this.value;
      filterEvents(selectedCategory); // Panggil fungsi filter berdasarkan kategori
    });
  });

  // Fungsi untuk memfilter event berdasarkan kategori yang dipilih
  function filterEvents(selectedCategory) {
    const events = document.querySelectorAll('[data-category]');

    if (selectedCategory === 'all') {
      // Tampilkan semua event jika kategori "Semua Kategori" dipilih
      events.forEach(event => {
        event.style.display = 'block';
      });
    } else {
      // Tampilkan hanya event yang sesuai dengan kategori yang dipilih
      events.forEach(event => {
        const eventCategory = event.getAttribute('data-category');
        if (eventCategory === selectedCategory) {
          event.style.display = 'block';
        } else {
          event.style.display = 'none';
        }
      });
    }
  }
}); 
 


  
