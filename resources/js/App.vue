<template>
  <a href="#/">Tableau de bord</a>
  Informations du site
  <a href="#/informationsGenerales">Informations générales</a>
  <a href="#/contactsAssocies">Contacts associés</a>
  <a href="#/conditionsDAccEs">Conditions d'accès</a>
  Informations des collectes
  <a href="#/calendrier">Calendrier</a>
  <a href="#/donneesBrutes">Données brutes</a>
  Documents de traçabilité
  <a href="#/attestationValorisation">Attestation de valorisation</a>
  <a href="#/registreDeSuiviDeDechets">Registre de suivi de déchets</a>
  <component :is="currentView" v-model:title="id"/>
</template>
<script setup>
import { computed, onBeforeUnmount, onMounted, ref } from 'vue';
import AttestationValorisation from './components/AttestationValorisation.vue';
import Calendrier from './components/Calendrier.vue';
import ConditionsDAccEs from './components/ConditionsDAccEs.vue';
import ContactsAssocies from './components/ContactsAssocies.vue';
import DonneesBrutes from './components/DonneesBrutes.vue';
import InformationsGenerales from './components/InformationsGenerales.vue';
import RegistreDeSuiviDeDechets from './components/RegistreDeSuiviDeDechets.vue';
import TableauDeBord from './components/TableauDeBord.vue';

const idPointCollecte = ref(0);
const id = ref();

function handleValueChanged(event) {
  idPointCollecte.value = event.detail;
  id.value = idPointCollecte.value;
}

onMounted(() => {  
  document.getElementById('app').addEventListener('value-changed', handleValueChanged);

});

onBeforeUnmount(() => {
  document.getElementById('app').removeEventListener('value-changed', handleValueChanged);

});

const routes = {
  '/': TableauDeBord,
  '/informationsGenerales': InformationsGenerales,
  '/contactsAssocies': ContactsAssocies,
  '/conditionsDAccEs': ConditionsDAccEs,
  '/calendrier': Calendrier,
  '/donneesBrutes': DonneesBrutes,
  '/attestationValorisation': AttestationValorisation,
  '/registreDeSuiviDeDechets': RegistreDeSuiviDeDechets
}

const currentPath = ref(window.location.hash);

window.addEventListener('hashchange', () => {
  currentPath.value = window.location.hash
})

const currentView = computed(() => {
  return routes[currentPath.value.slice(1) || '/'] 
})
// const currentView = computed(() => {
//   return routes[currentPath.value.slice(1) || '/'] || NotFound
// })
</script>