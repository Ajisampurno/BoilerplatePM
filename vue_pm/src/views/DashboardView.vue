<template>
    <div class="dashboard-container">
        <Navbar />
        <Sidebar />
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <PersonSales />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <Product />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <AnnualSales />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <MounthlySales />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AnnualSales from '@/components/charts/AnnualSales.vue';
import MounthlySales from '@/components/charts/MounthlySales.vue';
import PersonSales from '@/components/charts/PersonSales.vue';
import Navbar from '@/components/layouts/Navbar.vue';
import Sidebar from '@/components/layouts/Sidebar.vue';
import Product from '@/components/charts/Product.vue';

export default {
    name: 'DashboardView',
    components: {
        Navbar,
        Sidebar,
        MounthlySales,
        AnnualSales,
        PersonSales,
        Product
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
    /* Menambahkan radius pada card */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    /* Menambahkan shadow untuk tampilan yang lebih menarik */
}

@media (max-width: 768px) {
    .dashboard-content {
        margin-left: 0;
    }
}
</style>
