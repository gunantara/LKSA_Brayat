import Frontend from './components/Frontend.vue'
import AdminHome from './components/Dashboard.vue'
import Dashboard from './components/Dashboard.vue'
import Profile_LKSA from './components/Profile_LKSA.vue'
import User from './components/Users.vue'
import Karyawan from './components/Karyawan.vue'
import Data_Anak from './components/Data_Anak/Data_Anak.vue'
import Detail_Anak from './components/Data_Anak/Detail_Anak.vue'
import Tambah_Anak from './components/Data_Anak/Tambah_Anak.vue'
import Edit_Anak from './components/Data_Anak/Edit_Anak.vue'
import Inventaris from './components/Inventories.vue'
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
        path: '/profile-lksa',
        component: Profile_LKSA
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
        path: '/tambah-anak',
        component: Tambah_Anak
    },
    {
        path: '/edit-anak:idanak',
        name: 'edit_anak',
        component: Edit_Anak
    },
    {
        path: '/detail-anak:idanak',
        name: 'detail_anak',
        component: Detail_Anak
    },
    {
        path: '/inventaris',
        component: Inventaris
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
