<template>
    <div class="admin-panel">
        <v-card color="grey lighten-4" flat height="200px" tile>
            <v-toolbar dense>
                <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->
                <!-- <v-toolbar-title>Title</v-toolbar-title> -->
                <v-list>
                    <v-list-item>
                        <v-list-item-content>
                            <v-list-item-title><router-link to="/users">Пользователи</router-link></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>

                    <v-list-item>
                        <v-list-item-content>
                            <v-list-item-title><router-link to="/dishes">Меню</router-link></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>

                <!-- <v-spacer></v-spacer>

                <v-btn icon>
                    <v-icon>mdi-magnify</v-icon>
                </v-btn>

                <v-btn icon>
                    <v-icon>mdi-heart</v-icon>
                </v-btn>

                <v-btn icon>
                    <v-icon>mdi-dots-vertical</v-icon>
                </v-btn> -->
            </v-toolbar>
        </v-card>
        <v-footer height="auto" color="indigo" dark>
            <v-layout justify-center row wrap>
            <v-flex color="indigo" dark py-3 text-xs-center white--text xs12>
                &copy;2018 — <strong>Vuetify</strong>
            </v-flex>
            </v-layout>
        </v-footer>
    </div>
</template>

<script>
export default {
    data: () => ({
        menu: {
            users: 'Пользователи',
            dishes: 'Блюда',
            menu: 'Меню',
            contacts: 'Контакты',
            orders: 'Заказы',
        }
    })
};
</script>



//     <div>
//         <router-link to="/users">Пользователи</router-link>
//         <router-link to="/dishes">Блюда</router-link>
//         <router-link to="/menu">Меню</router-link>
//         <router-link to="/contacts">Контакты</router-link>
//         <router-link to="/orders">Заказы</router-link>
//     </div>
// </template>

// <script>
// export default {

// }
// </script>
