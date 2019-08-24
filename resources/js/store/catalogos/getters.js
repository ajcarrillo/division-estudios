export default {
    getUserById: (state) => (id) => {
        return state.usuarios.find(function (el) {
            return el.id === id
        })
    }
}
