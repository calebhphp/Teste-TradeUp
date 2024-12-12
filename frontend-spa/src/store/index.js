import { createStore } from 'vuex';

export default createStore({
  state: {
    cep: "",
    endereco: null,
    error: null,
    loading: false,
  },
  mutations: {
    setCep(state, cep) {
      state.cep = cep;
    },
    setEndereco(state, endereco) {
      state.endereco = endereco;
    },
    setError(state, error) {
      state.error = error;
    },
    setLoading(state, loading) {
      state.loading = loading;
    },
  },
  actions: {
    async pesquisarCEP({ commit, state }) {
      commit('setLoading', true);
      commit('setError', null);
      commit('setEndereco', null);

      const cepLimpo = state.cep.replace("-", "");

      try {
        const response = await fetch(`http://localhost:8000/api/cep?cep=${cepLimpo}`);
        if (!response.ok) {
          throw new Error("Erro ao buscar o CEP.");
        }

        const data = await response.json();
        commit('setEndereco', data);
      } catch (err) {
        commit('setError', err.message);
      } finally {
        commit('setLoading', false);
      }
    },
  },
  modules: {},
});
