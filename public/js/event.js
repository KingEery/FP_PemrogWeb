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

  // Menangani tombol radio untuk gambar hero
  const radioButtons = document.querySelectorAll('[data-slide]');

  radioButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      // Hapus kelas aktif (bg-white) dari semua tombol
      radioButtons.forEach(b => b.classList.remove('bg-white'));

      // Tambahkan kelas aktif ke tombol yang diklik
      this.classList.add('bg-white');

      // Opsional: Ganti gambar hero sesuai slide yang dipilih
      const slideNumber = this.getAttribute('data-slide');
      console.log('Slide yang dipilih:', slideNumber);
    });
  });

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

  // Secara default, pilih "Semua Kategori" saat pertama kali halaman dimuat
  document.getElementById('all').checked = true;
  filterEvents('all');
});

document.addEventListener('DOMContentLoaded', function() {
  // Fungsi untuk tombol filter saat halaman sudah dimuat sepenuhnya
  const filterButtons = document.querySelectorAll('.bg-white.py-6 button'); // Ambil semua tombol filter dalam kontainer tertentu

  filterButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Hapus kelas 'aktif' dari semua tombol
      filterButtons.forEach(btn => {
        btn.classList.remove('bg-[#564AB1]', 'text-white'); // Hapus tampilan tombol yang aktif
        btn.classList.add('border-2', 'border-[#564AB1]', 'text-[#564AB1]'); // Tambahkan tampilan tombol default
      });

      // Tambahkan kelas 'aktif' ke tombol yang diklik
      this.classList.remove('border-2', 'border-[#564AB1]', 'text-[#564AB1]'); // Hapus tampilan default
      this.classList.add('bg-[#564AB1]', 'text-white'); // Tambahkan tampilan tombol aktif

      // Anda bisa menambahkan logika pemfilteran di sini berdasarkan tombol yang diklik
      const filterType = this.textContent.trim(); // Ambil teks dari tombol yang diklik sebagai tipe filter
      console.log(`Memfilter berdasarkan: ${filterType}`); // Tampilkan ke konsol untuk debugging
    });
  });
});

  // Menangani tombol radio untuk gambar hero
  const radioButtons = document.querySelectorAll('[data-slide]');

  radioButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      // Hapus kelas aktif (bg-white) dari semua tombol
      radioButtons.forEach(b => b.classList.remove('bg-white'));

      // Tambahkan kelas aktif ke tombol yang diklik
      this.classList.add('bg-white');

      // Opsional: Ganti gambar hero sesuai slide yang dipilih
      const slideNumber = this.getAttribute('data-slide');
      console.log('Slide yang dipilih:', slideNumber);
    });
  });

 document.addEventListener('DOMContentLoaded', function () {
  const mentoringBtn = document.getElementById('btn-mentoring');
  const consultanBtn = document.getElementById('btn-consultan');
  const allmentorBtn = document.getElementById('btn-allmentor');

  const mentoringSection = document.getElementById('mentoring-section');
  const consultanSection = document.getElementById('consultan-section');
  const allmentorSection = document.getElementById('allmentor-section');

  function activateButton(button) {
    // Reset semua tombol ke style default
    [mentoringBtn, consultanBtn, allmentorBtn].forEach(btn => {
      btn.classList.remove('bg-[#564AB1]', 'text-white');
      btn.classList.add('border-2', 'border-[#564AB1]', 'text-[#564AB1]', 'hover:bg-[#564AB1]/5');
    });

    // Aktifkan tombol yang dipilih
    button.classList.remove('border-2', 'text-[#564AB1]', 'hover:bg-[#564AB1]/5');
    button.classList.add('bg-[#564AB1]', 'text-white');
  }

  mentoringBtn.addEventListener('click', () => {
    mentoringSection.classList.remove('hidden');
    consultanSection.classList.add('hidden');
    allmentorSection.classList.add('hidden');
    activateButton(mentoringBtn);
  });

  consultanBtn.addEventListener('click', () => {
    mentoringSection.classList.add('hidden');
    consultanSection.classList.remove('hidden');
    allmentorSection.classList.add('hidden');
    activateButton(consultanBtn);
  });

  allmentorBtn.addEventListener('click', () => {
    mentoringSection.classList.add('hidden');
    consultanSection.classList.add('hidden');
    allmentorSection.classList.remove('hidden');
    activateButton(allmentorBtn);
  });

  // Jika kamu ingin load data mentor di allmentorSection, panggil fungsi loadAllMentors di sini
});
 
                   
//efek fade 
  AOS.init({
    duration: 1000,
    once: true
  });


  
