<template>
    <div class="meal">
        <div class="title">
            <span>Граноласйогуртомраноласйог уртомраноласйогуртомранола с йогуртомранола с йогуртомранола с йогуртомранола с йогуртомранола с йогуртомранола с йогуртомранола с йогуртомранола с йогуртомранола с йогуртомранола с йогуртомранола с йогуртом</span>
        </div>
        <div class="portion-selector">
            <div class="btn plus flex-center">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 10.5H10.5V15H7.5V10.5H3V7.5H7.5V3H10.5V7.5H15V10.5Z" fill="#F2F2F2"/>
                </svg>
            </div>
            <div class="input flex-center"><span>1.25</span></div>
            <div class="btn minus flex-center">
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 11.8125H5V9.1875H15V11.8125Z" fill="#F2F2F2"/>
                </svg>
            </div>
        </div>
    </div>
    
    <!-- Для пустых meal -->
    <!-- <div class="meal meal-empty flex-center">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M40 28H28V40H20V28H8V20H20V8H28V20H40V28Z"/>
        </svg>
    </div> -->
</template>

<style lang="scss" scoped>

    @import '../../sass/variables';
    @import '../../sass/style_lib';

    .meal {
        display: flex;
        border: 1px solid $blue2;
        box-sizing: border-box;
        border-radius: 2px;
        height: 70px;
        margin: 3px 0;

        &-empty svg {
            fill: $gray3;
            &:hover {
                fill: $gray4;
            }
        }

        & .title {
            flex: 1;
            padding: 8px;
            overflow: hidden;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            min-width: 147px;
            max-width: 280px;

            & span {
                max-height: 60px;
                font-size: 0.8rem;
                line-height: 0.9rem;
            }
        }

        & .portion-selector {
            width: 52px;
            border: 1px solid $blue2;
            display: flex;
            flex-direction: column;
            align-items: stretch;

            & div {
                flex: 1;
            }

            & .btn {
                background-color: $blue2;

                & svg {
                    opacity: 0.6;
                    &:hover {
                        opacity: 1;
                    }
                }
            }

            & .input {
                max-height: 28px;
                background-color: white;

                & span {
                    font-size: 1rem;
                    line-height: 1.1rem;
                    font-weight: 700;
                }
            }
        }
    }

</style>