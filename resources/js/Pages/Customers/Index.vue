<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';
import FlashMessage from '@/Components/FlashMessage.vue';
import Pagination from "@/Components/Pagination.vue";
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const search = ref('');
// ---------- refの値を取得するには、valueが必要 ----------
const searchCustomers = ()=>{
    Inertia.get(route('customers.index',{search:search.value}))
}

defineProps({
    customers: Object,
})
</script>

<template>

  <Head title="顧客一覧" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        顧客管理
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <section class="text-gray-600 body-font">
            <FlashMessage></FlashMessage>
            <div>
                <input type="text" name="search" id="" v-model="search">
                <button class="bg-blue-300 text-white py-2 px-2" @click="searchCustomers">検索</button>
            </div>
              <div class="container px-5 py-8 mx-auto">
                <!-- <div class="flex flex-col text-center w-full mb-20">
                  <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Pricing</h1>
                  <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Banh mi cornhole echo park skateboard authentic crucifix neutra tilde lyft biodiesel artisan direct trade mumblecore 3 wolf moon twee</p>
                </div> -->
                <div class="flex pl-4 my-4 lg:w-2/3 w-full mx-auto">
                  <!-- <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                      <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                  </a> -->
                  <Link as="button" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded" :href="route('customers.create')">商品登録へ</Link>
                  <!-- <button
                    class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button> -->
                </div>
                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                  <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                      <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                        ID</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        顧客名</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        かな</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                        電話番号</th>
                        <th
                          class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="border-b-2 border-gray-200 " v-for="(customer, index) in customers.data" :key="customer.id">
                        <!-- <td class="px-4 py-3 text-blue-700">
                            <Link :href="route('customers.show',{ customer: customer.id })">{{ customer.id }}</Link>
                        </td> -->
                        <td class="px-4 py-3 text-blue-700">{{ customer.id }}</td>
                        <td class="px-4 py-3">{{ customer.name }}</td>
                        <td class="px-4 py-3">{{ customer.kana }}</td>
                        <td class="px-4 py-3">{{ customer.tel }}</td>
                        <!-- <td class="w-10 text-center">
                          <input name="plan" type="radio">
                        </td> -->
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
            </section>
            <Pagination class="mt-6" :links="customers.links"></Pagination>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
