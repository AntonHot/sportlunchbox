<template>
    <transition name="modal-fade">
        <div v-if="isShow" class="alert__overlay">
            <div class="alert__content" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDescription">
                <slot/>
                <div class="button-close" @click="$emit('close', false)">
                    <svg class="bi bi-x-square-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm9.854 4.854a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                    </svg>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    props: {
        isShow: {
            type: Boolean
        },
    },
    watch: {
        // disable body scroll when modal is opened
        value () {
            document.body.style.overflow = this.value ? 'hidden' : 'visible'
        }
    },
}
</script>

<style scoped lang="scss">
.alert {
    &__overlay {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 100;

    }

    &__content {
        position: relative;
        width: 100%;
        max-height: 95vh;
        max-width: 700px;
        background-color: white;

        & .button-close {
            position: absolute;
            right: 15px;
            top: 15px;
            opacity: 0.6;

            &:hover {
                opacity: 1;
            }
        }
    }
}

.modal-fade-enter,
.modal-fade-leave-active {
    opacity: 0
}

.modal-fade-enter-active,
.modal-fade-leave-active {
    transition: opacity .3s ease
}

</style>