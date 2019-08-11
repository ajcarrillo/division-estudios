require('./bootstrap');

window.Vue = require('vue');

import veeValidateEs from './utilities/vee-validate-es';
import vuetify from "./plugins/vuetify";
import VeeValidate from 'vee-validate'

Vue.use(VeeValidate, {
    locale: 'es',
    dictionary: {
        es: {messages: veeValidateEs}
    }
});

const app = new Vue({
    vuetify,
}).$mount('#app');
