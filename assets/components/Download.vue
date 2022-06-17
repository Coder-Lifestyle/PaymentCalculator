<template>
  <div v-show="show" class="overlay">


    <div class="dialog">

      <div class="dialog__content">
        <h2 class="dialog__title" v-text="title"></h2>
        <p class="dialog__description" v-text="description"></p>
      </div>

      <hr/>
      <div class="dialog__footer">
        <button @click="cancel" class="dialog__cancel">Cancel</button>
        <button v-for="year in years" @click="downloadCSV(year); confirm"
                class="dialog__confirm">{{ year }}
        </button>
      </div>
    </div>
  </div>

</template>

<script>

import axios from "axios";
export default {
  name: "App",
  props: ['show', 'title', 'description', 'cancel', 'confirm'],
  data() {
    return {
      years: [],
    };
  },
  methods:{
    downloadCSV(year){
      window.location.href = '/download/'+year;
      this.confirm();
    },
  },
  async created() {
    try {
      const res = await axios.get(
          `/api/payment/cycles`
      );
      return this.years = res.data;
    } catch (e) {
      console.log(e);
    }
  },
};

</script>
