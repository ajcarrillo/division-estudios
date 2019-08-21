<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12">
                <v-card
                    :loading="loading"
                >
                    <v-card-title primary-title>
                        <div>
                            <h3 class="headline mb-0">Departamentos</h3>
                        </div>
                    </v-card-title>
                    <v-divider light></v-divider>
                    <v-card-text class="py-0">
                        <departamento-form @save="save"
                        ></departamento-form>
                    </v-card-text>
                    <v-divider light></v-divider>
                    <v-card-text>
                        <departamentos-list :items="departamentos"
                        ></departamentos-list>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import {mapActions, mapState} from 'vuex';
    import DepartamentoForm from "../../../components/catalogos/departamentos/DepartamentoForm";
    import DepartamentosList from "../../../components/catalogos/departamentos/DepartamentosList";

    export default {
        components: {
            DepartamentoForm,
            DepartamentosList
        },
        props: {},
        data() {
            return {
                loading: false,
            }
        },
        created() {
            this['catalogos/fetchDepartamentos']();
        },
        methods: {
            save(draft) {
                this.loading = true;

                let {jefatura, responsable} = draft;
                let payload = {jefatura, responsable};

                this['catalogos/storeDepartamento'](payload)
                    .then(res => {
                        this.loading = false;
                        this['auth/setSnackbarMessage']('El jefe de departamento se guardó correctamente');
                        this['auth/toogleSnackbar'](true);
                    })
                    .catch(err => {
                        this.loading = false;
                        this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intente de nuevo');
                        this['auth/toogleSnackbar'](true);
                    })
            },
            ...mapActions([
                'catalogos/fetchDepartamentos',
                'catalogos/storeDepartamento',
                'auth/setSnackbarMessage',
                'auth/toogleSnackbar'
            ])
        },
        watch: {},
        computed: {
            ...mapState({
                departamentos: state => state.catalogos.departamentos
            })
        }
    }
</script>

<style scoped>

</style>
