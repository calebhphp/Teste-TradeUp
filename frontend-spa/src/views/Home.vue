<template>
    <div class="home">
      <div class="card">
        <h2>Bem-vindo à Pesquisa de CEP</h2>
        <p>Digite um CEP válido para buscar o endereço correspondente.</p>
        <img src="../img/logo.png" alt="Logo TradeUP" />
        <router-link to="/pesquisa">
          <button>Ir para Pesquisa</button>
        </router-link>
      </div>
      <footer>
        <p>Desenvolvido por <a href="https://www.linkedin.com/in/matheus-villanova/" target="_blank">Matheus Martins</a></p>
      </footer>
    </div>
  </template>
  
  <script>
  export default {
    name: "HomePage",  
};
  </script>
  
  <style scoped>
  .home {
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
  }
  
  h2 {
    font-size: 24px;
    color: #333;
  }
  
  p {
    margin-bottom: 1rem;
    font-size: 16px;
    color: #555;
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
  }
  
  button:hover {
    background-color: #0056b3;
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
  