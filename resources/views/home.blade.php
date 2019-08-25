@extends('layouts.app')

@section('extra-meta')
    @auth
        <meta name="api-token" content="{{ Auth::user()->api_token }}">
    @endauth
@endsection

@section('content')
    @verbatim
        <v-app id="inspire">
            <v-navigation-drawer
                v-model="drawer"
                :clipped="$vuetify.breakpoint.lgAndUp"
                app
            >
                <v-list dense>
                    <template v-for="item in items">
                        <!-- Menu -->
                        <v-list-group
                            v-if="item.children"
                            v-role:any="item.roles"
                            :key="item.text"
                            v-model="item.model"
                            :prepend-icon="item.model ? item.icon : item['icon-alt']"
                            append-icon=""
                        >
                            <template v-slot:activator>
                                <v-list-item>
                                    <v-list-item-content>
                                        <v-list-item-title>
                                            {{ item.text }}
                                        </v-list-item-title>
                                    </v-list-item-content>
                                </v-list-item>
                            </template>
                            <v-list-item
                                v-for="(child, i) in item.children"
                                :key="i"
                                :to="child.link"
                                exact
                                @click=""
                                v-role:any="child.roles"
                            >
                                <v-list-item-action v-if="child.icon">
                                    <v-icon>{{ child.icon }}</v-icon>
                                </v-list-item-action>
                                <v-list-item-content>
                                    <v-list-item-title>
                                        {{ child.text }}
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list-group>

                        <v-list-item
                            v-else
                            :key="item.text"
                            :to="item.link"
                            @click=""
                            v-role:any="item.roles"
                        >
                            <v-list-item-action>
                                <v-icon>{{ item.icon }}</v-icon>
                            </v-list-item-action>
                            <v-list-item-content>
                                <v-list-item-title>
                                    {{ item.text }}
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                        <!-- Menu -->
                    </template>
                </v-list>
            </v-navigation-drawer>

            <v-app-bar
                :clipped-left="$vuetify.breakpoint.lgAndUp"
                app
                color="blue darken-3"
                dark
            >
                <v-toolbar-title
                    class="ml-0 pl-3"
                >
                    <span class="d-flex align-center">
                        <v-app-bar-nav-icon @click.stop="drawer = !drawer" class="mr-4"></v-app-bar-nav-icon>
                        <v-img
                            src="/img/logo.png"
                            alt="ITCh"
                            aspect-radio="1"
                            max-width="32"
                            class="mr-4"
                        ></v-img>
                        <span class="hidden-sm-and-down">
                            División de Estudios Profesionales
                        </span>
                    </span>
                </v-toolbar-title>
                <v-spacer></v-spacer>
                <v-menu v-if="user" offset-y>
                    <template v-slot:activator="{ on }">
                        <v-btn
                            text
                            v-on="on"
                        >
                            <span class="d-flex flex-column">
                                <span class="text-left">{{ user.name }}</span>
                                <span class="text-left">{{ roles[0] }}</span>
                            </span>
                            <v-icon right>mdi-menu-down</v-icon>
                        </v-btn>
                    </template>
                    <v-list>
                        <v-list-item @click="logout">
                            <v-list-item-title>Cerrar sesión</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>
            </v-app-bar>
            <v-content>
                <router-view></router-view>
            </v-content>
            <v-snackbar
                v-model="snackbar"
                :timeout="0"
                top
            >
                {{ snackbarText }}
                <v-btn
                    color="pink"
                    text
                    @click="closeSnackBar"
                >
                    Cerrar
                </v-btn>
            </v-snackbar>
        </v-app>
    @endverbatim
@endsection

@section('beforeScripts')
    <script type="text/javascript">
        window.user = {!! json_encode($user) !!};
        window.roles = {!! json_encode($roles) !!};
        window.api_token = {!! json_encode($apiToken) !!};
        window.opciones = {!! json_encode($opciones) !!};
    </script>
@endsection
