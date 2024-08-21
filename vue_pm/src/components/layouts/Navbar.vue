<!-- src/components/Navbar.vue -->
<template>
    <nav class="navbar">
        <div class="navbar-brand">
            <img src="@/assets/logo.png" alt="Logo" class="navbar-logo" />
        </div>
        <div class="navbar-menu">
            <router-link to="/dashboard" class="navbar-item">Dashboard</router-link>
            <router-link to="/sales" class="navbar-item">Sales</router-link>
            <a href="#" @click.prevent="handleLogout" class="navbar-item">Logout</a>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'Navbar',
    methods: {
        handleLogout() {
            if (confirm('Are you sure you want to logout?')) {
                localStorage.removeItem('token');
                this.$router.push('/login');
            }
        }
    }
};
</script>

<style scoped>
.navbar {
    display: flex;
    align-items: center;
    padding: 1rem 2rem;
    background-color: #007bff;
    color: #fff;
}

.navbar-brand {
    display: flex;
    align-items: center;
    margin-right: auto;
    /* Pushes the menu to the right */
}

.navbar-logo {
    height: 40px;
    /* Adjust the height as needed */
    width: auto;
}

.navbar-menu {
    display: flex;
    gap: 1rem;
}

.navbar-item {
    color: #fff;
    text-decoration: none;
}

.navbar-item:hover {
    text-decoration: underline;
}
</style>
