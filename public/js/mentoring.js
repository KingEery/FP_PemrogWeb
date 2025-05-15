document.addEventListener("DOMContentLoaded", function () {
  // ==== DATA CONSULTAN ====
  const dataConsultan = [
    {
      nama: "Adithya Firmansyah Putra",
      jabatan: "Product Engineer at Zero One Group",
      pengalaman: "5 Tahun Pengalaman",
      foto: "image/hajisodikin.jpg"
    },
    {
      nama: "Budi Santoso",
      jabatan: "Project Manager at TechNova",
      pengalaman: "8 Tahun Pengalaman",
      foto: "image/kaana.jpg"
    },
    {
      nama: "Siti Aisyah",
      jabatan: "UI/UX Designer at CreativeLab",
      pengalaman: "3 Tahun Pengalaman",
      foto: "image/siti.jpg"
    },
    {
      nama: "Wardhana Putra",
      jabatan: "UI/UX Designer at CreativeLab",
      pengalaman: "3 Tahun Pengalaman",
      foto: "image/siti.jpg"
    }
  ];

  // ==== DATA ALL MENTOR ====
  const dataAllMentor = [
    {
      nama: "Yafa Nanda",
      jabatan: "UI/UX Designer at CreativeLab",
      pengalaman: "3 Tahun Pengalaman",
      foto: "image/yafa.jpg"
    },
    {
      nama: "Muhammad Raihan Alfarizi",
      jabatan: "Software Engineer at DevSpace",
      pengalaman: "4 Tahun Pengalaman",
      foto: "image/raihan.jpg"
    },
    {
      nama: "Dimas Putra Pradana",
      jabatan: "Software Engineer at DevSpace",
      pengalaman: "4 Tahun Pengalaman",
      foto: "image/raihan.jpg"
    }
  ];

  // ==== RENDER KARTU MENTOR/CONSULTAN ====
  function createCards(containerId, templateId, mentorData) {
    const container = document.getElementById(containerId);
    const template = document.getElementById(templateId);

    if (!container || !template) {
      console.error("Container atau template tidak ditemukan:", containerId, templateId);
      return;
    }

    container.innerHTML = '';

    mentorData.forEach((mentor) => {
      const clone = template.content.cloneNode(true);
      const img = clone.querySelector("img");

      fetch(mentor.foto)
        .then((res) => {
          img.src = res.ok ? mentor.foto : "image/default.jpg";
        })
        .catch(() => {
          img.src = "image/default.jpg";
        });

      clone.querySelector(".mentor-name").textContent = mentor.nama;
      clone.querySelector(".mentor-job").textContent = mentor.jabatan;
      clone.querySelector(".mentor-exp").textContent = mentor.pengalaman;

      container.appendChild(clone);
    });
  }

  // ==== RENDER KE HALAMAN ====
  createCards("consultan-card-container", "consultan-card-template", dataConsultan);
  createCards("allmentorcard-container", "allmentor-card-template", dataAllMentor);

  // ==== INISIALISASI AOS ====
  if (typeof AOS !== "undefined") {
    AOS.init({ duration: 1000, once: true });
  }

  // ==== HANDLER SLIDE HERO ====
  const radioButtons = document.querySelectorAll('[data-slide]');

  radioButtons.forEach(btn => {
    btn.addEventListener('click', function () {
      radioButtons.forEach(b => b.classList.remove('bg-white'));
      this.classList.add('bg-white');

      const slideNumber = this.getAttribute('data-slide');
      console.log('Slide yang dipilih:', slideNumber);
    });
  });

  // ==== HANDLER TOMBOL TABS (Mentoring / Consultan / All Mentor) ====
  const mentoringBtn = document.getElementById('btn-mentoring');
  const consultanBtn = document.getElementById('btn-consultan');
  const allmentorBtn = document.getElementById('btn-allmentor');

  const mentoringSection = document.getElementById('mentoring-section');
  const consultanSection = document.getElementById('consultan-section');
  const allmentorSection = document.getElementById('allmentor-section');

  function activateButton(button) {
    [mentoringBtn, consultanBtn, allmentorBtn].forEach(btn => {
      btn.classList.remove('bg-[#564AB1]', 'text-white');
      btn.classList.add('border-2', 'border-[#564AB1]', 'text-[#564AB1]', 'hover:bg-[#564AB1]/5');
    });

    button.classList.remove('border-2', 'text-[#564AB1]', 'hover:bg-[#564AB1]/5');
    button.classList.add('bg-[#564AB1]', 'text-white');
  }

  mentoringBtn?.addEventListener('click', () => {
    mentoringSection?.classList.remove('hidden');
    consultanSection?.classList.add('hidden');
    allmentorSection?.classList.add('hidden');
    activateButton(mentoringBtn);
  });

  consultanBtn?.addEventListener('click', () => {
    mentoringSection?.classList.add('hidden');
    consultanSection?.classList.remove('hidden');
    allmentorSection?.classList.add('hidden');
    activateButton(consultanBtn);
  });

  allmentorBtn?.addEventListener('click', () => {
    mentoringSection?.classList.add('hidden');
    consultanSection?.classList.add('hidden');
    allmentorSection?.classList.remove('hidden');
    activateButton(allmentorBtn);
  });
  
  const slides = document.querySelectorAll('.slide');
  const buttons = document.querySelectorAll('.carousel-btn');
      
  buttons.forEach(button => {
    button.addEventListener('click', function() {
      const slideIndex = parseInt(this.getAttribute('data-slide'));

      slides.forEach(slide => {
          slide.classList.add('hidden');
          slide.classList.remove('active');
      });
          
      slides[slideIndex].classList.remove('hidden');
      slides[slideIndex].classList.add('active');
          
      buttons.forEach(btn => {
        btn.classList.remove('bg-white');
        btn.classList.add('bg-transparent');
      });
          
      this.classList.remove('bg-transparent');
      this.classList.add('bg-white');
     });
  });
}); 
      