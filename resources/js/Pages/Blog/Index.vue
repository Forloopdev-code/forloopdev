<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    posts: Array,
});

function formatDate(dateStr) {
    if (!dateStr) return '';
    return new Date(dateStr).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    });
}
</script>

<template>
    <Head title="Blog — Forloop Dev" />

    <div class="min-h-screen bg-platinum">
        <!-- Nav -->
        <nav class="bg-jet text-platinum px-6 py-4 flex items-center justify-between">
            <Link href="/" class="flex items-center gap-3">
                <img src="/img/logo_name_light.png" alt="Forloop" class="h-10 w-auto" />
            </Link>
            <div class="flex gap-6 text-sm font-medium">
                <Link href="/" class="hover:text-pistachio transition-colors">Home</Link>
                <Link href="/blog" class="text-pistachio">Blog</Link>
            </div>
        </nav>

        <!-- Header -->
        <div class="bg-jet text-platinum py-16 px-6 text-center">
            <h1 class="text-5xl lg:text-7xl font-semibold mb-4">Blog</h1>
            <p class="text-lg text-gray-400 max-w-xl mx-auto">
                Thoughts on software development, AI, and the journey of building things as the industry evolves.
            </p>
        </div>

        <!-- Posts -->
        <div class="max-w-3xl mx-auto px-6 py-16">
            <div v-if="posts.length === 0" class="text-center text-gray-500 py-20">
                <p class="text-xl">No posts yet — check back soon.</p>
            </div>

            <div v-else class="space-y-10">
                <article
                    v-for="post in posts"
                    :key="post.id"
                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 hover:shadow-md transition-shadow"
                >
                    <!-- Tags -->
                    <div v-if="post.tags && post.tags.length" class="flex flex-wrap gap-2 mb-4">
                        <span
                            v-for="tag in post.tags"
                            :key="tag"
                            class="text-xs font-medium bg-persianGreen text-white px-2 py-0.5 rounded-full"
                        >
                            {{ tag }}
                        </span>
                    </div>

                    <h2 class="text-2xl font-semibold text-jet mb-2">
                        <Link :href="`/blog/${post.slug}`" class="hover:text-persianGreen transition-colors">
                            {{ post.title }}
                        </Link>
                    </h2>

                    <p v-if="post.excerpt" class="text-gray-600 mb-4 leading-relaxed">
                        {{ post.excerpt }}
                    </p>

                    <div class="flex items-center gap-4 text-sm text-gray-400">
                        <span>{{ formatDate(post.published_at) }}</span>
                        <span v-if="post.read_time_minutes">· {{ post.read_time_minutes }} min read</span>
                        <Link
                            :href="`/blog/${post.slug}`"
                            class="ml-auto text-persianGreen font-medium hover:text-pistachio transition-colors"
                        >
                            Read more →
                        </Link>
                    </div>
                </article>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-jet text-platinum text-center text-sm py-6">
            Built by Forloop {{ new Date().getFullYear() }}
        </div>
    </div>
</template>
