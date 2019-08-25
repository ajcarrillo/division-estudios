<template>
    <v-container class="mt-4" fluid>
        <v-row>
            <v-col cols="12" md="6">
                <v-card :loading="updating"
                >
                    <v-btn
                        @click="$router.push({name:'catalogos-alumnos'})"
                        absolute
                        color="blue darken-3"
                        dark
                        fab
                        right
                        top
                    >
                        <v-icon>mdi-arrow-left</v-icon>
                    </v-btn>
                    <v-card-title primary-title>
                        <div>
                            <h3 class="headline mb-0">Editar alumno</h3>
                        </div>
                    </v-card-title>
                    <v-card-text>
                        <alumno-form :populate-with="alumno"
                                     @save="update"
                        ></alumno-form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
    import AlumnoForm from '../../../components/catalogos/alumnos/AlumnoForm'

    export default {
        name: 'EditAlumno',
        components: {
            AlumnoForm
        },
        props: {
            id: {
                type: [Number, String],
                required: true
            }
        },
        data() {
            return {
                updating: false,
            }
        },
        methods: {
            update(draft) {
                this.updating = true
                this['catalogos/updateAlumnos'](draft)
                    .then(res => {
                        this.updating = false
                        this['auth/setSnackbarMessage']('El alumno se actualizó correctamente')
                        this['auth/toogleSnackbar'](true)
                    })
                    .catch(res => {
                        this.updating = false
                        this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intente de nuevo')
                        this['auth/toogleSnackbar'](true)
                    })

            },
            ...mapGetters([
                'catalogos/getAlumnoById',
            ]),
            ...mapActions([
                'catalogos/updateAlumnos',
                'auth/setSnackbarMessage',
                'auth/toogleSnackbar',
            ])
        },
        watch: {},
        computed: {
            alumno() {
                let getAlumno = this['catalogos/getAlumnoById']()

                return getAlumno(this.id)
            }
        }
    }
</script>

<style scoped>

</style>
