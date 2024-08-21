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
                    text: 'Sales Distribution by Salesperson'
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
                const response = await http.get('/person-sales');
                const salesData = response.data;
                this.chartOptions = {
                    ...this.chartOptions,
                    labels: salesData.map(item => item.salesperson)
                };
                this.chartSeries = salesData.map(item => parseFloat(item.total_sales));
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
