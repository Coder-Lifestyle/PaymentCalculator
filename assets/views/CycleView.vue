<script setup xmlns="http://www.w3.org/1999/html">
import WelcomeItem from '../components/WelcomeItem.vue'
import DocumentationIcon from '../components/icons/IconDocumentation.vue'
</script>

<template>
  <main>
    <WelcomeItem v-for="date in dates">
      <template #icon>
        <DocumentationIcon/>
      </template>
      <template #heading><span class="heading">{{ date.month }}</span></template>
      <div class="row bg1">
        <div class="column">Regular Payment</div>
        <div class="column"><span class="green">{{ date.regular }}</span></div>
      </div>
      <div class="row bg2">
        <div class="column">Bonus Payment</div>
        <div class="column"><span class="red"> {{ date.bonus }}</span></div>
      </div>
    </WelcomeItem>
  </main>
</template>

<script>

import axios from "axios";

export default {
  name: "App",
  props: ['year'],
  data() {
    return {
      dates: [],
    };
  },
  created() {
    this.getDates(this.year)
  },
  beforeRouteUpdate(to, from, next) {
    this.getDates(to.params.year);
    next();
  },
  methods: {
    async getDates(year) {
      try {
        const res = await axios.get(
            `/api/payment/cycle/` + year
        );
        return this.dates = res.data;
      } catch (e) {
        window.location.href = '/error';
      }
    }
  },
};

</script>


<style scoped>
.item {
  margin-top: 2rem;
  display: flex;
}

.details {
  flex: 1;
  margin-left: 1rem;
}

.bg1 {
  background-color: #ddd;
}

.bg2 {
  background-color: #f2f2f2;
}

.column {
  float: left;
  width: 50%;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.red {
  color: red;
}

i {
  display: flex;
  place-items: center;
  place-content: center;
  width: 32px;
  height: 32px;

  color: var(--color-text);
}

.heading {
  font: normal normal normal 20px/1 Helvetica, arial, sans-serif;
  border-bottom: 2px solid #000;
  background: #1c7430;
  color: #fff;

  display: inline-block;
  padding: 3px 15px;
  margin-left: 0px;
}

.heading:after {
  left: 0px;
  display: block;
  position: absolute;
  width: 100%;
  height: 3px;
  margin-top: 2px;
  content: " ";
  background: #34ce57;
}

h3 {
  font-size: 1.2rem;
  font-weight: 500;
  margin-bottom: 0.4rem;
  color: var(--color-heading);
  background-color: #7eea12;
}

@media (min-width: 1024px) {
  .item {
    margin-top: 0;
    padding: 0.4rem 0 1rem calc(var(--section-gap) / 2);
  }

  i {
    top: calc(50% - 25px);
    left: -26px;
    position: absolute;
    border: 1px solid var(--color-border);
    background: var(--color-background);
    border-radius: 8px;
    width: 50px;
    height: 50px;
  }

  .item:before {
    content: ' ';
    border-left: 1px solid var(--color-border);
    position: absolute;
    left: 0;
    bottom: calc(50% + 25px);
    height: calc(50% - 25px);
  }

  .item:after {
    content: ' ';
    border-left: 1px solid var(--color-border);
    position: absolute;
    left: 0;
    top: calc(50% + 25px);
    height: calc(50% - 25px);
  }

  .item:first-of-type:before {
    display: none;
  }

  .item:last-of-type:after {
    display: none;
  }
}
</style>

