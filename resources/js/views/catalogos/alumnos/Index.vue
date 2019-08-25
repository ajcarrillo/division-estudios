<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12">
                <v-card :loading="loading"
                >
                    <v-card-title primary-title>
                        <div>
                            <h3 class="headline mb-0">Alumnos</h3>
                        </div>
                    </v-card-title>
                    <v-card-text>
                        <v-simple-table>
                            <thead>
                                <tr>
                                    <th class="text-left"># Control</th>
                                    <th class="text-left">Alumno</th>
                                    <th class="text-left">Sexo</th>
                                    <th class="text-left">Carrera</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="alumno in alumnos">
                                    <alumno-list-item :alumno="alumno"></alumno-list-item>
                                </template>
                            </tbody>
                        </v-simple-table>
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
    import AlumnoListItem from '../../../components/catalogos/alumnos/AlumnoListItem'

    export default {
        name: 'Index',
        components: {
            AlumnoListItem
        },
        props: {},
        data() {
            return {
                loading: false,
                page: 1
            }
        },
        created() {
            this.loading = true
            this['catalogos/fetchAlumnos']()
                .then(res => {
                    this.loading = false
                })
                .catch(res => {
                    this.loading = false
                })
        },
        methods: {
            ...mapActions([
                'catalogos/fetchAlumnos'
            ])
        },
        watch: {
            page() {
                this.loading = true

                let query = {paginate: '', page: this.page}

                this['catalogos/fetchAlumnos'](query)
                    .then(res => {
                        this.loading = false
                    })
            }
        },
        computed: {
            ...mapState({
                alumnos: state => state.catalogos.alumnos,
                pagination: state => state.catalogos.pagination
            })
        }
    }
</script>

<style scoped>

</style>
