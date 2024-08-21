<template>
    <div class="login-container">
        <div class="login-card">
            <h2 class="login-title">Welcome Back</h2>
            <form @submit.prevent="handleLogin">
                <div class="input-group">
                    <label for="email" class="input-label">Email Address</label>
                    <input v-model="email" type="email" class="input-field" id="email" required>
                </div>
                <div class="input-group">
                    <label for="password" class="input-label">Password</label>
                    <input v-model="password" type="password" class="input-field" id="password" required>
                </div>
                <div v-if="error" class="error-message">{{ error }}</div>
                <button type="submit" class="login-button">Login</button>
            </form>
        </div>
    </div>
</template>

<script>
import http from '@/plugins/axios';

export default {
    data() {
        return {
            email: '',
            password: '',
            error: null
        };
    },
    methods: {
        async handleLogin() {
            this.error = null;

            try {
                const response = await http.post('/login', {
                    email: this.email,
                    password: this.password
                });
                localStorage.setItem('token', response.data.token);
                this.$router.push('/dashboard');
            } catch (error) {
                console.error('Login failed:', error.response.data);
                this.error = error.response.data.message || 'An error occurred. Please try again.';
            }
        }
    }
};
</script>

<style scoped>
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f4f7fc;
}

.login-card {
    background-color: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

.login-title {
    font-size: 24px;
    margin-bottom: 1.5rem;
    color: #333;
    text-align: center;
}

.input-group {
    margin-bottom: 1rem;
}

.input-label {
    display: block;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #333;
}

.input-field {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
    color: #333;
}

.input-field:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.3);
}

.error-message {
    color: #e74c3c;
    margin-bottom: 1rem;
    text-align: center;
}

.login-button {
    width: 100%;
    padding: 0.75rem;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.login-button:hover {
    background-color: #0056b3;
}
</style>
