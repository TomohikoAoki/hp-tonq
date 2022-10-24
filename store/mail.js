const actions = {
    async sendMail({ commit }, data) {
        await axios.post('url', data)
    }
}

export default {
    namespaced: true,
    actions,
}