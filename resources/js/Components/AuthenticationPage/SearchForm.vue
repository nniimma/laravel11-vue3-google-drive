<template>
    <div class="w-[600px] h-[80px] flex items-center">
        <text-input class="block w-full mr-2" type="text" v-model="search" autocomplete @keyup.enter.prevent="onSearch"
            placeholder="Search for files and folders" />
    </div>
</template>

<script setup>
    // Imports
    import TextInput from '@/Components/TextInput.vue';
import { emitter, ON_SEARCH } from '@/event-bus';
    import {
        router,
        useForm
    } from '@inertiajs/vue3';
    import {
        onMounted,
        ref
    } from 'vue';

    // Uses
    let params = ''

    // Refs
    const search = ref('')

    // Props & Emits

    // Computed

    // Methods
    function onSearch() {
        params.set('search', search.value)
        router.get(window.location.pathname + '?' + params.toString())

        emitter.emit(ON_SEARCH, search.value)
    }

    // Hooks
    onMounted(() => {
        params = new URLSearchParams(window.location.search)
        search.value = params.get('search')
    })

</script>

<style scoped>

</style>
