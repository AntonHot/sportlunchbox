<template>
    <div>
        <v-simple-table dense>
            <template v-slot:default>
            <thead>
                <tr>
                    <th class="text-left">{{ fields.name }}</th>
                    <th class="text-center">{{ fields.cost }}</th>
                    <th class="text-center">{{ fields.price }}</th>
                    <th class="text-center">{{ fields.weight }}</th>
                    <th class="text-center">{{ fields.step_of_portion }}</th>
                    <th class="text-center">{{ fields.protein }}</th>
                    <th class="text-center">{{ fields.fat }}</th>
                    <th class="text-center">{{ fields.carb }}</th>
                    <th class="text-center">{{ fields.calories }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(dish, index) in dishes" :key="index" @click="openDishEditFormModal(constants.editMode.UPDATE, dish)">
                    <td class="text-left">{{ dish.name }}</td>
                    <td class="text-center">{{ dish.cost }}</td>
                    <td class="text-center">{{ dish.price }}</td>
                    <td class="text-center">{{ dish.weight }}</td>
                    <td class="text-center">{{ dish.step_of_portion }}</td>
                    <td class="text-center">{{ dish.protein }}</td>
                    <td class="text-center">{{ dish.fat }}</td>
                    <td class="text-center">{{ dish.carb }}</td>
                    <td class="text-center">{{ dish.calories }}</td>
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
