import './bootstrap';
import 'flowbite';





import { createApp } from 'vue'
import Counter from './components/Counter.vue'
import DeviceList from './components/DeviceList.vue'

const app = createApp()
app.component('counter', Counter)
app.component('device-list', DeviceList)

app.mount('#app')
