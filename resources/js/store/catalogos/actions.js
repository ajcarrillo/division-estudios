export default {
    fetchDepartamentos({commit}, payload) {
        return new Promise((resolve, reject) => {
            axios.get(route('api.v1.catalogos.departamentos.index'))
                .then(res => {
                    let payload = res.data.items;
                    commit('SET_DEPARTAMENTOS', payload);

                    resolve(res);
                })
                .catch(err => {
                    console.log(err);

                    reject(err);
                })
        })
    },
    storeDepartamento({commit}, payload) {
        return new Promise((resolve, reject) => {
            let {jefatura, responsable} = payload;
            let data = {jefatura, responsable_id: responsable.id};

            axios.post(route('api.v1.catalogos.departamentos.store'), data)
                .then(res => {
                    commit('ADD_DEPARTAMENTO', res.data.item);
                    resolve(res);
                })
                .catch(err => {
                    reject(err);
                })
        })
    },
    updateDepartamento({commit}, payload) {
        return new Promise((resolve, reject) => {
            let {id, draft} = payload;
            let params = {jefatura: draft.jefatura, responsable_id: draft.responsable.id};

            axios.patch(route('api.v1.catalogos.departamentos.update', id), params)
                .then(res => {
                    commit('UPDATE_DEPARTAMENTO', {id, item: res.data.item});
                    resolve(res);
                })
                .catch(err => {
                    reject(err);
                })
        })
    },
    deleteDepartamento({commit}, payload) {
        return new Promise((resolve, reject) => {
            axios.delete(route('api.v1.catalogos.departamentos.delete', payload))
                .then(res => {
                    commit('DELETE_DEPARTAMENTO', payload);

                    resolve(res);
                })
                .catch(err => {
                    console.log(err);

                    reject(res);
                })
        });
    },
    fetchUsuarios({commit}, payload) {
        return new Promise((resolve, reject) => {
            axios.get(route('api.v1.catalogos.usuarios.index'))
                .then(res => {
                    commit('SET_USERS', res.data.items);

                    resolve(res);
                })
                .catch(err => {
                    console.log(err);

                    reject(err);
                })
        })
    },
}
