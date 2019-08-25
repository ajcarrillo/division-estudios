<template>
    <v-container fluid style="min-height: 500px!important;">
        <template v-if="lengthNombramientos">
            <v-row v-if="!loading">
                <template v-for="item in titulaciones">
                    <v-col cols="12" md="4" sm="6" xl="3">
                        <nombramiento-card :nombramiento="item"></nombramiento-card>
                    </v-col>
                </template>
            </v-row>
            <v-row>
                <v-col cols="12">
                    <pagination @loading="toggleLoading"></pagination>
                </v-col>
            </v-row>
        </template>
        <template v-else>
            <v-row>
                <v-col cols="12">
                    No existen titulaciones
                </v-col>
            </v-row>
        </template>
        <v-overlay :value="overlay">
            <v-progress-circular indeterminate size="64"></v-progress-circular>
        </v-overlay>
    </v-container>
</template>

<script>
    import {mapActions, mapGetters, mapState} from 'vuex';
    import NombramientoCard from '../../components/titulaciones/NombramientoCardComponent';
    import Pagination from '../../components/PaginationComponent';

    export default {
        name: 'Index',
        components: {
            Pagination,
            NombramientoCard
        },
        props: {},
        data() {
            return {
                loading: false,
                overlay: false,
            }
        },
        created() {
            this.loading = true
            this.overlay = true
            this['titulaciones/fetchTitulaciones']({page: 1})
                .then(res => {
                    this.loading = false;
                    this.overlay = false;
                })
                .catch(err => {
                    this.loading = false;
                    this.overlay = false;
                })
        },
        methods: {
            toggleLoading(toggle) {
                this.loading = toggle;
                this.overlay = toggle;
            },
            ...mapActions([
                'titulaciones/fetchTitulaciones'
            ]),
            ...mapGetters([
                'titulaciones/lengthNombramientos'
            ])
        },
        watch: {},
        computed: {
            lengthNombramientos() {
                return this['titulaciones/lengthNombramientos']()
            },
            ...mapState({
                titulaciones: state => state.titulaciones.titulaciones
            })
        }
    }
</script>

<style scoped>

</style>
