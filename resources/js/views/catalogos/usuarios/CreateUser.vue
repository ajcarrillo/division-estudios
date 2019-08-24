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
                            <h3 class="headline mt-4 mb-0">Nuevo usuario</h3>
                        </div>
                    </v-card-title>
                    <v-card-text>
                        <user-form @save="save"></user-form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import {mapActions} from 'vuex';
    import UserForm from '../../../components/catalogos/usuarios/UserForm'
    import EventBus from '../../../event-bus'

    export default {
        name: 'Create',
        components: {UserForm},
        props: {},
        data() {
            return {
                saving: false,
            }
        },
        methods: {
            save(draft) {
                this.saving = true
                this['catalogos/storeUsuarios'](draft)
                    .then(res => {
                        this.saving = false
                        this.clearForm()
                        this['auth/setSnackbarMessage']('El usuario se creó correctamente')
                        this['auth/toogleSnackbar'](true)
                    })
                    .catch(err => {
                        this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intente de nuevo')
                        this['auth/toogleSnackbar'](true)
                    })

            },
            clearForm() {
                EventBus.$emit('CLEAR_USER_FORM', null)
            },
            ...mapActions([
                'catalogos/storeUsuarios',
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
