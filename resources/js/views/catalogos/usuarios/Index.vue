<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12">
                <v-card :loading="loading"
                >
                    <v-card-title primary-title>
                        <v-list two-line>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-list-item-title class="headline mb-0">Usuarios</v-list-item-title>
                                    <v-list-item-subtitle>
                                        <span @click="nuevo" style="cursor: pointer">
                                            <v-icon left size="14">mdi-plus</v-icon>
                                            Agregar
                                        </span>
                                    </v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list>
                    </v-card-title>
                    <v-card-text>
                        <user-list :items="usuarios"
                        ></user-list>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import {mapActions, mapState} from 'vuex'
    import UserList from '../../../components/catalogos/usuarios/UserList'
    import EventBus from '../../../event-bus'

    export default {
        name: 'UsersIndex',
        components: {
            UserList
        },
        props: {},
        data() {
            return {
                loading: false
            }
        },
        created() {
            this.loading = true;
            this['catalogos/fetchUsuarios']()
                .then(res => {
                    this.loading = false
                })
        },
        mounted() {
            let that = this
            EventBus.$on('LOADING_USERS_INDEX', function (flag) {
                that.loading = flag
            })
        },
        methods: {
            nuevo() {
                this.$router.push({name: 'catalogos-usuarios-nuevo'})
            },
            ...mapActions([
                'catalogos/fetchUsuarios'
            ])
        },
        watch: {},
        computed: {
            ...mapState({
                usuarios: state => state.catalogos.usuarios
            })
        }
    }
</script>

<style scoped>

</style>
