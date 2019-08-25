<template>
    <tr>
        <td>{{ alumno.numero_control }}</td>
        <td>{{ alumno.nombre_completo }}</td>
        <td>{{ alumno.sexo }}</td>
        <td>{{ alumno.carrera.descripcion }}</td>
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
