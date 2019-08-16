export default {
    fetchTitulaciones(context, payload) {
        return new Promise(function (resolve, reject) {
            axios.get(route('api.v1.nombramientos.index'))
                .then(res => {
                    context.commit('SET_TITULACIONES', res.data.nombramientos.data);
                    context.commit('SET_PAGINATION', res.data.nombramientos);
                    resolve(res);
                })
                .catch(err => {
                    console.log(err.response.data);
                    reject(err)
                })
        })
    }
}
