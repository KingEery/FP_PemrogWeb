@extends('layout.headfoot')

@section('content')
<link rel="stylesheet" href="{{ asset (path: 'css1/home.css') }}">

<!-- page 1 -->
  <section class="homepage" id="home" data-aos="fade-up">
    <div class="homepage-text">
      <h1>Develop your skills in a new and unique way</h1>
      <p>Discover the best coding course for your kids. Learn Coding from basic</p>
    </div>
    <div class="homepage-img md:w-1/2 flex justify-center">
        <img class = "homepage-img" src="image/homepsge-img.png "alt="">
        <img class = "homepage-img" src="image/homepage-img.png "alt="">

    </div>
  </section>
<!-- page 2 -->
  <section class="page2" id="page2" data-aos="fade-up">
    <div class="head">
      <span>Telah dipercaya oleh :</span>
   </div>
  </section>

  <!-- page 3 -->


<!-- <div data-aos="fade-up"
data-aos-anchor-placement="top-bottom">
</div> -->
<section class="masking" id="masking" data-aos="fade-up">
  <div class="masking-content">
      <div class="masking-text">
          <h1>Exclusive Mentoring</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
              Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
      </div>
      <div class="masking-png">
          <img src="{{ asset('image/masking.png') }}" alt="homepage">
      </div>
  </div>
</section>



<!-- <section class="masking" id="masking">

  <div class="masking-content">
      <div class="masking-text">
        
      </div>
      <div class="masking-img">
          <img src="" alt=" image ">
      </div>
  </div>
</section> -->

<!-- page 4 -->
<script>
  // Data untuk setiap program mentoring
  const programs = [
    {
      title: "Mentoring Web Development",
      desc: "Belajar HTML, CSS, dan JavaScript dari dasar hingga mahir.",
      price: "Rp 100.000"
    },
    {
      title: "Mentoring UI/UX Design",
      desc: "Pelajari prinsip desain, Figma, dan user research.",
      price: "Rp 120.000"
    },
    {
      title: "Mentoring Data Science",
      desc: "Mulai dari analisis data hingga machine learning dengan Python.",
      price: "Rp 150.000"
    },
    {
      title: "Mentoring Mobile App",
      desc: "Bangun aplikasi Android/iOS menggunakan Flutter.",
      price: "Rp 130.000"
    }
  ];

  // Container utama
  const container = document.createElement('div');
  container.className = "grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-10";

  // Loop untuk membuat setiap kartu
  programs.forEach(program => {
    const card = document.createElement('div');
    card.className = "bg-white p-6 rounded-2xl shadow hover:shadow-xl transition";

    const title = document.createElement('h2');
    title.className = "text-xl font-bold mb-2";
    title.textContent = program.title;

    const desc = document.createElement('p');
    desc.className = "text-gray-600 mb-4";
    desc.textContent = program.desc;

    const price = document.createElement('p');
    price.className = "text-lg font-semibold text-green-600 mb-4";
    price.textContent = program.price;

    const button = document.createElement('button');
    button.className = "bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition";
    button.textContent = "Daftar Sekarang";

    // Tambahkan ke dalam kartu
    card.appendChild(title);
    card.appendChild(desc);
    card.appendChild(price);
    card.appendChild(button);

    // Tambahkan kartu ke container
    container.appendChild(card);
  });

  // Tambahkan container ke body
  document.body.appendChild(container);
</script>



  <!-- AOS JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>

@endsection
