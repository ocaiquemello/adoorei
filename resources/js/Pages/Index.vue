<template>
    <app-layout>
        <sidebar></sidebar>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        </div>
        <modal :show="show"></modal>
    </app-layout>
</template>

<script>
import Modal from '../Jetstream/Modal.vue'
import AppLayout from '../Layouts/AppLayout.vue'
import Sidebar from '../components/Sidebar.vue'

export default {
    props: ['index'],
    data() {
        return {
            show: false,
        }
    },
    components: {
        AppLayout,
        Modal,
        Sidebar
    },
}
</script>
