<template>
    <div>
        {{ device.code }}
        <button @click="refreshDevice(device.code)">Refresh</button>
    </div>
</template>
<script>
export default {
    props: {
        device: {
            type: Object,
            required: true
        }
    },
    methods: {
        refreshDevice(deviceId) {
            console.log('refresh',deviceId);
            axios.get(`/refresh-device/${deviceId}`)
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>
