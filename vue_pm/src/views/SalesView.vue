<template>
    <div class="dashboard-container">
        <Navbar />
        <Sidebar />
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th> <!-- Kolom nomor baris -->
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(sale, index) in paginatedSalesData" :key="sale.id">
                                        <td>{{ (page - 1) * pageSize + index + 1 }}</td> <!-- Nomor baris -->
                                        <td>{{ sale.sales_date }}</td>
                                        <td>{{ sale.name }}</td>
                                        <td>{{ sale.sales_amount }}</td>
                                    </tr>
                                    <tr v-if="salesData.length === 0">
                                        <td colspan="4" class="text-center">No data available</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="pagination">
                                <button @click="changePage(page - 1)" :disabled="page === 1">Previous
                                </button>
                                <span>Page {{ page }} of {{ totalPages }}</span>
                                <button @click="changePage(page + 1)" :disabled="page === totalPages">Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import http from '@/plugins/axios';
import Navbar from '@/components/layouts/Navbar.vue';
import Sidebar from '@/components/layouts/Sidebar.vue';

export default {
    name: 'SalesView',
    components: {
        Navbar,
        Sidebar
    },
    data() {
        return {
            salesData: [],
            page: 1,
            pageSize: 10
        };
    },
    computed: {
        paginatedSalesData() {
            const start = (this.page - 1) * this.pageSize;
            const end = start + this.pageSize;
            return this.salesData.slice(start, end);
        },
        totalPages() {
            return Math.ceil(this.salesData.length / this.pageSize);
        }
    },
    mounted() {
        this.fetchSalesData();
    },
    methods: {
        async fetchSalesData() {
            try {
                const response = await http.get('/sales');
                this.salesData = response.data;
            } catch (error) {
                console.error('Error fetching sales data:', error);
            }
        },
        changePage(newPage) {
            if (newPage >= 1 && newPage <= this.totalPages) {
                this.page = newPage;
            }
        }
    }
};
</script>
<style scoped>
.dashboard-container {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-color: #e0e0e0;
}

.dashboard-content {
    margin-left: 250px;
    padding: 2rem;
    flex: 1;
}

.card {
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.table {
    margin-top: 1rem;
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
}

.table th,
.table td {
    text-align: center;
}

.pagination {
    margin-top: 1rem;
    text-align: center;
}

.pagination button {
    margin: 0 0.5rem;
}

@media (max-width: 768px) {
    .dashboard-content {
        margin-left: 0;
    }
}
</style>
