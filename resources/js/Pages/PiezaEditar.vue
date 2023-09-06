<template>
    <div>
        <AuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Crear Pieza
                </h2>
            </template>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                    >
                    <div class="block mx-4 my-4">
                           <div class="text-left mx-2">
                                Fecha: {{ fechaActual  }}
                    </div>
                        <NavLink
                        :href="route('bloques.index')"
                        class="mb-0 mt-4 mx-2 flex-shrink-0 bg-[#052647] text-white text-base font-semibold py-1 px-4 rounded-lg shadow-md"
                    >
                        Volver
                    </NavLink>

                    </div>

                        <form @submit.prevent="submit">
                            <div
                                class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7"
                            >
                                <div class="grid grid-cols-1">
                                    <label for="idpieza">ID de la Pieza</label>
                                    <input
                                        v-model="form.idpieza"
                                        type="text"
                                        id="idpieza"
                                    />
                                </div>
                                <div class="grid grid-cols-1">
                                    <label for="nombrepieza">Nombre</label>
                                    <input
                                        v-model="form.nombrepieza"
                                        type="text"
                                        id="nombrepieza"
                                    />
                                </div>
                                <div class="grid grid-cols-1">
                                    <label for="bloque">Bloque</label>
                                    <label
                                        for="bloque"
                                        class="block text-sm font-medium text-gray-900 dark:text-white"
                                        >Selecciona una opción</label
                                    >
                                    <select
                                        v-model="bloqueSeleccionado"
                                        id="bloque"
                                         @change="mostrarBloqueSeleccionado"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    >
                                        <option selected>
                                            Selecciona una Opcion
                                        </option>
                                        <option
                                            v-for="item in bloques"
                                            :value="item"
                                            :key="item.id"
                                        >
                                            {{ item.nombrebloque }}
                                        </option>
                                    </select>
                                </div>
                                <div class="grid grid-cols-1">
                                    <label for="proyecto">Proyectos</label>

                                    <label
                                        for="proyecto"
                                        class="block text-sm font-medium text-gray-900 dark:text-white"
                                        >Selecciona una opción</label
                                    >
                                    <select
                                        v-model="form.proyecto_id"
                                        id="proyecto"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    >
                                        <option selected>
                                            Selecciona una Opcion
                                        </option>
                                        <option
                                            v-for="item in proyectosFiltrados"
                                            :value="item.id"
                                            :key="item.id"
                                        >
                                            {{ item.nombre }} (
                                            {{ item.idproyecto }} )
                                        </option>
                                    </select>
                                </div>
                                <div class="grid grid-cols-1">
                                    <label for="pesoteorico"
                                        >Peso Teorico</label
                                    >
                                    <input
                                        v-model="form.pesoteorico"
                                        type="number"
                                        id="pesoteorico"
                                    />
                                </div>
                                <div class="grid grid-cols-1">
                                    <label for="pesoreal"
                                        >Peso Real</label
                                    >
                                    <input
                                        v-model="form.pesoreal"
                                        type="text"
                                        id="pesoreal"
                                    />
                                </div>
                                <div class="grid grid-cols-1">
                                    <label for="proyecto">Estado</label>

                                    <select
                                    v-model="form.estado"
                                        id="estado"
                                        class="bg-gray-50 border h-10 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    >
                                        <option selected>
                                            Selecciona una Opcion
                                        </option>
                                        <option value="Fabricado">
                                            Fabricado
                                        </option>
                                        <option value="Pendiente">
                                            Pendiente
                                        </option>
                                    </select>
                                </div>
                                <div class="grid grid-cols-1">
                                    <label for="registrado"
                                        >Registrado por:</label
                                    >
                                    <input
                                    type="text"
                                    id="registrado"
                                    class="mb-6 bg-gray-100 border mt-4 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed"
                                    :value="registradoPor.name"
                                    disabled
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
    props: {
        proyectos: "",
        bloques: "",
        registradoPor: "",
        piezas: ''
    },
    data(){
        return{
            bloqueSeleccionado: null,
            form:{
                idpieza: this.$props.piezas.idpieza,
                nombrepieza: this.$props.piezas.nombrepieza,
                bloque_id: this.$props.piezas.bloque_id,
                proyecto_id: this.$props.piezas.proyecto_id,
                pesoteorico: this.$props.piezas.pesoteorico,
                pesoreal: this.$props.piezas.pesoreal,
                estado: this.$props.piezas.estado,

            },
            fechaActual: null

        }
    },
    computed: {
    proyectosFiltrados() {
            if (this.bloqueSeleccionado) {
            return this.proyectos.filter(proyecto => proyecto.id === this.bloqueSeleccionado.proyecto_id);
            } else {
            return this.proyectos;
            }
        },
},
mounted() {
    this.obtenerFechaActual();
    this.form.registrado = this.registradoPor.name;
  },
  methods: {
        submit(){
        this.$inertia.put(route("piezas.update", this.$props.piezas.id), this.form);
        },
        mostrarBloqueSeleccionado() {
            this.form.bloque_id = this.bloqueSeleccionado.id

        },
        obtenerFechaActual() {
      const fecha = new Date();
      this.fechaActual = fecha.toLocaleDateString();
    }
  }
}
</script>
