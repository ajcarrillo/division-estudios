<template>
    <form>
        <v-text-field
            :error-messages="errors.collect('draft.clave')"
            data-vv-name="draft.clave"
            label="Clave"
            ref="clave"
            type="text"
            v-model="draft.clave"
            v-validate="'required'"
        ></v-text-field>
        <v-text-field
            :error-messages="errors.collect('draft.descripcion')"
            data-vv-name="draft.descripcion"
            label="Carrera"
            type="text"
            v-model="draft.descripcion"
            v-validate="'required'"
        ></v-text-field>
        <v-text-field
            :error-messages="errors.collect('draft.grado')"
            data-vv-name="draft.grado"
            label="Grado"
            type="text"
            v-model="draft.grado"
            v-validate="'required'"
        ></v-text-field>
        <v-autocomplete
            :error-messages="errors.collect('draft.jefe_departamento_id')"
            :items="departamentos"
            data-vv-name="draft.jefe_departamento_id"
            item-text="jefatura"
            item-value="id"
            label="Departamentos"
            v-model="draft.jefe_departamento_id"
            v-validate="'required'"
        ></v-autocomplete>

        <v-btn @click="save"
               class="mt-4 mr-4"
               color="success"
        >
            Guardar
        </v-btn>
    </form>
</template>

<script>
    import {mapActions, mapState} from 'vuex'
    import EventBus from '../../../event-bus'

    export default {
        name: 'CarreraForm',
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
                    clave: null,
                    descripcion: null,
                    grado: null,
                    jefe_departamento_id: null
                },
                dictionary: {
                    attributes: {
                        'draft.clave': 'Clave',
                        'draft.descripcion': 'Descripción',
                        'draft.grado': 'Grado',
                        'draft.jefe_departamento_id': 'Departamento',
                    }
                }
            }
        },
        created() {
            this['catalogos/fetchDepartamentos']();
            if (!this.populateWith.empty) {
                this.draft = clone(this.populateWith)
            }
        },
        mounted() {
            this.$validator.localize('es', this.dictionary);
            this.$refs.clave.focus();

            let that = this;
            EventBus.$on('CLEAR_CARRERA_FORM', function () {
                that.draft.clave = null
                that.draft.descripcion = null
                that.draft.grado = null
                that.draft.jefe_departamento_id = null
                that.$validator.reset();
            })
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
                'catalogos/fetchDepartamentos'
            ])
        },
        watch: {},
        computed: {
            ...mapState({
                departamentos: state => state.catalogos.departamentos
            })
        }
    }
</script>

<style scoped>

</style>
