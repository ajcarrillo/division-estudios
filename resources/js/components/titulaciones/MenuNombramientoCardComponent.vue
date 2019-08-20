<template>
    <v-menu bottom
            right
            transition="slide-y-transition">
        <template v-slot:activator="{ on }">
            <v-btn
                icon
                v-on="on"
                x-small
            >
                <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
        </template>
        <v-list>
            <template v-if="status === 'C' && isTitulacionOrDivision">
                <v-list-item @click="generarJuramento" v-if="!hasJuramento">
                    <v-list-item-title>Generar juramento</v-list-item-title>
                </v-list-item>
                <v-list-item @click="generarActa" v-if="!hasActa">
                    <v-list-item-title>Generar acta</v-list-item-title>
                </v-list-item>
            </template>
            <v-list-item @click="generarMemoSinodales"
                         v-if="!hasMemo"
                         v-role:any="'titulacion|division-estudios'"
            >
                <v-list-item-title>Generar memo sinodales</v-list-item-title>
            </v-list-item>
            <v-list-item @click.stop="asignarNumeroOficio"
                         v-if="hasSinodales && !hasNumeroOficio"
                         v-role:any="'jefe-departamento|division-estudios'"
            >
                <v-list-item-title>Generar nombramiento</v-list-item-title>
            </v-list-item>
            <template v-if="hasSinodales && !hasNumeroOficio">
                <v-list-item @click="modificarSinodales" v-if="status === 'E'" v-role:any="'jefe-departamento|division-estudios'">
                    <v-list-item-title>Modificar sinodales</v-list-item-title>
                </v-list-item>
            </template>
            <template v-else>
                <v-list-item @click="agregarSinodales" v-if="status === 'E'" v-role:any="'jefe-departamento|division-estudios'">
                    <v-list-item-title>Agregar sinodales</v-list-item-title>
                </v-list-item>
            </template>

            <template v-if="files.length">
                <v-list-item
                    :key="i"
                    :to="`/nombramientos/${nombramientoId}/descargar/${file.file_name}`"
                    v-for="(file, i) in files"
                >
                    <v-list-item-title>
                        {{ `Descargar ${file.documento.toLowerCase()}` }}
                    </v-list-item-title>
                </v-list-item>
            </template>

        </v-list>
        <v-dialog
            max-width="600px"
            persistent
            v-model="dialog"
        >
            <v-card
                :loading="loadingModal"
            >
                <v-card-title class="headline">¿Está seguro? Una vez generado el nombramiento no se podrán modificar los sinodales</v-card-title>
                <form @submit.prevent="generarNombramiento">
                    <v-card-text>
                        <v-text-field
                            :error-messages="errors.collect('numero_oficio')"
                            data-vv-name="numero_oficio"
                            label="Número de oficio"
                            v-model="numero_oficio"
                            v-validate="'required'"
                        ></v-text-field>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                            @click="generarNombramiento"
                            color="green darken-1"
                            text
                        >
                            Asignar número de oficio
                        </v-btn>

                        <v-btn
                            @click="closeModal"
                            color="red darken-1"
                            text
                        >
                            Cancelar
                        </v-btn>
                    </v-card-actions>
                </form>
            </v-card>
        </v-dialog>
    </v-menu>
</template>

<script>
    import {mapActions} from 'vuex';

    function getTitulacion() {
        let getById = this.$store.getters['titulaciones/getTitulacionById'];

        return getById(this.nombramientoId);
    }

    export default {
        name: "MenuNombramientoCardComponent",
        components: {},
        props: {
            nombramientoId: {
                type: Number,
                required: true
            },
            status: {
                type: String,
                required: true
            },
            sinodales: {
                type: Array,
                required: true,
                default: []
            },
            archivos: {
                type: Array,
                required: true,
                default: []
            }
        },
        data() {
            return {
                dialog: false,
                numero_oficio: null,
                loadingModal: false,
            }
        },
        methods: {
            generarActa() {
                this.$store.dispatch('titulaciones/storeActa', this.nombramientoId)
                    .then(res => {
                        //this.$emit('syncDraft');
                    })
                    .catch(err => {

                    })
            },
            agregarSinodales() {
                let nombramientoId = this.nombramientoId;
                this.$router.push({name: 'sinodales-create', params: {nombramientoId}});
            },
            modificarSinodales() {
                let nombramientoId = this.nombramientoId;
                this.$router.push({name: 'sinodales-edit', params: {nombramientoId}});
            },
            generarMemoSinodales() {
                this['auth/setSnackbarMessage']('Espera un momento estamos generando el memo...');
                this['auth/toogleSnackbar'](true);

                let payload = {nombramiento: this.nombramientoId};

                this.$store.dispatch('titulaciones/storeMemoSinodales', payload)
                    .then(res => {
                        this['auth/setSnackbarMessage']('El memo se generó correctamente');
                        this['auth/toogleSnackbar'](true);
                    })
                    .catch(err => {
                        console.log(err);
                    })
            },
            asignarNumeroOficio() {
                this.dialog = true;
            },
            closeModal() {
                this.dialog = false;
                this.$validator.reset();
            },
            generarNombramiento() {
                this.$validator.validate()
                    .then(isValid => {
                        if (isValid) {
                            this.loadingModal = true;
                            let payload = {nombramiento: this.nombramientoId, numero_oficio: this.numero_oficio};

                            this.$store.dispatch('titulaciones/storeNombramiento', payload)
                                .then(res => {
                                    //this.$emit('syncDraft');
                                    this.loadingModal = false;
                                    this.dialog = false;
                                })
                                .catch(err => {

                                });
                        }
                    })

            },
            generarJuramento() {
                this.$store.dispatch('titulaciones/storeJuramento', this.nombramientoId)
                    .then(res => {
                        //this.$emit('syncDraft');
                    })
                    .catch(err => {

                    })
            },
            ...mapActions([
                'auth/setSnackbarMessage',
                'auth/toogleSnackbar'
            ])
        },
        watch: {},
        computed: {
            hasSinodales() {
                return this.sinodales.length
            },
            hasActa() {
                let titulacion = getTitulacion.call(this);

                return titulacion.archivos.find(archivo => archivo.documento === 'ACTA');
            },
            hasJuramento() {
                let titulacion = getTitulacion.call(this);

                return titulacion.archivos.find(archivo => archivo.documento === 'JURAMENTO');
            },
            hasMemo() {
                let titulacion = getTitulacion.call(this);

                return titulacion.archivos.find(archivo => archivo.documento === 'MEMO SINODALES');
            },
            hasNumeroOficio() {
                let titulacion = getTitulacion.call(this);

                return titulacion.numero_oficio;
            },
            files() {
                if (this.$laravel.hasRole('jefe-departamento')) {
                    return this.archivos.filter(archivo => archivo.documento === 'NOMBRAMIENTO');
                } else {
                    return this.archivos.filter(archivo => archivo.documento !== 'NOMBRAMIENTO');
                }
            },
            isTitulacionOrDivision() {
                return this.$laravel.hasAnyRole('titulacion|division-estudios');
            }
        }
    }
</script>

<style scoped>

</style>
