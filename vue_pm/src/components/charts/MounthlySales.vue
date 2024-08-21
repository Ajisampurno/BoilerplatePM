<template>
    <div>
        <apexchart type="line" :options="chartOptions" :series="chartSeries" />
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
                    type: 'line'
                },
                xaxis: {
                    categories: []
                },
                title: {
                    text: 'Monthly Sales'
                },
                stroke: {
                    curve: 'smooth'
                }
            },
            chartSeries: [{
                name: 'Sales',
                data: []
            }]
        };
    },
    mounted() {
        this.fetchSalesData();
    },
    methods: {
        async fetchSalesData() {
            try {
                const response = await http.get('/monthly-sales');
                const salesData = response.data;
                this.chartOptions = {
                    ...this.chartOptions,
                    xaxis: {
                        categories: salesData.map(item => item.month)
                    }
                };
                this.chartSeries[0].data = salesData.map(item => item.total_sales);
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
