require('./bootstrap');
require('./filters');

window.Vue = require('vue');

import veeValidateEs from './utilities/vee-validate-es';
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify';
import VeeValidate from 'vee-validate'
import LaravelPermissions from 'laravel-permissions';
import {mapState} from 'vuex';

Vue.use(LaravelPermissions);

Vue.use(VeeValidate, {
    locale: 'es',
    dictionary: {
        es: {messages: veeValidateEs}
    }
});

const app = new Vue({
    vuetify,
    router,
    store,
    data: () => ({
        drawer: null,
        items: [
            {
                icon: 'mdi-chevron-up',
                'icon-alt': 'mdi-chevron-down',
                text: 'Titulaciones',
                model: false,
                roles: 'division-estudios|titulacion|jefe-departamento',
                children: [
                    {icon: 'mdi-format-list-bulleted', text: 'Ver listado', link: '/app/titulaciones', roles: 'division-estudios|titulacion|jefe-departamento',},
                    {icon: 'mdi-plus', text: 'Nueva', link: '/app/titulaciones/nueva', roles: 'division-estudios|titulacion',},
                ]
            },
            {
                icon: 'mdi-chevron-up',
                'icon-alt': 'mdi-chevron-down',
                text: 'Catálogos',
                model: false,
                roles: 'division-estudios',
                children: [
                    {icon: 'mdi-account-group', text: 'Alumnos', link: '/app/catalogos/alumnos', roles: 'division-estudios',},
                    {icon: 'mdi-school', text: 'Carreras', link: '/app/catalogos/carreras', roles: 'division-estudios',},
                    {icon: 'mdi-account-tie', text: 'Maestros', link: '/app/catalogos/maestros', roles: 'division-estudios',},
                    {icon: 'mdi-domain', text: 'Departamentos', link: '/app/catalogos/departamentos', roles: 'division-estudios',},
                ]
            },
            /*{icon: 'mdi-poll', text: 'Estadística', link: '/app/titulaciones'},*/
            {icon: 'mdi-account', text: 'Usuarios', link: '/app/catalogos/usuarios', roles: 'division-estudios',},
            /*{icon: 'mdi-code-equal', text: 'Convalidaciones', link: '/app/titulaciones'},*/
            /*{icon: 'mdi-content-copy', text: 'Duplicates'},
            {
                icon: 'mdi-chevron-up',
                'icon-alt': 'mdi-chevron-down',
                text: 'Labels',
                model: true,
                children: [
                    {icon: 'mdi-plus', text: 'Create label'},
                ],
            },
            {
                icon: 'mdi-chevron-up',
                'icon-alt': 'mdi-chevron-down',
                text: 'More',
                model: false,
                children: [
                    {text: 'Import'},
                    {text: 'Export'},
                    {text: 'Print'},
                    {text: 'Undo changes'},
                    {text: 'Other contacts'},
                ],
            },
            {icon: 'mdi-settings', text: 'Settings'},
            {icon: 'mdi-message', text: 'Send feedback'},
            {icon: 'mdi-help-circle', text: 'Help'},
            {icon: 'mdi-cellphone-link', text: 'App downloads'},
            {icon: 'mdi-keyboard', text: 'Go to the old version'},*/
        ],
    }),
    computed: {
        snackbar() {
            return this.$store.state.auth.snackbar;
        },
        snackbarText() {
            return this.$store.state.auth.snackbarText;
        },
        ...mapState({
            user: state => state.auth.user,
            roles: state => state.auth.roles,
        })
    },
    methods: {
        closeSnackBar() {
            this.$store.dispatch('auth/toogleSnackbar', false)
        },
        logout() {
            document.getElementById('logout-form').submit();
        },
    },
    created() {
        this.$store.dispatch('auth/fetchUser', window.user);
        this.$store.dispatch('auth/fetchRoles', window.roles);
        this.$store.dispatch('auth/fetchApiToken', window.api_token);

        this.$laravel.setRoles(this.$store.getters['auth/getRoles']);
    }
}).$mount('#app');
