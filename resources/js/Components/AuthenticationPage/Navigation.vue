<template>
    <nav class="min-w-[200px]">
            <Link :href="route('files.index')" class="h-[80px] px-3 flex items-center gap-3">
            <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
            LaraStorage
            </Link>
         <div class="px-3">
            <create-new-drop-down/>

            <div class="py-3">
                <nav-link :href="route('files.index')" :active="$page.props.route_name == 'files.index'">My Files</nav-link>
                <NavLink :href="route('files.sharedWithMe')" :active="$page.props.route_name == 'files.sharedWithMe'">Shared with me</NavLink>
                <NavLink :href="route('files.sharedByMe')" :active="$page.props.route_name == 'files.sharedByMe'">Shared by me</NavLink>
                <nav-link :href="route('trash')" :active="$page.props.route_name == 'trash'">Trash</nav-link>
            </div>
         </div>
    </nav>
</template>

<script setup>
    // Imports
    import { Link } from '@inertiajs/vue3';
    import ApplicationLogo from '@/Components/ApplicationLogo.vue';
    import NavLink from '@/Components/NavLink.vue';
    import CreateNewDropDown from '@/Components/AuthenticationPage/Navigation/CreateNewDropDown.vue';

    // Uses

    // Refs

    // Props & Emits

    // Computed

    // Methods

    // Hooks
</script>

<style scoped>

</style>
