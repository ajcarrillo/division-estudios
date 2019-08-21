<template>
    <form>
        <v-row class="align-center">
            <v-col cols="12" md="5">
                <v-text-field :error-messages="errors.collect('draft.jefatura')"
                              autofocus
                              data-vv-name="draft.jefatura"
                              label="Jefatura"
                              required
                              v-model="draft.jefatura"
                              v-validate="'required'"
                ></v-text-field>
            </v-col>
            <v-col cols="12" md="5">
                <v-autocomplete :error-messages="errors.collect('draft.responsable')"
                                :items="usuarios"
                                data-vv-name="draft.responsable"
                                item-text="name"
                                item-value="id"
                                label="Responsable"
                                required
                                return-object
                                v-model="draft.responsable"
                                v-validate="'required'"
                ></v-autocomplete>
            </v-col>
            <v-col cols="12" md="2">
                <v-btn :loading="saving"
                       @click="submit"
                       color="success"
                >Guardar
                </v-btn>
            </v-col>
        </v-row>


    </form>
</template>

<script>
    import {mapActions, mapState} from 'vuex';

    export default {
        name: "DepartamentoForm",
        components: {},
        props: {
            populateWith: {
                type: Object,
                default: () => ({empty: true})
            },
            saving: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                draft: {
                    jefatura: null,
                    responsable: null,
                    responsable_id: null
                },
                dictionary: {
                    attributes: {
                        'draft.jefatura': 'Jefatura',
                        'draft.responsable': 'Responsable',
                    }
                },

            }
        },
        created() {
            if (!this.populateWith.empty) {
                this.draft = clone(this.populateWith);
            }
            this['catalogos/fetchUsuarios']();
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
            },
            ...mapActions([
                'catalogos/fetchUsuarios'
            ])
        },
        watch: {},
        computed: {
            ...mapState({
                usuarios: state => state.catalogos.usuarios,
            })
        }
    }
</script>

<style scoped>

</style>
