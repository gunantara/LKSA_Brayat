import AdminHome from './components/Dashboard.vue'
import Dashboard from './components/Dashboard.vue'
import Profile_LKSA from './components/Profile_LKSA.vue'
import Galeri from './components/Galeri.vue'
import User from './components/Users.vue'
import Karyawan from './components/Karyawan.vue'
import Data_Anak from './components/Data_Anak/Data_Anak.vue'
import Data_Anak_Keluar from './components/Data_Anak/Data_Anak_Keluar.vue'
import Detail_Anak from './components/Data_Anak/Detail_Anak.vue'
import Detail_Anak_Keluar from './components/Data_Anak/Detail_Anak_Keluar.vue'
import Tambah_Anak from './components/Data_Anak/Tambah_Anak.vue'
import Edit_Anak from './components/Data_Anak/Edit_Anak.vue'
import Inventaris from './components/Inventories.vue'
import Profile from './components/Profile.vue'
import Developer from './components/Developer.vue'
 
export const routes = [{
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
        path: '/galeri',
        component: Galeri
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
        path: '/data-anak-keluar',
        component: Data_Anak_Keluar
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
        path: '/anak-keluar:idanak',
        name: 'anak_keluar',
        component: Detail_Anak_Keluar
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
