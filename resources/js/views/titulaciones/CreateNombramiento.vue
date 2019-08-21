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
                                           :clear-form="clearForm"
                                           @loading="toogleLoading"
                                           @save="save"
                        ></nombramiento-form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import {mapActions} from 'vuex';
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
                clearForm: false,
                nombramiento: {
                    alumno: {empty: true},
                    alumno_id: null,
                    horario: null,
                    horario_id: null,
                    modulo: null,
                    modulo_id: null,
                    opcion: null,
                    opcion_id: null,
                    fecha: null,
                    proyecto: null,
                }
            }
        },
        methods: {
            toogleLoading() {
                this.loading = !this.loading;
            },
            save(draft) {
                this.loading = true;
                this.clearForm = false;
                this.$store.dispatch('titulaciones/storeNuevoNombramiento', draft)
                    .then(res => {
                        this.loading = false;
                        this.clearForm = true;
                        this['auth/setSnackbarMessage']('El nombramiento se guardó correctamente');
                        this['auth/toogleSnackbar'](true);
                    })
                    .catch(err => {
                        console.log(err);
                        this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intente de nuevo');
                        this['auth/toogleSnackbar'](true);
                    });
            },
            ...mapActions([
                'auth/setSnackbarMessage',
                'auth/toogleSnackbar'
            ]),
        },
        watch: {},
        computed: {}
    }
</script>

<style scoped>

</style>
