<template>
    <v-card>
        <router-link to="/users">Пользователи</router-link>
        <router-link to="/dishes">Блюда</router-link>
        <router-link to="/menu">Меню</router-link>
        <router-link to="/contacts">Контакты</router-link>
        <router-link to="/orders">Заказы</router-link>
    </v-card>
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
}
</script>

<style lang="scss" scoped>

</style>
