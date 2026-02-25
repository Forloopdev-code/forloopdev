<script setup>
import { Head, Link } from '@inertiajs/vue3';
import BlogNav from '@/Components/BlogNav.vue';

const posts = [
    {
        slug: 'swap-command-control-keys-mac',
        title: 'How to Swap Command and Control Keys on Your MacBook',
        excerpt: 'Coming from Windows? Your muscle memory probably fights you every day on a Mac. The fix takes 30 seconds inside System Settings.',
        date: 'February 24, 2026',
        readTime: '5 min read',
        tag: 'macOS Tips',
    },
];
</script>

<template>
    <Head title="Blog – Forloop" />

    <div class="min-h-screen bg-neutral-900 font-sans">
        <BlogNav active-page="blog" />

        <!-- Hero bar -->
        <div class="bg-jet border-b border-neutral-800 py-14 px-5 sm:px-8">
            <div class="max-w-5xl mx-auto">
                <div class="flex items-center gap-3 mb-2">
                    <div class="h-px w-8" style="background: linear-gradient(to right, #8ED081, #3066BE)"></div>
                    <span class="text-xs font-bold tracking-widest uppercase text-persianGreen">Forloop</span>
                </div>
                <h1 class="text-5xl font-black text-white uppercase tracking-tight">Blog</h1>
                <p class="text-neutral-400 mt-2">Insights, tips, and ideas from the Forloop team.</p>
            </div>
        </div>

        <!-- Posts -->
        <div class="max-w-5xl mx-auto px-5 sm:px-8 py-14">
            <div class="grid gap-6">
                <Link
                    v-for="post in posts"
                    :key="post.slug"
                    :href="`/blog/${post.slug}`"
                    class="group block bg-neutral-800/60 border border-neutral-700 rounded-2xl p-7 hover:border-persianGreen transition-all duration-200 relative overflow-hidden"
                >
                    <div class="absolute top-0 left-0 w-full h-0.5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                        style="background: linear-gradient(to right, #8ED081, #1EA896, #3066BE)"></div>

                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-xs font-bold tracking-wide uppercase px-2.5 py-1 rounded-full bg-neutral-700 text-persianGreen">
                            {{ post.tag }}
                        </span>
                        <span class="text-neutral-600 text-xs font-semibold">{{ post.readTime }}</span>
                    </div>

                    <h2 class="text-xl font-extrabold text-white group-hover:text-persianGreen transition-colors duration-200 mb-2 uppercase tracking-tight">
                        {{ post.title }}
                    </h2>
                    <p class="text-neutral-400 text-sm leading-relaxed mb-5">{{ post.excerpt }}</p>

                    <div class="flex items-center justify-between">
                        <span class="text-neutral-600 text-xs font-semibold">{{ post.date }}</span>
                        <span class="text-persianGreen text-sm font-bold group-hover:translate-x-1 transition-transform duration-200 inline-block">
                            Read more →
                        </span>
                    </div>
                </Link>
            </div>
        </div>

        <!-- Footer -->
        <footer class="border-t border-neutral-800 py-8 px-5 sm:px-8 mt-8">
            <div class="max-w-5xl mx-auto flex items-center justify-between">
                <img src="/img/logo_name_light.png" alt="Forloop" class="h-7">
                <p class="text-neutral-700 text-xs font-semibold uppercase tracking-widest">© 2024 Forloop</p>
            </div>
        </footer>
    </div>
</template>
