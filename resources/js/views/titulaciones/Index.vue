<template>
    <v-container fluid>
        <v-row>
            <template v-for="item in titulaciones">
                <v-col cols="12" md="4" sm="6" xl="3">
                    <nombramiento-card :nombramiento="item"></nombramiento-card>
                </v-col>
            </template>
        </v-row>
    </v-container>
</template>

<script>
    import NombramientoCard from "../../components/titulaciones/NombramientoCardComponent";

    export default {
        name: "Index",
        components: {
            NombramientoCard
        },
        props: {},
        data() {
            return {
                loading: false,
            }
        },
        beforeRouteEnter(to, from, next) {
            next(vm => {
                vm.loading = true;
                vm.$store.dispatch('titulaciones/fetchTitulaciones')
                    .then(res => {
                        vm.loading = false;
                        next();
                    })
                    .catch(err => {
                        vm.loading = false;
                        next();
                    })
            })
        },
        beforeRouteUpdate(to, from, next) {
            this.loading = true;
            this.$store.dispatch('titulaciones/fetchTitulaciones')
                .then(res => {
                    this.loading = false;
                    next();
                })
                .catch(err => {
                    this.loading = false;
                    next();
                });
        },
        methods: {},
        watch: {},
        computed: {
            titulaciones() {
                return this.$store.getters['titulaciones/getTitulaciones']
            }
        }
    }
</script>

<style scoped>

</style>
