<template>
    <tr>
        <td>{{ item.name }}</td>
        <td>{{ item.email }}</td>
        <td>
            <user-roles-col :roles="item.roles"></user-roles-col>
        </td>
        <td>
            <v-btn @click="$router.push({name: 'catalogos-usuarios-editar', params:{id: item.id}})"
                   color="primary"
                   elevation="0"
                   fab
                   x-small
            >
                <v-icon>mdi-pencil</v-icon>
            </v-btn>
        </td>
    </tr>
</template>

<script>
    import UserRolesCol from './UserRolesCol'

    export default {
        name: 'UserListItem',
        components: {
            UserRolesCol
        },
        props: {
            item: {
                type: Object,
                required: true
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
