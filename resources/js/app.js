import './bootstrap';
import 'flowbite';

if ('serviceWorker' in navigator) {
    console.log('Service Worker test');
        window.addEventListener('load', () => {
        navigator.serviceWorker.register('/device-player')
            .then(registration => {
            console.log('Service Worker registered with scope:', registration.scope);
            })
            .catch(error => {
            console.log('Service Worker registration failed:', error);
            });
        });
    }



import { createApp } from 'vue'
import Counter from './components/Counter.vue'
import DeviceList from './components/DeviceList.vue'

const app = createApp()
app.component('counter', Counter)
app.component('device-list', DeviceList)

app.mount('#app')
