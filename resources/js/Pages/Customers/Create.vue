<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import InputError from '@/Components/InputError.vue';
import { Core as YubinBangoCore } from "yubinbango-core2";

defineProps({
  errors: Object
})

const form = reactive({
  name: null,
  kana: null,
  tel: null,
  email: null,
  postcode: null,
  address: null,
  birthday: null,
  gender: null,
})

const fetchAddress = ()=>{
    if (!form.postcode.match(/^\d{3}-?\d{4}$/)) { //入力された値をチェック
    return false
  }
    new YubinBangoCore(String(form.postcode), (value)=>{
        form.address = value.region + value.locality + value.street;
        // console.log(value);
    })
}

// const form = useForm({
//     name: '',
//     memo: '',
//     price: null
// });

const storeCustomer = () => {
  Inertia.post('/customers', form)
}

</script>

<template>

  <Head title="顧客登録" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        顧客登録
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <section class="text-gray-600 body-font relative">
              <form @submit.prevent="storeCustomer()">
                <div class="container px-5 py-8 mx-auto">
                  <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <div class="flex flex-wrap -m-2">
                      <div class="p-2 w-full">
                        <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">顧客名</label>
                          <input type="text" id="name" name="name" v-model="form.name"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <InputError v-if="errors.name" class="mt-2" :message="errors.name" />
                        </div>
                      </div>
                      <div class="p-2 w-full">
                        <div class="relative">
                          <label for="kana" class="leading-7 text-sm text-gray-600">顧客名（かな）</label>
                          <input type="text" id="kana" name="kana" v-model="form.kana"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <InputError v-if="errors.kana" class="mt-2" :message="errors.kana" />
                        </div>
                      </div>
                      <div class="p-2 w-full">
                        <div class="relative">
                          <label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
                          <input type="tel" id="tel" name="tel" v-model="form.tel"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <InputError v-if="errors.tel" class="mt-2" :message="errors.tel" />
                        </div>
                      </div>
                      <div class="p-2 w-full">
                        <div class="relative">
                          <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                          <input type="email" id="email" name="email" v-model="form.email"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <InputError v-if="errors.email" class="mt-2" :message="errors.email" />
                        </div>
                      </div>
                      <div class="p-2 w-full">
                        <div class="relative">
                          <label for="postcode" class="leading-7 text-sm text-gray-600">郵便番号</label>
                          <!-- <input type="number" id="postcode" name="postcode" v-model="form.postcode" @change="fetchAddress" max="9999999"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> -->
                          <input type="text" id="postcode" name="postcode" v-model="form.postcode" @change="fetchAddress" maxlength="7" inputmode="numeric"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <InputError v-if="errors.postcode" class="mt-2" :message="errors.postcode" />
                        </div>
                      </div>
                      <div class="p-2 w-full">
                        <div class="relative">
                          <label for="address" class="leading-7 text-sm text-gray-600">住所</label>
                          <input type="text" id="address" name="address" v-model="form.address"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <InputError v-if="errors.address" class="mt-2" :message="errors.address" />
                        </div>
                      </div>
                      <div class="p-2 w-full">
                        <div class="relative">
                          <label for="birthday" class="leading-7 text-sm text-gray-600">誕生日</label>
                          <input type="date" id="birthday" name="birthday" v-model="form.birthday"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <InputError v-if="errors.birthday" class="mt-2" :message="errors.birthday" />
                        </div>
                      </div>
                      <div class="p-2 w-full">
                        <div class="relative">
                          <label class="leading-7 text-sm text-gray-600">性別</label>
                          <div>
                              <input type="radio" name="gender" id="gender_1" v-model="form.gender" value="0" checked>
                              <label for="gender_1" class="leading-7 text-sm text-gray-600 ml-2">男性</label>
                          </div>
                          <div>
                              <input type="radio" name="gender" id="gender_2" v-model="form.gender" value="1">
                              <label for="gender_2" class="leading-7 text-sm text-gray-600 ml-2">女性</label>
                          </div>
                          <div>
                              <input type="radio" name="gender" id="gender_3" v-model="form.gender" value="2">
                              <label for="gender_3" class="leading-7 text-sm text-gray-600 ml-2">その他</label>
                          </div>
                          <InputError v-if="errors.gender" class="mt-2" :message="errors.gender" />
                        </div>
                      </div>

                      <div class="p-2 w-full">
                        <button
                          class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
