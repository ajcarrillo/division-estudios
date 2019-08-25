<template>
    <v-container class="mt-4" fluid>
        <v-row>
            <v-col cols="12" md="6">
                <v-card :loading="loading"
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
                            <h3 class="headline mb-0">Nuevo alumno</h3>
                        </div>
                    </v-card-title>
                    <v-card-text>
                        <alumno-form @save="save"></alumno-form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import {mapActions} from 'vuex'
    import AlumnoForm from '../../../components/catalogos/alumnos/AlumnoForm'

    export default {
        name: 'Create',
        components: {
            AlumnoForm
        },
        props: {},
        data() {
            return {
                loading: false
            }
        },
        methods: {
            save(draft) {
                this.loading = true
                this['catalogos/storeAlumnos'](draft)
                    .then(res => {
                        this.loading = false
                        this['auth/setSnackbarMessage']('El alumno se guardó correctamente')
                        this['auth/toogleSnackbar'](true)
                    })
                    .catch(res => {
                        this.loading = false
                        this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intente de nuevo')
                        this['auth/toogleSnackbar'](true)
                    })

            },
            ...mapActions([
                'catalogos/storeAlumnos',
                'auth/setSnackbarMessage',
                'auth/toogleSnackbar',
            ])
        },
        watch: {},
        computed: {}
    }
</script>

<style scoped>

</style>
