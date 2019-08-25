<template>
    <div class="text-center">
        <v-pagination
            :length="pagination.last_page"
            :total-visible="pagination.per_page"
            v-model="page"
        ></v-pagination>
    </div>
</template>

<script>
    import {mapActions, mapState} from 'vuex';

    export default {
        name: "PaginationComponent",
        components: {},
        props: {},
        data() {
            return {
                page: 1
            }
        },
        methods: {
            ...mapActions([
                'titulaciones/fetchTitulaciones'
            ])
        },
        watch: {
            page(value) {
                this.$emit('loading', true);
                const fetch = this['titulaciones/fetchTitulaciones'];
                fetch({page: value})
                    .then(res => {
                        this.$emit('loading', false);
                    })
                    .catch(err => {
                        console.log(err);
                        this.$emit('loading', false);
                    })
            }
        },
        computed: {
            ...mapState({
                pagination: state => state.titulaciones.pagination
            })
        }
    }
</script>

<style scoped>

</style>
