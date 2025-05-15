document.addEventListener("DOMContentLoaded", function () {
  // Data khusus untuk Consultan
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
      nama: "wardhana putra",
      jabatan: "UI/UX Designer at CreativeLab",
      pengalaman: "3 Tahun Pengalaman",
      foto: "image/siti.jpg"
    }
  ];

  // Data khusus untuk All Mentor
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

  // Fungsi untuk render card dinamis
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

  // Render ke masing-masing container
  createCards("consultan-card-container", "consultan-card-template", dataConsultan);
  createCards("allmentorcard-container", "allmentor-card-template", dataAllMentor);

  // Inisialisasi AOS jika tersedia
  if (typeof AOS !== "undefined") {
    AOS.init({ duration: 1000, once: true });
  }
});