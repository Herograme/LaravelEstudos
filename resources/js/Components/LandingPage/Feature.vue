<script setup>
const emit = defineEmits(['showFeatureDetails']);

const handleFeatureClick = (feature) => {
  console.log('Feature clicked:', feature.title);
  emit('showFeatureDetails', feature);
};
</script>

<template>
  <section class="bg-gray-900 py-16 h-[80vh]">
    <div class="container mx-auto px-4 pt-16">
      <h2 class="text-3xl font-bold text-center text-white mb-12">Our Key Features</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Feature Card -->
        <div 
          class="p-8 bg-gray-800 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer h-64"
          @click="handleFeatureClick({
            title: 'Fast Performance',
            description: 'Lightning fast response times and optimized workflows',
            icon: 'speed'
          })"
        >
          <div class="text-center">
            <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-rose-900 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-white mb-2">Fast Performance</h3>
            <p class="text-gray-400">Lightning fast response times and optimized workflows</p>
          </div>
        </div>

        <div 
          class="p-8 bg-gray-800 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer h-64"
          @click="handleFeatureClick({
            title: 'Secure System',
            description: 'Enterprise-grade security for your data',
            icon: 'security'
          })"
        >
          <div class="text-center">
            <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-rose-900 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-white mb-2">Secure System</h3>
            <p class="text-gray-400">Enterprise-grade security for your data</p>
          </div>
        </div>

        <div 
          class="p-8 bg-gray-800 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer h-64"
          @click="handleFeatureClick({
            title: 'Easy Integration',
            description: 'Seamless integration with your existing tools',
            icon: 'integration'
          })"
        >
          <div class="text-center">
            <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-rose-900 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-white mb-2">Easy Integration</h3>
            <p class="text-gray-400">Seamless integration with your existing tools</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
