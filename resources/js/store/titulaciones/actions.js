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
            let nombramiento = payload;

            axios.post(route('api.v1.nombramientos.actas.store', nombramiento))
                .then(res => {
                    let payload = {id: nombramiento, archivo: res.data.archivo};
                    context.commit('SET_ARCHIVOS', payload);
                    resolve(res);
                })
                .catch(err => {
                    console.log(err);
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
    },
    storeMemoSinodales(context, payload) {
        return new Promise((resolve, reject) => {
            let {nombramiento} = payload;

            axios.post(route('api.v1.nombramientos.memo.sinodales.store', nombramiento))
                .then(res => {

                    let payload = {id: nombramiento, archivo: res.data.archivo};

                    context.commit('SET_ARCHIVOS', payload);
                    context.commit('UPDATE_ESTATUS', {id: nombramiento, status: 'E'});

                    resolve(res);
                })
                .catch(err => {
                    console.log(err);
                    reject(err.response.data);
                })
        });
    },
    storeNombramiento(context, payload) {
        return new Promise((resolve, reject) => {
            let {nombramiento, numero_oficio} = payload;
            axios.post(route('api.v1.nombramientos.generar.documento', nombramiento), {
                numero_oficio: numero_oficio
            })
                .then(res => {
                    let payload = {id: nombramiento, archivo: res.data.archivo};

                    context.commit('SET_ARCHIVOS', payload);
                    context.commit('UPDATE_ESTATUS', {id: nombramiento, status: 'C'});
                    context.commit('UPDATE_NUMERO_OFICIO', {id: nombramiento, numero_oficio});

                    resolve(res);
                })
                .catch(err => {
                    console.log(err);

                    reject(err);
                })
        })
    },
    storeJuramento(context, payload) {
        return new Promise((resolve, reject) => {
            axios.post(route('api.v1.nombramientos.juramentos.store', payload))
                .then(res => {
                    context.commit('SET_ARCHIVOS', {id: payload, archivo: res.data.archivo});
                    resolve(res);
                })
                .catch(err => {
                    console.log(err);
                    reject(err);
                })
        })
    }
}
