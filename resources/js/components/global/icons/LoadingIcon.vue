<template>
    <svg
        :width="width"
        :height="height"
        viewBox="0 0 38 38"
        xmlns="http://www.w3.org/2000/svg"
        stroke-width="2"
        stroke="currentColor"
        class="icon icon-tabler icon-tabler-loading"
        >
        <g fill="none" fill-rule="evenodd">
            <g transform="translate(1 1)" stroke-width="2">
                <circle stroke-opacity=".5" cx="18" cy="18" r="18"/>
                <path d="M36 18c0-9.94-8.06-18-18-18">
                    <animateTransform
                        attributeName="transform"
                        type="rotate"
                        from="0 18 18"
                        to="360 18 18"
                        dur="1s"
                        repeatCount="indefinite"/>
                </path>
            </g>
        </g>
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
        },
        mounted(){

        }
    }
</script>

<style lang="scss" scoped>

</style>
