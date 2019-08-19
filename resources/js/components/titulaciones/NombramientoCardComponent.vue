<template>
    <v-card>
        <v-card-actions>
            <v-chip :class="classStatus"
            >
                {{ statusText }}
            </v-chip>
            <v-spacer></v-spacer>
            <menu-nombramiento-card
                :nombramiento-id="draft.id"
                :sinodales="draft.sinodales"
                :status="status"
                :archivos="draft.archivos"
                @syncDraft="syncDraft"
            ></menu-nombramiento-card>
        </v-card-actions>
        <v-divider light></v-divider>
        <v-list-item three-line>
            <v-list-item-content>
                <v-list-item-title class="subtitle-1 font-weight-medium">{{ draft.alumno.nombre_completo }}</v-list-item-title>
                <v-list-item-subtitle>{{ draft.fecha|dateForHummans }}</v-list-item-subtitle>
                <v-list-item-subtitle>{{ `A las ${time} horas` }}</v-list-item-subtitle>
            </v-list-item-content>
        </v-list-item>

        <v-card-text class="py-0 text--primary">
            <v-row pb-3>
                <v-col cols="12">
                    <span class="font-weight-medium black--text">{{ draft.alumno.carrera.descripcion }}</span>
                </v-col>
            </v-row>
        </v-card-text>
        <v-card-text class="py-0" v-if="sinodales.length">
            <v-list
                :subheader="true"
            >
                <v-subheader class="px-0">SINODALES</v-subheader>
                <v-list-item
                    :key="i"
                    class="px-0"
                    v-for="(item, i) in sinodales"
                >
                    <v-list-item-content class="py-0">
                        <v-list-item-title>{{ item.maestro.nombre_completo }}</v-list-item-title>
                        <v-list-item-subtitle>{{ item.tipo }}</v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-card-text>
    </v-card>
</template>

<script>
    import MenuNombramientoCard from "./MenuNombramientoCardComponent";

    export default {
        name: "NombramientoCardComponent",
        components: {
            MenuNombramientoCard
        },
        props: {
            nombramiento: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                draft: this.nombramiento,
            }
        },
        methods: {
            syncDraft() {
                this.draft = this.nombramiento;
            }
        },
        watch: {},
        computed: {
            time() {
                return this.draft.horario.hora.slice(0, 5)
            },
            status() {
                return this.draft.estatus;
            },
            classStatus: function () {
                return {
                    'green white--text': this.status === 'C',
                    'grey lighten-1': this.status === 'P' || (this.status === 'E' && this.$laravel.hasRole('jefe-departamento')),
                    'warning white--text': (this.status === 'E' && this.$laravel.hasAnyRole('titulacion|division-estudios'))
                }
            },
            statusText() {
                switch (this.status) {
                    case 'E':
                        if (this.$laravel.hasAnyRole('titulacion|division-estudios')) {
                            return 'Enviado';
                        }
                        return 'Pendiente';
                    case 'P':
                        return 'Pendiente';
                    case 'C':
                        return 'Concluido';
                }
            },
            sinodales() {
                return this.draft.sinodales;
            },
            archivos() {
                return this.draft.archivos;
            }
        }
    }
</script>

<style scoped>

</style>
