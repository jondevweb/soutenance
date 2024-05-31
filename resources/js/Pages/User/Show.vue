<script setup>
import { Head } from '@inertiajs/vue3'

defineProps({ user: Object })
</script>

<template>
  <Layout>
    <Head title="Welcome" />
    <h1>Welcomeeee</h1>
    <p>Hello {{ user.name }}, welcome to your first Inertia app!</p>
  </Layout>
</template>