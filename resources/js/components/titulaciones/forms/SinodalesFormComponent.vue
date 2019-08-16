<template>
    <form @submit.prevent="submit" v-if="!loadingMaestros">
        <v-autocomplete
            :error-messages="errors.collect('presidente')"
            :items="maestros"
            autofocus
            data-vv-name="presidente"
            hide-selected
            item-text="nombre_completo"
            item-value="id"
            label="Presidente"
            prepend-icon="mdi-account-search"
            required
            return-object
            v-model="presidente"
            v-validate="'required'"
        ></v-autocomplete>
        <v-autocomplete
            :error-messages="errors.collect('secretario')"
            :items="maestros"
            data-vv-name="secretario"
            hide-selected
            item-text="nombre_completo"
            item-value="id"
            label="Secretario"
            prepend-icon="mdi-account-search"
            required
            return-object
            v-model="secretario"
            v-validate="'required'"
        ></v-autocomplete>
        <v-autocomplete
            :error-messages="errors.collect('vocal')"
            :items="maestros"
            data-vv-name="vocal"
            hide-selected
            item-text="nombre_completo"
            item-value="id"
            label="Vocal"
            prepend-icon="mdi-account-search"
            required
            return-object
            v-model="vocal"
            v-validate="'required'"
        ></v-autocomplete>
        <v-autocomplete
            :error-messages="errors.collect('vocalSuplente')"
            :items="maestros"
            class="pb-4"
            data-vv-name="vocalSuplente"
            hide-selected
            item-text="nombre_completo"
            item-value="id"
            label="Vocal suplente"
            prepend-icon="mdi-account-search"
            required
            return-object
            v-model="vocalSuplente"
            v-validate="'required'"
        ></v-autocomplete>

        <v-btn :loading="saving"
               @click="submit"
               class="mr-4"
               color="success"
        >
            Guardar
        </v-btn>
        <v-btn @click="clear" class="mr-4">Limpiar</v-btn>
        <v-btn
            @click="$router.push({name:'titulaciones-index'})"
            bottom
            color="blue darken-3"
            dark
            fab
            fixed
            right
        >
            <v-icon>mdi-arrow-left</v-icon>
        </v-btn>
    </form>
</template>

<script>
    export default {
        name: "SinodalesFormComponent",
        components: {},
        props: {
            sinodales: {
                type: Array,
                default: function () {
                    return []
                }
            },
            saving: {
                type: Boolean,
                required: true
            }
        },
        data() {
            return {
                loadingMaestros: true,
                draft: clone(this.sinodales),
                presidente: null,
                secretario: null,
                vocal: null,
                vocalSuplente: null,
                maestros: []
            }
        },
        mounted() {
            axios.get(route('api.v1.catalogos.maestros.index'))
                .then(res => {
                    this.maestros = res.data.items;
                    this.loadingMaestros = false;
                })
                .catch(err => {
                    console.log(err.response.data);
                })
        },
        methods: {
            submit() {
                this.$validator.validate()
                    .then(isValid => {
                        if (isValid) {
                            this.draft = [];
                            this.draft.push(this.presidente);
                            this.draft.push(this.secretario);
                            this.draft.push(this.vocal);
                            this.draft.push(this.vocalSuplente);

                            this.$emit('submit', this.draft);
                        } else {
                            console.log('no enviar form')
                        }
                    })
            },
            clear() {
                this.presidente = null;
                this.secretario = null;
                this.vocal = null;
                this.vocalSuplente = null;
                this.$validator.reset()
            }
        },
        watch: {},
        computed: {}
    }
</script>

<style scoped>

</style>
