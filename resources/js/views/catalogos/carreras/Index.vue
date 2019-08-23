<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12">
                <v-card :loading="loading"
                >
                    <v-card-title primary-title>
                        <v-list subheader two-line>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-list-item-title>
                                        <h3 class="headline mb-0">Carreras</h3>
                                    </v-list-item-title>
                                    <v-list-item-subtitle>
                                        <span @click="nuevaCarrera = true" style="cursor: pointer">
                                            <v-icon size="14">mdi-plus</v-icon>
                                            Agregar
                                        </span>
                                    </v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list>
                    </v-card-title>
                    <v-card-text>
                        <carrera-list :items="carreras"></carrera-list>
                    </v-card-text>
                    <v-card-actions></v-card-actions>
                </v-card>
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-dialog fullscreen
                      hide-overlay
                      persistent
                      transition="dialog-bottom-transition"
                      v-model="nuevaCarrera"
            >
                <v-card>
                    <v-toolbar color="primary" dark>
                        <v-btn @click="nuevaCarrera = false" dark icon>
                            <v-icon>mdi-close</v-icon>
                        </v-btn>
                        <v-toolbar-title>Agregar carrera</v-toolbar-title>
                        <div class="flex-grow-1"></div>
                    </v-toolbar>
                    <v-card-text class="py-0">
                        <v-row justify="center">
                            <v-col cols="12" md="6">
                                <carrera-form @save="save"></carrera-form>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-dialog>
        </v-row>
    </v-container>
</template>

<script>
    import {mapActions, mapState} from 'vuex'
    import CarreraList from '../../../components/catalogos/carreras/CarreraList'
    import CarreraForm from '../../../components/catalogos/carreras/CarreraForm'
    import EventBus from '../../../event-bus'

    export default {
        name: 'Index',
        components: {
            CarreraList,
            CarreraForm
        },
        props: {},
        data() {
            return {
                loading: false,
                nuevaCarrera: false
            }
        },
        created() {
            this.loading = true
            this['catalogos/fetchCarreras']()
                .then(res => {
                    this.loading = false
                })
                .catch(res => {
                    this.loading = false
                });
        },
        methods: {
            save(draft) {
                this['catalogos/storeCarreras'](draft)
                    .then(res => {
                        this.clearForm();
                        this['auth/setSnackbarMessage']('La carrera se guardó correctamente')
                        this['auth/toogleSnackbar'](true)
                    })
                    .catch(err => {
                        this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intente de nuevo')
                        this['auth/toogleSnackbar'](true)
                    })
            },
            clearForm() {
                EventBus.$emit('CLEAR_CARRERA_FORM', null)
            },
            ...mapActions([
                'catalogos/fetchCarreras',
                'catalogos/storeCarreras',
                'auth/setSnackbarMessage',
                'auth/toogleSnackbar'
            ])
        },
        watch: {},
        computed: {
            ...mapState({
                carreras: state => state.catalogos.carreras
            })
        }
    }
</script>

<style scoped>

</style>
