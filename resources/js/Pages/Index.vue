<template>
    <app-layout>
        <sidebar></sidebar>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-normal leading-7 text-gray-900 sm:text-2xl sm:truncate">RASTREAMENTO DE ENCOMENDAS</h2>
                    <h3>Acompanhe seus pacontes enviados em tempo real.</h3>
                </div>
                <div class="mt-4 flex md:mt-0 md:ml-4">
                    <button
                        type="button"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        @click="registerCode"
                    >
                        CADASTRAR CÓDIGO
                    </button>
                    <button
                        type="button"
                        class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        @click="updateTable"
                    >
                        ATUALIZAR CÓDIGOS
                    </button>
                </div>
            </div>
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
    methods: {
        registerCode() {

        },
        updateTable() {

        }
    }
}
</script>
