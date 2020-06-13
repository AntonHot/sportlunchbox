<template>
    <div class="ration">
        <div class="title flex-center">
            <div class="date">25.06.2020</div>
            <div class="day">Понедельник</div>
        </div>
        <div class="meals">
            <meal></meal>
            <meal></meal>
            <meal></meal>
            <meal></meal>
            <meal></meal>
            <meal></meal>
        </div>
        <div class="params">
            <div class="param flex-center">
                <div class="param-title">Себестоимость</div>
                <div class="param-value">999.99</div>
            </div>
            <div class="param flex-center">
                <div class="param-title">Цена</div>
                <div class="param-value">999.99</div>
            </div>
            <div class="param flex-center">
                <div class="param-title">Калории</div>
                <div class="param-value">1200</div>
            </div>
            <div class="param flex-center">
                <div class="param-title">БЖУ</div>
                <div class="sub-params">
                    <div class="sub-param-value">99.9</div>
                    <div class="sub-param-value">99.9</div>
                    <div class="sub-param-value">99.9</div>
                </div>
            </div>
        </div>
        <v-btn class="btn-save" color="#2D9CDB" elevation="9" >Сохранить</v-btn>
    </div>
</template>

<script>
import Meal from './Meal'

export default {
    components: {
        Meal
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

        display: flex;
        flex-direction: column;
        // justify-content: center;

        & .title {
            min-height: 60px;
            flex-direction: column;

            & .date {
                font-size: 1.5rem;
                font-weight: 100;
            }

            & .day {
                font-size: 0.9rem;
                font-weight: 700;
                line-height: 16px;
            }
        }

        & .meals {

        }
        
        & .params {
            display: flex;
            flex-wrap: wrap;

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
        }

        & .btn-save {
            display: block;
            margin: 15px auto;
            color: $gray1;
        }
    }

</style>