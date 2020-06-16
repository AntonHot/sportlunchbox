<template>
    <div class="ration">
        <div class="title flex-center">
            <div class="date unselectable">{{ normalizeDate }}</div>
            <div class="day unselectable">{{ weekday }}</div>
        </div>
        <div v-if="isEmpty" class="ration-full">
            <div class="meals">
                <meal v-for="(meal, index) in ration.meals" :key="index" :currentMeal="meal"></meal>
            </div>
            <div class="params">
                <div class="param flex-center">
                    <div class="param-title">Себестоимость</div>
                    <div class="param-value">{{ rationCost }}</div>
                </div>
                <div class="param flex-center">
                    <div class="param-title">Цена</div>
                    <div class="param-value">{{ rationPrice }}</div>
                </div>
                <div class="param flex-center">
                    <div class="param-title">Калории</div>
                    <div class="param-value">{{ rationCalories }}</div>
                </div>
                <div class="param param-bgu flex-center">
                    <div class="bgu-param flex-center">
                        <div class="param-title">Б</div>
                        <div class="sub-param-value">{{ rationProtein }}</div>
                    </div>
                    <div class="bgu-param flex-center">
                        <div class="param-title">Ж</div>
                        <div class="sub-param-value">{{ rationFat }}</div>
                    </div>
                    <div class="bgu-param flex-center">
                        <div class="param-title">У</div>
                        <div class="sub-param-value">{{ rationCarb }}</div>
                    </div>
                </div>
            </div>
            <v-btn class="btn-save" color="#2D9CDB" elevation="9" >Сохранить</v-btn>
        </div>
        <div v-else class="ration-empty">
            <div class="area-button-add flex-center">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 10.5H10.5V15H7.5V10.5H3V7.5H7.5V3H10.5V7.5H15V10.5Z" />
                </svg>
            </div>
            <v-btn class="btn-save" color="#EB5757" elevation="9" >Добавить меню</v-btn>
        </div>
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
        sumParams(paramName) {
            let value = 0;
            this.ration.meals.forEach((meal) => {
                value += meal.dish[paramName];
            });
            return value;
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
        },
        rationCost() {
            return this.sumParams('cost').toFixed(2);
        },
        rationPrice() {
            return this.sumParams('price').toFixed(2);
        },
        rationCalories() {
            return this.sumParams('calories');
        },
        rationProtein() {
            return this.sumParams('protein').toFixed(0);
        },
        rationFat() {
            return this.sumParams('fat').toFixed(0);
        },
        rationCarb() {
            return this.sumParams('carb').toFixed(0);
        },
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

        & .ration-empty {
            flex: 1;
            display: flex;
            flex-direction: column;

            & .area-button-add {
                background: $gray3;
                border: 1px solid $gray4;
                box-sizing: border-box;
                border-radius: 3px;
                flex: 1;

                & svg {
                    width: 54px;
                    height: 54px;
                    opacity: 0.6;

                    & path {
                        fill: $gray4;
                    }

                    &:hover {
                        opacity: 1;
                    }
                }
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