<template>
    <div>
        <h1>Devices</h1>
        <ul class="grid grid-cols-12">
            <li class="col-span-4" v-for="device in devices" :key="device.id">
                <DeviceCard :device="device" />

            </li>
        </ul>
    </div>
</template>

<script>
import DeviceCard from './DeviceCard.vue'; // Make sure the path is correct

export default {
    components: {
        DeviceCard
    },
    props: {
        devices: {
            type: Array,
            required: true
        }
    },
    methods: {

    }
};
</script>

<style scoped>
/* Your component styles */
</style>
