<template>
    <form>
        <v-row class="align-center">
            <v-col cols="12" md="4">
                <v-text-field :error-messages="errors.collect('draft.nombre_completo')"
                              autofocus
                              data-vv-name="draft.nombre_completo"
                              label="Nombre"
                              required
                              v-model="draft.nombre_completo"
                              v-validate="'required'"
                ></v-text-field>
            </v-col>
            <v-col cols="12" md="4">
                <v-text-field :error-messages="errors.collect('draft.especialidad')"
                              data-vv-name="draft.especialidad"
                              label="Especialidad"
                              required
                              v-model="draft.especialidad"
                              v-validate="'required'"

                ></v-text-field>
            </v-col>
            <v-col cols="12" md="2">
                <v-text-field :error-messages="errors.collect('draft.cedula_profesional')"
                              data-vv-name="draft.cedula_profesional"
                              label="Cédula"
                              required
                              v-model="draft.cedula_profesional"
                              v-validate="'required'"

                ></v-text-field>
            </v-col>
            <v-col cols="12" md="2">
                <v-btn :loading="saving"
                       @click="submit"
                       color="success"
                >
                    Guardar
                </v-btn>
            </v-col>
        </v-row>
    </form>
</template>

<script>
    export default {
        name: 'MaestroForm',
        components: {},
        props: {
            populateWith: {
                type: Object,
                default: () => ({empty: true})
            },
            saving: {
                type: Boolean,
                default: false,
            }
        },
        data() {
            return {
                draft: {
                    nombre_completo: null,
                    especialidad: null,
                    cedula_profesional: null,
                },
                dictionary: {
                    attributes: {
                        'draft.nombre_completo': 'Nombre',
                        'draft.especialidad': 'Especialidad',
                        'draft.cedula_profesional': 'Cédula',
                    }
                }
            }
        },
        created() {
            if (!this.populateWith.empty) {
                this.draft = clone(this.populateWith)
            }
        },
        mounted() {
            this.$validator.localize('es', this.dictionary);
        },
        methods: {
            submit() {
                this.$validator.validateAll()
                    .then(isValid => {
                        if (isValid) {
                            this.$emit('save', this.draft);
                        }
                    })
            }
        },
        watch: {},
        computed: {}
    }
</script>

<style scoped>

</style>
