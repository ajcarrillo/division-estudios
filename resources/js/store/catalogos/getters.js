export default {
    getUserById: (state) => (id) => {
        return state.usuarios.find(function (el) {
            return el.id === id
        })
    },
    getAlumnoById: (state) => (id) => {
        return state.alumnos.find(function (el) {
            return el.id === id
        })
    },
    countAlumnos: state => {
        return state.alumnos.length
    }
}
