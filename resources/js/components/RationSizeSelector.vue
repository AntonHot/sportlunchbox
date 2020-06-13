<template>
    <div class="selector-bar">
        <div class="selector flex-center">800</div>
        <div class="selector flex-center">1000</div>
        <div class="selector flex-center active">1200</div>
        <div class="selector flex-center">1400</div>
        <div class="selector flex-center">1600</div>
        <div class="selector flex-center">1800</div>
        <div class="selector flex-center">2000</div>
    </div>
</template>

<style lang="scss" scoped>

    @import '../../sass/variables';
    @import '../../sass/style_lib';

    .selector-bar {
        display: flex;
        color: $gray6;
        margin-bottom: 2px;

        & .selector {
            flex: 1;
            height: 40px;
            background-color: $gray2;
            border: 1px solid $gray3;
            box-sizing: border-box;
            border-radius: 5px 5px 0px 0px;
            margin: 0 1px;

            font-family: Roboto;
            font-style: normal;
            font-weight: bold;
            font-size: 1.5rem;

            &:hover:not(.active) {
                background-color: $gray3;
            }
        }

        & .active {
            background: $blue2;
            border: 1px solid $blue3;
        }

    }

</style>