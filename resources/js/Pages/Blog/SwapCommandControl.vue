<script setup>
import { Head, Link } from '@inertiajs/vue3';
import BlogNav from '@/Components/BlogNav.vue';
</script>

<template>
    <Head title="How to Swap Command and Control Keys on Your MacBook – Forloop Blog" />

    <div class="min-h-screen bg-neutral-900 font-sans selection:bg-persianGreen selection:text-white">
        <BlogNav active-page="blog" />

        <!-- Hero bar -->
        <div class="bg-jet border-b border-neutral-800 py-14 px-5 sm:px-8">
            <div class="max-w-3xl mx-auto">
                <!-- Breadcrumb -->
                <div class="flex items-center gap-2 mb-6 text-xs font-semibold uppercase tracking-widest">
                    <Link href="/blog" class="text-persianGreen hover:text-pistachio transition-colors">Blog</Link>
                    <span class="text-neutral-600">/</span>
                    <span class="text-neutral-500">macOS Tips</span>
                </div>
                <!-- Tag + meta -->
                <div class="flex items-center gap-3 mb-4">
                    <span class="text-xs font-bold tracking-wide uppercase px-2.5 py-1 rounded-full bg-neutral-700 text-persianGreen">
                        macOS Tips
                    </span>
                    <span class="text-neutral-600 text-xs font-semibold">5 min read</span>
                </div>
                <h1 class="text-4xl sm:text-5xl font-black text-white uppercase tracking-tight leading-tight mb-4">
                    How to Swap Command and Control Keys on Your MacBook
                </h1>
                <p class="text-neutral-400 text-sm font-semibold">
                    Published by the Forloop Team &nbsp;·&nbsp; February 24, 2026
                </p>
            </div>
        </div>

        <!-- Article body -->
        <article class="max-w-3xl mx-auto px-5 sm:px-8 py-14">

            <!-- Intro -->
            <p class="text-neutral-300 text-base leading-relaxed mb-8">
                If you're coming from Windows — or just prefer Control-based shortcuts — your muscle memory
                probably fights you every day on a Mac. The fix takes about 30 seconds and lives inside
                System Settings.
            </p>

            <!-- ── STEP 1 ─────────────────────────────── -->
            <div class="step-block">
                <h2 class="step-heading">
                    <span class="step-num">1</span>
                    Open System Settings
                </h2>
                <p class="text-neutral-300 leading-relaxed mb-5">
                    Click the <strong class="text-white font-bold">Apple menu</strong> (&#63743;) in the top-left corner
                    of your screen, then click <strong class="text-white font-bold">System Settings…</strong>
                </p>

                <figure class="mb-8">
                    <img
                        src="/img/blog/step1-apple-menu.png"
                        alt="Apple menu open with System Settings highlighted"
                        class="screenshot-img"
                    >
                    <figcaption>Click System Settings from the Apple menu</figcaption>
                </figure>
            </div>

            <!-- ── STEP 2 ─────────────────────────────── -->
            <div class="step-block">
                <h2 class="step-heading">
                    <span class="step-num">2</span>
                    Open Keyboard Settings
                </h2>
                <p class="text-neutral-300 leading-relaxed mb-5">
                    In the left sidebar, scroll down and click <strong class="text-white font-bold">Keyboard</strong>.
                    On the right pane, click the <strong class="text-white font-bold">Keyboard Shortcuts…</strong> button.
                </p>

                <figure class="mb-8">
                    <img
                        src="/img/blog/step2-keyboard-settings.jpeg"
                        alt="System Settings open on the Keyboard pane"
                        class="screenshot-img"
                    >
                    <figcaption>Click <strong>Keyboard Shortcuts…</strong> on the Keyboard settings pane</figcaption>
                </figure>
            </div>

            <!-- ── STEP 3 ─────────────────────────────── -->
            <div class="step-block">
                <h2 class="step-heading">
                    <span class="step-num">3</span>
                    Select Modifier Keys &amp; Swap
                </h2>
                <p class="text-neutral-300 leading-relaxed mb-3">
                    In the Keyboard Shortcuts window, click <strong class="text-white font-bold">Modifier Keys</strong>
                    in the left sidebar. Then set the dropdowns so they're swapped:
                </p>
                <ul class="text-neutral-300 mb-5 space-y-2 pl-5 list-disc">
                    <li>Set <strong class="text-white font-bold">Control (^) Key</strong> → <strong class="text-persianGreen font-bold">⌘ Command</strong></li>
                    <li>Set <strong class="text-white font-bold">Command (⌘) Key</strong> → <strong class="text-persianGreen font-bold">^ Control</strong></li>
                </ul>
                <p class="text-neutral-300 leading-relaxed mb-5">
                    Click <strong class="text-white font-bold">Done</strong> when finished.
                </p>

                <figure class="mb-8">
                    <img
                        src="/img/blog/step3-modifier-keys.jpeg"
                        alt="Modifier Keys panel showing Control and Command keys swapped"
                        class="screenshot-img"
                    >
                    <figcaption>Set Control → Command and Command → Control, then click Done</figcaption>
                </figure>
            </div>

            <!-- ── NOTE BOX ───────────────────────────── -->
            <div class="note-box">
                <div class="flex items-start gap-3">
                    <span class="text-persianGreen font-black text-sm uppercase tracking-widest mt-0.5 flex-shrink-0">Note</span>
                    <p class="text-neutral-300 text-sm leading-relaxed m-0">
                        This setting applies per-keyboard. If you use an external keyboard,
                        use the <strong class="text-white font-bold">Select keyboard</strong> dropdown at the top
                        of the Modifier Keys panel to repeat the swap for that device too.
                    </p>
                </div>
            </div>

            <!-- ── REVERTING ──────────────────────────── -->
            <div class="step-block mt-10">
                <h2 class="text-2xl font-extrabold text-white uppercase tracking-tight mb-4">
                    Reverting to Default
                </h2>
                <p class="text-neutral-300 leading-relaxed">
                    To undo the swap, go back to <strong class="text-white font-bold">Keyboard Shortcuts… → Modifier Keys</strong>
                    and click <strong class="text-white font-bold">Restore Defaults</strong>.
                </p>
            </div>

            <!-- Back link -->
            <div class="mt-14 pt-8 border-t border-neutral-800">
                <Link href="/blog" class="inline-flex items-center gap-2 text-persianGreen hover:text-pistachio text-sm font-bold uppercase tracking-widest transition-colors duration-150">
                    <span>←</span> Back to Blog
                </Link>
            </div>
        </article>

        <!-- Footer -->
        <footer class="border-t border-neutral-800 py-8 px-5 sm:px-8 mt-8">
            <div class="max-w-5xl mx-auto flex items-center justify-between">
                <img src="/img/logo_name_light.png" alt="Forloop" class="h-7">
                <p class="text-neutral-700 text-xs font-semibold uppercase tracking-widest">© 2024 Forloop</p>
            </div>
        </footer>
    </div>
</template>

<style scoped>
/* ── Step blocks ─────────────────────────── */
.step-block {
    margin-bottom: 2rem;
}
.step-heading {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 1.375rem;
    font-weight: 800;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    margin-bottom: 1rem;
    margin-top: 2rem;
}
.step-num {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 2rem;
    height: 2rem;
    background: linear-gradient(135deg, #8ED081 0%, #1EA896 50%, #3066BE 100%);
    color: white;
    border-radius: 50%;
    font-size: 0.875rem;
    font-weight: 900;
    flex-shrink: 0;
}

/* ── Screenshots ────────────────────────── */
figure {
    margin: 1.5rem 0 2rem;
}
figcaption {
    text-align: center;
    font-size: 0.8125rem;
    color: #525252;
    margin-top: 0.625rem;
    font-weight: 600;
}
.screenshot-img {
    display: block;
    width: 100%;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
    border: 1px solid #404040;
}

/* ── Note box ───────────────────────────── */
.note-box {
    background: rgba(30, 168, 150, 0.08);
    border-left: 3px solid #1EA896;
    border-radius: 0 10px 10px 0;
    padding: 1rem 1.25rem;
    margin: 2rem 0;
}
</style>
