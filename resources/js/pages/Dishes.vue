<template>
  <div>
    <h2>Блюда</h2>
    <table class="table table-sm table-hover">
        <thead>
            <tr class="text-center">
                <th class="text-left" scope="col">Название</th>
                <th scope="col">Вес</th>
                <th scope="col">Себестоимость</th>
                <th scope="col">Цена</th>
                <th scope="col">Белки</th>
                <th scope="col">Жиры</th>
                <th scope="col">Углеводы</th>
                <th scope="col">Ккал</th>
                <th scope="col">Шаг порции</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="dish in dishes" :key="dish.id" class="text-center" scope="row" @click="openModalUpdate(dish)">
                <td class="text-left">{{ dish.name }}</td>
                <td>{{ dish.weight }}</td>
                <td>{{ dish.cost }}</td>
                <td>{{ dish.price }}</td>
                <td>{{ dish.protein }}</td>
                <td>{{ dish.fat }}</td>
                <td>{{ dish.carb }}</td>
                <td>{{ dish.calories }}</td>
                <td>{{ dish.step_of_portion }}</td>
            </tr>
            <tr>
                <td colspan="9">
                    <v-btn color="primary" block @click="openModalAdd"><v-icon>add</v-icon></v-btn>
                </td>
            </tr>
        </tbody>
    </table>
    <dishes-modal-add @closeModal="isShowAddModal = false" :isShow="isShowAddModal" :selectedDish="selectDish" :mode="mode"/>
</div>
</template>

<script>
import DishesModalAdd from "../components/DishesModalAdd"

export default {
    data: () => ({
        dishes: [],
        selectDish: {},
        isShowAddModal: false,
        mode: null
    }),
    components: {
        DishesModalAdd
    },
    created() {
        this.loadDish();
    },
    methods: {
        async loadDish() {
            const response = await axios.get('/api/dishes').catch(error => console.log(error));
            this.dishes = response.data.data;
        },
        openModalUpdate(dish) {
            this.mode = 'update';
            this.selectDish = dish;
            this.isShowAddModal = true;
        },
        openModalAdd() {
            this.mode = 'add';
            this.selectDish = {};
            this.isShowAddModal = true;
        },
    }
}
</script>

<style lang="scss" scoped>

</style>