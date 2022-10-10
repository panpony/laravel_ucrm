<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";

const form = reactive({
    title : null,
    content : null
})

const submit = () => {
    Inertia.post('/inertia/index',form)
}

defineProps({
    errors: Object,
})
</script>

<template>

<form @submit.prevent="submit">

    <input type="text" name="title" v-model="form.title"><br>
    <div v-if="errors.title">{{ errors.title }}</div>
    <input type="text" name="content" v-model="form.content"><br>
    <div v-if="errors.content">{{ errors.content }}</div>
    <button type="submit">送信</button>

</form>

<!-- <Link href="">show{{ id }}</Link> -->
</template>
