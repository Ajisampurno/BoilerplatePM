<template>
    <div>
        <apexchart type="line" :options="chartOptions" :series="chartSeries" />
    </div>
</template>

<script>
import http from '@/plugins/axios';
import VueApexCharts from 'vue3-apexcharts';

export default {
    name: 'AnnualSales',
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
                    text: 'Annual Sales'
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        endingShape: 'rounded'
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['#77B6EA', '#545454']
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
                const response = await http.get('/annual-sales');
                const salesData = response.data;

                // Memperbarui kategori (tahun) dan data penjualan pada chartOptions dan chartSeries
                this.chartOptions = {
                    ...this.chartOptions,
                    xaxis: {
                        categories: salesData.map(item => item.year)
                    }
                };
                this.chartSeries = [{
                    name: 'Sales',
                    data: salesData.map(item => item.total_sales)
                }];
            } catch (error) {
                console.error('Failed to fetch annual sales data', error);
            }
        }
    }
};
</script>
