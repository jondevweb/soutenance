<template>
  <div style="position: absolute; top: 10px;">
    <input type="checkbox" class="" id="checkedButtonMenu" v-model="isChecked" autocomplete="off" @click="handleValueChanged(changeValueButton.value)" style="visibility: hidden">
    <label class="btn btn-outline-secondary" for="checkedButtonMenu" >
      <i class="fas fa-bars" style="font-size: 1.5rem;"></i>
    </label>
  </div>  
  <!-- background-color: #003f6e
  color: white -->
</template>

<script setup>
import { computed, ref } from 'vue';
const isChecked = ref(false);

function handleValueChanged(event) {
  if(!event){
    document.getElementById('closeMenu').style.visibility = 'hidden';
    document.getElementById('closeMenu').style.width = '0px';
  } else {
    document.getElementById('closeMenu').style.width = '330px';
    document.getElementById('closeMenu').style.visibility = 'visible';
  }
}

const changeValueButton = computed(() =>  isChecked);
</script>

<style lang="sass">
.btn-outline-secondary
  border: none


</style>