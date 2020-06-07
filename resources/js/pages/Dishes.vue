<template>
<div>
    <v-simple-table dense>
        <template v-slot:default>
        <thead>
            <tr>
                <th v-for="(value, field) in fields" :key="field" class="text-center">{{ value }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(dish, index) in dishes" :key="index" @click="openDishEditFormModal(constants.editMode.UPDATE, dish)">
                <td v-for="(value, field) in fields" :key="dish[field].id" class="text-center">{{ dish[field] }}</td>
            </tr>
            <tr @click="openDishEditFormModal(constants.editMode.ADD, {})">
                <td :colspan="Object.keys(fields).length" class="text-center">
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
                cost: 'Себестоимость',
                price: 'Цена',
                weight: 'Вес',
                step_of_portion: 'Порция',
                protein: 'Белки',
                fat: 'Жиры',
                carb: 'Углеводы',
                calories: 'Калории',
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
        async closeDishEditFormModal(dish, action) {
            this.isShowEditFormModal = false;
            if (Object.keys(dish).length !== 0) {
                switch (action) {
                    case constants.actions.ADD:
                        const response = await axios.post('/api/dishes', dish).catch(error => console.log(error));
                        break;
                    case constants.actions.UPDATE:
                        if (dish.id) {
                            const response = await axios.patch(`/api/dishes/${dish.id}`, dish).catch(error => console.log(error));
                        }
                        break;
                    case constants.actions.DELETE:
                        if (dish.id) {
                            const response = await axios.delete(`/api/dishes/${dish.id}`, dish).catch(error => console.log(error));
                        }
                        break;
                    default:
                        break;
                }
                this.loadDishes();
            }
        }
    }
}
</script>
