<template>
  <div class="greetings">
    <h1 class="green heading">Salary Payment Cycles Calculator</h1>
    <h3>
      We have made a forecast with <span class="green">salary payment</span> dates for the following years:
    </h3>

    <nav>
      <RouterLink v-for="year in years" :to="{ name: 'cycle', params: {year: year } }">{{ year }}</RouterLink>
    </nav>
  </div>
</template>
<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<script>

import axios from "axios";

export default {
  name: "App",

  data() {
    return {
      years: [],
    };
  },
  async created() {
    try {
      const res = await axios.get(
          `/api/payment/cycles`
      );
      return this.years = res.data;
    }
    catch(e){
      console.log(e);
    }
  },
};

</script>

<style scoped>

.heading{
  font: normal normal normal 20px/1 Helvetica, arial, sans-serif;
  border-bottom: 2px solid #000;
  background: #1c7430;
  color:#fff;

  display:inline-block;
  padding:3px 15px;
  margin-left:0px;
}

.heading:after{
  left:0px;
  display:block;
  position:absolute;
  width:100%;
  height:3px;
  margin-top:2px;
  content: " ";
  background: #34ce57;
}

h1 {
  font-weight: 500;
  font-size: 2.6rem;
  top: -10px;
}

h3 {
  font-size: 1.2rem;
}

.greetings h1,
.greetings h3 {
  text-align: center;
}

@media (min-width: 1024px) {
  .greetings h1,
  .greetings h3 {
    text-align: left;
  }
}
</style>
