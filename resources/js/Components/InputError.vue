<script setup>
defineProps({
    message: String,
});
</script>

<template>
    <div v-show="message">
        <p class="text-sm text-[#f87171]">
            {{ message }}
        </p>
    </div>
</template>
