export default {
    state: {
        employees: [],
        jumlah_users: [],
        jumlah_employees: [],
        jumlah_childrens: [],
    },
    getters: {
        getEmployee(state) {
            return state.employees
        },
        getJumlahUser(state) {
            return state.jumlah_users
        },
        getJumlahEmployee(state) {
            return state.jumlah_employees
        },
        getJumlahChildren(state) {
            return state.jumlah_childrens
        },
    },
    actions: {
        allEmployee(context) {
            axios.get("api/employee").then((response) => {
                context.commit('employees', response.data.employees)
            })
        },
        AllJumlah_Users(context) {
            axios.get("api/banyak_users").then((response) => {
                context.commit('jumlah_users', response.data.jumlah_users)
            })
        },
        AllJumlah_Employees(context) {
            axios.get("api/banyak_karyawan").then((response) => {
                context.commit('jumlah_employees', response.data.jumlah_employees)
            })
        },
        AllJumlah_Childrens(context) {
            axios.get("api/banyak_anak").then((response) => {
                context.commit('jumlah_childrens', response.data.jumlah_childrens)
            })
        },
    },
    mutations: {
        employees(state, data) {
            return state.employees = data
        },
        jumlah_users(state, data) {
            return state.jumlah_users = data
        },
        jumlah_employees(state, data) {
            return state.jumlah_employees = data
        },
        jumlah_childrens(state, data) {
            return state.jumlah_childrens = data
        },

    }
}
