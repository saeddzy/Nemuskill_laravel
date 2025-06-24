<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nemu - Platform Pembelajaran Online</title>
    
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.12.0/dist/cdn.min.js"></script>
    <style>
        .hamburger {
            transition: all 0.3s ease-in-out;
        }
        .hamburger-line {
            transition: all 0.3s ease-in-out;
            transform-origin: center;
        }
        .hamburger.active .hamburger-line:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }
        .hamburger.active .hamburger-line:nth-child(2) {
            opacity: 0;
        }
        .hamburger.active .hamburger-line:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }
        .mobile-menu {
            transition: all 0.3s ease-in-out;
            transform: translateX(100%);
        }
        .mobile-menu.active {
            transform: translateX(0);
        }
    </style>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('mobileMenu', {
                isOpen: false,
                toggle() {
                    this.isOpen = !this.isOpen;
                    document.querySelector('.hamburger').classList.toggle('active');
                }
            })
        })
    </script>
</head>
<body>

    
    <div class="bg-white">
        <!-- Header -->
        <header class="absolute inset-x-0 top-0 z-50">
          <nav x-data class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
              <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto" src="{{ asset('images/nemuskill-logo.png') }}" alt="">
              </a>
            </div>
            <div class="flex lg:hidden">
              <button @click="$store.mobileMenu.toggle()" type="button" class="hamburger -m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">
                <span class="sr-only">Toggle menu</span>
                <div class="flex flex-col gap-1.5">
                    <span class="hamburger-line block h-0.5 w-6 bg-current"></span>
                    <span class="hamburger-line block h-0.5 w-6 bg-current"></span>
                    <span class="hamburger-line block h-0.5 w-6 bg-current"></span>
                </div>
              </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
              <a href="#features" class="text-sm font-semibold leading-6 text-white hover:text-indigo-200">Fitur</a>
              <a href="#benefits" class="text-sm font-semibold leading-6 text-white hover:text-indigo-200">Keuntungan</a>
              <a href="#testimonials" class="text-sm font-semibold leading-6 text-white hover:text-indigo-200">Testimoni</a>
              <a href="#" class="text-sm font-semibold leading-6 text-white">Company</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
              <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-white hover:text-indigo-200">Masuk <span aria-hidden="true">&rarr;</span></a>
              
            </div>
          </nav>
          
          <!-- Mobile menu -->
          <div x-show="$store.mobileMenu.isOpen" 
               class="mobile-menu fixed inset-0 z-50 lg:hidden"
               @click.away="$store.mobileMenu.toggle()">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-900/80 transition-opacity duration-300" 
                 :class="$store.mobileMenu.isOpen ? 'opacity-100' : 'opacity-0'"
                 @click="$store.mobileMenu.toggle()"></div>
            
            <!-- Menu panel -->
            <div class="fixed inset-y-0 right-0 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
              <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                  <span class="sr-only">Your Company</span>
                  <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="">
                </a>
              </div>
              <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                  <div class="space-y-2 py-6">
                    <a href="#features" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Fitur</a>
                    <a href="#benefits" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Keuntungan</a>
                    <a href="#testimonials" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Testimoni</a>
                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
                  </div>
                  <div class="py-6">
                    <a href="{{ route('login') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Masuk</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>
        
        
        
        
        <div class="relative isolate overflow-hidden bg-gray-900 pb-16 pt-14 sm:pb-20">
            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2830&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                    <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                        <div class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-400 ring-1 ring-white/10 hover:ring-white/20">
                            Kelas baru telah ditambahkan! <a href="#" class="font-semibold text-white"><span class="absolute inset-0" aria-hidden="true"></span>Lihat kelas <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Platform Pembelajaran Online Terbaik</h1>
                        <p class="mt-6 text-lg leading-8 text-gray-300">Tingkatkan kemampuanmu dengan pembelajaran yang terstruktur dan interaktif. Dapatkan akses ke berbagai kelas berkualitas dari pengajar profesional.</p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <a href="{{ route('register') }}" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-blue-600 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Daftar Sekarang</a>
                            <a href="#features" class="text-sm font-semibold leading-6 text-white">Pelajari Lebih Lanjut <span aria-hidden="true">→</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
                
                
                <div class="bg-white py-24 sm:py-32">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl lg:max-w-none">
                            <div class="text-center">
                                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Platform Pembelajaran Terpercaya</h2>
                                <p class="mt-4 text-lg leading-8 text-gray-600">Bergabunglah dengan ribuan pelajar yang telah meraih kesuksesan melalui platform kami.</p>
                            </div>
                            <dl class="mt-16 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">
                                <div class="flex flex-col bg-gray-400/5 p-8">
                                    <dt class="text-sm font-semibold leading-6 text-gray-600">Total Pengajar</dt>
                                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">100+</dd>
                                </div>
                                <div class="flex flex-col bg-gray-400/5 p-8">
                                    <dt class="text-sm font-semibold leading-6 text-gray-600">Kelas Aktif</dt>
                                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">50+</dd>
                                </div>
                                <div class="flex flex-col bg-gray-400/5 p-8">
                                    <dt class="text-sm font-semibold leading-6 text-gray-600">Siswa Aktif</dt>
                                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">10K+</dd>
                                </div>
                                <div class="flex flex-col bg-gray-400/5 p-8">
                                    <dt class="text-sm font-semibold leading-6 text-gray-600">Rating Platform</dt>
                                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">4.8/5</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>

                <div class="bg-white py-24 sm:py-32">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Fitur Unggulan</h2>
                            <dl class="col-span-2 grid grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2">
                                <div>
                                    <dt class="text-base font-semibold leading-7 text-gray-900">
                                        <div class="mb-6 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
                                            </svg>
                                        </div>
                                        Kelas Interaktif
                                    </dt>
                                    <dd class="mt-1 text-base leading-7 text-gray-600">Belajar secara langsung dengan pengajar melalui sesi interaktif dan diskusi kelompok.</dd>
                                </div>
                                <div>
                                    <dt class="text-base font-semibold leading-7 text-gray-900">
                                        <div class="mb-6 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 0V4m0 16v-4" />
                                            </svg>
                                        </div>
                                        Progress Tracking
                                    </dt>
                                    <dd class="mt-1 text-base leading-7 text-gray-600">Pantau perkembangan belajar Anda dengan fitur progress tracking yang terintegrasi.</dd>
                                </div>
                                <div>
                                    <dt class="text-base font-semibold leading-7 text-gray-900">
                                        <div class="mb-6 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6" />
                                            </svg>
                                        </div>
                                        Pengajar Profesional
                                    </dt>
                                    <dd class="mt-1 text-base leading-7 text-gray-600">Dapatkan bimbingan dari pengajar berpengalaman dan profesional di bidangnya.</dd>
                                </div>
                                <div>
                                    <dt class="text-base font-semibold leading-7 text-gray-900">
                                        <div class="mb-6 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 8.25V6.75A2.25 2.25 0 0014.25 4.5h-4.5A2.25 2.25 0 007.5 6.75v1.5m9 0v8.25a2.25 2.25 0 01-2.25 2.25h-4.5A2.25 2.25 0 017.5 16.5V8.25m9 0H7.5" />
                                            </svg>
                                        </div>
                                        Sertifikat Online
                                    </dt>
                                    <dd class="mt-1 text-base leading-7 text-gray-600">Dapatkan sertifikat resmi setelah menyelesaikan kelas dan tingkatkan portofolio Anda.</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
 
                
                
            
                
                
                
                <div class="relative isolate bg-white pb-32 pt-24 sm:pt-32">
                    <div class="absolute inset-x-0 top-1/2 -z-10 -translate-y-1/2 transform-gpu overflow-hidden opacity-30 blur-3xl" aria-hidden="true">
                        <div class="ml-[max(50%,38rem)] aspect-[1313/771] w-[82.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                    </div>
                    <div class="absolute inset-x-0 top-0 -z-10 flex transform-gpu overflow-hidden pt-32 opacity-25 blur-3xl sm:pt-40 xl:justify-end" aria-hidden="true">
                        <div class="ml-[-22rem] aspect-[1313/771] w-[82.0625rem] flex-none origin-top-right rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] xl:ml-0 xl:mr-[calc(50%-12rem)]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                    </div>
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto max-w-xl text-center">
                            <h2 class="text-lg font-semibold leading-8 tracking-tight text-indigo-600">Fitur Unggulan</h2>
                            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Semua yang Anda Butuhkan untuk Belajar</p>
                        </div>
                        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 grid-rows-1 gap-8 text-sm leading-6 text-gray-900 sm:mt-20 sm:grid-cols-2 xl:mx-0 xl:max-w-none xl:grid-flow-col xl:grid-cols-4">
                            <figure class="rounded-2xl bg-white shadow-lg ring-1 ring-gray-900/5 sm:col-span-2 xl:col-start-2 xl:row-end-1">
                                <blockquote class="p-6 text-lg font-semibold leading-7 tracking-tight text-gray-900 sm:p-12 sm:text-xl sm:leading-8">
                                    <p>"Platform yang sangat membantu dalam proses belajar saya. Materi yang disajikan mudah dipahami dan pengajarnya sangat kompeten. Saya sangat merekomendasikan platform ini untuk siapa saja yang ingin meningkatkan kemampuan mereka."</p>
                                </blockquote>
                                <figcaption class="flex flex-wrap items-center gap-x-4 gap-y-4 border-t border-gray-900/10 px-6 py-4 sm:flex-nowrap">
                                    <img class="h-10 w-10 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=1024&h=1024&q=80" alt="">
                                    <div class="flex-auto">
                                        <div class="font-semibold">Sarah Johnson</div>
                                        <div class="text-gray-600">Mahasiswa</div>
                                    </div>
                                    <img class="h-10 w-auto flex-none" src="https://tailwindui.com/img/logos/savvycal-logo-gray-900.svg" alt="">
                                </figcaption>
                            </figure>
                            <div class="space-y-8 xl:contents xl:space-y-0">
                                <div class="space-y-8 xl:row-span-2">
                                    <figure class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                                        <blockquote class="text-gray-900">
                                            <p>"Sistem pembelajaran yang terstruktur dan progress tracking yang detail membantu saya memantau kemajuan belajar dengan baik. Pengajar sangat responsif dan materi yang disajikan sangat berkualitas."</p>
                                        </blockquote>
                                        <figcaption class="mt-6 flex items-center gap-x-4">
                                            <img class="h-10 w-10 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            <div>
                                                <div class="font-semibold">Budi Santoso</div>
                                                <div class="text-gray-600">Profesional</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    
                                    <!-- More testimonials... -->
                                </div>
                                <div class="space-y-8 xl:row-start-1">
                                    <figure class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                                        <blockquote class="text-gray-900">
                                            <p>"Metode pembelajaran yang interaktif membuat saya lebih mudah memahami materi. Platform ini benar-benar membantu saya mencapai tujuan belajar saya."</p>
                                        </blockquote>
                                        <figcaption class="mt-6 flex items-center gap-x-4">
                                            <img class="h-10 w-10 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            <div>
                                                <div class="font-semibold">Dewi Lestari</div>
                                                <div class="text-gray-600">Pengusaha</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    
                                    <!-- More testimonials... -->
                                </div>
                            </div>
                            <div class="space-y-8 xl:contents xl:space-y-0">
                                <div class="space-y-8 xl:row-start-1">
                                    <figure class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                                        <blockquote class="text-gray-900">
                                            <p>"Investasi yang sangat worth it! Kualitas pembelajaran yang saya dapatkan jauh melebihi biaya yang saya keluarkan."</p>
                                        </blockquote>
                                        <figcaption class="mt-6 flex items-center gap-x-4">
                                            <img class="h-10 w-10 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            <div>
                                                <div class="font-semibold">Ahmad Rizki</div>
                                                <div class="text-gray-600">Fresh Graduate</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    
                                    <!-- More testimonials... -->
                                </div>
                                <div class="space-y-8 xl:row-span-2">
                                    <figure class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                                        <blockquote class="text-gray-900">
                                            <p>"Molestias ea earum quos nostrum doloremque sed. Quaerat quasi aut velit incidunt excepturi rerum voluptatem minus harum."</p>
                                        </blockquote>
                                        <figcaption class="mt-6 flex items-center gap-x-4">
                                            <img class="h-10 w-10 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            <div>
                                                <div class="font-semibold">Leonard Krasner</div>
                                                <div class="text-gray-600">@leonardkrasner</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    
                                    <!-- More testimonials... -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white py-24 sm:py-32">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl text-center">
                            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Kelas Terbaru</h2>
                            <p class="mt-2 text-lg leading-8 text-gray-600">Temukan kelas terbaru untuk meningkatkan kemampuan Anda.</p>
                        </div>
                        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                            <article class="flex flex-col items-start justify-between">
                                <div class="relative w-full">
                                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80" alt="" class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                                    <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                                </div>
                                <div class="max-w-xl">
                                    <div class="mt-8 flex items-center gap-x-4 text-xs">
                                        <time datetime="2024-03-16" class="text-gray-500">16 Mar 2024</time>
                                        <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Pemrograman</a>
                                    </div>
                                    <div class="group relative">
                                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                            <a href="#">
                                                <span class="absolute inset-0"></span>
                                                Dasar Pemrograman Python
                                            </a>
                                        </h3>
                                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">Pelajari dasar-dasar pemrograman menggunakan Python. Cocok untuk pemula yang ingin memulai karir di bidang teknologi.</p>
                                    </div>
                                    <div class="relative mt-8 flex items-center gap-x-4">
                                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="" class="h-10 w-10 rounded-full bg-gray-100">
                                        <div class="text-sm leading-6">
                                            <p class="font-semibold text-gray-900">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    Dr. Budi Santoso
                                                </a>
                                            </p>
                                            <p class="text-gray-600">Pengajar Senior</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            
                            <article class="flex flex-col items-start justify-between">
                                <div class="relative w-full">
                                    <img src="https://images.unsplash.com/photo-1503676382389-4809596d5290?auto=format&fit=crop&w=800&q=80" alt="" class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                                    <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                                </div>
                                <div class="max-w-xl">
                                    <div class="mt-8 flex items-center gap-x-4 text-xs">
                                        <time datetime="2024-03-15" class="text-gray-500">15 Mar 2024</time>
                                        <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Desain</a>
                                    </div>
                                    <div class="group relative">
                                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                            <a href="#">
                                                <span class="absolute inset-0"></span>
                                                Desain Grafis untuk Pemula
                                            </a>
                                        </h3>
                                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">Belajar teknik dasar desain grafis menggunakan aplikasi populer. Materi mudah dipahami dan langsung praktik.</p>
                                    </div>
                                    <div class="relative mt-8 flex items-center gap-x-4">
                                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="" class="h-10 w-10 rounded-full bg-gray-100">
                                        <div class="text-sm leading-6">
                                            <p class="font-semibold text-gray-900">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    Sarah Johnson
                                                </a>
                                            </p>
                                            <p class="text-gray-600">Desainer Profesional</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            
                            <article class="flex flex-col items-start justify-between">
                                <div class="relative w-full">
                                    <img src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=800&q=80" alt="" class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                                    <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                                </div>
                                <div class="max-w-xl">
                                    <div class="mt-8 flex items-center gap-x-4 text-xs">
                                        <time datetime="2024-03-14" class="text-gray-500">14 Mar 2024</time>
                                        <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Motivasi</a>
                                    </div>
                                    <div class="group relative">
                                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                            <a href="#">
                                                <span class="absolute inset-0"></span>
                                                Meningkatkan Motivasi Belajar
                                            </a>
                                        </h3>
                                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">Temukan strategi dan tips untuk menjaga motivasi belajar tetap tinggi selama mengikuti kelas online.</p>
                                    </div>
                                    <div class="relative mt-8 flex items-center gap-x-4">
                                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="" class="h-10 w-10 rounded-full bg-gray-100">
                                        <div class="text-sm leading-6">
                                            <p class="font-semibold text-gray-900">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    Dewi Lestari
                                                </a>
                                            </p>
                                            <p class="text-gray-600">Psikolog Pendidikan</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                
                               
                
                
                
                <footer class="bg-white">
                    <div class="mx-auto max-w-7xl overflow-hidden px-6 py-20 sm:py-24 lg:px-8">
                        <nav class="-mb-6 columns-2 sm:flex sm:justify-center sm:space-x-12" aria-label="Footer">
                            <div class="pb-6">
                                <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Tentang Kami</a>
                            </div>
                            <div class="pb-6">
                                <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Blog</a>
                            </div>
                            <div class="pb-6">
                                <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Karir</a>
                            </div>
                            <div class="pb-6">
                                <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Kontak</a>
                            </div>
                            <div class="pb-6">
                                <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">FAQ</a>
                            </div>
                            <div class="pb-6">
                                <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Bantuan</a>
                            </div>
                        </nav>
                        <div class="mt-10 flex justify-center space-x-10">
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Instagram</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">X</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M13.6823 10.6218L20.2391 3H18.6854L12.9921 9.61788L8.44486 3H3.2002L10.0765 13.0074L3.2002 21H4.75404L10.7663 14.0113L15.5685 21H20.8131L13.6819 10.6218H13.6823ZM11.5541 13.0956L10.8574 12.0991L5.31391 4.16971H7.70053L12.1742 10.5689L12.8709 11.5655L18.6861 19.8835H16.2995L11.5541 13.096V13.0956Z" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">GitHub</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">YouTube</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                        <p class="mt-10 text-center text-xs leading-5 text-gray-500">&copy; 2024 Nemu. All rights reserved.</p>
                    </div>
                </footer>
            </div>
                
                
            </body>
            </html>