<template>
    <v-dialog :value="isShow" max-width="60vw" @input="close()">
        <v-card class="pa-10">
            <v-form>
                <v-container>
                    <v-row>
                        <v-col col="12" md="12">
                            <v-text-field :label="fields.name" outlined dense v-model="dish.name" hide-details autocomplete="off"></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="12" md="3">
                            <v-text-field :label="fields.cost" outlined dense v-model="dish.cost" hide-details autocomplete="off"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3">
                            <v-text-field :label="fields.price" outlined dense v-model="dish.price" hide-details autocomplete="off"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3">
                            <v-text-field :label="fields.weight" outlined dense v-model="dish.weight" hide-details autocomplete="off"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3">
                            <v-text-field :label="fields.step_of_portion" outlined dense v-model="dish.step_of_portion" hide-details autocomplete="off"></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="12" md="3">
                            <v-text-field :label="fields.protein" outlined dense v-model="dish.protein" hide-details autocomplete="off"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3">
                            <v-text-field :label="fields.fat" outlined dense v-model="dish.fat" hide-details autocomplete="off"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3">
                            <v-text-field :label="fields.carb" outlined dense v-model="dish.carb" hide-details autocomplete="off"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3">
                            <v-text-field :label="fields.calories" outlined dense v-model="dish.calories" hide-details autocomplete="off"></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row class="button-row">
                        <v-btn v-if="mode === constants.editMode.ADD" color="success" elevation="9" @click="add">Добавить</v-btn>
                        <v-btn v-if="mode === constants.editMode.UPDATE" color="primary" elevation="9" @click="update">Обновить</v-btn>
                        <v-btn v-if="mode === constants.editMode.UPDATE" color="error" elevation="9" @click="destroy">Удалить</v-btn>
                    </v-row>
                </v-container>
            </v-form>
        </v-card>
    </v-dialog>
</template>

<script>
import constants from '../constants.js'

export default {
    data: () => ({
        constants: constants,
        dish: {
            id: '',
            name: '',
            weight: '',
            cost: '',
            price: '',
            protein: '',
            fat: '',
            carb: '',
            calories: '',
            step_of_portion: '',
        },
        fields: {
            name: 'Название',
            weight: 'Вес',
            cost: 'Себестоимость',
            price: 'Цена',
            protein: 'Белки',
            fat: 'Жиры',
            carb: 'Углеводы',
            calories: 'Калории',
            step_of_portion: 'Порция',
        },
    }),
    watch: {
        selectedDish() {
            for (const key of Object.keys(this.dish)) {
                this.dish[key] = this.selectedDish[key];
            }
        }
    },
    props: {
        isShow: {
            type: Boolean,
            default: false
        },
        mode: {
            type: String,
            default: 'update'
        },
        selectedDish: {
            type: Object
        }
    },
    methods: {
        close(dish = {}, action = null) {
            this.$emit('closeModal', dish, action);
        },
        add() {
            this.close(this.dish, constants.actions.ADD);
        },
        update() {
            this.close(this.dish, constants.actions.UPDATE);
        },
        destroy() {
            this.close(this.dish, constants.actions.DELETE);
        }
    }
}
</script>

<style lang="scss">
    .button-row {
        display: flex;
        justify-content: center;
        align-items: center;

        & button {
            margin: 0 3px;
        }
    }
</style>
