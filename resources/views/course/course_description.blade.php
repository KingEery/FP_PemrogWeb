@extends('layout.headfoot')

@section('content')

<div class="bg-white min-h-screen pt-24">
    <div class="max-w-7xl mx-auto px-4 py-6 flex flex-col lg:flex-row gap-6">

        @foreach ($course_description as $course)
        <div class="flex-1 space-y-6">
            <!-- Tag -->
            <div>
                <span class="inline-block text-[#5c4ac7] text-[18px] font-semibold px-2 py-[2px] rounded">
                    {{ $course->tag }}
                </span>
            </div>

            <!-- Overview -->
            <section class="border rounded-md p-4 text-[13px]">
                <h3 class="text-[#3b3b98] font-semibold text-[15px] mb-2">Overview</h3>
                <p class="text-[17px]">{{ $course->overview }}</p>
            </section>
        </div>

        <!-- Sidebar -->
        <aside class="max-w-xs space-y-4">
            <div class="border rounded-md p-4 flex flex-col items-center gap-3">
                <img class="w-full rounded" src="{{ $course->image_url ?? $course->course->thumbnail }}" alt="Course image" />
                <div class="w-full">
                    <p class="text-[15px] font-semibold">
                        Rp {{ number_format($course->course->price, 0, ',', '.') }}
                    </p>
                    @if ($course->course->original_price)
                    <p class="text-[13px] line-through text-[#9ca3af]">
                        Rp {{ number_format($course->course->original_price, 0, ',', '.') }}
                    </p>
                    @endif
                </div>

                <button class="w-full bg-[#564AB1] text-white text-[13px] font-semibold py-2 rounded">Beli Course</button>
            </div>

            <!-- Instructor -->
            <div class="border rounded-md p-4 flex items-center gap-3 text-[12px]">
                <img class="w-10 h-10 rounded-full object-cover" src="{{ $course->instructor_image_url }}" />
                <div class="flex flex-col">
                    <span class="font-semibold text-[13px]">{{ $course->course->instructor }}</span>
                    <span class="text-[#6b7280]">{{ $course->instructor_position }}</span>
                </div>
            </div>

            <!-- Features -->
            <div class="border rounded-md p-4 text-[12px]">
                <p class="font-semibold mb-3 text-[13px]">This Course Include</p>
                <ul class="space-y-2">
                    <li class="flex items-center gap-2">
                        <i class="far fa-file-video text-[#5c4ac7]"></i>
                        {{ $course->course->video_count }} Video
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="far fa-clock text-[#5c4ac7]"></i>
                        {{ $course->course->duration ?? 'N/A' }}
                    </li>
                    @if ($course->features)
                    @foreach (json_decode($course->features) as $feature)
                    <li class="flex items-center gap-2">
                        <i class="far fa-check-circle text-[#5c4ac7]"></i>
                        {{ $feature }}
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </aside>
        @endforeach


    </div>
</div>

@endsection
