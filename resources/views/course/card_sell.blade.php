<div class="bg-white rounded-xl shadow p-4 hover:shadow-lg transition">
    <img src="https://media.istockphoto.com/id/1919863292/id/foto/pendidikan-e-learning-pelajaran-internet-dan-pembelajaran-online-dengan-webinar-tutorial-video.jpg?s=1024x1024&w=is&k=20&c=z5uAhXM4BZ18BrUkVegdJuv_9vuGNwPmKYyytRHRvlc=" width="200" height="150" class="rounded-lg mb-3" alt="Course Thumbnail">
    <h3 class="font-semibold text-lg">{{ $title ?? 'Laravel 12 Mastery' }}</h3>
    <p class="text-sm text-gray-600 mb-1">Instruktur: {{ $instructor ?? 'Mbah Bregas' }}</p>
    <p class="text-sm text-gray-600 mb-1">{{ $duration ?? '4 jam 30 menit • 23 video' }}</p>
    <p class="text-sm text-red-500 line-through">Rp. {{ $original ?? '300.000' }}</p>
    <p class="text-blue-600 font-bold text-lg">Rp. {{ $price ?? '99.000' }}</p>
    <a href="#" class="inline-block mt-2 bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 text-sm">Lihat Detail</a>
</div>
