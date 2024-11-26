<template>
    <div>
        <h1>Tax Calculation Cars</h1>
        <TaxForm @update-total="updateTotal" />
        <TotalCost :total="total" />
    </div>
</template>

<script>
import TaxForm from './components/TaxForm.vue';
import TotalCost from './components/TotalCost.vue';

export default {
    data() {
        return { total: 0 };
    },
    components: { TaxForm, TotalCost },
    methods: {
        updateTotal(newTotal) {
            this.total = newTotal;
        },
    },
};
</script>
