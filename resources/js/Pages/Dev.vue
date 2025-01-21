<script setup>
import LandingPageHeader from '../Components/LandingPage/Header.vue';
import LandingPageSection from '../Components/LandingPage/Section.vue';
import LandingPageFeature from '../Components/LandingPage/Feature.vue';
import LandingPagePlansPrices from '../Components/LandingPage/PlansPrices.vue';
import LandingPageFooter from '../Components/LandingPage/Footer.vue';
</script>

<template>
  <div>
    <div class="h-screen w-full">
      <LandingPageHeader title="Prodmast" />

      <LandingPageSection />
    </div>

    <LandingPageFeature />
    <LandingPagePlansPrices />
    <LandingPageFooter />
  </div>
</template>
