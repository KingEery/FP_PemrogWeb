@extends('layout.headfoot')

@section('content')
<!-- page 1 -->
  <section class="homepage" id="home" data-aos="fade-up">
    <div class="homepage-text">
      <h1>Develop your skills in a new and unique way</h1>
      <p>Discover the best coding course for your kids. Learn Coding from basic</p>
    </div>
    <div class="homepage-img md:w-1/2 flex justify-center">>
        <img class = "homepage-img" src="image/homepsge-img.png "alt="">
    </div>
  </section>
<!-- page 2 -->
  <section class="page2" id="page2" data-aos="fade-up">
    <div class="head">
      <span>Telah dipercaya oleh :</span>
   </div>
  </section>

  <!-- AOS JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>

@endsection
