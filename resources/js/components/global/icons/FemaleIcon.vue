<template>
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-woman" :width="width" :height="height"
        viewBox="0 0 24 24" stroke-width="2" :stroke="stroke" fill="none" stroke-linecap="round"
        stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <circle cx="12" cy="5" r="2"></circle>
        <path d="M10 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4"></path>
    </svg>
</template>

<script>
    export default {
        props:{
            width: {
                type: Number,
                default: 24
            },
            height: {
                type: Number,
                default: 24
            },
            stroke: {
                type: String,
                default: 'currentColor'
            }
        }
    }
</script>
