export default {
    SET_USER(state, payload) {
        state.user = payload;
    },
    SET_ROLES(state, payload) {
        state.roles = payload
    },
    SET_API_TOKEN(state, payload) {
        state.api_token = payload
    },
}
