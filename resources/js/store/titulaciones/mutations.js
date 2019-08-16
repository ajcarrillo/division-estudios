export default {
    SET_TITULACIONES(state, payload) {
        state.titulaciones = payload
    },
    SET_PAGINATION(state, payload) {
        let {current_page, first_page_url, from, last_page, last_page_url, next_page_url, path, per_page, prev_page_url, to, total,} = payload;

        state.pagination = {current_page, first_page_url, from, last_page, last_page_url, next_page_url, path, per_page, prev_page_url, to, total}
    }
}
