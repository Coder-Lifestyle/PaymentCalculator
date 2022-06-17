<script setup>
import WelcomeItem from './WelcomeItem.vue'
import DocumentationIcon from './icons/IconDocumentation.vue'
import ToolingIcon from './icons/IconTooling.vue'
import EcosystemIcon from './icons/IconEcosystem.vue'
import CommunityIcon from './icons/IconCommunity.vue'
import SupportIcon from './icons/IconSupport.vue'
</script>

<template>
  <WelcomeItem>
    <template #icon>
      <DocumentationIcon />
    </template>
    <template #heading>Documentation</template>
    You will find an extensive readme.MD file in the project root folder. We try to explain you everything you need to get this working.
  </WelcomeItem>

  <WelcomeItem>
    <template #icon>
      <ToolingIcon />
    </template>
    <template #heading>CLI Interface</template>
      For people who like old school CLI Interfaces we have provided a CLI interface. Building console applications with STDIN and STDOUT stuff may be complicated.
    Fortunately Symfony has built in usefull console classes, so you can built your CLI applications in just a few minutes!
    Do you want to try the CLI? Just enter:
    <code>"symfony console salary:report"</code>
  </WelcomeItem>

  <WelcomeItem>
    <template #icon>
      <EcosystemIcon />
    </template>
    <template #heading>API Endpoints</template>

    Do you want to use the Payment Cycles Calculator for your own application?

    Use our API endpoints:
    <a target="_blank" href="http://localhost/api/payment/cycles">Supported Years</a>,
    <a target="_blank" href="http://localhost/api/payment/cycle/2022">Specific year endpoint</a>,
  </WelcomeItem>
</template>
