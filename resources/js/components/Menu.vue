<template>
    <div class="menu-console">
        <div class="arrow arrow-left" @click="changeDate()">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z"/></svg>
        </div>
        <div class="console">
            <div class="ration-size-selector-bar">
                <div v-for="(size, index) in sizes" :key="index" class="size-selector flex-center" 
                    :class="{ 'size-selector-active': size === state.size }"
                    @click="changeRationSize(size)">
                        {{ size }}
                </div>
            </div>
            <div class="rations">
                <ration v-for="ration in $store.getters.rationsCurrentWeek" :key="ration.id" :currentRation="ration"></ration>
                <!-- <ration-empty v-else :currentRation="ration"></ration-empty> -->
            </div>
        </div>
        <div class="arrow arrow-right" @click="changeDate()">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z"/></svg>
        </div>
    </div>
</template>

<script>
import constants from '../constants.js'
import Ration from './Ration'

export default {
    components: {
        Ration,
    },
    data: () => ({
        constants: constants,
        state: {
            size: '',
            rations: [],
        },
        sizes: [800, 1000, 1200, 1400, 1600, 1800, 2000],
    }),
    created() {
        this.load();
    },
    methods: {
        async load() {
            this.setDefaultState();
            this.$store.commit('setWeek');
            await this.$store.dispatch('getRations');
        },
        setDefaultState() {
            this.state.dateCurrent = window.moment().format(constants.DATE_FORMAT);
            this.state.size = 800;
        },
    },
}
</script>

<style lang="scss" scoped>

    @import '../../sass/variables';
    @import '../../sass/style_lib';

    .menu-console {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: row;

        & .arrow {
            width: 70px;
            display: flex;
            justify-content: center;
            align-items: center;

            & svg {
                width: 116px;
                height: 116px;
                fill: $gray4;
                opacity: 0.6;

                &:hover {
                    opacity: 1;
                }
            }
        }

        & .arrow-right {
            transform: matrix(-1, 0, 0, 1, 0, 0);
        }

        & .console {
            flex: 1;
            display: flex;
            flex-direction: column;

            .rations {
                flex: 1;
                display: flex;
                flex-direction: row;
            }
        }
    }

    .ration-size-selector-bar {
        display: flex;
        color: $gray6;
        margin-bottom: 2px;
        user-select: none;

        & .size-selector {
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

            &:hover:not(.size-selector-active) {
                background-color: $gray3;
            }
        }

        & .size-selector-active {
            background: $blue2;
            border: 1px solid $blue3;
        }
    }

</style>
