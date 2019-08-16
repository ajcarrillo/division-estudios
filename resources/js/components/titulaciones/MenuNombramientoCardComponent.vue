<template>
    <v-menu bottom right transition="slide-y-transition">
        <template v-slot:activator="{ on }">
            <v-btn
                icon
                v-on="on"
                x-small
            >
                <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
        </template>
        <v-list>
            <v-list-item @click="" v-if="status === 'C'" v-role:any="'titulacion|division-estudios'">
                <v-list-item-title>Generar juramento</v-list-item-title>
            </v-list-item>
            <v-list-item @click="" v-if="status === 'C'" v-role:any="'titulacion|division-estudios'">
                <v-list-item-title>Generar acta</v-list-item-title>
            </v-list-item>
            <v-list-item @click="" v-role:any="'titulacion|division-estudios'">
                <v-list-item-title>Generar memo sinodales</v-list-item-title>
            </v-list-item>
            <v-list-item @click="" v-if="hasSinodales" v-role:any="'titulacion|division-estudios'">
                <v-list-item-title>Generar nombramiento</v-list-item-title>
            </v-list-item>
            <template v-if="hasSinodales">
                <v-list-item @click="">
                    <v-list-item-title>Mostrar sinodales</v-list-item-title>
                </v-list-item>
                <v-list-item @click="" v-if="status === 'E'" v-role:any="'jefe-departamento|division-estudios'">
                    <v-list-item-title>Modificar sinodales</v-list-item-title>
                </v-list-item>
            </template>
            <template v-else>
                <v-list-item @click="" v-if="status === 'E'" v-role:any="'jefe-departamento|division-estudios'">
                    <v-list-item-title>Agregar sinodales</v-list-item-title>
                </v-list-item>
            </template>
        </v-list>
    </v-menu>
</template>

<script>
    export default {
        name: "MenuNombramientoCardComponent",
        components: {},
        props: {
            nombramientoId: {
                type: Number,
                required: true
            },
            status: {
                type: String,
                required: true
            },
            sinodales: {
                type: Array,
                required: true,
                default: []
            },
        },
        data() {
            return {}
        },
        methods: {},
        watch: {},
        computed: {
            hasSinodales() {
                return this.sinodales.length
            },
        }
    }
</script>

<style scoped>

</style>
