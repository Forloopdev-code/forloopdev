<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

const mobileMenuOpen = ref(false);

const form = useForm({
    name: '',
    email: '',
    project_type: '',
    message: '',
    _url: '',     // honeypot — must stay empty
    _start: '',   // populated on mount for time-based bot detection
});

const submitted = ref(false);

onMounted(() => {
    form._start = Math.floor(Date.now() / 1000).toString();
});

const submitContact = () => {
    form.post(route('contact.store'), {
        preserveScroll: true,
        onSuccess: () => {
            submitted.value = true;
        },
    });
};
</script>

<template>
    <Head title="Forloop – AI-Powered Development" />

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
                        <a href="#contact"
                            class="text-sm font-bold px-4 py-2 bg-persianGreen text-white rounded hover:bg-pistachio transition-all duration-150">
                            Start a Project
                        </a>
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
                    <a href="#contact" class="text-persianGreen text-sm font-bold" @click="mobileMenuOpen = false">Start a Project</a>
                    <Link v-if="canLogin && !$page.props.auth.user" :href="route('login')" class="text-persianGreen text-sm font-bold">Log In</Link>
                </div>
            </div>
        </nav>

        <!-- ── Hero ──────────────────────────────────────────── -->
        <section class="relative min-h-screen flex items-center overflow-hidden pt-16">
            <div class="absolute inset-0 bg-[url('/img/Hero1.jpg')] bg-cover bg-center bg-no-repeat"></div>
            <div class="absolute inset-0 bg-jet/80"></div>
            <div class="absolute top-0 right-0 w-1/2 h-full opacity-20"
                style="background: radial-gradient(ellipse at top right, #3066BE 0%, transparent 60%)"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 opacity-15 rounded-full blur-3xl"
                style="background: radial-gradient(circle, #1EA896 0%, transparent 70%)"></div>

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
                    <div class="inline-flex items-center gap-2 mb-6">
                        <div class="h-px w-8" style="background: linear-gradient(to right, #8ED081, #3066BE)"></div>
                        <span class="text-xs font-bold tracking-widest uppercase text-persianGreen">AI · Web · Software</span>
                    </div>
                    <h1 class="text-5xl sm:text-6xl lg:text-8xl font-black leading-none tracking-tight text-white mb-6 uppercase">
                        Build Smarter.<br>
                        <span style="background: linear-gradient(135deg, #8ED081, #1EA896, #3066BE); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                            Ship Faster.
                        </span>
                    </h1>
                    <p class="text-lg sm:text-xl text-platinum/75 max-w-xl leading-relaxed mb-10">
                        Forloop builds AI-integrated software, modern web applications, and workflow
                        automation — using the tools that define how software gets made today.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#contact"
                            class="px-7 py-3.5 font-bold text-sm tracking-wide text-white rounded transition-all duration-200 hover:opacity-90 hover:scale-105"
                            style="background: linear-gradient(135deg, #8ED081, #1EA896, #3066BE)">
                            Start a Project
                        </a>
                        <a href="#services"
                            class="px-7 py-3.5 font-bold text-sm tracking-wide border border-platinum/30 text-platinum hover:border-persianGreen hover:text-persianGreen rounded transition-all duration-200">
                            Our Services
                        </a>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50">
                <span class="text-xs text-platinum/60 uppercase tracking-widest">Scroll</span>
                <div class="w-px h-10 bg-gradient-to-b from-platinum/60 to-transparent"></div>
            </div>
        </section>

        <!-- ── Services ───────────────────────────────────────── -->
        <section id="services" class="bg-neutral-900 py-28 px-5 sm:px-8">
            <div class="max-w-7xl mx-auto">

                <div class="mb-16">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="h-px w-8" style="background: linear-gradient(to right, #8ED081, #3066BE)"></div>
                        <span class="text-xs font-bold tracking-widest uppercase text-persianGreen">What We Do</span>
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-black text-white uppercase tracking-tight">Our Expertise</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- Card 1: AI Development -->
                    <div class="group relative bg-neutral-800/60 border border-neutral-700 rounded-2xl p-8 overflow-hidden hover:border-persianGreen transition-all duration-300">
                        <div class="absolute top-0 left-0 w-full h-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                            style="background: linear-gradient(to right, #8ED081, #1EA896, #3066BE)"></div>
                        <div class="mb-6 w-14 h-14 rounded-xl flex items-center justify-center bg-neutral-700">
                            <svg class="h-8 w-8 text-persianGreen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456Z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-extrabold text-white mb-3 uppercase tracking-tight">AI-Powered Development</h3>
                        <p class="text-neutral-400 text-sm leading-relaxed mb-4">
                            Integrate large language models, build AI agents, and automate intelligent
                            decision-making directly into your product. We ship AI features that work
                            in production — not just demos.
                        </p>
                        <ul class="space-y-1.5">
                            <li v-for="item in ['LLM Integration & AI Features', 'Intelligent Automation & Agents', 'Data Pipelines & Model APIs']" :key="item"
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
                            <h3 class="text-xl font-extrabold text-white mb-3 uppercase tracking-tight">Web &amp; Full-Stack Dev</h3>
                            <p class="text-white/80 text-sm leading-relaxed mb-4">
                                Modern web applications built on frameworks your team can actually
                                maintain — from fast-loading marketing sites to complex SaaS platforms.
                            </p>
                            <ul class="space-y-1.5">
                                <li v-for="item in ['Vue & React SPAs', 'Laravel & REST APIs', 'WordPress & CMS']" :key="item"
                                    class="flex items-center gap-2 text-xs text-white/80">
                                    <div class="w-1 h-1 rounded-full bg-white flex-shrink-0"></div>
                                    {{ item }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Card 3: Software & Automation -->
                    <div class="group relative bg-neutral-800/60 border border-neutral-700 rounded-2xl p-8 overflow-hidden hover:border-persianGreen transition-all duration-300">
                        <div class="absolute top-0 left-0 w-full h-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                            style="background: linear-gradient(to right, #8ED081, #1EA896, #3066BE)"></div>
                        <div class="mb-6 w-14 h-14 rounded-xl flex items-center justify-center bg-neutral-700">
                            <img src="img/processIcon.svg" alt="" class="h-8 w-8">
                        </div>
                        <h3 class="text-xl font-extrabold text-white mb-3 uppercase tracking-tight">Software &amp; Automation</h3>
                        <p class="text-neutral-400 text-sm leading-relaxed mb-4">
                            Eliminate repetitive work and give your team software that actually saves
                            time. Custom tools, API integrations, and automated pipelines built to last.
                        </p>
                        <ul class="space-y-1.5">
                            <li v-for="item in ['Custom Internal Tools', 'API Integrations', 'Process Automation']" :key="item"
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
                            <span class="text-xs font-bold tracking-widest uppercase text-persianGreen">How We Work</span>
                        </div>
                        <h2 class="text-4xl sm:text-5xl font-black text-white uppercase tracking-tight mb-6">
                            Technical depth.<br>
                            <span style="background: linear-gradient(135deg, #8ED081, #1EA896); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                AI-first.
                            </span>
                        </h2>
                        <p class="text-neutral-400 leading-relaxed mb-8">
                            We use the same AI tools we build with — from code generation to testing
                            to deployment. That means fewer hours billed, better output, and faster
                            time-to-ship on every project.
                        </p>
                        <div class="grid grid-cols-2 gap-4">
                            <div v-for="stat in [
                                { value: 'AI-First', label: 'Every solution' },
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

        <!-- ── Contact ───────────────────────────────────────── -->
        <section id="contact" class="py-28 px-5 sm:px-8 relative overflow-hidden" style="background: linear-gradient(135deg, #1EA896 0%, #3066BE 100%)">
            <div class="absolute inset-0 opacity-10"
                style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='20' cy='20' r='1.5' fill='white'/%3E%3C/svg%3E&quot;)"></div>
            <div class="relative max-w-2xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl sm:text-5xl font-black text-white uppercase tracking-tight mb-4">
                        Let's Build Something
                    </h2>
                    <p class="text-white/75 text-lg">
                        Tell me what you're working on and I'll get back to you within 24 hours.
                    </p>
                </div>

                <!-- Success state -->
                <div v-if="submitted" class="bg-white/10 backdrop-blur border border-white/30 rounded-2xl p-10 text-center">
                    <svg class="h-12 w-12 mx-auto mb-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="text-xl font-bold text-white mb-2">Message received!</h3>
                    <p class="text-white/75 mb-6">I'll review your project and follow up within 24 hours.</p>
                    <button @click="submitted = false" class="text-white/70 text-sm hover:text-white underline">
                        Send another message
                    </button>
                </div>

                <!-- Contact form -->
                <form v-else @submit.prevent="submitContact" class="bg-white/10 backdrop-blur border border-white/20 rounded-2xl p-8 space-y-5">

                    <!-- Honeypot: invisible to humans, bots fill it -->
                    <div style="position:absolute;left:-9999px;opacity:0;height:0;width:0;overflow:hidden;" aria-hidden="true">
                        <input type="text" name="_url" v-model="form._url" tabindex="-1" autocomplete="off">
                    </div>
                    <input type="hidden" name="_start" v-model="form._start">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-white/80 mb-1.5" for="name">Name</label>
                            <input
                                id="name"
                                v-model="form.name"
                                type="text"
                                required
                                placeholder="Your name"
                                class="w-full bg-white/10 border rounded-lg px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:ring-1 focus:ring-white/60"
                                :class="form.errors.name ? 'border-white' : 'border-white/20'"
                            >
                            <p v-if="form.errors.name" class="mt-1 text-xs text-white font-semibold">{{ form.errors.name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-white/80 mb-1.5" for="email">Email</label>
                            <input
                                id="email"
                                v-model="form.email"
                                type="email"
                                required
                                placeholder="you@company.com"
                                class="w-full bg-white/10 border rounded-lg px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:ring-1 focus:ring-white/60"
                                :class="form.errors.email ? 'border-white' : 'border-white/20'"
                            >
                            <p v-if="form.errors.email" class="mt-1 text-xs text-white font-semibold">{{ form.errors.email }}</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-white/80 mb-1.5" for="project_type">What are you looking for?</label>
                        <select
                            id="project_type"
                            v-model="form.project_type"
                            class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-1 focus:ring-white/60"
                        >
                            <option value="" class="text-jet bg-white">Select a category (optional)</option>
                            <option value="ai_development" class="text-jet bg-white">AI-Powered Development</option>
                            <option value="web_development" class="text-jet bg-white">Web &amp; Full-Stack Development</option>
                            <option value="automation" class="text-jet bg-white">Software &amp; Workflow Automation</option>
                            <option value="other" class="text-jet bg-white">Something else</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-white/80 mb-1.5" for="message">Tell me about your project</label>
                        <textarea
                            id="message"
                            v-model="form.message"
                            required
                            rows="4"
                            placeholder="What are you building? What problem are you trying to solve?"
                            class="w-full bg-white/10 border rounded-lg px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:ring-1 focus:ring-white/60 resize-none"
                            :class="form.errors.message ? 'border-white' : 'border-white/20'"
                        ></textarea>
                        <p v-if="form.errors.message" class="mt-1 text-xs text-white font-semibold">{{ form.errors.message }}</p>
                    </div>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full bg-white text-jet font-black py-4 rounded-lg text-sm tracking-wide uppercase hover:scale-105 transition-transform duration-200 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100"
                    >
                        <span v-if="form.processing">Sending...</span>
                        <span v-else>Send Message</span>
                    </button>
                </form>
            </div>
        </section>

        <!-- ── Footer ────────────────────────────────────────── -->
        <footer class="bg-jet border-t border-neutral-800 py-10 px-5 sm:px-8">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
                <img src="img/logo_name_light.png" alt="Forloop" class="h-8">
                <p class="text-neutral-600 text-xs font-semibold uppercase tracking-widest">© 2025 Forloop. All rights reserved.</p>
                <div class="flex gap-6">
                    <Link href="/blog" class="text-neutral-500 hover:text-persianGreen text-xs font-semibold uppercase tracking-wide transition-colors">Blog</Link>
                    <Link v-if="canLogin" :href="route('login')" class="text-neutral-500 hover:text-persianGreen text-xs font-semibold uppercase tracking-wide transition-colors">Log In</Link>
                </div>
            </div>
        </footer>

    </div>
</template>

<style>
html { scroll-behavior: smooth; }
</style>
