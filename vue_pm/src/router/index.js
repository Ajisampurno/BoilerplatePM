import { createRouter, createWebHistory } from 'vue-router';
import LoginView from '@/views/LoginView.vue';
import RegisterView from '@/views/RegisterView.vue';
import DashboardView from '@/views/DashboardView.vue';
import SalesView from '@/views/SalesView.vue';

function isAuthenticated() {
  return !!localStorage.getItem('token'); // Check if token exists
}

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: DashboardView,
      meta: { requiresAuth: true } // Add this line to indicate authentication is required
    },
    {
      path: '/sales',
      name: 'sales',
      component: SalesView,
      meta: { requiresAuth: true } // Add this line to indicate authentication is required
    },
  ]
});

router.beforeEach((to, from, next) => {
  const isAuth = isAuthenticated();

  if (to.meta.requiresAuth && !isAuth) {
    next({ name: 'login' });
  } else if ((to.name === 'login' || to.name === 'register') && isAuth) {
    next({ name: 'dashboard' });
  } else {
    next();
  }
});

export default router;
