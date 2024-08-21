<template>
    <div class="auth-container">
        <div class="auth-card">
            <h2 class="auth-title">Create an Account</h2>
            <form @submit.prevent="handleRegister">
                <div class="input-group">
                    <label for="name" class="input-label">Full Name</label>
                    <input v-model="name" type="text" class="input-field" id="name" required>
                </div>
                <div class="input-group">
                    <label for="exampleInputEmail1" class="input-label">Email Address</label>
                    <input v-model="email" type="email" class="input-field" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="input-group">
                    <label for="exampleInputPassword1" class="input-label">Password</label>
                    <input v-model="password" type="password" class="input-field" id="exampleInputPassword1" required>
                </div>
                <div class="input-group">
                    <label for="passwordConfirmation" class="input-label">Confirm Password</label>
                    <input v-model="passwordConfirmation" type="password" class="input-field" id="passwordConfirmation"
                        required>
                </div>
                <button type="submit" class="auth-button">Register</button>
            </form>
        </div>
    </div>
</template>

<script>
import http from '@/plugins/axios';

export default {
    data() {
        return {
            name: '',
            email: '',
            password: '',
            passwordConfirmation: '',
        };
    },
    methods: {
        async handleRegister() {
            try {
                const response = await http.post('/register', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.passwordConfirmation,
                });
                console.log(response.data);
                alert('Success! Registration complete.');
                this.$router.push('/login');
            } catch (error) {
                console.error('Registration failed:', error.response.data);
                alert('Registration failed. Please check your inputs.');
            }
        },
    },
};
</script>

<style scoped>
.auth-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f4f7fc;
}

.auth-card {
    background-color: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

.auth-title {
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

.auth-button {
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

.auth-button:hover {
    background-color: #0056b3;
}
</style>
