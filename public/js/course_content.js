  // Dropdown content switching
  function showContent(id) {
    const sections = document.querySelectorAll('.materi-content');
    sections.forEach(function (sec) {
        sec.classList.add('hidden');
    });
    const selected = document.getElementById('content-' + id);
    if (selected) selected.classList.remove('hidden');
}

// Mobile menu toggle
function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    if (menu.style.display === 'none' || menu.style.display === '') {
        menu.style.display = 'block';
    } else {
        menu.style.display = 'none';
    }
}