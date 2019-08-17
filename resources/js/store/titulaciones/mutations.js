export default {
    SET_TITULACIONES(state, payload) {
        state.titulaciones = payload
    },
    SET_PAGINATION(state, payload) {
        let {current_page, first_page_url, from, last_page, last_page_url, next_page_url, path, per_page, prev_page_url, to, total,} = payload;

        state.pagination = {current_page, first_page_url, from, last_page, last_page_url, next_page_url, path, per_page, prev_page_url, to, total}
    },
    SET_ARCHIVOS(state, payload) {
        let {id, archivo} = payload;

        let index = state.titulaciones.findIndex(titulacion => titulacion.id === id);

        state.titulaciones[index].archivos.push(archivo);
    },
    SET_SINODALES(state, payload) {
        let {id, sinodales} = payload;

        let index = state.titulaciones.findIndex(titulacion => titulacion.id === id);

        state.titulaciones[index].sinodales = sinodales;
    },
    UPDATE_ESTATUS(state, payload) {
        let {id, status} = payload;
        let index = state.titulaciones.findIndex(titulacion => titulacion.id === id);

        state.titulaciones[index].estatus = status;
    },
    UPDATE_NUMERO_OFICIO(state, payload) {
        let {id, numero_oficio} = payload;
        let index = state.titulaciones.findIndex(titulacion => titulacion.id === id);
        state.titulaciones[index].numero_oficio = numero_oficio;
    }
}
