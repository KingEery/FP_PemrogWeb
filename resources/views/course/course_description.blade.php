@extends('layout.headfoot')

@section('content')
<div class="bg-white min-h-screen pt-24">
    <div class="max-w-7xl mx-auto px-4 py-6 flex flex-col lg:flex-row gap-8">
        <div class="flex-1 space-y-6">
            <!-- Title -->
            <div>
                <h1 class="text-2xl font-bold text-[#3b3b98] mb-2">{{ $course_description->title }}</h1>
            </div>
            <!-- Tag -->
            <div>
                <span class="inline-block text-[#5c4ac7] text-[18px] font-semibold px-2 py-[2px] rounded">
                    {{ $course_description->tag }}
                </span>
            </div>

            <!-- Overview -->
            <section class="border rounded-md p-4 text-[13px] max-w-9/10">
                <h3 class="text-[#3b3b98] font-semibold text-[15px] mb-2">Overview</h3>
                <p class="text-[17px]">{{ $course_description->overview }}</p>
            </section>
        </div>

        <!-- Sidebar -->
        <aside class="w-full lg:w-[320px] flex-shrink-0 space-y-6">
            <div class="border rounded-md p-6 flex flex-col items-center gap-4">
                <div class="w-full aspect-video mb-2">
                    <img class="w-full h-full object-cover rounded-lg"
                        src="{{ asset('storage/' . ($course_description->image_url ?? $course_description->thumbnail)) }}" alt="Course image" />
                </div>
                <div class="w-full">
                    <p class="text-[17px] font-semibold">
                        Rp {{ number_format($course_description->price, 0, ',', '.') }}
                    </p>
                    @if ($course_description->price_discount)
                    <p class="text-[14px] line-through text-[#9ca3af]">
                        Rp {{ number_format($course_description->price_discount, 0, ',', '.') }}
                    </p>
                    @endif


                </div>

                <button class="w-full bg-[#564AB1] text-white text-[15px] font-semibold py-3 rounded-lg">Beli Course</button>
            </div>

            <!-- Instructor -->
            <div class="border rounded-md p-4 flex items-center gap-4 text-[13px]">
                <img class="w-12 h-12 rounded-full object-cover"
                    src="{{ asset('storage/' . $course_description->instructor_image_url) }}" alt="Instructor Photo" />
                <div class="flex flex-col">
                    <span class="font-semibold text-[14px]">{{ $course_description->instructor_name }}</span>
                    <span class="text-[#6b7280]">{{ $course_description->instructor_position }}</span>
                </div>
            </div>

            <!-- Features -->
            <div class="border rounded-md p-4 text-[13px]">
                <p class="font-semibold mb-3 text-[14px]">This Course Include</p>
                <ul class="space-y-2">
                    <li class="flex items-center gap-2">
                        <i class="far fa-file-video text-[#5c4ac7]"></i>
                        {{ $course_description->video_count }} Video
                    </li>Add commentMore actions
                    <li class="flex items-center gap-2">
                        <i class="far fa-clock text-[#5c4ac7]"></i>
                        {{ $course->course->duration ?? 'N/A' }}
                        {{ $course_description->duration /60 }} Jam
                    </li>
                    @if ($course_description->features)
                   @foreach (json_decode($course_description->features) as $feature)
                    <li class="flex items-center gap-2">
                        <i class="far fa-check-circle text-[#5c4ac7]"></i>
                        {{ $feature }}
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </aside>
    </div>
</div>
