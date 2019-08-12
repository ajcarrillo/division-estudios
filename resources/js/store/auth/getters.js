export default {
    getUser: (state) => {
        return state.user;
    },
    getRoles: (state) => {
        return state.roles;
    },
    getApiToken: (state) => {
        return state.api_token;
    },
    getUserName: (state) => {
        return state.user.name
    },
    getUserEmail: (state) => {
        return state.user.email
    }
}
