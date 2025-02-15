<template>
    <modal max-width="sm" @show="onShow" :show="modelValue">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">Create New Folder</h2>

            <div class="mt-6">
                <input-label for="folderName" value="Folder Name" />

                <text-input ref="folderNameInput" type="text" id="folderName" v-model="form.name"
                    class="mt-1 block w-full"
                    :class="form.errors.name ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                    placeholder="New Folder" @keyup.enter="createFolder" />

                <input-error :message="form.errors.name" class="mt-2" />
            </div>
            <div class="mt-6 flex justify-end">
                <secondary-button @click="closeModal">Cancle</secondary-button>
                <primary-button class="ml-3" :class="{ 'opacity-25': form.processing }" @click="createFolder"
                    :disable="form.processing">
                    Submit
                </primary-button>
            </div>
        </div>
    </modal>
</template>

<script setup>
    // Imports
    import Modal from "@/Components/Modal.vue";
    import InputLabel from "@/Components/InputLabel.vue";
    import TextInput from "@/Components/TextInput.vue";
    import InputError from "@/Components/InputError.vue";
    import SecondaryButton from "@/Components/SecondaryButton.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import {
        useForm, usePage
    } from "@inertiajs/vue3";
    import {
      nextTick,
        ref
    } from "vue";
import { showSuccessNotification } from "@/event-bus";

    // Uses
    const form = useForm({
        name: '',
        parent_id: null
    })

    const page = usePage()

    // Refs
    const folderNameInput = ref(null)

    // Props & Emits
    const {
        modelValue
    } = defineProps({
        modelValue: Boolean
    })

    const emit = defineEmits(['update:modelValue'])

    // Computed
    // Methods
    function onShow(){
        nextTick(() => {
            folderNameInput.value.focus()
        })
    }

    function createFolder() {
        form.parent_id = page.props.folder.id
        form.post(route('folders.store'), {
            preserveScroll: true,
            onSuccess: () => {
                closeModal()
                form.reset()
                showSuccessNotification('Folder created successfully.')
            },
            onError: () => folderNameInput.value.focus()
        })
    }

    function closeModal() {
        emit('update:modelValue')
        form.clearErrors()
        form.reset()
    }
    // Hooks
</script>

<style scoped>

</style>
