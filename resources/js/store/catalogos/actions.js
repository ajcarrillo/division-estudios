export default {
    //Departamentos
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

    //Usuarios
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
    storeUsuarios({commit}, payload) {
        return new Promise((resolve, reject) => {
            axios.post(route('api.v1.catalogos.usuarios.store'), payload)
                .then(res => {
                    commit('ADD_USERS', res.data.item);
                    resolve(res)
                })
                .catch(err => {
                    console.log(err)
                    reject(err)
                })
        });
    },
    updateUsuarios({commit}, payload) {
        return new Promise((resolve, reject) => {
            axios.patch(route('api.v1.catalogos.usuarios.update', payload.id), payload)
                .then(res => {
                    commit('UPDATE_USERS', res.data.item);
                    resolve(res)
                })
                .catch(err => {
                    console.log(err)
                    reject(err)
                })
        });
    },
    removeUserRole({commit}, payload) {
        return new Promise((resolve, reject) => {

            let {user, role} = payload

            axios.delete(route('api.v1.catalogos.usuarios.remove.role', user), {
                data: {
                    role: role
                }
            })
                .then(res => {
                    commit('REMOVE_USER_ROLE', payload);
                    resolve(res)
                })
                .catch(err => {
                    console.log(err)
                    reject(err)
                })
        });
    },

    //Maestros
    fetchMaestros({commit}, payload) {
        return new Promise((resolve, reject) => {

            axios.get(route('api.v1.catalogos.maestros.index'), {
                params: payload
            })
                .then(res => {
                    commit('SET_MAESTROS', res.data.items.data)
                    commit('SET_PAGINATION', res.data.items)
                    resolve(res)
                })
                .catch(err => {
                    console.log(err)
                    reject(err)
                })
        });
    },
    storeMaestros({commit}, payload) {
        return new Promise((resolve, reject) => {
            axios.post(route('api.v1.catalogos.maestros.store'), payload)
                .then(res => {
                    commit('ADD_MAESTROS', res.data.item)
                    resolve(res)
                })
                .catch(err => {
                    console.log(err)
                    reject(err)
                })
        });
    },
    updateMaestros({commit}, payload) {
        return new Promise((resolve, reject) => {
            let {id, draft} = payload;

            axios.patch(route('api.v1.catalogos.maestros.update', id), draft)
                .then(res => {
                    commit('UPDATE_MAESTROS', {id, item: res.data.item});
                    resolve(res)
                })
                .catch(err => {
                    console.log(err)
                    reject(err)
                })
        });
    },
    deleteMaestros({commit}, payload) {
        return new Promise((resolve, reject) => {
            axios.delete(route('api.v1.catalogos.maestros.delete', payload))
                .then(res => {
                    commit('DELETE_MAESTROS', payload);
                    resolve(res)
                })
                .catch(err => {
                    console.log(err)
                    reject(err)
                })
        });
    },

    //Carreras
    fetchCarreras({commit}, payload) {
        return new Promise((resolve, reject) => {
            axios.get(route('api.v1.catalogos.carreras.index'))
                .then(res => {
                    commit('SET_CARRERAS', res.data.items);
                    resolve(res)
                })
                .catch(err => {
                    console.log(err)
                    reject(err)
                })
        });
    },
    storeCarreras({commit}, payload) {
        return new Promise((resolve, reject) => {
            axios.post(route('api.v1.catalogos.carreras.store'), payload)
                .then(res => {
                    commit('ADD_CARRERA', res.data.item);
                    resolve(res)
                })
                .catch(err => {
                    console.log(err)
                    reject(err)
                })
        });
    },
    updateCarrera({commit}, payload) {
        return new Promise((resolve, reject) => {
            let {id, item} = payload;
            axios.patch(route('api.v1.catalogos.carreras.update', id), item)
                .then(res => {
                    commit('UPDATE_CARRERAS', {id, item: res.data.item});
                    resolve(res)
                })
                .catch(err => {
                    console.log(err)
                    reject(err)
                })
        });
    },
    deleteCarrera({commit}, payload) {
        return new Promise((resolve, reject) => {
            axios.delete(route('api.v1.catalogos.carreras.delete', payload))
                .then(res => {
                    commit('DELETE_CARRERA', payload);
                    resolve(res)
                })
                .catch(err => {
                    console.log(err)
                    reject(err)
                })
        });
    }
}
