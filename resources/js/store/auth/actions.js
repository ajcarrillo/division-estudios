export default {
    fetchUser(context, payload) {
        context.commit('SET_USER', payload)
    },
    fetchRoles(context, payload) {
        context.commit('SET_ROLES', payload)
    },
    fetchApiToken(context, payload) {
        context.commit('SET_API_TOKEN', payload)
    },
    setSnackbarMessage(context, payload) {
        context.commit('SET_SNACKBAR_MESSAGE', payload);
    },
    toogleSnackbar(context) {
        context.commit('TOGGLE_SNACKBAR');
    }
}
