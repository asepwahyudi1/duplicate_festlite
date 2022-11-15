import axios from 'axios'

export default {
    namespaced: true,
    state: {
        classes: [],
    },
    getters: {
        classes(state) {
            return state.classes
        },
        classrooms(state) {
            return state.classrooms
        },
    },
    mutations: {
        FETCH_QUOTES(state, responseData) {
            state.classes = responseData
        },
        FETCH_QUOTEROOMS(state, responseData) {
            state.classrooms = responseData
        },
        ADD_QUOTEROOM(state, data) {
            state.classrooms.push(data)
        },
        UPDATE_QUOTEROOM(state, data) {
            state.classrooms.splice(state.classrooms.indexOf(data.id), 1, data)
        },
        REMOVE_QUOTEROOM(state, id) {
            state.classrooms = state.classrooms.filter(item => item.id !== id);
        },
        async REMOVE_QUOTE(state, id) {
            state.classes = state.classes.filter(item => item.id !== id);
        }
    },
    actions: {
        async fetchQuotes(context) {
            try {
                let response = await axios.get('/api/quotes')
                context.commit('FETCH_QUOTES', response.data.classes)
            } catch (error) {
                this.toastError(error.response.data.message);
                console.log(err);
            }
        },
        async removeClass(context, id) {
            try {
                const response = await axios.delete(`/api/quotes/${id}`)
                context.commit('REMOVE_QUOTE', id);
            } catch (error) {
                this.toastError(error.response.data.message);
                console.log(error)
            }
        }
    }
}
