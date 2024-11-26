<template>
    <form @submit.prevent="calculate">
        <input v-model="basePrice" type="number" placeholder="Base Price" />
        <select v-model="vehicleType">
            <option value="common">Common</option>
            <option value="luxury">Luxury</option>
        </select>
        <button type="submit">Calculate</button>
    </form>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return { basePrice: '', vehicleType: 'common' };
    },
    methods: {
    async calculate() {
        try {
            const response = await axios({
                baseURL: 'http://localhost:8081',
                url: '/api/calculate',
                method: 'POST',
                data: {
                    basePrice: this.basePrice,
                    vehicleType: this.vehicleType,
                },
            });

            this.$emit('update-total', response.data.total); // Maneja la respuesta
        } catch (error) {
            console.error('Error al calcular:', error.response || error.message);
        }
    },
},

};
</script>
