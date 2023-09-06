<template>
    <Head title="Panel de Control" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Piezas
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <NavLink
                        :href="route('piezas.create')"
                        class="mb-0 mt-4 mx-2 flex-shrink-0 bg-[#052647] text-white text-base font-semibold py-1 px-4 rounded-lg shadow-md"
                    >
                        Nuevo
                    </NavLink>
                    <table
                        class=" mt-5 min-w-full mx-auto bg-[#052647] text-gray-100"
                    >
                        <thead>
                            <tr class="text-left border-b border-gray-300">
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                                >
                                    ID Pieza
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                                >
                                    Nombre
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                                >
                                    Peso Teorico
                                </th>
                                <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                            >
                                Peso Real
                            </th>
                            <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                        >
                            Estado
                        </th>
                        <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                    >
                        Bloque Id
                    </th>
                    <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                >
                    Fecha Registro
                </th>
                <th
                class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
            >
                Registrado por
            </th>
                            </tr>
                        </thead>
                        <tbody
                            class="w-full text-sm text-left  text-gray-900"
                        >
                            <tr v-for="item in piezas" :key="item.id"

                            class="border-b bg-gray-50  dark:border-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium">
                                            {{ item.idpieza }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium">
                                                {{ item.nombrepieza }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium">
                                                {{ item.pesoteorico }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium">
                                                {{ item.pesoreal }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium">
                                                {{ item.estado }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium">
                                                {{ item.bloque_id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium">
                                               {{ formattedDate   }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium">
                                                {{ item.registrado }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="flex m-2">
                                    <NavLink
                                    :href="route('piezas.edit', item.id)"
                                    class="mb-0 mt-4 mx-2 flex-shrink-0 bg-[#15ac10] text-white text-base font-semibold py-1 px-4 rounded-lg shadow-md"
                                >
                                    Editar
                                </NavLink>
                                <NavLink
                                method="delete"
                                :href="route('piezas.destroy', item.id)"
                                class="mb-0 mt-4 mx-2 flex-shrink-0 bg-[#ac1010] text-white text-base font-semibold py-1 px-4 rounded-lg shadow-md"
                            >
                                Borrar
                            </NavLink>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";
import moment from 'moment';

export default {
  props: {
    piezas: Array
  },
  data() {
    return {
        item: {
            created_at: '',
        },
        formattedDate: '',
    }
  },
  mounted() {
    this.formatDate();
  },
  computed: {
  nombreBloque() {
    const bloque = this.bloques.find(bloque => bloque.id === this.item.bloque_id);
    return bloque ? bloque.nombrebloque : '';
  }
  },
  components: {
    AuthenticatedLayout,
    Head,
    NavLink,
  },
  methods: {
    formatDate() {
      this.formattedDate = moment(this.created_at).format('DD-MM-YYYY ');
    },
  },

};
</script>
