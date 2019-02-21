export default {
    state: {
        employees: [],

    },
    getters: {
        getEmployee(state) {
            return state.employees
        }
    },
    actions: {
        allEmployee(context) {
            axios.get("api/employee").then((response) => {
                context.commit('employees', response.data.employees)
            })
        }
    },
    mutations: {
        employees(state, data) {
            return state.employees = data
        }

    }
}
