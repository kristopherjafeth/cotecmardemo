<template>
    <Head title="Panel de Control" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Bloques
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <NavLink
                        :href="route('bloques.create')"
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
                                    ID Bloque
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                                >
                                    Nombre Bloque
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                                >
                                    Proyecto
                                </th>
                            </tr>
                        </thead>
                        <tbody
                            class="w-full text-sm text-left  text-gray-900"
                        >
                            <tr v-for="item in bloques" :key="item.id"

                            class="border-b bg-gray-50  dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium">
                                                {{ item.idbloque }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium">
                                                {{ item.nombrebloque }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium">
                                                {{ item.proyecto_id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="flex m-2">
                                    <NavLink
                                    :href="route('bloques.edit', item.id)"
                                    class="mb-0 mt-4 mx-2 flex-shrink-0 bg-[#15ac10] text-white text-base font-semibold py-1 px-4 rounded-lg shadow-md"
                                >
                                    Editar
                                </NavLink>
                                <NavLink
                                method="delete"
                                :href="route('bloques.destroy', item.id)"
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

export default {
  props: {
    bloques: Array
  },
  components: {
    AuthenticatedLayout,
    Head,
    NavLink,
  },
};
</script>
