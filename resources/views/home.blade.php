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
                        <v-layout
                            v-if="item.heading"
                            :key="item.heading"
                            row
                            align-center
                        >
                            <v-flex xs6>
                                <v-subheader v-if="item.heading">
                                    {{ item.heading }}
                                </v-subheader>
                            </v-flex>
                            <v-flex
                                xs6
                                class="text-xs-center"
                            >
                                <a
                                    href="#!"
                                    class="body-2 black--text"
                                >EDIT</a>
                            </v-flex>
                        </v-layout>
                        <v-list-group
                            v-else-if="item.children"
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
                                @click=""
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
                    style="width: 388px"
                    class="ml-0 pl-3"
                >
                    <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                    <span class="hidden-sm-and-down">
                        División de Estudios Profesionales
                    </span>
                </v-toolbar-title>
                <v-text-field
                    flat
                    solo-inverted
                    hide-details
                    prepend-inner-icon="mdi-magnify"
                    label="Search"
                    class="hidden-sm-and-down"
                ></v-text-field>
                <v-spacer></v-spacer>
                <v-btn icon>
                    <v-icon>mdi-apps</v-icon>
                </v-btn>
                <v-btn icon>
                    <v-icon>mdi-bell</v-icon>
                </v-btn>
                <v-btn
                    icon
                    large
                >
                    <v-avatar
                        size="32px"
                        item
                    >
                        <v-img
                            src="https://cdn.vuetifyjs.com/images/logos/logo.svg"
                            alt="Vuetify"
                        >
                        </v-img>
                    </v-avatar>
                </v-btn>
            </v-app-bar>
            <v-content>
                <router-view></router-view>
            </v-content>
            <v-btn
                bottom
                color="pink"
                dark
                fab
                fixed
                right
                @click="dialog = !dialog"
            >
                <v-icon>mdi-plus</v-icon>
            </v-btn>
        </v-app>
    @endverbatim
@endsection

@section('beforeScripts')
    <script type="text/javascript">
        window.user = {!! json_encode($user) !!};
        window.roles = {!! json_encode($roles) !!};
        window.api_token = {!! json_encode($apiToken) !!};
    </script>
@endsection
