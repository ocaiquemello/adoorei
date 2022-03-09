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

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col mt-10">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Última atualização</th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(code, index) in this.trackingCodes" :key="index" :class="index % 2 === 0 ? 'bg-white' : 'bg-gray-50'">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ code }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        status
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        update
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <TruckIcon class="h-6 w-6" aria-hidden="true" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
import { TruckIcon }  from '@heroicons/vue/outline'

const people = [
  { name: 'Jane Cooper', title: 'Regional Paradigm Technician', role: 'Admin', email: 'jane.cooper@example.com' },
  { name: 'Cody Fisher', title: 'Product Directives Officer', role: 'Owner', email: 'cody.fisher@example.com' },
  // More people...
]

export default {
    props: ['index'],
    data() {
        return {
            show: false,
            trackingCodes: [],
            people
        }
    },
    components: {
        AppLayout,
        Modal,
        Sidebar,
        TruckIcon
    },
    methods: {
        registerCode() {
            this.show = true

        },
        updateTable() {
            axios.get(route('tracking.get')).then(response => {
                let dataArr = response.data

                dataArr.forEach(data => {
                    this.trackingCodes.push(data.tracking_code)
                });
            })
        }
    },
    mounted() {
        this.updateTable()
    }
}
</script>
