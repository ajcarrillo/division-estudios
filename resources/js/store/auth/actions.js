export default {
    fetchUser(context, payload) {
        context.commit('SET_USER', payload)
    },
    fetchRoles(context, payload) {
        context.commit('SET_ROLES', payload)
    },
    fetchApiToken(context, payload) {
        context.commit('SET_API_TOKEN', payload)
    }
}
