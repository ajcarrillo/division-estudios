<template>
    <tr>
        <td>{{ item.name }}</td>
        <td>{{ item.email }}</td>
        <td>
            <user-roles-col :roles="item.roles"></user-roles-col>
        </td>
        <td>
            <v-btn @click="$router.push({name: 'catalogos-usuarios-editar', params:{id: item.id}})"
                   color="primary"
                   elevation="0"
                   fab
                   x-small
            >
                <v-icon>mdi-pencil</v-icon>
            </v-btn>

            <v-dialog max-width="600" persistent v-model="updatePassword">
                <template v-slot:activator="{ on }">
                    <v-btn color="warning"
                           dark
                           elevation="0"
                           fab
                           v-on="on"
                           x-small
                    >
                        <v-icon>mdi-lock-reset</v-icon>
                    </v-btn>
                </template>
                <v-card :loading="updating">
                    <v-card-title class="headline">Actualizar contraseña</v-card-title>
                    <v-card-text>
                        <form>
                            <v-text-field
                                :error-messages="errors.collect('password')"
                                autocomplete="new-password"
                                data-vv-name="password"
                                label="Nueva contraseña"
                                type="password"
                                v-model="password"
                                v-validate="'required'"
                            ></v-text-field>
                        </form>
                    </v-card-text>
                    <v-card-actions>
                        <div class="flex-grow-1"></div>
                        <v-btn @click="cancel" color="error darken-1" text>Cancelar</v-btn>
                        <v-btn @click="update" color="green darken-1" text>Actualizar</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>

        </td>
    </tr>
</template>

<script>
    import {mapActions} from 'vuex'
    import UserRolesCol from './UserRolesCol'

    export default {
        name: 'UserListItem',
        components: {
            UserRolesCol
        },
        props: {
            item: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                updatePassword: false,
                password: null,
                updating: false,
                dictionary: {
                    attributes: {
                        'password': 'Contraseña'
                    }
                }
            }
        },
        mounted() {
            this.$validator.localize('es', this.dictionary);
        },
        methods: {
            update() {
                this.$validator.validateAll()
                    .then(isValid => {
                        if (isValid) {
                            this.updating = true
                            axios.patch(route('api.v1.catalogos.usuarios.reset.password', this.item.id), {
                                password: this.password
                            })
                                .then(res => {
                                    this['auth/setSnackbarMessage']('La contraseña se actualizó correctamente')
                                    this['auth/toogleSnackbar'](true)
                                    this.updating = false
                                    this.updatePassword = false
                                    this.password = null
                                })
                                .catch(err => {
                                    this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intente de nuevo')
                                    this['auth/toogleSnackbar'](true)
                                    this.updating = false
                                    console.log(err)
                                })
                        }
                    })
            },
            cancel() {
                this.$validator.reset();
                this.updatePassword = false
            },
            ...mapActions([
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
