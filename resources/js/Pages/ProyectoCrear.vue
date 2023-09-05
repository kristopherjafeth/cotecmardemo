<template>
    <div>
        <AuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Crear Proyecto
                </h2>
            </template>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                    >
                        <NavLink
                            :href="route('proyectos.index')"
                            class="mb-0 mt-4 mx-2 flex-shrink-0 bg-[#052647] text-white text-base font-semibold py-1 px-4 rounded-lg shadow-md"
                        >
                            Volver
                        </NavLink>
                        <form @submit.prevent="submit">
                            <div
                                class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7"
                            >
                                <div class="grid grid-cols-1">
                                    <label for="idproyecto">ID de Proyecto</label>
                                    <input
                                        v-model="form.idproyecto"
                                        type="text"
                                        id="idproyecto"
                                    />
                                </div>
                                <div class="grid grid-cols-1">
                                    <label for="nombre"
                                        >Nombre</label
                                    >
                                    <input
                                        v-model="form.nombre"
                                        type="text"
                                        id="nombre"
                                    />
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
    props:{
        errors: Object,
    },
    data(){
        return{
            form:{
                idproyecto: '',
                nombre: '',
            }
        }
    },
    methods: {
    submit(){
    this.$inertia.post(route("proyectos.store", this.form));
    }
}
}
</script>
