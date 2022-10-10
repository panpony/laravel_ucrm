<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    id: String,
})
</script>

<template>

<Link href="">show{{ id }}</Link>
</template>
