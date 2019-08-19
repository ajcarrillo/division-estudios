require('./bootstrap');
require('./filters');

window.Vue = require('vue');

import veeValidateEs from './utilities/vee-validate-es';
import router from './router'
import store from './store'
import vuetify from "./plugins/vuetify";
import VeeValidate from 'vee-validate'
import LaravelPermissions from 'laravel-permissions';

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
        dialog: false,
        drawer: null,
        items: [
            {
                icon: 'mdi-chevron-up',
                'icon-alt': 'mdi-chevron-down',
                text: 'Titulaciones',
                model: false,
                children: [
                    {icon: 'mdi-format-list-bulleted', text: 'Ver listado', link: '/app/titulaciones'},
                    {icon: 'mdi-plus', text: 'Nueva', link: '/app/titulaciones/nueva'},
                ]
            },
            {icon: 'mdi-code-equal', text: 'Convalidaciones', link: '/app/convalidaciones'},
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
        }
    },
    methods: {
        closeSnackBar() {
            this.$store.dispatch('auth/toogleSnackbar')
        }
    },
    mounted() {
        this.$store.dispatch('auth/fetchUser', window.user);
        this.$store.dispatch('auth/fetchRoles', window.roles);
        this.$store.dispatch('auth/fetchApiToken', window.api_token);

        this.$laravel.setRoles(this.$store.getters['auth/getRoles']);
    }
}).$mount('#app');
