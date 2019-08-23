<template>
    <tr>
        <td>{{ item.clave}}</td>
        <td>{{ item.descripcion}}</td>
        <td>
            <template v-if="!isJefaturaNull">
                {{ item.jefe_departamento.jefatura}}
            </template>
            <template v-else>
                Sin especificar
            </template>
        </td>
        <td>
            <template v-if="!isJefaturaNull">
                {{ item.jefe_departamento.responsable.name}}
            </template>
            <template v-else>
                Sin especificar
            </template>
        </td>
        <td>
            <v-btn @click="editing = true"
                   color="primary"
                   depressed
                   small
                   text
            >
                <v-icon>mdi-pencil</v-icon>
            </v-btn>
            <edit-carrera :edit="editing"
                          :item="item"
                          @closeDialog="editing = false"
            ></edit-carrera>
        </td>
    </tr>
</template>

<script>
    import EditCarrera from './EditCarrera'

    export default {
        name: 'CarreraListItem',
        components: {
            EditCarrera
        },
        props: {
            item: {
                type: Object,
                require: true,
            }
        },
        data() {
            return {
                editing: false
            }
        },
        methods: {},
        watch: {},
        computed: {
            isJefaturaNull() {
                return this.item.jefe_departamento === null;
            },
        }
    }
</script>

<style scoped>

</style>
