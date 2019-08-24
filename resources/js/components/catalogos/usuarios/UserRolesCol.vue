<template>
    <div>
        <v-chip :key="role.name"
                @click:close="removeRole(role.name)"
                class="mt-1 mr-1 mb-1"
                close
                v-for="role in roles"
        >{{ role.name }}
        </v-chip>
    </div>
</template>

<script>
    import {mapActions} from 'vuex'
    import EventBus from '../../../event-bus'

    export default {
        name: 'UserRolesCol',
        components: {},
        props: {
            roles: {
                type: Array,
                required: true,
                default: () => ([])
            }
        },
        data() {
            return {}
        },
        methods: {
            removeRole(role) {
                EventBus.$emit('LOADING_USERS_INDEX', true)
                let payload = {role, user: this.usuarioId}

                this['catalogos/removeUserRole'](payload)
                    .then(res => {
                        EventBus.$emit('LOADING_USERS_INDEX', false)
                        this['auth/setSnackbarMessage']('El rol se eliminó correctamente')
                        this['auth/toogleSnackbar'](true)
                    })
                    .catch(err => {
                        EventBus.$emit('LOADING_USERS_INDEX', false)
                        this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intente de nuevo')
                        this['auth/toogleSnackbar'](true)
                    })
            },
            ...mapActions([
                'catalogos/removeUserRole',
                'auth/setSnackbarMessage',
                'auth/toogleSnackbar',
            ])
        },
        watch: {},
        computed: {
            usuarioId() {
                if (this.roles.length) {
                    return this.roles[0].pivot.model_id
                } else {
                    return null
                }
            }
        }
    }
</script>

<style scoped>

</style>
