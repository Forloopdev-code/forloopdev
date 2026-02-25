<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-persianGreen border border-transparent rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-pistachio active:bg-persianGreen focus:outline-none focus:ring-2 focus:ring-persianGreen focus:ring-offset-2 focus:ring-offset-neutral-800 transition ease-in-out duration-150">
        <slot />
    </button>
</template>
