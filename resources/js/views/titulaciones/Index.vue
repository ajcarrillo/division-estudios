<template>
    <v-container fluid style="min-height: 500px!important;">
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
        <v-overlay :value="overlay">
            <v-progress-circular indeterminate size="64"></v-progress-circular>
        </v-overlay>
    </v-container>
</template>

<script>
    import {mapState} from 'vuex';
    import NombramientoCard from "../../components/titulaciones/NombramientoCardComponent";
    import Pagination from "../../components/PaginationComponent";

    export default {
        name: "Index",
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
        beforeRouteEnter(to, from, next) {
            next(vm => {
                vm.loading = true;
                vm.overlay = true;
                vm.$store.dispatch('titulaciones/fetchTitulaciones', {page: 1})
                    .then(res => {
                        vm.loading = false;
                        vm.overlay = false;
                        next();
                    })
                    .catch(err => {
                        vm.loading = false;
                        vm.overlay = false;
                        next();
                    })
            })
        },
        beforeRouteUpdate(to, from, next) {
            this.loading = true;
            this.overlay = true;
            this.$store.dispatch('titulaciones/fetchTitulaciones', {page: 1})
                .then(res => {
                    this.loading = false;
                    this.overlay = false;
                    next();
                })
                .catch(err => {
                    this.loading = false;
                    this.overlay = false;
                    next();
                });
        },
        methods: {
            toggleLoading(toggle) {
                this.loading = toggle;
                this.overlay = toggle;
            },
        },
        watch: {},
        computed: {
            ...mapState({
                titulaciones: state => state.titulaciones.titulaciones
            })
        }
    }
</script>

<style scoped>

</style>
