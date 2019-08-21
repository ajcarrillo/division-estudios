<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" md="6">
                <v-card
                    :loading="loading"
                >
                    <v-card-title primary-title>
                        <div>
                            <h3 class="headline mb-0">Editar nombramiento</h3>
                        </div>
                    </v-card-title>
                    <v-card-text>
                        <nombramiento-form :action="'Edit'"
                                           :clear-form="clearForm"
                                           :nombramiento="nombramiento"
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
    import {mapActions, mapGetters} from 'vuex';
    import NombramientoForm from "../../components/titulaciones/forms/NombramientoFormComponent";

    export default {
        name: "EditNombramiento",
        components: {
            NombramientoForm,
        },
        props: {
            id: {
                type: [Number, String],
                required: true
            }
        },
        data() {
            return {
                clearForm: false,
                loading: false,
            }
        },
        mounted() {
            if (!this.$store.getters['titulaciones/getTitulaciones'].length > 0) {
                this.$router.push({name: 'titulaciones-index'})
            }
        },
        methods: {
            toogleLoading() {
                this.loading = !this.loading;
            },
            save(draft) {
                this.loading = true;
                let {alumno_id, opcion_id, modulo_id, proyecto, fecha, horario_id} = draft;
                let params = {alumno_id, opcion_id, modulo_id, proyecto, fecha, horario_id};

                axios.patch(route('api.v1.nombramientos.update', this.id), params)
                    .then(res => {
                        this.loading = false;
                        this['auth/setSnackbarMessage']('El nombramiento se guardó correctamente');
                        this['auth/toogleSnackbar'](true);
                    })
                    .catch(err => {
                        console.log(err);
                        this.loading = false;
                        this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intente de nuevo');
                        this['auth/toogleSnackbar'](true);
                    });

            },
            ...mapGetters([
                'titulaciones/getTitulacionById'
            ]),
            ...mapActions([
                'auth/setSnackbarMessage',
                'auth/toogleSnackbar'
            ])
        },
        watch: {},
        computed: {
            nombramiento() {
                let getById = this['titulaciones/getTitulacionById']();

                return getById(this.id)
            }
        }
    }
</script>

<style scoped>

</style>
