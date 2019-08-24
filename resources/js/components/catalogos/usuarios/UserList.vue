<template>
    <v-simple-table>
        <thead>
            <tr>
                <th class="text-left">Nombre</th>
                <th class="text-left">Email</th>
                <th class="text-left">Roles</th>
                <th class="text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="item in items">
                <user-list-item :item="item"
                ></user-list-item>
            </template>
        </tbody>
    </v-simple-table>
</template>

<script>
    import UserListItem from './UserListItem'

    export default {
        name: 'UserList',
        components: {
            UserListItem
        },
        props: {
            items: {
                type: Array,
                default: () => ([]),
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
