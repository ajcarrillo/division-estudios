export default {
    getTitulaciones: (state) => {
        return state.titulaciones
    },
    getTitulacionById: (state) => (id) => {
        return state.titulaciones.find(titulacion => titulacion.id === id);
    }
}
