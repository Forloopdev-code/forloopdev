<script setup>
import { computed, ref } from 'vue';
import { marked } from 'marked';

const props = defineProps({
    form: Object,
    errors: Object,
});

const emit = defineEmits(['submit']);

const showPreview = ref(false);

const renderedPreview = computed(() => marked.parse(props.form.content || ''));

// Tag input handling
const tagInput = ref('');

function addTag() {
    const tag = tagInput.value.trim();
    if (tag && !props.form.tags.includes(tag)) {
        props.form.tags.push(tag);
    }
    tagInput.value = '';
}

function removeTag(tag) {
    props.form.tags = props.form.tags.filter(t => t !== tag);
}

function onTagKeydown(e) {
    if (e.key === 'Enter' || e.key === ',') {
        e.preventDefault();
        addTag();
    }
}
</script>

<template>
    <form @submit.prevent="emit('submit')" class="space-y-6">
        <!-- Title -->
        <div>
            <label class="block text-sm font-medium text-jet mb-1">Title <span class="text-red-500">*</span></label>
            <input
                v-model="form.title"
                type="text"
                placeholder="Your post title..."
                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-jet focus:outline-none focus:ring-2 focus:ring-persianGreen"
            />
            <p v-if="errors?.title" class="text-red-500 text-xs mt-1">{{ errors.title }}</p>
        </div>

        <!-- Slug -->
        <div>
            <label class="block text-sm font-medium text-jet mb-1">Slug <span class="text-gray-400 font-normal">(auto-generated if empty)</span></label>
            <input
                v-model="form.slug"
                type="text"
                placeholder="my-post-slug"
                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-jet focus:outline-none focus:ring-2 focus:ring-persianGreen font-mono text-sm"
            />
            <p v-if="errors?.slug" class="text-red-500 text-xs mt-1">{{ errors.slug }}</p>
        </div>

        <!-- Excerpt -->
        <div>
            <label class="block text-sm font-medium text-jet mb-1">Excerpt</label>
            <textarea
                v-model="form.excerpt"
                rows="2"
                placeholder="Short summary shown on the blog listing..."
                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-jet focus:outline-none focus:ring-2 focus:ring-persianGreen resize-y"
            />
        </div>

        <!-- Content with preview toggle -->
        <div>
            <div class="flex items-center justify-between mb-1">
                <label class="text-sm font-medium text-jet">Content (Markdown) <span class="text-red-500">*</span></label>
                <button
                    type="button"
                    @click="showPreview = !showPreview"
                    class="text-xs text-persianGreen hover:underline"
                >
                    {{ showPreview ? 'Edit' : 'Preview' }}
                </button>
            </div>

            <div v-if="!showPreview">
                <textarea
                    v-model="form.content"
                    rows="20"
                    placeholder="Write your post in Markdown..."
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-jet font-mono text-sm focus:outline-none focus:ring-2 focus:ring-persianGreen resize-y"
                />
            </div>
            <div
                v-else
                class="prose prose-lg max-w-none border border-gray-300 rounded-lg px-6 py-4 bg-white min-h-64
                       prose-headings:text-jet prose-a:text-persianGreen"
                v-html="renderedPreview"
            />
            <p v-if="errors?.content" class="text-red-500 text-xs mt-1">{{ errors.content }}</p>
        </div>

        <!-- Tags -->
        <div>
            <label class="block text-sm font-medium text-jet mb-1">Tags</label>
            <div class="flex flex-wrap gap-2 mb-2">
                <span
                    v-for="tag in form.tags"
                    :key="tag"
                    class="flex items-center gap-1 bg-persianGreen text-white text-xs px-2 py-0.5 rounded-full"
                >
                    {{ tag }}
                    <button type="button" @click="removeTag(tag)" class="hover:text-red-200 ml-0.5">×</button>
                </span>
            </div>
            <input
                v-model="tagInput"
                type="text"
                placeholder="Type a tag and press Enter or comma..."
                @keydown="onTagKeydown"
                @blur="addTag"
                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-jet focus:outline-none focus:ring-2 focus:ring-persianGreen"
            />
        </div>

        <!-- Status -->
        <div>
            <label class="block text-sm font-medium text-jet mb-1">Status</label>
            <select
                v-model="form.status"
                class="border border-gray-300 rounded-lg px-4 py-2.5 text-jet focus:outline-none focus:ring-2 focus:ring-persianGreen"
            >
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>

        <!-- SEO fields -->
        <details class="group">
            <summary class="cursor-pointer text-sm font-medium text-jet flex items-center gap-2 select-none">
                <span>SEO Settings</span>
                <span class="text-gray-400 text-xs font-normal group-open:hidden">(click to expand)</span>
            </summary>
            <div class="mt-4 space-y-4 pl-2 border-l-2 border-gray-200">
                <div>
                    <label class="block text-sm font-medium text-jet mb-1">Meta Title</label>
                    <input
                        v-model="form.meta_title"
                        type="text"
                        placeholder="Custom SEO title (defaults to post title)"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-jet focus:outline-none focus:ring-2 focus:ring-persianGreen"
                    />
                    <p class="text-xs text-gray-400 mt-1">{{ (form.meta_title || '').length }} / 60 chars recommended</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-jet mb-1">Meta Description</label>
                    <textarea
                        v-model="form.meta_description"
                        rows="2"
                        placeholder="Short description for search engines..."
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-jet focus:outline-none focus:ring-2 focus:ring-persianGreen resize-y"
                    />
                    <p class="text-xs text-gray-400 mt-1">{{ (form.meta_description || '').length }} / 160 chars recommended</p>
                </div>
            </div>
        </details>

        <!-- Actions -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-200">
            <button
                type="submit"
                class="bg-persianGreen text-white px-6 py-2.5 rounded-lg font-medium hover:bg-pistachio hover:text-jet transition-colors"
            >
                Save Post
            </button>
            <a href="/admin/posts" class="text-sm text-gray-500 hover:underline">Cancel</a>
        </div>
    </form>
</template>
