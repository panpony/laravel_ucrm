<script setup>
    // defineProps({
    //     message: null
    // });
</script>

<template>
    <div class="bg-blue-300 text-white p-4" v-if="$page.props.flash.status ==='success'">{{ $page.props.flash.message }}</div>
    <div class="bg-red-300 text-white p-4" v-if="$page.props.flash.status ==='delete'">{{ $page.props.flash.message }}</div>
</template>
