<template>
    <div class="pesquisa">
      <div class="card">
        <h2>Pesquisa de CEP</h2>
        <input type="text" v-model="cep" @input="atualizarCep" placeholder="Digite o CEP" />
        <button @click="pesquisar">Pesquisar</button>
  
        <div v-if="loading">Carregando...</div>
        <div v-else-if="error" class="error">{{ error }}</div>
  
        <div v-if="endereco" class="result-card">
          <h3>Resultados da pesquisa:</h3>
          <p><strong>Logradouro:</strong> {{ endereco.logradouro }}</p>
          <p><strong>Bairro:</strong> {{ endereco.bairro }}</p>
          <p><strong>Localidade:</strong> {{ endereco.localidade }}</p>
          <p><strong>UF:</strong> {{ endereco.uf }}</p>
        </div>
      </div>
      <router-link to="/">
        <button>Voltar</button>
      </router-link>
    </div>
  </template>
  
  <script>
  import { mapState, mapActions } from 'vuex';
  
  export default {
    name: "PesquisaCep",  
    data() {
      return {
        cep: "",
      };
    },
    computed: {
      ...mapState({
        endereco: state => state.endereco,
        error: state => state.error,
        loading: state => state.loading,
      }),
    },
    methods: {
      ...mapActions(['pesquisarCEP']),
      atualizarCep() {
        this.$store.commit('setCep', this.cep);
      },
      pesquisar() {
        this.pesquisarCEP(this.cep);
      },
    },
  };
  </script>
  
  <style scoped>
  .pesquisa {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
    padding: 20px;
  }
  
  .card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 1.5rem;
    width: 100%;
    max-width: 400px;
    text-align: center;
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  input {
    width: 100%;
    padding: 10px;
    margin-bottom: 1rem;
    border-radius: 4px;
    border: 1px solid #ddd;
    font-size: 16px;
  }
  
  button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    font-size: 16px;
    margin-top: 10px;  /* Ajusta o espaçamento entre os botões */
  }
  
  button:hover {
    background-color: #0056b3;
  }
  
  .result-card p {
    margin-bottom: 0.5rem;
  }
  
  .error {
    color: red;
    margin-top: 1rem;
    font-weight: bold;
  }
  
  footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #f7f7f7;
    text-align: center;
    padding: 10px 0;
    font-size: 14px;
    color: #555;
  }
  
  footer a {
    color: #007bff;
    text-decoration: none;
  }
  
  footer a:hover {
    text-decoration: underline;
  }
  </style>
  