<template>
    <v-dialog fullscreen
              hide-overlay
              persistent
              transition="dialog-bottom-transition"
              v-model="edit"
    >
        <v-card :loading="loading"
        >
            <v-toolbar color="primary" dark>
                <v-btn @click="closeDialog" dark icon>
                    <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Editar carrera</v-toolbar-title>
                <div class="flex-grow-1"></div>
            </v-toolbar>
            <v-card-text class="py-0">
                <v-row justify="center">
                    <v-col cols="12" md="6">
                        <carrera-form :populate-with="item"
                                      @save="save"
                        ></carrera-form>
                    </v-col>
                </v-row>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>

<script>
    import {mapActions} from 'vuex';
    import CarreraForm from './CarreraForm'

    export default {
        name: 'EditCarrera',
        components: {
            CarreraForm
        },
        props: {
            item: {
                type: Object,
                required: true
            },
            edit: {
                type: Boolean,
                required: true
            }
        },
        data() {
            return {
                loading: false,
            }
        },
        methods: {
            save(draft) {
                this.loading = true;

                let payload = {id: draft.id, item: draft}

                this['catalogos/updateCarrera'](payload)
                    .then(res => {
                        this.loading = false
                        this['auth/setSnackbarMessage']('La carrera se guardó correctamente')
                        this['auth/toogleSnackbar'](true)
                    })
                    .catch(err => {
                        this.loading = false
                        this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intente de nuevo')
                        this['auth/toogleSnackbar'](true)
                    })

            },
            closeDialog() {
                this.$emit('closeDialog');
            },
            ...mapActions([
                'catalogos/updateCarrera',
                'auth/setSnackbarMessage',
                'auth/toogleSnackbar'
            ])
        },
        watch: {},
        computed: {}
    }
</script>

<style scoped>

</style>
