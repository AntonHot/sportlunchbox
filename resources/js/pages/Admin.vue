<template>
    <v-card class="admin-panel" height="100vh" tile fixed>
        <!-- header -->
        <c-header></c-header>

        <!-- content -->
        <c-content></c-content>

        <!-- side -->
        <!-- <c-side></c-side> -->

        <!-- footer -->
        <!-- <c-footer></c-footer> -->
    </v-card>
</template>

<script>
import CHeader from '../components/Header'
import CContent from '../components/Content'
// import CSidebar from '../components/Sidebar'
// import CFooter from '../components/Footer'

export default {
    components: {
        CHeader,
        CContent,
        // CSidebar,
        // CFooter
    },
    data: () => ({

    })
};
</script>

<style lang="scss">

    .admin-panel {
        display: flex;
        flex-direction: column;
        align-items: stretch;
    }

</style>
