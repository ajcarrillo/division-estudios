<template>
    <v-simple-table>
        <thead>
            <tr>
                <th class="text-left">Jefatura</th>
                <th class="text-left">Responsable</th>
                <th class="text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="item in items">
                <departamentos-list-item :item="item"
                ></departamentos-list-item>
            </template>
        </tbody>
    </v-simple-table>
</template>

<script>
    import DepartamentosListItem from "./DepartamentosListItem";

    export default {
        name: "DepartamentosList",
        components: {
            DepartamentosListItem
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
