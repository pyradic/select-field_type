<template>
    <multiselect v-model="value" :options="opts"></multiselect>
</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
    components: {
        Multiselect
    },
    props: {
        opts: Object
    },
    data () {
        return {
            value: '',
            options: []
        }
    },
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
