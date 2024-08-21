<template>
    <div>
        <apexchart type="donut" :options="chartOptions" :series="chartSeries" />
    </div>
</template>

<script>
import http from '@/plugins/axios';
import VueApexCharts from 'vue3-apexcharts';

export default {
    name: 'SalesChart',
    components: {
        apexchart: VueApexCharts
    },
    data() {
        return {
            chartOptions: {
                chart: {
                    type: 'donut'
                },
                labels: [],
                title: {
                    text: 'Product percentage'
                }
            },
            chartSeries: []
        };
    },
    mounted() {
        this.fetchSalesData();
    },
    methods: {
        async fetchSalesData() {
            try {
                const response = await http.get('/products');
                const salesData = response.data;
                this.chartOptions = {
                    ...this.chartOptions, // Tetap mempertahankan properti lain dalam chartOptions
                    labels: salesData.map(item => item.name)
                };
                this.chartSeries = salesData.map(item => parseFloat(item.qty));
            } catch (error) {
                console.error('Failed to fetch sales data', error);
            }
        }
    }
};
</script>

<style scoped>
/* Add styles if needed */
</style>
