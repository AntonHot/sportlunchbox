<template>
<div>
    <v-simple-table dense>
        <template v-slot:default>
        <thead>
            <tr>
                <th v-for="(value, field) in fields" :key="field" class="text-left">{{ value }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(dish, index) in dishes" :key="index" @click="openDishEditFormModal(constants.EDIT_MODE_UPDATE, dish)">
                <td v-for="(value, field) in fields" :key="dish[field].id" class="text-left">{{ dish[field] }}</td>
            </tr>
            <tr @click="openDishEditFormModal(constants.EDIT_MODE_ADD, {})">
                <td :colspan="Object.keys(fields).length" class="text-left">
                    <v-icon block>add</v-icon>
                </td>
            </tr>
        </tbody>
        </template>
    </v-simple-table>
    <dish-edit-modal @closeModal="closeDishEditFormModal" :isShow="isShowEditFormModal" :selectedDish="selectDish" :mode="editMode"/>
</div>
</template>

<script>
import constants from '../constants.js'
import DishEditModal from '../components/DishEditModal'

export default {
    data: function() {
        return {
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
            dishes: [],
            selectDish: {},
            isShowEditFormModal: false,
            editMode: '',
            constants: constants
        }
    },
    components: {
        DishEditModal,
    },
    created() {
        this.loadDishes();
    },
    methods: {
        async loadDishes() {
            const response = await axios.get('/api/dishes').catch(error => console.log(error));
            this.dishes = response.data.data;
        },
        openDishEditFormModal(mode, dish) {
            this.selectDish = dish;
            this.editMode = mode;
            this.isShowEditFormModal = true;
        },
        closeDishEditFormModal(dish) {
            this.isShowEditFormModal = false;
            console.log(dish);

            // Add or update dish
            // const response = await axios.post('/api/dishes', this.dish).catch(error => console.log(error));
        }
    }
}
</script>