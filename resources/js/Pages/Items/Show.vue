<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from "@inertiajs/inertia";
import { nl2br } from '@/common';

defineProps({
  item: Object
});

const deleteItem = (id) => {
    Inertia.delete(route('items.destroy',{item: id}), {
  onBefore: () => confirm('削除しますか？'),
})
}
</script>

<template>

  <Head title="商品登録" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        商品登録
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <section class="text-gray-600 body-font relative">
              <!-- <form @submit.prevent="storeItem()"> -->
              <div class="container px-5 py-8 mx-auto">
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                  <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-full">
                      <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>

                        <p id="name"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          {{ item.name }}
                        </p>
                      </div>
                    </div>
                    <div class="p-2 w-full">
                      <div class="relative">
                        <label for="price" class="leading-7 text-sm text-gray-600">価格</label>
                        <p id="price"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          {{ item.price }}
                        </p>
                      </div>
                    </div>
                    <div class="p-2 w-full">
                      <div class="relative">
                        <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
                        <div id="memo" v-html="nl2br(item.memo)"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                      </div>
                    </div>
                    <div class="p-2 w-full">
                      <div class="relative">
                        <label for="is_selling" class="leading-7 text-sm text-gray-600">販売状況</label>
                        <p id="is_selling" v-if="item.is_selling === 1 ? '販売中' : '品切れ'"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          {{ item.is_selling === 1 ? '販売中' : '品切れ' }}
                        </p>
                      </div>
                    </div>
                    <div class="p-2 w-full flex">
                      <button
                      @click="deleteItem(item.id)"
                        class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除する</button>
                      <Link
                      as="button"
                      :href="route('items.edit',{ item: item.id })"
                        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集する</Link>
                    </div>
                  </div>
                </div>
              </div>
              <!-- </form> -->
            </section>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
