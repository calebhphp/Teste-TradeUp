<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App',
};
</script>

<style>
#app {
  font-family: 'Helvetica Neue', Helvetica, sans-serif;
  background-color: #f5f5f5;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  padding-bottom: 40px;
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
