<script setup>
import WelcomeItem from '../components/WelcomeItem.vue'
import ErrorIcon from '../components/icons/IconError.vue'
</script>
<template>
  <WelcomeItem>
    <template #icon>
      <ErrorIcon />
    </template>
    <template #heading>Year not supported!</template>
    <p>We tried really hard, but it really seems this page is nowhere to be found!!!</p>
    <strong>Please read:</strong>
    <p>Please only pick the items from the menu and don't try to manually change the years by just changing the urls!</p>

  </WelcomeItem>

</template>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
