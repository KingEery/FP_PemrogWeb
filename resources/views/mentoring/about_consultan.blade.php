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
  <div class="bg-white py-6 px-[5%]" >
    <div class="flex flex-wrap gap-4 justify-start">

     <a href="{{ route('mentoring') }}">
      <button class="px-6 py-3 rounded-full border-2 border-[#564AB1] text-[#564AB1] font-medium transition-all duration-300 hover:bg-[#564AB1]/5" id="about_section" data-aos="fade-up"> 
        Exclusive Mentoring
      </button>
    </a>
      <button class="px-6 py-3 rounded-full bg-[#564AB1] text-white font-medium transition-all duration-300 hover:bg-[#473D94]" id="about_section" data-aos="fade-up"> 
        Consultan
      </button>
      <button class="px-6 py-3 rounded-full border-2 border-[#564AB1] text-[#564AB1] font-medium transition-all duration-300 hover:bg-[#564AB1]/5" id="about_section" data-aos="fade-up">
        All Mentor
      </button>


<div class="bg-white text-black px-[5%] py-16 flex justify-between items-center flex-wrap gap-8" >
    <div class="team-container">
      <div class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-category="about_consultan">
  <!--    <div class="max-w-xs rounded-xl shadow-lg overflow-hidden border border-gray-200"> -->
        <img class="w-full h-48 object-cover" src="image/engas.jpg" alt="Mentor Photo" />
        <div class="p-4">
          <p class="text-sm text-gray-500 mb-1">Product Management</p>
          <h3 class="text-lg font-semibold text-gray-800">Adithya Firmansyah Putra</h3>
          
          <div class="mt-3 space-y-1 bg-gray-100 p-3 rounded-lg text-sm text-gray-700">
            <div class="flex items-center gap-2">
              <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="1.5"
                   viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M16.5 3.75H7.5A2.25 2.25 0 005.25 6v12a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0016.5 3.75zM8.25 7.5h7.5m-7.5 3.75h7.5m-7.5 3.75h3.75"/>
              </svg>
              <span>Product Engineer at Zero One Group</span>
            </div>
            <div class="flex items-center gap-2">
              <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="1.5"
                   viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 6v6l4 2m6 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
              <span>5 Tahun Pengalaman</span>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>


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
>>>>>>> 212c0a1780328ea77e5ced8c7457f9c437137474

  <script src="/js/event.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
    duration: 1000,
    once: true
    });
  </script>

@endsection