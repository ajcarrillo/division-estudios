<template>
    <form>
        <v-text-field
            :error-messages="errors.collect('draft.numero_control')"
            autofocus
            counter="10"
            data-vv-name="draft.numero_control"
            label="Número de control"
            maxlength="10"
            type="text"
            v-model="draft.numero_control"
            v-validate="'required'"
        ></v-text-field>
        <v-text-field
            :error-messages="errors.collect('draft.nombre_completo')"
            data-vv-name="draft.nombre_completo"
            label="Nombre completo"
            type="text"
            v-model="draft.nombre_completo"
            v-validate="'required'"
        ></v-text-field>
        <v-radio-group :error-messages="errors.collect('draft.sexo')"
                       :mandatory="false"
                       data-vv-name="draft.sexo"
                       v-model="draft.sexo"
                       v-validate="'required'"
        >
            <v-radio label="Femenino" value="F"></v-radio>
            <v-radio label="Masculino" value="M"></v-radio>
        </v-radio-group>
        <v-autocomplete
            :error-messages="errors.collect('draft.carrera_id')"
            :items="carreras"
            data-vv-name="draft.carrera_id"
            item-text="descripcion"
            item-value="id"
            label="Carrera"
            v-model="draft.carrera_id"
            v-validate="'required'"
        ></v-autocomplete>

        <v-btn @click="save"
               class="mt-4"
               color="success"
        >
            Guardar
        </v-btn>
    </form>
</template>

<script>
    import {mapActions, mapState} from 'vuex'

    export default {
        name: 'AlumnoForm',
        components: {},
        props: {
            populateWith: {
                type: Object,
                default: () => ({empty: true})
            }
        },
        data() {
            return {
                draft: {
                    numero_control: null,
                    nombre_completo: null,
                    sexo: null,
                    carrera_id: null,
                },
                genero: ['M', 'F'],
                dictionary: {
                    attributes: {
                        'draft.numero_control': 'Número de control',
                        'draft.nombre_completo': 'Nombre completo',
                        'draft.sexo': 'Sexo',
                        'draft.carrera_id': 'Carrera',
                    }
                }
            }
        },
        mounted() {
            this.$validator.localize('es', this.dictionary)
        },
        created() {
            this['catalogos/fetchCarreras']()

            if (!this.populateWith.empty) {
                this.draft = clone(this.populateWith)
            }
        },
        methods: {
            save() {
                this.$validator.validateAll()
                    .then(isValid => {
                        if (isValid) {
                            this.$emit('save', this.draft)
                        }
                    })
            },
            ...mapActions([
                'catalogos/fetchCarreras',
                'catalogos/fetchAlumnos'
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
