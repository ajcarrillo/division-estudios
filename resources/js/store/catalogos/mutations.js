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

    SET_MAESTROS(state, payload) {
        state.maestros = payload
    },
    ADD_MAESTROS(state, payload) {
        state.maestros.push(payload);
    },
    UPDATE_MAESTROS(state, payload) {
        let {id, item} = payload;

        let index = state.maestros.findIndex(function (el) {
            return el.id === id
        })

        Vue.set(state.maestros, index, item)
    },
    DELETE_MAESTROS(state, payload) {
        let index = state.maestros.findIndex(function (el) {
            return el.id === payload
        })

        Vue.delete(state.maestros, index)
    },

    SET_PAGINATION(state, payload) {
        state.pagination = payload
    },

    SET_CARRERAS(state, payload) {
        state.carreras = payload
    },
    ADD_CARRERA(state, payload) {
        state.carreras.push(payload)
    },
    UPDATE_CARRERAS(state, payload) {
        let {id, item} = payload

        let index = state.carreras.findIndex(function (el) {
            return el.id === id
        })

        Vue.set(state.carreras, index, item)
    },
    DELETE_CARRERA(state, payload) {
        let index = state.carreras.findIndex(function (el) {
            return el.id === payload
        })

        Vue.delete(state.carreras, index)
    },
}
