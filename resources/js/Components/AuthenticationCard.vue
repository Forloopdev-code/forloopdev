<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-neutral-900">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-neutral-800 border border-neutral-700 shadow-xl overflow-hidden sm:rounded-xl">
            <slot />
        </div>
    </div>
</template>
