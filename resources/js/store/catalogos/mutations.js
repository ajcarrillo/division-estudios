export default {
    SET_DEPARTAMENTOS(state, payload) {
        state.departamentos = payload;
    },
    ADD_DEPARTAMENTO(state, payload) {
        state.departamentos.push(payload);
    },
    UPDATE_DEPARTAMENTO(state, payload) {
        let {id, item} = payload;

        let index = state.departamentos.findIndex(function (el) {
            return el.id === id;
        });

        Vue.set(state.departamentos, index, item);
    },
    DELETE_DEPARTAMENTO(state, payload) {
        let index = state.departamentos.findIndex(function (el) {
            return el.id === payload;
        });

        Vue.delete(state.departamentos, index)
    },
    SET_USERS(state, payload) {
        state.usuarios = payload;
    },
}
