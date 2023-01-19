<template>
    <Head>
    <title>Editar Post</title>
</Head>
<AppLayout title="Create">
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar post
        </h2>
    </template>

    <br/>

    <form @submit.prevent="form.put(route('dashboard.update', form.id))">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex-shrink-0 p-4">
                    <label for="title" name="title">Insira o nome:   </label>
                    <input type="text" v-model="form.title" class="border-transparent rounded-md shadow-sm border-b border-gray-200 shadow">
                </div>
            </div>

            <br/>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
                <div class="flex-shrink-0 p-4">
                    <label for="content" name="content">Insira o email:  </label>
                    <input type="text" v-model="form.content" class="border-transparent rounded-md shadow-sm border-gray-200 shadow">
                </div>
            </div>
        </div>  
        <br/>
        <div>
            <button type="submit" class="ml-12 inline-flex items-center px-4 py-2 border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Salvar Post Editado
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
        post: Object,
        errors: Object
    },

    components: {
        Link,
        Head
    },

    data(props)
    {
        const form = useForm(props.post)

        return {
            form
        }

    }
}
</script>
