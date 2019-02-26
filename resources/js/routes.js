import Frontend from './components/Frontend.vue'
import AdminHome from './components/Dashboard.vue'
import Dashboard from './components/Dashboard.vue'
import User from './components/Users.vue'
import Karyawan from './components/Karyawan.vue'
import Data_Anak from './components/Data_Anak.vue'
import Profile from './components/Profile.vue'
import Developer from './components/Developer.vue'

export const routes = [{
        path: '/',
        component: Frontend
    },
    {
        path: '/home',
        component: AdminHome
    },
    {
        path: '/dashboard',
        component: Dashboard
    },
    {
        path: '/pengguna',
        component: User
    },
    {
        path: '/data-karyawan',
        component: Karyawan
    },
    {
        path: '/data-anak',
        component: Data_Anak
    },
    {
        path: '/profile',
        component: Profile
    },
    {
        path: '/developer',
        component: Developer
    }
]
