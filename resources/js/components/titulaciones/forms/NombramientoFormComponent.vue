<template>
    <div>
        <v-text-field
            v-if="action !== 'Edit'"
            @keyup.enter="buscarAlumno"
            autofocus
            data-vv-name="numero_control"
            label="Número de control"
            maxlength="9"
            prepend-icon="mdi-pound-box"
            v-model="numero_control"
            v-validate="'required'"
        >
            <template v-slot:append>
                Pres. enter para buscar
            </template>
        </v-text-field>
        <v-row>
            <v-col cols="12">
                <v-alert
                    :value="alert"
                    border="left"
                    color="blue darken-3"
                    colored-border
                    icon="mdi-school"
                    outlined
                    transition="scale-transition"
                >
                    <v-list-item style="min-height: 0!important;" three-line v-if="!draft.alumno.empty">
                        <v-list-item-content class="py-0">
                            <v-list-item-title class="subtitle-1 font-weight-medium">{{ draft.alumno.nombre_completo }}</v-list-item-title>
                            <v-list-item-subtitle>{{ draft.alumno.numero_control }}</v-list-item-subtitle>
                            <v-list-item-subtitle>{{ draft.alumno.sexo|gender }}</v-list-item-subtitle>
                            <v-list-item-subtitle>{{ draft.alumno.carrera.descripcion }}</v-list-item-subtitle>
                            <v-list-item-subtitle>GENERACION: {{ generacion }}</v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>
                </v-alert>
            </v-col>
        </v-row>
        <form>
            <v-autocomplete
                :error-messages="errors.collect('draft.opcion')"
                :items="opciones"
                data-vv-name="draft.opcion"
                item-text="descripcion"
                item-value="id"
                label="Opción"
                required
                return-object
                v-model="draft.opcion"
                v-validate="'required'"
            ></v-autocomplete>
            <v-autocomplete
                :disabled="!modulos.length"
                :items="modulos"
                data-vv-name="draft.modulo"
                item-text="descripcion"
                item-value="id"
                label="Módulo"
                required
                return-object
                v-model="draft.modulo"
                :error-messages="modulos.length ? errors.collect('draft.modulo') : null"
                :readonly="!modulos.length"
                v-validate="!modulos.length ? null:'required'"
            ></v-autocomplete>
            <v-textarea
                label="Proyecto"
                v-model="draft.proyecto"
            ></v-textarea>
            <v-row>
                <v-col cols="12" md="6">
                    <v-menu
                        :close-on-content-click="false"
                        :nudge-right="40"
                        full-width
                        min-width="290px"
                        offset-y
                        transition="scale-transition"
                        v-model="fechaPicker"
                    >
                        <template v-slot:activator="{ on }">
                            <v-text-field
                                :error-messages="errors.collect('draft.fecha')"
                                data-vv-name="draft.fecha"
                                label="Fecha"
                                prepend-icon="mdi-calendar"
                                readonly
                                required
                                v-model="draft.fecha"
                                v-on="on"
                                v-validate="'required'"
                            ></v-text-field>
                        </template>
                        <v-date-picker @input="fechaPicker = false"
                                       locale="es-419"
                                       v-model="draft.fecha"
                        ></v-date-picker>
                    </v-menu>
                </v-col>
                <v-col cols="12" md="6">
                    <v-autocomplete
                        :error-messages="errors.collect('draft.horario')"
                        :items="horas"
                        data-vv-name="draft.horario"
                        item-text="hora"
                        item-value="id"
                        label="Hora"
                        prepend-icon="mdi-clock-outline"
                        required
                        return-object
                        v-model="draft.horario"
                        v-validate="'required'"
                    ></v-autocomplete>
                </v-col>
            </v-row>
            <v-divider class="mb-4" light></v-divider>
            <v-btn
                @click="submit"
                class="primary mr-4"
                depressed
            >
                Guardar
            </v-btn>
            <v-btn
                color="error"
                text
                v-if="action === 'Edit'"
            >
                Eliminar
            </v-btn>
            <v-btn
                @click="$router.push({name:'titulaciones-index'})"
                bottom
                color="blue darken-3"
                dark
                fab
                fixed
                right
            >
                <v-icon>mdi-arrow-left</v-icon>
            </v-btn>
        </form>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';

    const _ = require('lodash');

    export default {
        name: "NombramientoForm",
        components: {},
        props: {
            nombramiento: {
                type: Object,
                required: true,
                default: function () {
                    return {}
                }
            },
            action: {
                type: String,
                default: 'New'
            },
            clearForm: {
                type: Boolean,
                required: true,
            }
        },
        data() {
            return {
                draft: clone(this.nombramiento),
                numero_control: '',
                opciones: [],
                modulos: [],
                horas: [],
                fechaPicker: false,
                loading: false,
                alert: false,
                dictionary: {
                    attributes: {
                        'draft.opcion': 'Opción',
                        'draft.modulo': 'Módulo',
                        'draft.fecha': 'Fecha',
                        'draft.horario': 'Hora',
                        'draft.proyecto': 'Proyecto'
                    }
                }
            }
        },
        mounted() {
            this.$validator.localize('es', this.dictionary);

            this.$store.dispatch('titulaciones/fetchOpciones', window.opciones);
            this.opciones = this.$store.getters['titulaciones/getOpciones'];

            if (this.action === 'Edit') {
                this.fetchHoras();
                this.alert = true;

                if (this.draft.opcion) {
                    if (this.draft.opcion.modulos.length) {
                        this.modulos = this.draft.opcion.modulos;
                    } else {
                        this.modulos = [];
                        this.draft.modulo = null;
                        this.draft.modulo_id = null;
                    }
                } else {
                    this.modulos = [];
                    this.draft.modulo = null;
                    this.draft.modulo_id = null;
                }
            }
        },
        methods: {
            submit() {
                this.$validator.validateAll()
                    .then(isValid => {
                        if (isValid && !this.draft.alumno.empty) {
                            let payload = {
                                alumno_id: this.draft.alumno.id,
                                opcion_id: this.draft.opcion.id,
                                modulo_id: this.draft.modulo ? this.draft.modulo.id : null,
                                proyecto: this.draft.proyecto,
                                fecha: this.draft.fecha,
                                horario_id: this.draft.horario.id
                            };
                            this.$emit('save', payload);
                        }
                    });
            },
            buscarAlumno() {
                this.$emit('loading');
                let params = {numero_control: this.numero_control, sinNombramiento: ''};

                axios.get(route('api.v1.catalogos.alumnos.index'), {params})
                    .then(res => {
                        this.draft.alumno = res.data.alumno;
                        this.$emit('loading');
                        this.alert = !this.alert;
                    })
            },
            clear() {
                this.draft = clone(this.nombramiento);

                this.numero_control = '';
                this.horas = [];
                this.modulos = [];

                this.alert = !this.alert;

                this.$validator.reset();
            },
            fetchHoras() {
                this['titulaciones/fetchHoras'](moment(this.fecha).format('YYYY-MM-DD'))
                    .then(res => {
                        this.horas = res.data.items;
                        this.horas.push({id: this.draft.horario.id, hora: this.draft.horario.hora.substr(0, 5)})
                    })
                    .catch(err => {

                    })
            },
            ...mapActions([
                'titulaciones/fetchHoras'
            ])
        },
        watch: {
            opcion() {
                if (this.draft.opcion) {
                    if (this.draft.opcion.modulos.length) {
                        this.modulos = this.draft.opcion.modulos;
                    } else {
                        this.modulos = [];
                        this.draft.modulo = null;
                        this.draft.modulo_id = null;
                    }
                } else {
                    this.modulos = [];
                    this.draft.modulo = null;
                    this.draft.modulo_id = null;
                }
            },
            fecha() {
                this.$emit('loading');
                this.$store.dispatch('titulaciones/fetchHoras', this.fecha)
                    .then(res => {
                        this.horas = this.$store.getters['titulaciones/getHoras'];
                        this.$emit('loading');
                    })
                    .catch(err => {
                        this.$emit('loading');
                    });
            },
            clearForm(clear) {
                if (clear) {
                    this.clear();
                }
            }
        },
        computed: {
            opcion() {
                return this.draft.opcion;
            },
            fecha() {
                return this.draft.fecha;
            },
            generacion() {
                if (this.numero_control) {
                    if (isNaN(this.numero_control.substr(0, 1))) {
                        let d = new Date("01/01/" + this.numero_control.substr(1, 2));
                        return d.getFullYear();
                    } else {
                        let d = new Date("01/01/" + this.numero_control.substr(0, 2));
                        return d.getFullYear();
                    }
                }
                return undefined;
            }
        },
        filters: {
            gender: function (value) {
                return value === 'M' ? 'HOMBRE' : 'MUJER';
            }
        }
    }
</script>

<style scoped>

</style>
