require('./bootstrap');

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
            {icon: 'mdi-book-open-variant', text: 'Titulaciones', link: '/app/titulaciones'},
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
    mounted() {
        this.$store.dispatch('auth/fetchUser', window.user);
        this.$store.dispatch('auth/fetchRoles', window.roles);
        this.$store.dispatch('auth/fetchApiToken', window.api_token);

        this.$laravel.setRoles(this.$store.getters['auth/getRoles']);
    }
}).$mount('#app');
