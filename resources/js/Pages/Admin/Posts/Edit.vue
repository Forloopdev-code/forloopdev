<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import PostForm from './PostForm.vue';

const props = defineProps({
    post: Object,
});

const form = useForm({
    title: props.post.title,
    slug: props.post.slug,
    excerpt: props.post.excerpt || '',
    content: props.post.content,
    status: props.post.status,
    tags: props.post.tags || [],
    meta_title: props.post.meta_title || '',
    meta_description: props.post.meta_description || '',
});

function submit() {
    form.put(`/admin/posts/${props.post.id}`);
}
</script>

<template>
    <Head :title="`Edit: ${post.title} — Admin`" />

    <div class="min-h-screen bg-platinum">
        <!-- Nav -->
        <nav class="bg-jet text-platinum px-6 py-4 flex items-center justify-between">
            <Link href="/" class="flex items-center gap-3">
                <img src="/img/logo_name_light.png" alt="Forloop" class="h-10 w-auto" />
            </Link>
            <div class="flex gap-6 text-sm font-medium">
                <Link href="/" class="hover:text-pistachio transition-colors">Home</Link>
                <Link href="/blog" class="hover:text-pistachio transition-colors">Blog</Link>
                <Link href="/admin/posts" class="text-pistachio">Admin</Link>
            </div>
        </nav>

        <div class="max-w-3xl mx-auto px-6 py-12">
            <div class="flex items-center gap-3 mb-8">
                <Link href="/admin/posts" class="text-sm text-persianGreen hover:underline">← Posts</Link>
                <h1 class="text-2xl font-semibold text-jet">Edit Post</h1>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                <PostForm :form="form" :errors="form.errors" @submit="submit" />
            </div>
        </div>
    </div>
</template>
