const state = () => ({
    modalNavFlag: false,
});

const getters = {
    modalNavFlag: (state) => state.modalNavFlag,
};

const mutations = {
    setModalNavFlag(state, data) {
        state.modalNavFlag = data;
    },
};

const actions = {
    changeModalNav({ commit }, data) {
        commit("setModalNavFlag", data);
    },
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions,
};