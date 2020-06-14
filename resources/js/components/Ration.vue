<template>
    <div class="ration">
        <div class="title flex-center">
            <div class="date unselectable">{{ normalizeDate }}</div>
            <div class="day unselectable">{{ weekday }}</div>
        </div> 
        <div v-if="isEmpty" class="meals">
            <meal v-for="(meal, index) in ration.meals" :key="index" :currentMeal="meal"></meal>
        </div>
        <div class="params">
            <div class="param flex-center">
                <div class="param-title">Себестоимость</div>
                <div class="param-value">{{ ration.params.cost }}</div>
            </div>
            <div class="param flex-center">
                <div class="param-title">Цена</div>
                <div class="param-value">{{ ration.params.price }}</div>
            </div>
            <div class="param flex-center">
                <div class="param-title">Калории</div>
                <div class="param-value">{{ ration.params.calories }}</div>
            </div>
            <div class="param param-bgu flex-center">
                <div class="bgu-param flex-center">
                    <div class="param-title">Б</div>
                    <div class="sub-param-value">{{ ration.params.protein }}</div>
                </div>
                <div class="bgu-param flex-center">
                    <div class="param-title">Ж</div>
                    <div class="sub-param-value">{{ ration.params.fat }}</div>
                </div>
                <div class="bgu-param flex-center">
                    <div class="param-title">У</div>
                    <div class="sub-param-value">{{ ration.params.carb }}</div>
                </div>
            </div>
        </div>
        <v-btn class="btn-save" color="#2D9CDB" elevation="9" >Сохранить</v-btn>
    </div>
</template>

<script>
import constants from '../constants.js'
import Meal from './Meal'

export default {
    components: {
        Meal
    },
    data: () => ({
        constants: constants,
        isEmpty: true,
        ration: {
            params: {
                cost: '',
            }
        },
    }),
    created() {
        this.load();
    },
    methods: {
        load() {
            this.ration = this.currentRation;
        },
    },
    props: {
        currentRation: {
            type: Object
        }
    },
    watch: {
        currentRation() {
            this.ration = this.currentRation;
        }
    },
    computed: {
        normalizeDate: function () {
            return constants.formatDate(this.ration.date);
        },
        weekday: function() {
            return constants.weekdayByDate(this.ration.date);
        }
    },
}
</script>

<style lang="scss" scoped>

    @import '../../sass/variables';
    @import '../../sass/style_lib';

    .ration {
        flex: 1;
        background: $gray2;
        border: 1px solid $gray3;
        box-sizing: border-box;
        border-radius: 5px;
        margin: 0 1px;
        color: $gray6;
        padding: 0 12px;
        max-width: 350px;

        display: flex;
        flex-direction: column;

        & .title {
            min-height: 60px;
            flex-direction: column;

            & .date {
                font-size: 1.5rem;
                font-weight: 700;
            }

            & .day {
                font-size: 0.9rem;
                font-weight: 700;
                line-height: 16px;
            }
        }
        
        & .params {
            display: flex;
            flex-wrap: wrap;
            user-select: none;

            & .param {
                flex: 1;
                min-width: 90px;
                min-height: 48px;
                margin: 1px;
                border: 1px solid $violet2;
                box-sizing: border-box;
                border-radius: 3px;

                display: flex;
                flex-direction: column;

                & .param-title {
                    font-size: 0.7rem;
                    line-height: 0.8rem;
                }

                & .param-value {
                    font-size: 1.2rem;
                    line-height: 1.5rem;
                    font-weight: 700;
                }

                & .sub-params {
                    display: flex;

                    & .sub-param-value {
                        font-size: 0.9rem;
                        line-height: 1.5rem;
                        font-weight: 700;
                        margin: 0 4px;
                    }
                }
            }

            & .param-bgu {
                flex-direction: row;

                & .bgu-param {
                    flex: 1;
                    flex-direction: column;

                    & .sub-param-value {
                        font-weight: 700;
                    }
                }
            }
        }

        & .btn-save {
            display: block;
            margin: 15px auto;
            color: $gray1;
        }
    }

</style>