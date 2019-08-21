<template>
    <tr v-if="!editing">
        <td>{{ item.jefatura }}</td>
        <td>{{ item.responsable.name }}</td>
        <td>
            <v-btn @click="editing = true"
                   color="primary"
                   text
            >
                <v-icon>mdi-pencil</v-icon>
                Editar
            </v-btn>
        </td>
    </tr>
    <tr v-else>
        <td colspan="2">
            <departamento-form :populate-with="item"
                               :saving="loading"
                               @save="save"
            ></departamento-form>
        </td>
        <td>
            <v-btn :loading="loading"
                   @click="deleteDepartamento"
                   class="mr-4"
                   color="error"
            >
                <v-icon>mdi-delete-circle</v-icon>
            </v-btn>
            <v-btn @click="editing = false"
                   color="primary"
                   text
            >
                <v-icon>mdi-close-circle-outline</v-icon>
            </v-btn>

        </td>
    </tr>
</template>

<script>
    import {mapActions} from 'vuex';
    import DepartamentoForm from "./DepartamentoForm";

    export default {
        name: "DepartamentosListItem",
        components: {
            DepartamentoForm
        },
        props: {
            item: {
                type: Object,
                required: true,
            }
        },
        data() {
            return {
                editing: false,
                loading: false,
            }
        },
        methods: {
            save(draft) {
                this.loading = true;
                let payload = {id: draft.id, draft};
                this['catalogos/updateDepartamento'](payload)
                    .then(res => {
                        this['auth/setSnackbarMessage']('El jefe de departamento se guardó correctamente');
                        this['auth/toogleSnackbar'](true);
                        this.loading = false;
                    })
                    .catch(err => {
                        this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intente de nuevo');
                        this['auth/toogleSnackbar'](true);
                        this.loading = false;
                    })
            },
            deleteDepartamento() {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede deshacer",
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrar!'
                }).then((result) => {
                    if (result.value) {
                        this.loading = true;
                        this['catalogos/deleteDepartamento'](this.item.id)
                            .then(res => {
                                this['auth/setSnackbarMessage']('El jefe de departamento se eliminó correctamente');
                                this['auth/toogleSnackbar'](true);
                                this.editing = false;
                                this.loading = false;
                            })
                            .catch(err => {
                                this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intente de nuevo');
                                this['auth/toogleSnackbar'](true);
                                this.editing = false;
                                this.loading = false;
                            })
                    }
                })
            },
            ...mapActions([
                'catalogos/updateDepartamento',
                'catalogos/deleteDepartamento',
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
