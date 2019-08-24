<template>
    <v-container class="mt-4" fluid>
        <v-row>
            <v-col cols="12" md="6">
                <v-card :loading="saving"
                >
                    <v-btn
                        @click="$router.push({name:'catalogos-usuarios'})"
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
                            <h3 class="headline mt-4 mb-0">Editar usuario</h3>
                        </div>
                    </v-card-title>
                    <v-card-text>
                        <user-form :populate-with="usuario"
                                   @save="update"
                                   edit
                        ></user-form>
                    </v-card-text>
                    <v-card-actions></v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
    import UserForm from '../../../components/catalogos/usuarios/UserForm'

    export default {
        name: 'EditUser',
        components: {
            UserForm
        },
        props: {
            id: {
                type: [Number, String],
                required: true
            }
        },
        data() {
            return {
                saving: false,
            }
        },
        methods: {
            update(draft) {
                this.saving = true
                this['catalogos/updateUsuarios'](draft)
                    .then(res => {
                        this.saving = false
                        this.$emit('CLEAR_USER_FORM', null)
                        this['auth/setSnackbarMessage']('El usuario se gaurdó correctamente')
                        this['auth/toogleSnackbar'](true)
                    })
                    .catch(err => {
                        this.saving = false
                        this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intente de nuevo')
                        this['auth/toogleSnackbar'](true)
                    })
            },
            ...mapGetters([
                'catalogos/getUserById'
            ]),
            ...mapActions([
                'catalogos/updateUsuarios',
                'auth/setSnackbarMessage',
                'auth/toogleSnackbar',
            ])
        },
        watch: {},
        computed: {
            usuario() {
                let getUser = this['catalogos/getUserById']()

                return getUser(this.id);
            }
        }
    }
</script>

<style scoped>

</style>
