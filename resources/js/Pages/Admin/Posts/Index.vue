<script setup>
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    posts: Array,
});

function formatDate(dateStr) {
    if (!dateStr) return '—';
    return new Date(dateStr).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
    });
}

function deletePost(post) {
    if (!confirm(`Delete "${post.title}"? This cannot be undone.`)) return;
    router.delete(`/admin/posts/${post.id}`);
}
</script>

<template>
    <Head title="Admin — Posts" />

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

        <div class="max-w-5xl mx-auto px-6 py-12">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-semibold text-jet">Posts</h1>
                <Link
                    href="/admin/posts/create"
                    class="bg-persianGreen text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-pistachio hover:text-jet transition-colors"
                >
                    + New Post
                </Link>
            </div>

            <div v-if="posts.length === 0" class="text-center text-gray-500 py-20">
                <p class="text-xl">No posts yet.</p>
                <Link href="/admin/posts/create" class="text-persianGreen mt-2 inline-block hover:underline">
                    Write your first post →
                </Link>
            </div>

            <div v-else class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="text-left px-6 py-3 font-medium text-gray-600">Title</th>
                            <th class="text-left px-4 py-3 font-medium text-gray-600">Status</th>
                            <th class="text-left px-4 py-3 font-medium text-gray-600">Tags</th>
                            <th class="text-left px-4 py-3 font-medium text-gray-600">Published</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr v-for="post in posts" :key="post.id" class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-jet">
                                {{ post.title }}
                                <span v-if="post.read_time_minutes" class="ml-2 text-xs text-gray-400">
                                    {{ post.read_time_minutes }} min
                                </span>
                            </td>
                            <td class="px-4 py-4">
                                <span
                                    :class="post.status === 'published'
                                        ? 'bg-pistachio text-jet'
                                        : 'bg-gray-200 text-gray-600'"
                                    class="px-2 py-0.5 rounded-full text-xs font-medium"
                                >
                                    {{ post.status }}
                                </span>
                            </td>
                            <td class="px-4 py-4">
                                <span v-if="post.tags && post.tags.length" class="text-gray-500 text-xs">
                                    {{ post.tags.join(', ') }}
                                </span>
                                <span v-else class="text-gray-300 text-xs">—</span>
                            </td>
                            <td class="px-4 py-4 text-gray-500">{{ formatDate(post.published_at) }}</td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3 justify-end">
                                    <Link
                                        v-if="post.status === 'published'"
                                        :href="`/blog/${post.slug}`"
                                        class="text-persianGreen hover:underline text-xs"
                                        target="_blank"
                                    >
                                        View
                                    </Link>
                                    <Link
                                        :href="`/admin/posts/${post.id}/edit`"
                                        class="text-trueBlue hover:underline text-xs"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        @click="deletePost(post)"
                                        class="text-red-500 hover:underline text-xs"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
