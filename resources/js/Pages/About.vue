<template>
    <Head>
        <title>Home</title>
    </Head>
    <div>
        <h1>Estou na página Sobre nós</h1>
        <h2>Olá, {{ name }}</h2>
        <h3>Está no curso: {{ curso }}</h3>
    </div>
    <br/>
    <menu-layout>
            
    </menu-layout>
</template>

<script>
import { Link, Head } from '@inertiajs/inertia-vue3'
import MenuLayout from '../Layouts/LayoutMenu.vue'

    export default {
        name: 'PageAbout',

        components: {
            Link,
            Head,
            MenuLayout
        },

        props: {
            name: String,
            curso: String
        },

    }
  
</script>

<style lang="scss" scoped>

</style>