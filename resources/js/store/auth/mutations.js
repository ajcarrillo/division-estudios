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
    SET_SNACKBAR_MESSAGE(state, payload) {
        state.snackbarText = payload;
    },
    TOGGLE_SNACKBAR(state) {
        state.snackbar = !state.snackbar;
    }
}
