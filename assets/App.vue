<script setup>
import {RouterLink, RouterView} from 'vue-router';
import SalaryMenu from '@/components/SalaryMenu.vue';
</script>

<template>

  <header>
    <img alt="Vue logo" class="logo" src="@/logo.svg" width="125" height="125"/>

    <div class="wrapper">
      <SalaryMenu msg="Salary Calculator!"/>

      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
        <RouterLink to="#" @click="showDialog = true">Download</RouterLink>
      </nav>
    </div>
  </header>
  <RouterView/>

  <div>
    <Dialog :show="showDialog"
            :cancel="cancel"
            :confirm="confirm"
            title="Download Payment Cycles"
            description="Choose which year you would like to download" />
  </div>


</template>
<script>
import Dialog from './components/Download';
export default {
  name: 'App',
  components: { Dialog },
  data() {
    return {
      showDialog: false,
      showDialogUser: false,
    }
  },
  methods: {
    cancel() {
      this.showDialog = false;
      this.showDialogUser = false;
    },
    confirm() {
      this.showDialog = false;
    },
  }
}
</script>

<style>
@import '@/base.css';

#app {
  max-width: 1280px;
  margin: 0 auto;
  padding: 2rem;

  font-weight: normal;
}

header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

a,
.green {
  text-decoration: none;
  color: hsla(160, 100%, 37%, 1);
  transition: 0.4s;
}

@media (hover: hover) {
  a:hover {
    background-color: hsla(160, 100%, 37%, 0.2);
  }
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  body {
    display: flex;
    place-items: center;
  }

  #app {
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 0 2rem;
  }

  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}



@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap");

*,
*::before,
*::after {
  box-sizing: border-box;
}

:root {
  -moz-tab-size: 4;
  -o-tab-size: 4;
  tab-size: 4;
}

html {
  line-height: 1.15; /* 1 */
  -webkit-text-size-adjust: 100%; /* 2 */
}

body {
  margin: 0;
}

body {
  font-family:
      system-ui,
      -apple-system, /* Firefox supports this but not yet `system-ui` */
      'Segoe UI',
      Roboto,
      Helvetica,
      Arial,
      sans-serif,
      'Apple Color Emoji',
      'Segoe UI Emoji';
}

hr {
  height: 0; /* 1 */
  color: inherit; /* 2 */
}

abbr[title] {
  -webkit-text-decoration: underline dotted;
  text-decoration: underline dotted;
}

b,
strong {
  font-weight: bolder;
}

code,
kbd,
samp,
pre {
  font-family:
      ui-monospace,
      SFMono-Regular,
      Consolas,
      'Liberation Mono',
      Menlo,
      monospace; /* 1 */
  font-size: 1em; /* 2 */
}

small {
  font-size: 80%;
}

sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}
sub {
  bottom: -0.25em;
}
sup {
  top: -0.5em;
}

table {
  text-indent: 0; /* 1 */
  border-color: inherit; /* 2 */
}

button,
input,
optgroup,
select,
textarea {
  font-family: inherit; /* 1 */
  font-size: 100%; /* 1 */
  line-height: 1.15; /* 1 */
  margin: 0; /* 2 */
}

button,
select { /* 1 */
  text-transform: none;
}

button {
  -webkit-appearance: button;
}

legend {
  padding: 0;
}

progress {
  vertical-align: baseline;
}

summary {
  display: list-item;
}

blockquote,
dl,
dd,
h1,
h2,
h3,
h4,
h5,
h6,
hr,
figure,
p,
pre {
  margin: 0;
}
button {
  background-color: transparent;
  background-image: none;
}

button:focus {
  outline: 1px dotted;
  outline: 5px auto -webkit-focus-ring-color;
}
fieldset {
  margin: 0;
  padding: 0;
}
ol,
ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

html {
  font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; /* 1 */
  line-height: 1.5; /* 2 */
}

body {
  font-family: inherit;
  line-height: inherit;
}
*,
::before,
::after {
  box-sizing: border-box; /* 1 */
  border-width: 0; /* 2 */
  border-style: solid; /* 2 */
  border-color: #e5e7eb; /* 2 */
}

hr {
  border-top-width: 1px;
}

img {
  border-style: solid;
}
textarea {
  resize: vertical;
}
input::-moz-placeholder, textarea::-moz-placeholder {
  color: #9ca3af;
}
input:-ms-input-placeholder, textarea:-ms-input-placeholder {
  color: #9ca3af;
}
input::placeholder,
textarea::placeholder {
  color: #9ca3af;
}
button {
  cursor: pointer;
}
table {
  border-collapse: collapse;
}
h1,
h2,
h3,
h4,
h5,
h6 {
  font-size: inherit;
  font-weight: inherit;
}

a {
  color: inherit;
  text-decoration: inherit;
}

button,
input,
optgroup,
select,
textarea {
  padding: 0;
  line-height: inherit;
  color: inherit;
}

pre,
code,
kbd,
samp {
  font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
}

img,
svg,
video,
canvas,
audio,
iframe,
embed,
object {
  display: block;
  vertical-align: middle;
}

img,
video {
  max-width: 100%;
  height: auto;
}
.table{
  display: table;
}
.mt-10{
  margin-top: 2.5rem;
}
*{
  --tw-shadow: 0 0 #0000;
}
*{
  --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/);
  --tw-ring-offset-width: 0px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: rgba(59, 130, 246, 0.5);
  --tw-ring-offset-shadow: 0 0 #0000;
  --tw-ring-shadow: 0 0 #0000;
}
.text-center{
  text-align: center;
}
@-webkit-keyframes spin{
  to{
    transform: rotate(360deg);
  }
}
@keyframes spin{
  to{
    transform: rotate(360deg);
  }
}
@-webkit-keyframes ping{
  75%, 100%{
    transform: scale(2);
    opacity: 0;
  }
}
@keyframes ping{
  75%, 100%{
    transform: scale(2);
    opacity: 0;
  }
}
@-webkit-keyframes pulse{
  50%{
    opacity: .5;
  }
}
@keyframes pulse{
  50%{
    opacity: .5;
  }
}
@-webkit-keyframes bounce{
  0%, 100%{
    transform: translateY(-25%);
    -webkit-animation-timing-function: cubic-bezier(0.8,0,1,1);
    animation-timing-function: cubic-bezier(0.8,0,1,1);
  }
  50%{
    transform: none;
    -webkit-animation-timing-function: cubic-bezier(0,0,0.2,1);
    animation-timing-function: cubic-bezier(0,0,0.2,1);
  }
}
@keyframes bounce{
  0%, 100%{
    transform: translateY(-25%);
    -webkit-animation-timing-function: cubic-bezier(0.8,0,1,1);
    animation-timing-function: cubic-bezier(0.8,0,1,1);
  }
  50%{
    transform: none;
    -webkit-animation-timing-function: cubic-bezier(0,0,0.2,1);
    animation-timing-function: cubic-bezier(0,0,0.2,1);
  }
}
body {
  background-color: #eee;
  font-family: Poppins, sans-serif;
}
.btn {
  --tw-bg-opacity: 1;
  background-color: rgba(37, 99, 235, var(--tw-bg-opacity));
  border-radius: 0.75rem;
  font-weight: 500;
  margin-right: 1rem;
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
  padding-left: 1rem;
  padding-right: 1rem;
  --tw-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
  --tw-text-opacity: 1;
  color: rgba(255, 255, 255, var(--tw-text-opacity));
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.btn:hover {
  --tw-bg-opacity: 1;
  background-color: rgba(30, 64, 175, var(--tw-bg-opacity));
  --tw-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.btn:focus {
  outline: 2px solid transparent;
  outline-offset: 2px;
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
  --tw-ring-opacity: 1;
  --tw-ring-color: rgba(37, 99, 235, var(--tw-ring-opacity));
  --tw-ring-opacity: 0.5;
}
.overlay {
  --tw-bg-opacity: 1;
  background-color: rgba(0, 0, 0, var(--tw-bg-opacity));
  --tw-bg-opacity: 0.5;
  height: 100%;
  position: fixed;
  top: 0px;
  right: 0px;
  bottom: 0px;
  left: 0px;
  width: 100%;
  z-index: 10;
}
.dialog {
  --tw-bg-opacity: 1;
  background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
  border-radius: 0.75rem;
  margin-left: auto;
  margin-right: auto;
  margin-top: 2.5rem;
  max-width: 100%;
  width: 40rem;
}
.dialog__content {
  padding-left: 0.75rem;
  padding-right: 0.75rem;
  padding-top: 1rem;
  padding-bottom: 1rem;
}
.dialog__title {
  font-weight: 500;
  font-size: 1.125rem;
  line-height: 1.75rem;
  margin-bottom: 0.5rem;
  --tw-text-opacity: 1;
  color: rgba(17, 24, 39, var(--tw-text-opacity));
}
.dialog__description {
  font-size: 0.875rem;
  line-height: 1.25rem;
  margin-bottom: 1rem;
  --tw-text-opacity: 1;
  color: rgba(107, 114, 128, var(--tw-text-opacity));
}
.dialog__footer {
  display: flex;
  justify-content: flex-end;
  padding-top: 1rem;
  padding-bottom: 1rem;
}
.dialog__cancel {
  border-radius: 0.75rem;
  font-weight: 500;
  margin-right: 1rem;
}
.dialog__cancel:focus{
  outline: 2px solid transparent;
  outline-offset: 2px;
}
.dialog__cancel{
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
  padding-left: 1rem;
  padding-right: 1rem;
}
.dialog__cancel:focus{
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
  --tw-ring-opacity: 1;
  --tw-ring-color: rgba(75, 85, 99, var(--tw-ring-opacity));
  --tw-ring-opacity: 0.5;
}
.dialog__cancel{
  --tw-text-opacity: 1;
  color: rgba(17, 24, 39, var(--tw-text-opacity));
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.dialog__cancel:hover {
  --tw-text-opacity: 1;
  color: rgba(55, 65, 81, var(--tw-text-opacity));
}
.dialog__confirm {
  --tw-bg-opacity: 1;
  background-color: rgba(28, 116, 49, var(--tw-bg-opacity));
  border-radius: 0.75rem;
  font-weight: 500;
  margin-right: 1rem;
}
.dialog__confirm:focus{
  outline: 2px solid transparent;
  outline-offset: 2px;
}
.dialog__confirm{
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
  padding-left: 1rem;
  padding-right: 1rem;
}
.dialog__confirm:focus{
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
  --tw-ring-opacity: 1;
  --tw-ring-color: rgba(220, 38, 38, var(--tw-ring-opacity));
  --tw-ring-opacity: 0.5;
}
.dialog__confirm{
  --tw-text-opacity: 1;
  color: rgba(255, 255, 255, var(--tw-text-opacity));
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.dialog__confirm:hover {
  --tw-bg-opacity: 1;
  background-color: rgba(252, 165, 165, var(--tw-bg-opacity));
  --tw-text-opacity: 1;
  color: rgba(153, 27, 27, var(--tw-text-opacity));
}
@media (min-width: 640px){
}
@media (min-width: 768px){
}
@media (min-width: 1024px){
}
@media (min-width: 1280px){
}
@media (min-width: 1536px){
}


</style>
