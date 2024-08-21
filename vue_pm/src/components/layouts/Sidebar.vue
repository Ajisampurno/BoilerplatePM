<!-- src/components/Sidebar.vue -->
<template>
    <aside :class="{ 'sidebar': true, 'sidebar-open': isOpen }">
        <button class="sidebar-toggle" @click="toggleSidebar">☰</button>
        <div class="sidebar-content">
            <div class="sidebar-logo">
                <img src="@/assets/logo.png" alt="Logo" />
            </div>
            <router-link to="/dashboard" class="sidebar-item">Dashboard</router-link>
            <router-link to="/sales" class="sidebar-item">Sales</router-link>
            <a href="#" @click.prevent="handleLogout" class="sidebar-item">Logout</a>
        </div>
    </aside>
</template>

<script>
export default {
    name: 'Sidebar',
    data() {
        return {
            isOpen: false,
        };
    },
    methods: {
        toggleSidebar() {
            this.isOpen = !this.isOpen;
        },
        handleLogout() {
            if (confirm('Are you sure you want to logout?')) {
                localStorage.removeItem('token')
                this.$router.push('/login')
            }
        }
    },
};
</script>

<style scoped>
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 250px;
    background-color: #343a40;
    color: #fff;
    overflow-x: hidden;
    transition: transform 0.3s ease;
    transform: translateX(-100%);
}

.sidebar-open {
    transform: translateX(0);
}

.sidebar-toggle {
    position: absolute;
    top: 1rem;
    right: -2rem;
    background-color: #343a40;
    color: #fff;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 0.5rem;
}

.sidebar-content {
    margin-top: 2rem;
}

.sidebar-logo {
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
}

.sidebar-logo img {
    max-width: 80%;
    height: auto;
}

.sidebar-item {
    display: block;
    padding: 1rem;
    color: #fff;
    text-decoration: none;
    font-size: 1rem;
}

.sidebar-item:hover {
    background-color: #495057;
}

@media (min-width: 768px) {
    .sidebar {
        transform: translateX(0);
    }

    .sidebar-toggle {
        display: none;
    }
}
</style>
