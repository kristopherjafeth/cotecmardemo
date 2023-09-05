<template>
    <div>
        <AuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Crear Bloque
                </h2>
            </template>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                    >
                        <NavLink
                            :href="route('bloques.index')"
                            class="mb-0 mt-4 mx-2 flex-shrink-0 bg-[#052647] text-white text-base font-semibold py-1 px-4 rounded-lg shadow-md"
                        >
                            Volver
                        </NavLink>
                        <form @submit.prevent="submit">
                            <div
                                class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7"
                            >
                                <div class="grid grid-cols-1">
                                    <label for="idbloque">ID de Bloque</label>
                                    <input
                                        v-model="form.idbloque"
                                        type="text"
                                        id="idbloque"
                                    />
                                </div>
                                <div class="grid grid-cols-1">
                                    <label for="nombrebloque"
                                        >Nombre de Bloque</label
                                    >
                                    <input
                                        v-model="form.nombrebloque"
                                        type="text"
                                        id="nombrebloque"
                                    />
                                </div>
                                <div class="grid grid-cols-1">
                                    <label for="proyecto">Proyecto</label>
                                    <label for="proyecto" class="block text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                                        <select  v-model="form.proyecto_id" id="proyecto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                            <option selected>Selecciona una Opcion</option>
                                            <option v-for="item in proyecto" :value="item.id" :key="item.id">{{ item.nombre }} ( {{item.idproyecto}} )</option>
                                        </select>
                                </div>
                            </div>

                            <button
                                type="submit"
                                class="mb-4 mt-4 mx-2 flex-shrink-0 bg-[#052647] text-white text-base font-semibold py-1 px-4 rounded-lg shadow-md"
                            >
                                Guardar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    </div>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";


export default {
    components: {
        AuthenticatedLayout,
        NavLink,
        Head
    },
    props: ["proyecto"],

    data(){
        return{
            form:{
                idbloque: '',
                nombrebloque: '',
                proyecto_id: ''
            }
        }
    },
    methods: {
    submit(){
    this.$inertia.post(route("bloques.store", this.form));
    }
}
}
</script>
