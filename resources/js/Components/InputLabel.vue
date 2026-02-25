<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label class="block font-semibold text-sm text-neutral-300">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
