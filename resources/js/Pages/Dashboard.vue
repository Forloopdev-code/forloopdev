<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const page = usePage();
const user  = computed(() => page.props.auth.user);
const team  = computed(() => user.value?.current_team);

// Role: team members have a 'membership.role' of 'admin' or 'editor'.
// Team owners have no membership record — treat as admin.
const userRole = computed(() => team.value?.membership?.role ?? 'admin');
const isAdmin  = computed(() => userRole.value === 'admin');

const roleLabel = computed(() => {
    if (!team.value?.membership) return 'Owner';
    return userRole.value.charAt(0).toUpperCase() + userRole.value.slice(1);
});

const roleColor = computed(() => {
    if (!team.value?.membership) return 'bg-pistachio/20 text-pistachio border-pistachio/30';
    return userRole.value === 'admin'
        ? 'bg-trueBlue/20 text-trueBlue border-trueBlue/30'
        : 'bg-persianGreen/20 text-persianGreen border-persianGreen/30';
});

// Placeholder blog stats
const stats = [
    {
        label: 'Total Posts',
        value: '24',
        icon: 'document',
        accent: 'text-trueBlue',
        iconBg: 'bg-trueBlue/10',
        border: 'border-trueBlue/20',
    },
    {
        label: 'Published',
        value: '18',
        icon: 'check',
        accent: 'text-pistachio',
        iconBg: 'bg-pistachio/10',
        border: 'border-pistachio/20',
    },
    {
        label: 'Drafts',
        value: '6',
        icon: 'pencil',
        accent: 'text-persianGreen',
        iconBg: 'bg-persianGreen/10',
        border: 'border-persianGreen/20',
    },
    {
        label: 'Team Members',
        value: null,
        icon: 'users',
        accent: 'text-platinum',
        iconBg: 'bg-neutral-700',
        border: 'border-neutral-600',
        live: true,
    },
];

const teamMemberCount = computed(() =>
    user.value?.all_teams?.reduce((acc, t) => acc + (t.members?.length ?? 1), 0) ?? '—'
);

// Placeholder posts
const recentPosts = [
    { title: 'Getting Started with Laravel & Vue 3', status: 'published', author: 'Spencer F.', date: 'Feb 22, 2026', slug: 'getting-started' },
    { title: 'Swap Command & Control Keys on Mac', status: 'published', author: 'Spencer F.', date: 'Feb 18, 2026', slug: 'swap-command-control-keys-mac' },
    { title: 'Building AI-Powered Workflows with Python', status: 'draft', author: 'Spencer F.', date: 'Feb 15, 2026', slug: 'ai-workflows-python' },
    { title: 'Forloop Stack: Laravel + Inertia + Vue', status: 'draft', author: 'Spencer F.', date: 'Feb 10, 2026', slug: 'forloop-stack' },
    { title: 'Why We Use Tailwind CSS for Everything', status: 'published', author: 'Spencer F.', date: 'Feb 5, 2026', slug: 'tailwind-css' },
];
</script>

<template>
    <AppLayout title="Dashboard">

        <div class="py-10 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto space-y-10">

            <!-- Header Row -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3 mb-1">
                        <div class="h-px w-6" style="background: linear-gradient(to right, #8ED081, #3066BE)"></div>
                        <span class="text-xs font-bold tracking-widest uppercase text-persianGreen">Admin Panel</span>
                    </div>
                    <h1 class="text-3xl font-black text-white uppercase tracking-tight">
                        Welcome back, {{ user?.name?.split(' ')[0] }}
                    </h1>
                    <p class="text-neutral-400 text-sm mt-1">
                        {{ team?.name }}
                        <span class="mx-1.5 text-neutral-600">&middot;</span>
                        <span :class="['inline-flex items-center px-2 py-0.5 rounded border text-xs font-bold uppercase tracking-wide', roleColor]">
                            {{ roleLabel }}
                        </span>
                    </p>
                </div>

                <a href="#"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg font-bold text-sm text-white transition-all duration-150 hover:opacity-90 hover:scale-[1.03] self-start sm:self-auto"
                    style="background: linear-gradient(135deg, #8ED081, #1EA896, #3066BE)">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    New Post
                </a>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div
                    v-for="stat in stats"
                    :key="stat.label"
                    :class="['bg-neutral-800 rounded-xl p-5 border', stat.border, 'relative overflow-hidden group hover:border-opacity-60 transition-all duration-200']"
                >
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                        style="background: radial-gradient(ellipse at top left, rgba(30,168,150,0.06) 0%, transparent 70%)"></div>

                    <div class="relative">
                        <div :class="['w-10 h-10 rounded-lg flex items-center justify-center mb-3', stat.iconBg]">
                            <svg v-if="stat.icon === 'document'" :class="['h-5 w-5', stat.accent]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75-6.75a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" clip-rule="evenodd" />
                                <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                            </svg>
                            <svg v-else-if="stat.icon === 'check'" :class="['h-5 w-5', stat.accent]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                            </svg>
                            <svg v-else-if="stat.icon === 'pencil'" :class="['h-5 w-5', stat.accent]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                            </svg>
                            <svg v-else-if="stat.icon === 'users'" :class="['h-5 w-5', stat.accent]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                            </svg>
                        </div>

                        <div :class="['text-3xl font-black mb-0.5', stat.accent]">
                            {{ stat.live ? teamMemberCount : stat.value }}
                        </div>
                        <div class="text-xs font-semibold uppercase tracking-wider text-neutral-500">{{ stat.label }}</div>
                    </div>
                </div>
            </div>

            <!-- Main Grid: Quick Actions + Team Widget -->
            <div class="grid lg:grid-cols-3 gap-6">

                <!-- Quick Actions -->
                <div class="lg:col-span-2 bg-neutral-800 rounded-xl border border-neutral-700 p-6">
                    <h2 class="text-xs font-bold tracking-widest uppercase text-neutral-500 mb-4">Quick Actions</h2>

                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <!-- New Post -->
                        <a href="#"
                            class="group flex flex-col items-center gap-2 p-4 rounded-xl border border-neutral-700 hover:border-persianGreen hover:bg-persianGreen/5 transition-all duration-200 text-center">
                            <div class="w-10 h-10 rounded-lg bg-persianGreen/10 flex items-center justify-center group-hover:bg-persianGreen/20 transition-colors">
                                <svg class="h-5 w-5 text-persianGreen" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-neutral-300 group-hover:text-white uppercase tracking-wide">New Post</span>
                        </a>

                        <!-- View Blog -->
                        <Link :href="route('blog')"
                            class="group flex flex-col items-center gap-2 p-4 rounded-xl border border-neutral-700 hover:border-trueBlue hover:bg-trueBlue/5 transition-all duration-200 text-center">
                            <div class="w-10 h-10 rounded-lg bg-trueBlue/10 flex items-center justify-center group-hover:bg-trueBlue/20 transition-colors">
                                <svg class="h-5 w-5 text-trueBlue" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0A.75.75 0 018.25 6h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75zM2.625 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 12a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12A.75.75 0 017.5 12zm-4.875 5.25a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-neutral-300 group-hover:text-white uppercase tracking-wide">View Blog</span>
                        </Link>

                        <!-- Manage Team (admin only) -->
                        <Link v-if="isAdmin" :href="route('teams.show', team)"
                            class="group flex flex-col items-center gap-2 p-4 rounded-xl border border-neutral-700 hover:border-pistachio hover:bg-pistachio/5 transition-all duration-200 text-center">
                            <div class="w-10 h-10 rounded-lg bg-pistachio/10 flex items-center justify-center group-hover:bg-pistachio/20 transition-colors">
                                <svg class="h-5 w-5 text-pistachio" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-neutral-300 group-hover:text-white uppercase tracking-wide">Manage Team</span>
                        </Link>

                        <!-- Profile -->
                        <Link :href="route('profile.show')"
                            class="group flex flex-col items-center gap-2 p-4 rounded-xl border border-neutral-700 hover:border-neutral-500 hover:bg-neutral-700/50 transition-all duration-200 text-center">
                            <div class="w-10 h-10 rounded-lg bg-neutral-700 flex items-center justify-center group-hover:bg-neutral-600 transition-colors">
                                <svg class="h-5 w-5 text-neutral-400 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-neutral-300 group-hover:text-white uppercase tracking-wide">Profile</span>
                        </Link>

                        <!-- Settings (admin only) -->
                        <Link v-if="isAdmin" :href="route('profile.show')"
                            class="group flex flex-col items-center gap-2 p-4 rounded-xl border border-neutral-700 hover:border-neutral-500 hover:bg-neutral-700/50 transition-all duration-200 text-center">
                            <div class="w-10 h-10 rounded-lg bg-neutral-700 flex items-center justify-center group-hover:bg-neutral-600 transition-colors">
                                <svg class="h-5 w-5 text-neutral-400 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-neutral-300 group-hover:text-white uppercase tracking-wide">Settings</span>
                        </Link>

                        <!-- My Posts (editor only) -->
                        <Link v-if="!isAdmin" :href="route('blog')"
                            class="group flex flex-col items-center gap-2 p-4 rounded-xl border border-neutral-700 hover:border-persianGreen hover:bg-persianGreen/5 transition-all duration-200 text-center">
                            <div class="w-10 h-10 rounded-lg bg-persianGreen/10 flex items-center justify-center group-hover:bg-persianGreen/20 transition-colors">
                                <svg class="h-5 w-5 text-persianGreen" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75-6.75a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" clip-rule="evenodd" />
                                    <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-neutral-300 group-hover:text-white uppercase tracking-wide">My Posts</span>
                        </Link>
                    </div>
                </div>

                <!-- Team Widget -->
                <div class="bg-neutral-800 rounded-xl border border-neutral-700 p-6">
                    <h2 class="text-xs font-bold tracking-widest uppercase text-neutral-500 mb-4">Team Overview</h2>

                    <div class="mb-4">
                        <div class="text-sm font-bold text-white mb-0.5">{{ team?.name }}</div>
                        <div class="text-xs text-neutral-500">{{ teamMemberCount }} member{{ teamMemberCount !== 1 ? 's' : '' }}</div>
                    </div>

                    <div class="space-y-2 mb-5">
                        <div class="flex items-center justify-between py-2 px-3 bg-neutral-700/50 rounded-lg">
                            <span class="text-xs text-neutral-400 font-semibold uppercase tracking-wide">Your Role</span>
                            <span :class="['text-xs font-bold uppercase tracking-wide px-2 py-0.5 rounded border', roleColor]">
                                {{ roleLabel }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between py-2 px-3 bg-neutral-700/50 rounded-lg">
                            <span class="text-xs text-neutral-400 font-semibold uppercase tracking-wide">Permissions</span>
                            <span class="text-xs font-semibold text-neutral-300">
                                {{ isAdmin ? 'Full Access' : 'Read / Write' }}
                            </span>
                        </div>
                    </div>

                    <Link v-if="isAdmin" :href="route('teams.show', team)"
                        class="block text-center w-full py-2 px-4 border border-neutral-600 rounded-lg text-xs font-bold uppercase tracking-wide text-neutral-400 hover:text-white hover:border-persianGreen hover:bg-persianGreen/5 transition-all duration-150">
                        Manage Team
                    </Link>
                </div>
            </div>

            <!-- Recent Posts Table -->
            <div class="bg-neutral-800 rounded-xl border border-neutral-700 overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b border-neutral-700">
                    <h2 class="text-xs font-bold tracking-widest uppercase text-neutral-500">Recent Posts</h2>
                    <Link :href="route('blog')" class="text-xs font-bold text-persianGreen hover:text-pistachio transition-colors uppercase tracking-wide">
                        View All &rarr;
                    </Link>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-neutral-700">
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-widest text-neutral-500">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-widest text-neutral-500">Status</th>
                                <th class="hidden sm:table-cell px-6 py-3 text-left text-xs font-bold uppercase tracking-widest text-neutral-500">Author</th>
                                <th class="hidden md:table-cell px-6 py-3 text-left text-xs font-bold uppercase tracking-widest text-neutral-500">Date</th>
                                <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-widest text-neutral-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-700">
                            <tr v-for="post in recentPosts" :key="post.slug"
                                class="hover:bg-neutral-700/40 transition-colors duration-150 group">
                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold text-neutral-200 group-hover:text-white transition-colors line-clamp-1">
                                        {{ post.title }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span v-if="post.status === 'published'"
                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-bold border bg-pistachio/10 text-pistachio border-pistachio/20 uppercase tracking-wide">
                                        <span class="w-1.5 h-1.5 rounded-full bg-pistachio inline-block"></span>
                                        Live
                                    </span>
                                    <span v-else
                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-bold border bg-neutral-700 text-neutral-400 border-neutral-600 uppercase tracking-wide">
                                        <span class="w-1.5 h-1.5 rounded-full bg-neutral-500 inline-block"></span>
                                        Draft
                                    </span>
                                </td>
                                <td class="hidden sm:table-cell px-6 py-4">
                                    <span class="text-sm text-neutral-400">{{ post.author }}</span>
                                </td>
                                <td class="hidden md:table-cell px-6 py-4">
                                    <span class="text-sm text-neutral-500">{{ post.date }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="#"
                                            class="text-xs font-bold text-neutral-400 hover:text-persianGreen transition-colors uppercase tracking-wide">
                                            Edit
                                        </a>
                                        <button v-if="isAdmin"
                                            class="text-xs font-bold text-neutral-600 hover:text-[#ef4444] transition-colors uppercase tracking-wide">
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
    </AppLayout>
</template>
