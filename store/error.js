const state = () => ({
    message: "",
    code: "",
});

const getters = {
    getErrorMessage: (state) => state.message,
    getErrorCode: (state) => state.code,
};

const mutations = {
    setMessage(state, data) {
        state.message = data;
    },
    setCode(state, data) {
        state.code = data;
    },
    clearState(state) {
        state.message = "";
        state.code = "";
    },
};

const actions = {
    catchError({ commit }, response) {
        commit("clearMessage");
        if (500 <= response.status) {
            commit("setCode", response.status);
            commit("setMessage", response.data);
            this.$router.push("/error/500");
            return false
        }
        if (400 <= response.status <= 500) {
            commit("setCode", response.status);
            commit("setMessage", response.data);
            this.$router.push("/error/400");
            return false
        }
    },
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions,
};