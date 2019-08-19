<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" md="6">
                <v-card
                    :loading="loading"
                >
                    <v-card-title primary-title>
                        <div>
                            <h3 class="headline mb-0">Nueva titulación</h3>
                        </div>
                    </v-card-title>
                    <v-card-text>
                        <nombramiento-form :nombramiento="nombramiento"
                                           @loading="toogleLoading"
                        ></nombramiento-form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import NombramientoForm from "../../components/titulaciones/forms/NombramientoFormComponent";

    export default {
        name: "CreateNombramiento",
        components: {
            NombramientoForm
        },
        props: {},
        data() {
            return {
                loading: false,
                nombramiento: {
                    opcion: null,
                    modulo: null,
                    proyecto: '',
                    fecha: '',
                    hora: null
                }
            }
        },
        methods: {
            toogleLoading() {
                this.loading = !this.loading;
            }
        },
        watch: {},
        computed: {}
    }
</script>

<style scoped>

</style>
