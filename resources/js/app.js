import { createApp } from 'vue/dist/vue.esm-bundler';
import LastOperations from './components/LastOperations.vue';

const app = createApp({
    components: {
        'last-operations' : LastOperations,
    }
});

app.mount('#app');
