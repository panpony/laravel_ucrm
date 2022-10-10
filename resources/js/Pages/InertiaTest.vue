<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>
<template>
InertiaTestです。<br>
<a href="/">aタグ経由です</a><br>
<Link href="/">Link経由です</Link><br>
<Link :href="route('inertia-test-index')">名前付きLink経由です</Link><br>
<Link :href="route('inertia.show',{id : 1 })">ルートパラメーターテストです</Link><br>
</template>
