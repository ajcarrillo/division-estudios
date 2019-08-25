<template>
    <tr>
        <td>{{ alumno.numero_control }}</td>
        <td>{{ alumno.nombre_completo }}</td>
        <td>{{ alumno.sexo }}</td>
        <td>{{ alumno.carrera.descripcion }}</td>
        <td>
            <v-btn @click="$router.push({name: 'catalogos-alumnos-editar', params:{id: alumno.id}})"
                   color="primary"
                   elevation="0"
                   fab
                   x-small
            >
                <v-icon size="16">mdi-pencil</v-icon>
            </v-btn>
        </td>
    </tr>
</template>

<script>
    export default {
        name: 'AlumnoListItem',
        components: {},
        props: {
            alumno: {
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
