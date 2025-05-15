@extends('layout.headfoot')

@section('content')
<section class="bg-gray-100 text-textDark leading-relaxed">
    <div class="max-w-screen-xl mx-auto px-4 relative">
        <div class="flex items-start pt-8">
            <div class="mr-6">
                <div class="w-24 h-24 rounded-full border-4 border-white bg-gray-100 overflow-hidden flex items-center justify-center">
                    <img src="image/user3.png" alt="Adithya Firmansyah Putra" class="w-1/9 h-auto">
                </div>
            </div>
            
            <div class="flex-1">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-2xl font-bold mb-1">Adithya Firmansyah Putra</h1>
                        <p class="text-textLight text-sm">Product Engineer at Zero One Group</p>
                        <div class="inline-block bg-amber-100 text-amber-800 text-xs px-3 py-1 rounded-full mt-2">Product Management</div>
                    </div>
                    <div class="flex gap-2">
                        <button class="border border-accent text-accent py-1 px-4 rounded">Share</button>
                        <div class="flex gap-2">
                            <a href="#" aria-label="Instagram" class="w-8 h-8 rounded-full flex items-center justify-center text-primary bg-gray-100 border border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                </svg>
                            </a>
                            <a href="#" aria-label="LinkedIn" class="w-8 h-8 rounded-full flex items-center justify-center text-primary bg-gray-100 border border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="mt-8 border-b border-gray-300">
            <ul class="flex">
                <li class="mr-6"><a href="#" class="block py-2 text-primary font-medium relative after:content-[''] after:absolute after:bottom-[-1px] after:left-0 after:w-full after:h-0.5 after:bg-primary">Overview</a></li>
                <li class="mr-6"><a href="#" class="block py-2 text-textLight">Course</a></li>
                <li class="mr-6"><a href="#" class="block py-2 text-textLight">Event</a></li>
                <li class="mr-6"><a href="#" class="block py-2 text-textLight">Portfolio</a></li>
                <li class="mr-6"><a href="#" class="block py-2 text-textLight">Certification</a></li>
            </ul>
        </div>
        
        <div class="py-8">
            <div class="grid grid-cols-3 gap-8">
                <div class="col-span-2">
                    <h2 class="text-lg font-semibold mb-4">About Me</h2>
                    <p class="mb-6 text-sm leading-relaxed">
                        Product Engineer with 5+ years of experience developing apps for finance, e-commerce, and 
                        hotel & travel sectors. Skilled in Flutter, Dart, and Kotlin. I excel in teamwork, problem-solving, 
                        leadership, and communication. As a freshman at Bina Nusantara University, I am passionate 
                        about using technology to make a positive impact on society.
                    </p>
                    
                    <div>
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold mb-4">Experiences</h2>
                            <div class="text-right">
                                <a href="#" class="text-accent text-sm">View More</a>
                            </div>
                        </div>
                        
                        <div class="p-4 border border-gray-300 rounded-lg mb-4 bg-white">
                            <h3 class="font-semibold mb-1">iOS Developer</h3>
                            <div class="text-textLight text-sm flex items-center mb-1">
                                Apple Developer Academy <span class="mx-1 text-gray-300">|</span> Infinite Learning
                            </div>
                            <div class="text-textLight text-xs">Feb 2025 - Sekarang</div>
                        </div>
                        
                        <div class="p-4 border border-gray-300 rounded-lg mb-4 bg-white">
                            <h3 class="font-semibold mb-1">Chief Technology Officer</h3>
                            <div class="text-textLight text-sm mb-1">
                                Jago London
                            </div>
                            <div class="text-textLight text-xs">Jan 2025 - Sekarang</div>
                        </div>
                        
                        <div class="p-4 border border-gray-300 rounded-lg mb-4 bg-white">
                            <h3 class="font-semibold mb-1">Project Manager</h3>
                            <div class="text-textLight text-sm mb-1">
                                Sakuten
                            </div>
                            <div class="text-textLight text-xs">Nov 2024 - Sekarang</div>
                        </div>
                        
                        <div class="p-4 border border-gray-300 rounded-lg mb-4 bg-white">
                            <h3 class="font-semibold mb-1">Founder</h3>
                            <div class="text-textLight text-sm mb-1">
                                Logh
                            </div>
                            <div class="text-textLight text-xs">Okt 2024 - Sekarang</div>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <h2 class="text-lg font-semibold mb-4">Educations</h2>
                        
                        <div class="p-4 border border-gray-300 rounded-lg mb-4 bg-white flex">
                            <div class="w-12 h-12 bg-gray-100 flex items-center justify-center mr-4 border border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">BINUS University</h4>
                                <p class="text-textLight text-sm mb-1">Computer Science</p>
                                <div class="text-textLight text-xs">2024 - Sekarang</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4">Location</h3>
                        <div class="flex items-center">
                            <div class="w-6 h-6 rounded-full bg-red-100 flex items-center justify-center mr-2 text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                            </div>
                            <div>Jakarta Timur</div>
                        </div>
                    </div>
                    
                    <div class="bg-[#7C72C3] text-white p-6 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Booking sesi konsultasimu sekarang!</h3>
                        <p class="text-sm mb-4">Kamu dapat melakukan konsultasi secara 1 on 1 bersama mentor berpengalaman.</p>
                        <button class="bg-white text-[#7C72C3] font-medium py-3 px-4 rounded w-full mb-2">Booking Sekarang</button>
                        <button class="bg-transparent border border-white text-white font-medium py-3 px-4 rounded w-full">Coba Gratis</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 
