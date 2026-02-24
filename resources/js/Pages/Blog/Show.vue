<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import { marked } from 'marked';

const props = defineProps({
    post: Object,
});

const renderedContent = computed(() => marked.parse(props.post.content || ''));

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
    <Head>
        <title>{{ post.meta_title || post.title }} — Forloop Dev</title>
        <meta v-if="post.meta_description" name="description" :content="post.meta_description" />
    </Head>

    <div class="min-h-screen bg-platinum">
        <!-- Nav -->
        <nav class="bg-jet text-platinum px-6 py-4 flex items-center justify-between">
            <Link href="/" class="flex items-center gap-3">
                <img src="/img/logo_name_light.png" alt="Forloop" class="h-10 w-auto" />
            </Link>
            <div class="flex gap-6 text-sm font-medium">
                <Link href="/" class="hover:text-pistachio transition-colors">Home</Link>
                <Link href="/blog" class="hover:text-pistachio transition-colors">Blog</Link>
            </div>
        </nav>

        <!-- Article -->
        <article class="max-w-3xl mx-auto px-6 py-16">
            <!-- Back link -->
            <Link href="/blog" class="text-sm text-persianGreen hover:text-pistachio mb-8 inline-block transition-colors">
                ← Back to Blog
            </Link>

            <!-- Tags -->
            <div v-if="post.tags && post.tags.length" class="flex flex-wrap gap-2 mt-6 mb-4">
                <span
                    v-for="tag in post.tags"
                    :key="tag"
                    class="text-xs font-medium bg-persianGreen text-white px-2 py-0.5 rounded-full"
                >
                    {{ tag }}
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl lg:text-5xl font-semibold text-jet mt-4 mb-4 leading-tight">
                {{ post.title }}
            </h1>

            <!-- Meta -->
            <div class="flex items-center gap-4 text-sm text-gray-500 mb-10 pb-10 border-b border-gray-300">
                <span>{{ formatDate(post.published_at) }}</span>
                <span v-if="post.read_time_minutes">· {{ post.read_time_minutes }} min read</span>
            </div>

            <!-- Content rendered from Markdown -->
            <div
                class="prose prose-lg max-w-none
                       prose-headings:text-jet
                       prose-a:text-persianGreen prose-a:no-underline hover:prose-a:underline
                       prose-code:text-persianGreen prose-code:bg-gray-100 prose-code:px-1 prose-code:rounded
                       prose-blockquote:border-persianGreen prose-blockquote:text-gray-600"
                v-html="renderedContent"
            />
        </article>

        <!-- Footer -->
        <div class="bg-jet text-platinum text-center text-sm py-6 mt-16">
            Built by Forloop {{ new Date().getFullYear() }}
        </div>
    </div>
</template>
