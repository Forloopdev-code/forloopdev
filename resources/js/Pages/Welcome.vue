<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

const mobileMenuOpen = ref(false);
</script>

<template>
    <Head title="Forloop – Software Development & Web Solutions" />

    <div class="min-h-screen bg-neutral-900 font-sans">

        <!-- ── Navbar ─────────────────────────────────────────── -->
        <nav class="fixed top-0 inset-x-0 z-50 bg-jet/95 backdrop-blur border-b border-neutral-800">
            <div class="max-w-7xl mx-auto px-5 sm:px-8">
                <div class="flex items-center justify-between h-16">
                    <Link href="/">
                        <img class="h-9 w-auto" src="img/logo_name_light.png" alt="Forloop">
                    </Link>
                    <div class="hidden md:flex items-center gap-8">
                        <Link href="/blog" class="text-platinum/80 hover:text-pistachio text-sm font-semibold tracking-wide uppercase transition-colors duration-150">Blog</Link>
                        <Link v-if="canLogin && !$page.props.auth.user" :href="route('login')"
                            class="text-sm font-bold px-4 py-2 border border-persianGreen text-persianGreen hover:bg-persianGreen hover:text-white rounded transition-all duration-150">
                            Log In
                        </Link>
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                            class="text-sm font-bold px-4 py-2 bg-persianGreen text-white rounded hover:bg-pistachio transition-all duration-150">
                            Dashboard
                        </Link>
                    </div>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-platinum focus:outline-none">
                        <svg v-if="!mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg v-else class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div v-if="mobileMenuOpen" class="md:hidden bg-jet border-t border-neutral-800">
                <div class="px-5 py-4 flex flex-col gap-3">
                    <Link href="/blog" class="text-platinum/80 text-sm font-semibold tracking-wide uppercase">Blog</Link>
                    <Link v-if="canLogin && !$page.props.auth.user" :href="route('login')" class="text-persianGreen text-sm font-bold">Log In</Link>
                </div>
            </div>
        </nav>

        <!-- ── Hero ──────────────────────────────────────────── -->
        <section class="relative min-h-screen flex items-center overflow-hidden pt-16">
            <!-- Background image -->
            <div class="absolute inset-0 bg-[url('/img/Hero1.jpg')] bg-cover bg-center bg-no-repeat"></div>
            <!-- Dark overlay -->
            <div class="absolute inset-0 bg-jet/80"></div>
            <!-- Gradient accent — top right -->
            <div class="absolute top-0 right-0 w-1/2 h-full opacity-20"
                style="background: radial-gradient(ellipse at top right, #3066BE 0%, transparent 60%)"></div>
            <!-- Gradient accent — bottom left -->
            <div class="absolute bottom-0 left-0 w-96 h-96 opacity-15 rounded-full blur-3xl"
                style="background: radial-gradient(circle, #1EA896 0%, transparent 70%)"></div>

            <!-- Circuit line decoration -->
            <svg class="absolute right-0 top-0 h-full w-1/3 opacity-5" viewBox="0 0 400 800" fill="none" preserveAspectRatio="xMidYMid slice">
                <circle cx="300" cy="150" r="8" stroke="#8ED081" stroke-width="2"/>
                <circle cx="180" cy="350" r="6" stroke="#1EA896" stroke-width="2"/>
                <circle cx="320" cy="550" r="10" stroke="#3066BE" stroke-width="2"/>
                <polyline points="300,150 300,260 180,260 180,350" stroke="#8ED081" stroke-width="1.5"/>
                <polyline points="180,350 180,460 320,460 320,550" stroke="#1EA896" stroke-width="1.5"/>
                <polyline points="320,550 320,650 240,650" stroke="#3066BE" stroke-width="1.5"/>
                <circle cx="240" cy="650" r="5" stroke="#3066BE" stroke-width="2"/>
                <line x1="120" y1="100" x2="260" y2="100" stroke="#8ED081" stroke-width="1"/>
                <line x1="80" y1="200" x2="200" y2="200" stroke="#1EA896" stroke-width="1"/>
            </svg>

            <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-8 py-24 lg:py-36">
                <div class="max-w-3xl">
                    <!-- Gradient label -->
                    <div class="inline-flex items-center gap-2 mb-6">
                        <div class="h-px w-8" style="background: linear-gradient(to right, #8ED081, #3066BE)"></div>
                        <span class="text-xs font-bold tracking-widest uppercase text-persianGreen">Software · Web · Drone</span>
                    </div>
                    <h1 class="text-5xl sm:text-6xl lg:text-8xl font-black leading-none tracking-tight text-white mb-6 uppercase">
                        Built for<br>
                        <span style="background: linear-gradient(135deg, #8ED081, #1EA896, #3066BE); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                            Results
                        </span>
                    </h1>
                    <p class="text-lg sm:text-xl text-platinum/75 max-w-xl leading-relaxed mb-10">
                        Forloop specializes in custom software that improves processes, solves hard problems,
                        and scales with your business.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#services"
                            class="px-7 py-3.5 font-bold text-sm tracking-wide text-white rounded transition-all duration-200 hover:opacity-90 hover:scale-105"
                            style="background: linear-gradient(135deg, #8ED081, #1EA896, #3066BE)">
                            Our Services
                        </a>
                        <Link href="/blog"
                            class="px-7 py-3.5 font-bold text-sm tracking-wide border border-platinum/30 text-platinum hover:border-persianGreen hover:text-persianGreen rounded transition-all duration-200">
                            Read the Blog
                        </Link>
                    </div>
                </div>
            </div>

            <!-- Scroll indicator -->
            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50">
                <span class="text-xs text-platinum/60 uppercase tracking-widest">Scroll</span>
                <div class="w-px h-10 bg-gradient-to-b from-platinum/60 to-transparent"></div>
            </div>
        </section>

        <!-- ── Services ───────────────────────────────────────── -->
        <section id="services" class="bg-neutral-900 py-28 px-5 sm:px-8">
            <div class="max-w-7xl mx-auto">

                <!-- Section header -->
                <div class="mb-16">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="h-px w-8" style="background: linear-gradient(to right, #8ED081, #3066BE)"></div>
                        <span class="text-xs font-bold tracking-widest uppercase text-persianGreen">What We Do</span>
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-black text-white uppercase tracking-tight">Our Expertise</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- Card 1: Software Development -->
                    <div class="group relative bg-neutral-800/60 border border-neutral-700 rounded-2xl p-8 overflow-hidden hover:border-persianGreen transition-all duration-300">
                        <div class="absolute top-0 left-0 w-full h-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                            style="background: linear-gradient(to right, #8ED081, #1EA896, #3066BE)"></div>
                        <div class="mb-6 w-14 h-14 rounded-xl flex items-center justify-center bg-neutral-700">
                            <img src="img/processIcon.svg" alt="" class="h-8 w-8">
                        </div>
                        <h3 class="text-xl font-extrabold text-white mb-3 uppercase tracking-tight">Software Development</h3>
                        <p class="text-neutral-400 text-sm leading-relaxed mb-4">
                            Custom software to automate tasks, streamline workflows, and eliminate the bottlenecks slowing your team down.
                        </p>
                        <ul class="space-y-1.5">
                            <li v-for="item in ['Process Automation', 'Custom Tooling', 'Business Intelligence']" :key="item"
                                class="flex items-center gap-2 text-xs text-neutral-400">
                                <div class="w-1 h-1 rounded-full bg-persianGreen flex-shrink-0"></div>
                                {{ item }}
                            </li>
                        </ul>
                    </div>

                    <!-- Card 2: Web Development (featured) -->
                    <div class="group relative rounded-2xl p-8 overflow-hidden"
                        style="background: linear-gradient(135deg, #1EA896 0%, #3066BE 100%)">
                        <div class="absolute inset-0 opacity-10"
                            style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='20' cy='20' r='1.5' fill='white'/%3E%3C/svg%3E&quot;)"></div>
                        <div class="relative">
                            <div class="mb-6 w-14 h-14 rounded-xl flex items-center justify-center bg-white/20">
                                <img src="img/webDevIcon.svg" alt="" class="h-8 w-8 brightness-0 invert">
                            </div>
                            <h3 class="text-xl font-extrabold text-white mb-3 uppercase tracking-tight">Web Development</h3>
                            <p class="text-white/80 text-sm leading-relaxed mb-4">
                                Responsive, fast, and SEO-optimized websites — from custom WordPress builds to full-stack web applications.
                            </p>
                            <ul class="space-y-1.5">
                                <li v-for="item in ['WordPress & CMS', 'Full-Stack Apps', 'UX/UI Design']" :key="item"
                                    class="flex items-center gap-2 text-xs text-white/80">
                                    <div class="w-1 h-1 rounded-full bg-white flex-shrink-0"></div>
                                    {{ item }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Card 3: Drone -->
                    <div class="group relative bg-neutral-800/60 border border-neutral-700 rounded-2xl p-8 overflow-hidden hover:border-persianGreen transition-all duration-300">
                        <div class="absolute top-0 left-0 w-full h-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                            style="background: linear-gradient(to right, #8ED081, #1EA896, #3066BE)"></div>
                        <div class="mb-6 w-14 h-14 rounded-xl flex items-center justify-center bg-neutral-700">
                            <img src="img/droneIcon.svg" alt="" class="h-8 w-8">
                        </div>
                        <h3 class="text-xl font-extrabold text-white mb-3 uppercase tracking-tight">Drone Videography</h3>
                        <p class="text-neutral-400 text-sm leading-relaxed mb-4">
                            Stunning aerial footage for real estate, events, and marketing — delivered with professional-grade equipment.
                        </p>
                        <ul class="space-y-1.5">
                            <li v-for="item in ['Real Estate', 'Event Coverage', 'Construction Monitoring']" :key="item"
                                class="flex items-center gap-2 text-xs text-neutral-400">
                                <div class="w-1 h-1 rounded-full bg-persianGreen flex-shrink-0"></div>
                                {{ item }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── Why Forloop ────────────────────────────────────── -->
        <section class="bg-jet py-28 px-5 sm:px-8 relative overflow-hidden">
            <div class="absolute inset-0 opacity-5"
                style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='30' cy='30' r='1.5' fill='%231EA896'/%3E%3C/svg%3E&quot;)"></div>
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <div class="h-px w-8" style="background: linear-gradient(to right, #8ED081, #3066BE)"></div>
                            <span class="text-xs font-bold tracking-widest uppercase text-persianGreen">Why Choose Us</span>
                        </div>
                        <h2 class="text-4xl sm:text-5xl font-black text-white uppercase tracking-tight mb-6">
                            Technical depth.<br>
                            <span style="background: linear-gradient(135deg, #8ED081, #1EA896); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                Business focus.
                            </span>
                        </h2>
                        <p class="text-neutral-400 leading-relaxed mb-8">
                            We combine technical expertise with a deep understanding of business processes,
                            ensuring our solutions are effective, scalable, and tailored to your needs.
                        </p>
                        <div class="grid grid-cols-2 gap-4">
                            <div v-for="stat in [
                                { value: 'Custom', label: 'Every solution' },
                                { value: 'Scalable', label: 'Built to grow' },
                                { value: 'Fast', label: 'Delivery focused' },
                                { value: 'Full-Stack', label: 'End-to-end' }
                            ]" :key="stat.value"
                                class="bg-neutral-800/50 border border-neutral-700 rounded-xl p-4">
                                <div class="text-lg font-black text-persianGreen">{{ stat.value }}</div>
                                <div class="text-xs text-neutral-500 font-semibold uppercase tracking-wide">{{ stat.label }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <img src="img/laptopImage.jpg" alt="Forloop work" class="rounded-2xl shadow-2xl w-full object-cover">
                        <div class="absolute -bottom-4 -right-4 w-3/4 h-3/4 rounded-2xl -z-10 opacity-40"
                            style="background: linear-gradient(135deg, #1EA896, #3066BE)"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── Tech Stack ─────────────────────────────────────── -->
        <section class="bg-neutral-900 py-20 px-5 sm:px-8 border-t border-neutral-800">
            <div class="max-w-7xl mx-auto">
                <p class="text-center text-xs font-bold tracking-widest uppercase text-neutral-600 mb-10">Our Tech Stack</p>
                <div class="flex items-center justify-center flex-wrap gap-12">
                    <img class="h-10 grayscale hover:grayscale-0 opacity-50 hover:opacity-100 transition-all duration-300" src="img/laravel-2.svg" alt="Laravel">
                    <img class="h-10 grayscale hover:grayscale-0 opacity-50 hover:opacity-100 transition-all duration-300" src="img/python-5.svg" alt="Python">
                    <img class="h-10 grayscale hover:grayscale-0 opacity-50 hover:opacity-100 transition-all duration-300" src="img/vue-9.svg" alt="Vue.js">
                    <img class="h-10 grayscale hover:grayscale-0 opacity-50 hover:opacity-100 transition-all duration-300" src="img/wordpress-icon.svg" alt="WordPress">
                </div>
            </div>
        </section>

        <!-- ── CTA ───────────────────────────────────────────── -->
        <section class="py-28 px-5 sm:px-8 relative overflow-hidden" style="background: linear-gradient(135deg, #1EA896 0%, #3066BE 100%)">
            <div class="absolute inset-0 opacity-10"
                style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='20' cy='20' r='1.5' fill='white'/%3E%3C/svg%3E&quot;)"></div>
            <div class="relative max-w-3xl mx-auto text-center">
                <h2 class="text-4xl sm:text-5xl font-black text-white uppercase tracking-tight mb-5">
                    Ready to build something great?
                </h2>
                <p class="text-white/75 text-lg mb-10">
                    Let's talk about your project and how Forloop can help you move faster.
                </p>
                <Link href="/blog"
                    class="inline-block px-8 py-4 bg-white font-black text-sm tracking-wide uppercase text-jet rounded hover:scale-105 transition-transform duration-200">
                    See Our Latest Work
                </Link>
            </div>
        </section>

        <!-- ── Footer ────────────────────────────────────────── -->
        <footer class="bg-jet border-t border-neutral-800 py-10 px-5 sm:px-8">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
                <img src="img/logo_name_light.png" alt="Forloop" class="h-8">
                <p class="text-neutral-600 text-xs font-semibold uppercase tracking-widest">© 2024 Forloop. All rights reserved.</p>
                <div class="flex gap-6">
                    <Link href="/blog" class="text-neutral-500 hover:text-persianGreen text-xs font-semibold uppercase tracking-wide transition-colors">Blog</Link>
                    <Link v-if="canLogin" :href="route('login')" class="text-neutral-500 hover:text-persianGreen text-xs font-semibold uppercase tracking-wide transition-colors">Log In</Link>
                </div>
            </div>
        </footer>

    </div>
</template>
