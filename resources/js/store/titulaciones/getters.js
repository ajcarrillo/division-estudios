export default {
    getTitulaciones: (state) => {
        return state.titulaciones
    },
    getTitulacionById: (state) => (id) => {
        return state.titulaciones.find(titulacion => titulacion.id === id);
    },
    getOpciones: (state) => {
        return state.opciones;
    },
    getHoras: (state) => {
        return state.horas;
    },
    lengthNombramientos: (state) => {
        return state.titulaciones.length
    }
}
