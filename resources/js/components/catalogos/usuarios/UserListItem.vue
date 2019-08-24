<template>
    <tr>
        <td>{{ item.name }}</td>
        <td>{{ item.email }}</td>
        <td>
            <template v-for="role in item.roles">
                <v-chip class="mr-4">{{ role.name }}</v-chip>
            </template>
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
    export default {
        name: 'UserListItem',
        components: {},
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
