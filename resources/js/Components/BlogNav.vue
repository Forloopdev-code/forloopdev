<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    activePage: { type: String, default: '' }
});

const mobileMenuOpen = ref(false);
</script>

<template>
    <nav class="sticky top-0 z-50 bg-jet/95 backdrop-blur border-b border-neutral-800">
        <div class="max-w-5xl mx-auto px-5 sm:px-8">
            <div class="flex items-center justify-between h-16">
                <Link href="/">
                    <img class="h-9 w-auto" src="/img/logo_name_light.png" alt="Forloop">
                </Link>
                <div class="hidden md:flex items-center gap-6">
                    <Link href="/blog"
                        :class="activePage === 'blog'
                            ? 'text-pistachio text-sm font-bold tracking-wide uppercase'
                            : 'text-platinum/70 hover:text-pistachio text-sm font-bold tracking-wide uppercase transition-colors'">
                        Blog
                    </Link>
                    <Link href="/"
                        :class="activePage === 'home'
                            ? 'text-pistachio text-sm font-bold tracking-wide uppercase'
                            : 'text-platinum/70 hover:text-pistachio text-sm font-bold tracking-wide uppercase transition-colors'">
                        Home
                    </Link>
                    <Link :href="route('login')"
                        class="text-sm font-bold px-4 py-1.5 border border-persianGreen text-persianGreen hover:bg-persianGreen hover:text-white rounded transition-all duration-150">
                        Log In
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
                <Link href="/blog" class="text-platinum/70 text-sm font-bold tracking-wide uppercase">Blog</Link>
                <Link href="/" class="text-platinum/70 text-sm font-bold tracking-wide uppercase">Home</Link>
                <Link :href="route('login')" class="text-persianGreen text-sm font-bold">Log In</Link>
            </div>
        </div>
    </nav>
</template>
