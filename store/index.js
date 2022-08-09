export const state = () => ({
    modalNavFlag: false
})

export const getters = {
    modalNavFlag: (state) => state.modalNavFlag
}

export const mutations = {
    setModalNavFlag(state, data) {
        state.modalNavFlag = data
    }
}

export const actions = {
    changeModalNav({ commit }, data) {
        commit('setModalNavFlag', data)
    }
}