<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

const deleteConfirm = (id) => {
    Inertia.delete(`/inertia/${id}`, {
  onBefore: () => confirm('削除しますか？'),
})
}

defineProps({
    id: String,
    blog: Object
})
</script>

<template>

{{ id }}<br>{{ blog.id }}<br>{{ blog.title }}<br>
<button @click="deleteConfirm(blog.id)">削除</button>

</template>
