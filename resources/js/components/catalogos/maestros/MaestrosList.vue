<template>
    <v-simple-table>
        <thead>
            <tr>
                <th class="text-left">Nombre</th>
                <th class="text-left">Especialidad</th>
                <th class="text-left">Cédula</th>
                <th class="text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="item in items">
                <maestro-list-item :item="item"
                ></maestro-list-item>
            </template>
        </tbody>
    </v-simple-table>
</template>

<script>
    import MaestroListItem from './MaestroListItem';

    export default {
        name: 'MaestrosList',
        components: {
            MaestroListItem,
        },
        props: {
            items: {
                type: Array,
                required: true,
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
