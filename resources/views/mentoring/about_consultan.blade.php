@extends('layout.headfoot')

@section('content')
  <section class="bg-primary-light text-white px-[5%] py-16 flex justify-between items-center flex-wrap gap-8">
    <div class="max-w-lg">
    <h1 class="text-4xl font-bold mb-5 leading-tight">Get Closer with Mentoring</h1>
    <p class="mb-8 opacity-90 text-lg leading-relaxed">Nikmati pengalaman belajar yang intensif dan private melalui
      program Mentoring kami. Semua dilakukan secara privat dengan mentor berpengalaman, memastikan setiap sesi
      dirancang khusus untuk kebutuhan dan tujuanmu</p>
    <div class="flex gap-4">
      <button
      class="px-7 py-3 rounded-md bg-white text-[#564AB1] font-medium transition-all duration-300 hover:bg-gray-100 hover:-translate-y-0.5">Get
      Started</button>
      <button
      class="px-7 py-3 rounded-md border-2 border-white text-white font-medium transition-all duration-300 hover:bg-white/10">Learn
      More</button>
    </div>
    </div>
    <div
    class="w-[630px] h-[380px] bg-primary-dark rounded-xl overflow-hidden mx-auto shadow-lg flex flex-col justify-between pb-4">
    <div class="mt-5 text-center">
      <img class="w-[576px] h-[324px] mx-auto rounded-xl object-cover" src="image/devfest-stockholm.png"
      alt="Event Image" />
    </div>
    <div class="flex justify-center gap-2.5 mt-4">
      <button type="button" class="w-3 h-3 rounded-full border-2 border-white bg-white" data-slide="1"></button>
      <button type="button"
      class="w-3 h-3 rounded-full border-2 border-white bg-transparent hover:scale-110 transition-transform"
      data-slide="2"></button>
      <button type="button"
      class="w-3 h-3 rounded-full border-2 border-white bg-transparent hover:scale-110 transition-transform"
      data-slide="3"></button>
    </div>
    </div>

  </section>
  <div class="bg-white py-6 px-[5%]">
    <div class="flex flex-wrap gap-4 justify-start">
    <a href="{{ route('mentoring') }}">
      <button
      class="px-6 py-3 rounded-full bg-[#564AB1] text-white font-medium transition-all duration-300 hover:bg-[#473D94]">
      Exclusive Mentoring
      </button>
    </a>
    <button
      class="px-6 py-3 rounded-full border-2 border-[#564AB1] text-[#564AB1] font-medium transition-all duration-300 hover:bg-[#564AB1]/5">
      Consultan
    </button>
    <button
      class="px-6 py-3 rounded-full border-2 border-[#564AB1] text-[#564AB1] font-medium transition-all duration-300 hover:bg-[#564AB1]/5">
      All Mentor
    </button>
    </div>
  </div>


  <section class="bg-primary-light text-black px-[5%] py-16 flex justify-between items-center flex-wrap gap-8"
    id="about_section" data-aos="fade-up">
    <div class="about-section">
    <h1>Tentang Kami</h1>
    <p>Kami adalah platform mentoring yang menghubungkan profesional berpengalaman dengan para pembelajar dan pengembang
      pemula.</p>

    <div class="team-container">
      <div class="team-card">
      <img src="{{ asset('image/adithya.jpeg') }}" alt="Adithya" class="width-32 h-32 rounded-full">
      <h3>Adithya Firmansyah Putra</h3>
      <p>Product Engineer at Zero One Group</p>
      <p>5 Tahun Pengalaman</p>
      </div>
      <div class="team-card">
      <img src="{{ asset('image/ahmad.jpeg') }}" alt="Ahmad" class="width-32 h-32 rounded-full">
      <h3>Ahmad Alfan Juniyanto</h3>
      <p>Backend Developer at RCTI+</p>
      <p>5 Tahun Pengalaman</p>
      </div>
      <div class="team-card">
      <img src="{{ asset('image/aldo.jpeg') }}" alt="Aldo" class="width-32 h-32 rounded-full">
      <h3>Aldo Wijaya</h3>
      <p>Software Engineer at Saptakarsa Prima</p>
      <p>2 Tahun Pengalaman</p>
      </div>
      <div class="team-card">
      <img src="{{ asset('image/alfian.jpeg') }}" alt="Alfian" class="width-32 h-32 rounded-full">
      <h3>Alfian Luthfi</h3>
      <p>Software Engineer at Dunia Coding</p>
      <p>4 Tahun Pengalaman</p>
      </div>
    </div>
    </div>
  </section>

  <script src="/js/event.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
    duration: 1000,
    once: true
    });
  </script>

@endsection