<template>
    <v-sheet
        class="mx-auto py-4"
    >
        <v-slide-group multiple show-arrows>
            <v-slide-item
                :key="item.id"
                v-for="item in files"
                v-slot:default="{ active, toggle }"
            >
                <v-btn
                    :input-value="active"
                    @click="toggle"
                    class="mx-2"
                    color="primary"
                    rounded
                    small
                >
                    <v-icon left>mdi-file-download</v-icon>
                    {{ item.documento }}
                </v-btn>
            </v-slide-item>
        </v-slide-group>
    </v-sheet>
</template>

<script>
    export default {
        name: "SlideFilesComponent",
        components: {},
        props: {
            archivos: {
                type: Array,
                required: true,
                default: function () {
                    return []
                }
            }
        },
        data() {
            return {}
        },
        methods: {},
        watch: {},
        computed: {
            files() {
                if (this.$laravel.hasRole('jefe-departamento')) {
                    return this.archivos.filter(archivo => archivo.documento === 'NOMBRAMIENTO');
                } else {
                    return this.archivos.filter(archivo => archivo.documento !== 'NOMBRAMIENTO');
                }
            }
        }
    }
</script>

<style scoped>

</style>
