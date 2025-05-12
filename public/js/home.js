const navLinks = document.querySelectorAll(".nav-links a");
const sections = document.querySelectorAll("section");

// Mengelola klik pada menu
navLinks.forEach(link => {
  link.addEventListener("click", function () {
    navLinks.forEach(nav => nav.classList.remove("active"));
    this.classList.add("active");
  });
});

// Mengelola scroll halaman
window.addEventListener("scroll", () => {
  let current = "";

  sections.forEach(section => {
    // Memperoleh jarak dari atas halaman dengan mempertimbangkan tinggi header
    const sectionTop = section.getBoundingClientRect().top + window.scrollY - 120;
    const sectionHeight = section.offsetHeight;

    // Cek apakah posisi scroll berada dalam area section
    if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
      current = section.getAttribute("id");
    }
  });

  // Menambahkan atau menghapus kelas "active" pada menu navigasi
  navLinks.forEach(link => {
    link.classList.remove("active");
    if (link.getAttribute("href") === `#${current}`) {
      link.classList.add("active");
    }
  });
});
