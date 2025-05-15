// Toggle menu mobile
const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('nav-menu');

hamburger.addEventListener('click', () => {
  navMenu.classList.toggle('active');
});

// Tutup menu mobile saat link diklik
document.querySelectorAll('#nav-menu a').forEach(link => {
  link.addEventListener('click', () => {
    if(window.innerWidth < 768) {
      navMenu.classList.remove('active');
    }
  });
});
