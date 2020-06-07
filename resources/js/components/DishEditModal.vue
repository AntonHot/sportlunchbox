<template>
    <v-dialog :value="isShow" max-width="60vw" @input="close()">
        <v-card v-if="mode === constants.EDIT_MODE_ADD" class="pa-10">
            <h2>Добавление блюда</h2>
            <v-text-field v-for="(attr, key) in dish" :key="key" :label="key" outlined dense v-model="dish[key]"></v-text-field>
            <v-btn color="primary" elevation="9" @click="add">Добавить</v-btn>
        </v-card>
        <v-card v-else-if="mode === constants.EDIT_MODE_UPDATE" class="pa-10">
            <h2>Редактирование блюда</h2>
            <v-text-field v-for="(attr, key) in dish" :key="key" :label="key" outlined dense v-model="dish[key]"></v-text-field>
            <v-btn color="primary" elevation="9" @click="update">Обновить</v-btn>
        </v-card>
    </v-dialog>
</template>

<script>
import constants from '../constants.js'

export default {
    data: () => ({
        constants: constants,
        dish: {
            name: '',
            weight: '',
            cost: '',
            price: '',
            step_of_portion: '',
            protein: '',
            fat: '',
            carb: '',
            calories: '',
        },
    }),
    watch: {
        selectedDish() {
            const keys = Object.keys(this.dish);
            for (const key of keys) {
                if (this.mode === constants.EDIT_MODE_UPDATE) {
                    this.dish[key] = this.selectedDish[key];
                } else if (this.mode === constants.EDIT_MODE_ADD) {
                    this.dish[key] = '';
                }
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
        close() {
            this.$emit('closeModal', false);
        },
        async add() {
            console.log(this.dish);
            // const response = await axios.post('/api/dishes', this.dish).catch(error => console.log(error));
            this.close();
        },
        update() {
            console.log(this.dish);
            this.close();
        }
    }
}
</script>

<style lang="scss">

</style>