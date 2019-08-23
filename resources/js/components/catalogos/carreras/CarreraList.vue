<template>
    <v-simple-table>
        <thead>
            <tr>
                <th class="text-left">Clave</th>
                <th class="text-left">Carrera</th>
                <th class="text-left">Departamento</th>
                <th class="text-left">Responsable</th>
                <th class="text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="item in items">
                <carrera-list-item :item="item"
                ></carrera-list-item>
            </template>
        </tbody>
    </v-simple-table>
</template>

<script>
    import CarreraListItem from './CarreraListItem'

    export default {
        name: 'CarreraList',
        components: {
            CarreraListItem
        },
        props: {
            items: {
                type: Array,
                default: () => ([])
            }
        },
        data() {
            return {}
        },
        methods: {},
        watch: {},
        computed: {}
    }
</script>

<style scoped>

</style>
