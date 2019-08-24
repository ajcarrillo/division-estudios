<template>
    <form>
        <v-text-field
            :error-messages="errors.collect('draft.name')"
            autofocus
            data-vv-name="draft.name"
            label="Nombre"
            ref="name"
            type="text"
            v-model="draft.name"
            v-validate="'required'"
        ></v-text-field>
        <v-text-field
            :error-messages="errors.collect('draft.email')"
            data-vv-name="draft.email"
            label="Correo electrónico"
            type="email"
            v-model="draft.email"
            v-validate="'required|email'"
        ></v-text-field>
        <v-text-field
            :error-messages="errors.collect('draft.password')"
            autocomplete="new-password"
            data-vv-name="draft.password"
            label="Contraseña"
            type="password"
            v-model="draft.password"
            v-validate="'required'"
        ></v-text-field>

        <v-list flat
                subheader
        >
            <v-subheader>Roles</v-subheader>
            <v-list-item :key="role.name"
                         v-for="role in roles">
                <v-list-item-action>
                    <v-checkbox :error-messages="errors.collect('draft.roles')"
                                :label="role.label"
                                :value="role.name"
                                data-vv-name="draft.roles"
                                v-model="draft.roles"
                                v-validate="'required'"
                    ></v-checkbox>
                </v-list-item-action>
            </v-list-item>
        </v-list>

        <v-btn @click="save"
               class="mt-4"
               color="success"
        >
            Guardar
        </v-btn>
    </form>
</template>

<script>
    import EventBus from '../../../event-bus'

    export default {
        name: 'UserForm',
        components: {},
        props: {
            populateWith: {
                type: Object,
                default: () => ({empty: true})
            },
            edit: {
                type: Boolean,
                default: false,
            }
        },
        data() {
            return {
                draft: {
                    name: null,
                    email: null,
                    password: null,
                    roles: []
                },
                roles: [
                    {label: 'Titulación', name: 'titulacion'},
                    {label: 'División de estudios', name: 'division-estudios'},
                    {label: 'Jefe de departamento', name: 'jefe-departamento'},
                    {label: 'Servicios escolares', name: 'servicios-escolares'},
                    {label: 'Subdirección académica', name: 'subdireccion-academica'},
                ],
                dictionary: {
                    attributes: {
                        'draft.name': 'Nombre',
                        'draft.email': 'Correo electrónico',
                        'draft.password': 'Contraseña',
                        'draft.roles': 'Roles',
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
            this.$refs.name.focus();
            let that = this

            EventBus.$on('CLEAR_USER_FORM', function () {
                that.draft = {
                    name: null,
                    email: null,
                    password: null,
                    roles: []
                }
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
            }
        },
        watch: {},
        computed: {}
    }
</script>

<style scoped>

</style>
