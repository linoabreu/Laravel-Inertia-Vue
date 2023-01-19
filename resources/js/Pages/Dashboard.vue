<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Painel - Olá {{ $page.props.user.name }}
            </h2>
        </template>

        <br/>

        <!-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> -->
                    <!-- <Welcome /> -->
                    <br/>
                    
                        <div class="flex-shrink-0 p-4">
                            <Link :href="route('dashboard.create')">
                                <button type="submit" class="ml-12 inline-flex items-center px-4 py-2 border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Criar Post
                                </button>
                            </Link>
                            <div v-if="$page.props.flash.message" class="text-blue-600">
                                {{ $page.props.flash.message }}
                            </div> 
                        </div>

                    <div class="container flex justify-center mx-auto">
                        <div class="flex flex-col">
                            <div class="w-full">
                                <div class="border-b border-gray-200 shadow">
                                    <table class="divide-y divide-gray-300 ">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-6 py-2 text-xs text-gray-500">
                                                    ID
                                                </th>
                                                <th class="px-6 py-2 text-xs text-gray-500">
                                                    Nome
                                                </th>
                                                <th class="px-6 py-2 text-xs text-gray-500">
                                                    E-mail
                                                </th>
                                                <th class="px-6 py-2 text-xs text-gray-500">
                                                    Creado em:
                                                </th>
                                                <th class="px-6 py-2 text-xs text-gray-500">
                                                    Editar
                                                </th>
                                                <th class="px-6 py-2 text-xs text-gray-500">
                                                    Apagar
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-300">
                                            <tr class="whitespace-nowrap" v-for="post in posts" :key="post.id">
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ post.id }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-900">
                                                        {{ post.title }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-500">
                                                        {{ post.content }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ moment(post.created_at).format('DD/MM/YYYY') }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <Link :href="route('dashboard.edit', post.id)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </Link>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <Link @click="destroy(post.id)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </Link>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div>
            </div>
        </div> -->
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import moment from 'moment'
import Welcome from '@/Components/Welcome.vue';
import { Link, Head } from '@inertiajs/inertia-vue3';

</script>

<script>
import { Link, Head } from '@inertiajs/inertia-vue3'
import MenuLayout from '../Layouts/LayoutMenu.vue'
import { Inertia } from '@inertiajs/inertia';
    export default {

        data: () => ({
            
            moment: moment
   }),
        props: {
            posts: Object
        },

        components: {
            Link,
            Head
        },

        data() {
            const destroy = (id) => {
                if(confirm('Tem certeza que deseja apagar?')) {
                    Inertia.delete(route('dashboard.destroy', id))
                }
            }

            return {
                destroy
            }
        }
    }
</script>
