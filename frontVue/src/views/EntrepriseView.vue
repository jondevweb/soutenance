<script setup>
import { ref } from 'vue'
import axios from 'axios'

const data = ref([null]);
const error = ref(null);

async function fetchData() {
  error.value = null;
  data.value = null;

  try {
    const response = await axios.get('http://192.168.56.105/api/client/entreprise');
    console.log('hello');
    const result = await response.data;
    data.value = result;
  } catch (err) {
    error.value = err.message;
    console.error('Error fetching data:', err);
  }
}

</script>

<template>
  <main>
    <div>
      <button @click="fetchData">Fetch Data</button>
      <div v-for="item in data">
        <p v-if="item != null">Data: {{ item}}</p>
        <p v-else>Pas de data!</p>
      </div>  
    </div>
  </main>
</template>
