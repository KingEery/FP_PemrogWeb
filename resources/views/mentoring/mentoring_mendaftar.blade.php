@extends('layout.headfoot')

@section('content')

        <section class="bg-gray-50 text-gray-800 font-sans">
            <div class="max-w-5xl mx-auto p-5">
                <div class="text-center mb-10">
                    <h1 class="text-3xl font-bold text-purple-800 mb-5">Siapa yang Cocok Mengikuti Program Ini?</h1>
                    <p class="text-lg">Program ini dirancang khusus untuk kamu yang ingin mempercepat perjalanan karimu:</p>
                </div>

                <div class="flex flex-col md:flex-row gap-5 mb-10">
                    <div class="bg-white rounded-lg p-5 shadow flex-1 flex flex-col">
                        <h3 class="text-xl font-bold text-purple-800 mt-0">Mahasiswa</h3>
                        <p class="mt-2">Mahasiswa dengan ilmu komputer, atau bidang terkait yang ingin memperkuat keterampilan fundamental programming dan mengembangkan basis pengetahuan teknis yang dalam.</p>
                    </div>
                    <div class="bg-white rounded-lg p-5 shadow flex-1 flex flex-col">
                        <h3 class="text-xl font-bold text-purple-800 mt-0">IT Professional</h3>
                        <p class="mt-2">Profesional dari berbagai bidang pemrograman, manajemen projek, atau peran yang ingin beralih ke pengembangan web atau pembelajaran keterampilan komputasional baru untuk karir.</p>
                    </div>
                    <div class="bg-white rounded-lg p-5 shadow flex-1 flex flex-col">
                        <h3 class="text-xl font-bold text-purple-800 mt-0">Freelancer</h3>
                        <p class="mt-2">Freelancer pemula yang ingin membangun karir untuk dipromosikan dengan menyajikan portofolio yang menarik dan standar industri.</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg p-6 shadow mb-8">
                    <span class="inline-block bg-purple-800 text-white font-bold px-5 py-2 rounded-full mb-4">Tentang Program</span>
                    <h2 class="text-2xl font-bold text-purple-800 mt-2">Apa itu Program "Exclusive Mentoring: Program Full Stack Web Development"?</h2>
                    <p class="mt-4 leading-relaxed">Ingin belajar web development dengan bimbingan intensif? Program Exclusive Mentoring dari Dunia Coding menawarkan mentoring one-to-one yang dirancang khusus untuk kamu yang kesulitan belajar di lingkungan formal atau mandiri.</p>
                    <p class="mt-3 leading-relaxed">Mentoring privat 1-on-1 selama 3 bulan, mulai dari dasar HTML, CSS, JavaScript hingga proyek nyata.</p>
                    <p class="mt-3 leading-relaxed">Materi fleksibel sesuai kebutuhan, didampingi mentor berpengalaman dengan framework seperti Bootstrap & ReactJS, bahasa populer, dan latihan real-world untuk persiapan memasuki dunia kerja.</p>
                </div>

                <div class="bg-white rounded-lg p-6 shadow mb-8">
                    <span class="inline-block bg-purple-800 text-white font-bold px-5 py-2 rounded-full mb-4">Materi</span>
                    <h2 class="text-2xl font-bold text-purple-800 mt-2">Materi Apa Saja yang Akan Kamu Pelajari?</h2>
                    <p class="mt-4 leading-relaxed">Kurikulum Exclusive Mentoring kami dirancang secara cermat untuk memenuhi kebutuhan industri sambil memastikan kamu mengembangkan keterampilan yang relevan dan praktis.</p>
                    <p class="mt-3 leading-relaxed">Kamu akan melalui beberapa fase yang terbagi dalam chapter yang bisa kamu dalami dan mewujudkan materi yang kamu kuasai dengan kebutuhanmu, seperti portofolio dalam kurun 3 bulan penuhmu.</p>
                    
                    <div class="mt-6 pl-5">
                        <h3 class="text-xl font-bold text-purple-800">Materi Dasar:</h3>
                        <ul class="list-disc pl-5 mt-3 space-y-2">
                            <li>HTML5 & Semantic Web</li>
                            <li>CSS3 & Responsive Design</li>
                            <li>JavaScript Fundamentals</li>
                            <li>Version Control dengan Git</li>
                        </ul>
                        
                        <h3 class="text-xl font-bold text-purple-800 mt-6">Front-End Development:</h3>
                        <ul class="list-disc pl-5 mt-3 space-y-2">
                            <li>ReactJS Framework</li>
                            <li>State Management</li>
                            <li>API Integration</li>
                            <li>UI/UX Best Practices</li>
                        </ul>
                        
                        <h3 class="text-xl font-bold text-purple-800 mt-6">Back-End Development:</h3>
                        <ul class="list-disc pl-5 mt-3 space-y-2">
                            <li>Node.js & Express</li>
                            <li>Database Design (SQL & NoSQL)</li>
                            <li>Authentication & Authorization</li>
                            <li>RESTful API Development</li>
                        </ul>
                        
                        <h3 class="text-xl font-bold text-purple-800 mt-6">Project Work:</h3>
                        <ul class="list-disc pl-5 mt-3 space-y-2">
                            <li>Portofolio Website</li>
                            <li>Full Stack Web Application</li>
                            <li>Code Review & Best Practices</li>
                            <li>Deployment & Hosting</li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg p-6 shadow mb-8">
                    <h2 class="text-2xl font-bold text-purple-800">Manfaat Program</h2>
                    <ul class="list-disc pl-8 mt-4 space-y-2">
                        <li>Bimbingan 1-on-1 dengan mentor berpengalaman</li>
                        <li>Kurikulum yang disesuaikan dengan kebutuhan dan tingkat keahlianmu</li>
                        <li>Proyek portofolio lengkap untuk melamar pekerjaan</li>
                        <li>Fleksibilitas jadwal sesuai ketersediaan waktu</li>
                        <li>Sertifikat penyelesaian program</li>
                        <li>Akses ke komunitas alumni dan jaringan industri</li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-lg p-6 shadow mb-8">
                    <h2 class="text-2xl font-bold text-purple-800">Daftar Sekarang</h2>
                    <p class="mt-4">Tempat terbatas! Kami hanya menerima 10 peserta per batch untuk memastikan kualitas mentoring.</p>
                    <button class="bg-purple-800 text-white font-bold px-5 py-2 rounded-full mt-4 cursor-pointer hover:bg-purple-900 transition-colors">Daftar Program</button>
                </div>
            </div>
        </section>
        


@endsection