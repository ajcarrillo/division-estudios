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
    /*current_page:1
    first_page_url:"http://divisionestudios.test/api/v1/nombramientos?page=1"
    from:1
    last_page:1
    last_page_url:"http://divisionestudios.test/api/v1/nombramientos?page=1"
    next_page_url:null
    path:"http://divisionestudios.test/api/v1/nombramientos"
    per_page:50
    prev_page_url:null
    to:18
    total:18*/
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
