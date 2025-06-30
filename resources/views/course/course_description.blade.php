@extends('layout.headfoot')

@section('content')
    <div class="bg-white min-h-screen pt-24">
        <div class="max-w-7xl mx-auto px-4 py-6 flex flex-col lg:flex-row gap-8">
            <div class="flex-1 space-y-6">
                <!-- Title -->
                <div>
                    <h1 class="text-2xl font-bold text-[#3b3b98] mb-2">
                        {{ is_string($course_description->title) ? htmlspecialchars($course_description->title) : 'No Title' }}
                    </h1>
                </div>
                <!-- Tag -->
                <div>
                    <span class="inline-block text-[#5c4ac7] text-[18px] font-semibold px-2 py-[2px] rounded">
                        {{ is_string($course_description->tag) ? htmlspecialchars($course_description->tag) : 'No Tag' }}
                    </span>
                </div>
                <!-- Overview -->
                <section class="border rounded-md p-4 text-[13px] max-w-9/10">
                    <h3 class="text-[#3b3b98] font-semibold text-[15px] mb-2">Overview</h3>
                    <p class="text-[17px]">
                        {!! is_string($course_description->overview) ? $course_description->overview : 'No Overview' !!}
                    </p>
                </section>
            </div>
            <!-- Sidebar -->
            <aside class="w-full lg:w-[320px] flex-shrink-0 space-y-6">
                <div class="border rounded-md p-6 flex flex-col items-center gap-4">
                    <div class="w-full aspect-video mb-2">
                        <img class="w-full h-full object-cover rounded-lg"
                            src="{{ asset('storage/' . (is_string($course_description->image_url ?? $course_description->thumbnail) ? ($course_description->image_url ?? $course_description->thumbnail) : 'default.jpg')) }}"
                            alt="Course image" />
                    </div>
                    <div class="w-full">
                        <p class="text-[17px] font-semibold">
                            Rp
                            {{ number_format(is_numeric($course_description->price) ? $course_description->price : 0, 0, ',', '.') }}
                        </p>
                        @if ($course_description->price_discount && is_numeric($course_description->price_discount))
                            <p class="text-[14px] line-through text-[#9ca3af]">
                                Rp {{ number_format($course_description->price_discount, 0, ',', '.') }}
                            </p>
                        @endif
                    </div>
                    <button id="pay-button" data-course-id="{{ $course_description->id }}"
                        class="w-full bg-[#564AB1] text-white text-[15px] font-semibold py-3 rounded-lg">Beli
                        Course</button>
                </div>
                <!-- Instructor -->
                <div class="border rounded-md p-4 flex items-center gap-4 text-[13px]">
                    <img class=" Hungarian 10, 2025
                        <div class=" flex flex-col">
                    <span class="font-semibold text-[14px]">
                        {{ is_string($course_description->instructor_name) ? htmlspecialchars($course_description->instructor_name) : 'No Name' }}
                    </span>
                    <span class="text-[#6b7280]">
                        {{ is_string($course_description->instructor_position) ? htmlspecialchars($course_description->instructor_position) : 'No Position' }}
                    </span>
                </div>
        </div>
        <!-- Features -->
        <div class="border rounded-md p-4 text-[13px]">
            <p class="font-semibold mb-3 text-[14px]">This Course Include</p>
            <ul class="space-y-2">
                <li class="flex items-center gap-2">
                    <i class="far fa-file-video text-[#5c4ac7]"></i>
                    {{ is_numeric($course_description->video_count) ? $course_description->video_count : 0 }} Video
                </li>
                <li class="flex items-center gap-2">
                    <i class="far fa-clock text-[#5c4ac7]"></i>
                    {{ is_numeric($course_description->duration) ? $course_description->duration / 60 : 0 }} Jam
                </li>
                @if ($course_description->features && is_array($course_description->features))
                    @foreach ($course_description->features as $feature)
                        <li class="flex items-center gap-2">
                            <i class="far fa-check-circle text-[#5c4ac7]"></i>
                            {{ is_string($feature) ? htmlspecialchars($feature) : 'No Feature' }}
                        </li>
                    @endforeach
                @elseif ($course_description->features && is_string($course_description->features))
                    @foreach (json_decode($course_description->features) as $feature)
                        <li class="flex items-center gap-2">
                            <i class="far fa-check-circle text-[#5c4ac7]"></i>
                            {{ is_string($feature) ? htmlspecialchars($feature) : 'No Feature' }}
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        </aside>
    </div>
    </div>

    <!-- Midtrans Snap Script -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.clientKey') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#pay-button').on('click', function () {
                var courseId = $(this).data('course-id');
                console.log('Button clicked, courseId:', courseId);
                $.get('/payment/' + courseId, function (response) {
                    console.log('Response:', response);
                    if (response.snapToken) {
                        snap.pay(response.snapToken, {
                            onSuccess: function (result) {
                                alert('Payment Success! Transaction ID: ' + result.transaction_id);
                                console.log(result);
                                window.location.href = '{{ route('payment.success') }}';
                            },
                            onPending: function (result) {
                                alert('Payment Pending! Transaction ID: ' + result.transaction_id);
                                console.log(result);
                            },
                            onError: function (result) {
                                alert('Payment Failed! Error: ' + result.status_message);
                                console.log(result);
                            },
                            onClose: function () {
                                alert('You closed the payment popup.');
                            }
                        });
                    } else {
                        console.error('No snapToken in response:', response);
                    }
                }).fail(function (xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                });
            });
        });
    </script>
@endsection