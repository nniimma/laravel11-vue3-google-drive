<template>
    <MenuItem v-slot="{ active }">
    <a href="#" class="text-gray-700 block px-4 py-2 text-sm relative">Upload Folder
        <input @change="onChange" type="file" class="absolute left-0 top-0 bottom-0 right-0 opacity-0" multiple
            directory webkitdirectory>
    </a>
    </MenuItem>
</template>

<script setup>
    // Imports
    import {
        MenuItem
    } from "@headlessui/vue";
    import {
        emitter,
        FILE_UPLOAD_STARTED
    } from '@/event-bus'

    // Uses
    // Refs
    // Props & Emits
    // Computed
    // Methods
    function onChange(event) {
        emitter.emit(FILE_UPLOAD_STARTED, event.target.files)
    }
    // Hooks
</script>

<style scoped>

</style>
