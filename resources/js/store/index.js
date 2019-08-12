import Vue from 'vue';
import Vuex from 'vuex';
import Auth from './auth/store';
import Titulaciones from './titulaciones/store'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        auth: Auth,
        titulaciones: Titulaciones
    }
});
