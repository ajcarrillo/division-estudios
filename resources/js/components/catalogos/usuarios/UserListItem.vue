<template>
    <tr>
        <td>{{ item.name }}</td>
        <td>{{ item.email }}</td>
        <td>
            <template v-for="role in item.roles">
                <v-chip class="mr-4">{{ role.name }}</v-chip>
            </template>
        </td>
        <td></td>
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
