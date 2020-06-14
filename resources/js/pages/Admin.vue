<template>
    <div class="admin-panel unselectable">
        <div class="header">
            <img class="logo" src="/img/logo.png" alt="">
            <div class="navbar">
                <router-link class="flex-center" to="/admin">Меню</router-link>
                <router-link class="flex-center" to="/admin">Пользователи</router-link>
            </div>
            <div class="account flex-center">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5C13.66,5 15,6.34 15,8C15,9.66 13.66,11 12,11C10.34,11 9,9.66 9,8C9,6.34 10.34,5 12,5M12,2C6.48,2 2,6.48 2,12C2,17.52 6.48,22 12,22C17.52,22 22,17.52 22,12C22,6.47 17.5,2 12,2Z" /></svg>
            </div>
        </div>
        <div class="content">
            <router-view></router-view>
        </div>
        <div class="footer"></div>
    </div>
</template>

<script>
export default {
    data: () => ({

    })
};
</script>

<style lang="scss" scoped>

    @import '../../sass/variables';
    @import '../../sass/style_lib';

    .admin-panel {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        background-color: $gray1;

        & .header,
        & .footer {
            height: 70px;
            width: 100%;
            background-color: $gray6;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }

        & .header {
            display: flex;

            & .logo {
                width: 285px;
                height: 46px;
                margin: 12px 20px;
            }

            & .navbar {
                display: flex;
                flex: 1;

                & a {
                    color: $gray1;
                    text-decoration: none;
                    font-weight: 700;
                    padding: 0 30px;
                }
            }

            & .account {
                padding: 0 15px;
                & svg {
                    width: 54px;
                    height: 54px;
                    fill: $gray3;
                }
            }
        }

        & .content {
            flex: 1;
            margin: 56px 0;
        }
    }

</style>
