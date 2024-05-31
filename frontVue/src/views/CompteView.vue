<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { inject } from 'vue'

const data = ref([null]);
const error = ref(null);


// console.log($cookies);

async function fetchData() {
  error.value = null;
  data.value = null;

  try {
    const response = await axios.get('http://192.168.56.105/api/client/compte');
    // if (!response.ok) {
    //   throw new Error(`HTTP error! status: ${response.status}`);
    // }
    // const contentType = response.headers.get('content-type');
    // if (contentType && contentType.includes('application/json')) { 
      console.log(response.files)
      const result = await response.data;
      data.value = result;
    // } else {
    //   throw new Error('Received non-JSON response');
    // }
  } catch (err) {
    error.value = err.message;
    console.error('Error fetching data:', err);
  }
}
console.log(data);

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
