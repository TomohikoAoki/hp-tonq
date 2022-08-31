const state = () => ({
    modalNavFlag: false,
    footerInterSecting: false,
});

const getters = {
    modalNavFlag: (state) => state.modalNavFlag,
    getFooterInterSecting: (state) => state.footerInterSecting
};

const mutations = {
    setModalNavFlag(state, data) {
        state.modalNavFlag = data;
    },
    setFooterInterSecting(state, data) {
        state.footerInterSecting = data;
    }
};

const actions = {
    changeModalNav({ commit }, data) {
        commit("setModalNavFlag", data);
    },
    footerInterSect({ commit }, data) {
        commit('setFooterInterSecting', data)
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions,
};