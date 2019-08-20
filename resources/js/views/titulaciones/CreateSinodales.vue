<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12">
                <v-card>
                    <v-card-title primary-title>
                        <div>
                            <h3 class="headline mb-0">Sinodales</h3>
                        </div>
                    </v-card-title>
                    <v-card-text>
                        <sinodales-form :saving="saving" @submit="submit"></sinodales-form>
                    </v-card-text>
                    <v-card-actions></v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import {mapActions} from 'vuex';
    import SinodalesForm from "../../components/titulaciones/forms/SinodalesFormComponent";

    export default {
        name: "CreateSinodales",
        components: {
            SinodalesForm
        },
        props: {},
        data() {
            return {
                saving: false,
                sinodales: []
            }
        },
        mounted() {
            if (!this.$store.getters['titulaciones/getTitulaciones'].length > 0) {
                this.$router.push({name: 'titulaciones-index'})
            }
        },
        methods: {
            submit(draft) {
                this.saving = true;

                let nombramiento = this.$route.params.nombramientoId;
                let presidente = draft[0];
                let secretario = draft[1];
                let vocal = draft[2];
                let vocalSuplente = draft[3];

                let payload = {presidente, secretario, vocal, vocalSuplente, nombramiento};

                this.$store.dispatch('titulaciones/storeSinodales', payload)
                    .then(res => {
                        this.saving = false;
                        this['auth/setSnackbarMessage']('Los sinodales se guardaron correctamente');
                        this['auth/toogleSnackbar'](true);
                    })
                    .catch(err => {
                        this['auth/setSnackbarMessage']('Lo sentimos, ha ocurrido un error, intenta de nuevo');
                        this['auth/toogleSnackbar'](true);
                    })
            },
            ...mapActions([
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
