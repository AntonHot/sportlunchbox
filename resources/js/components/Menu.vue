<template>
    <div class="menu-console">
        <div class="arrow arrow-left">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" /></svg>
        </div>
        <div class="console">
            <ration-size-selector></ration-size-selector>
            <div class="rations">
                <ration></ration>
                <ration></ration>
                <ration></ration>
                <ration></ration>
                <ration></ration>
            </div>
        </div>
        <div class="arrow arrow-right">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" /></svg>
        </div>
    </div>
</template>

<script>
import RationSizeSelector from './RationSizeSelector'
import Ration from './Ration'

export default {
    components: {
        RationSizeSelector,
        Ration
    },
}
</script>

<style lang="scss" scoped>

    @import '../../sass/variables';

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

</style>
