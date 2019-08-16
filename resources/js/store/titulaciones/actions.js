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
    },
    storeActa(context, payload) {
        return new Promise(function (resolve, reject) {
            axios.post(route('api.v1.nombramientos.actas.store', payload))
                .then(res => {
                    let payload = {id: payload, archivo: res.data.archivo};
                    context.commit('SET_ARCHIVOS', payload);
                    resolve(res);
                })
                .catch(err => {
                    console.log(err.response.data);
                    reject(err);
                })
        })
    },
    storeSinodales(context, payload) {
        return new Promise(function (resolve, reject) {
            let {nombramiento, presidente, secretario, vocal, vocalSuplente} = payload;
            let data = {presidente, secretario, vocal, vocalSuplente};

            axios.post(route('api.v1.nombramientos.sinodales.store', nombramiento), data)
                .then(res => {
                    let sinodales = res.data.sinodales;
                    let payload = {id: nombramiento, sinodales};

                    context.commit('SET_SINODALES', payload);

                    resolve(res);
                })
                .catch(err => {

                    console.log(err);

                    reject(err)
                })
        })
    }
}
