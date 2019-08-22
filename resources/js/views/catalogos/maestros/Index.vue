<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12">
                <v-card :loading="loading"
                >
                    <v-card-title primary-title>
                        <div>
                            <h3 class="headline mb-0">Maestros</h3>
                        </div>
                    </v-card-title>
                    <v-divider light></v-divider>
                    <v-card-text class="py-0">
                        <maestro-form @save="save"
                        ></maestro-form>
                    </v-card-text>
                    <v-divider light></v-divider>
                    <v-card-text>
                        <maestros-list :items="maestros"></maestros-list>
                    </v-card-text>
                    <v-card-actions>
                        <div class="text-center">
                            <v-pagination
                                :length="pagination.last_page"
                                :total-visible="pagination.per_page"
                                v-model="page"
                            ></v-pagination>
                        </div>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import {mapActions, mapState} from 'vuex'
    import MaestroForm from '../../../components/catalogos/maestros/MaestroForm'
    import MaestrosList from '../../../components/catalogos/maestros/MaestrosList'

    export default {
        name: 'Index',
        components: {
            MaestroForm,
            MaestrosList,
        },
        props: {},
        data() {
            return {
                loading: false,
                page: 1,
            }
        },
        created() {
            this.loading = true;
            let query = {paginate: '', page: this.page}

            this['catalogos/fetchMaestros'](query)
                .then(res => {
                    this.loading = false
                })
        },
        methods: {
            save(draft) {
                this.loading = true

                this['catalogos/storeMaestros'](draft)
                    .then(res => {
                        this.loading = false
                        this['auth/setSnackbarMessage']('El maestro se guardó correctamente')
                        this['auth/toogleSnackbar'](true)
                    })
                    .catch(err => {
                        this.loading = false
                        this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intente de nuevo')
                        this['auth/toogleSnackbar'](true)
                    })
            },
            ...mapActions([
                'catalogos/fetchMaestros',
                'catalogos/storeMaestros',
                'auth/setSnackbarMessage',
                'auth/toogleSnackbar'
            ])
        },
        watch: {
            page() {
                this.loading = true

                let query = {paginate: '', page: this.page}

                this['catalogos/fetchMaestros'](query)
                    .then(res => {
                        this.loading = false
                    })
            }
        },
        computed: {
            ...mapState({
                maestros: state => state.catalogos.maestros,
                pagination: state => state.catalogos.pagination
            })
        }
    }
</script>

<style scoped>

</style>
