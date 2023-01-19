<template>
        <Head>
        <title>Novo Post</title>
    </Head>
    <AppLayout title="Create">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Criar post
            </h2>
        </template>

        <br/>

        <form @submit.prevent="form.post(route('dashboard.store'))">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex-shrink-0 p-4">
                        <label for="title" name="title">Insira o nome:   </label>
                        <input type="text" v-model="form.title" class="border-transparent rounded-md shadow-sm border-b border-gray-200 shadow">
                        <div v-if="errors.title" class="text-red-600">
                            {{ errors.title }}
                        </div>
                    </div>
                </div>

                <br/>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
                    <div class="flex-shrink-0 p-4">
                        <label for="content" name="content">Insira o email:  </label>
                        <input type="text" v-model="form.content" class="border-transparent rounded-md shadow-sm border-gray-200 shadow">
                        <div v-if="errors.content" class="text-red-600">
                            {{ errors.content }}
                        </div>
                    </div>
                </div>
            </div>  
            <br/>
            <div>
                <button type="submit" class="ml-12 inline-flex items-center px-4 py-2 border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Salvar
                </button>

                <Link :href="route('dashboard')" class="ml-4 inline-flex items-center px-4 py-2 border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancelar
                </Link>
            </div>
        </form>    
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import moment from 'moment'
import Welcome from '@/Components/Welcome.vue';
import { Link, Head, useForm } from '@inertiajs/inertia-vue3';


</script>

<script>
import { Link, Head, useForm } from '@inertiajs/inertia-vue3'
import MenuLayout from '../Layouts/LayoutMenu.vue'
    export default {

        data: () => ({
            
            moment: moment
   }),
        props: {
            posts: Object,
            errors: Object
        },

        components: {
            Link,
            Head
        },

        data()
        {
            const form = useForm({
                title: '',
                content:''
            })

            return {
                form
            }

        }
    }
</script>
