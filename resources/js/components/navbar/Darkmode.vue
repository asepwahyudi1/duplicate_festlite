<template>
    <div class="nav-item dropdown d-none d-md-flex me-1">
        <a @click.prevent="toggleDarkMode" href="javascript:void(0)" class="dark-mode-btn nav-link px-0">
            <svg v-if="darkMode" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brightness-down"
                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="12" cy="12" r="3"></circle>
                <line x1="12" y1="5" x2="12" y2="5.01"></line>
                <line x1="17" y1="7" x2="17" y2="7.01"></line>
                <line x1="19" y1="12" x2="19" y2="12.01"></line>
                <line x1="17" y1="17" x2="17" y2="17.01"></line>
                <line x1="12" y1="19" x2="12" y2="19.01"></line>
                <line x1="7" y1="17" x2="7" y2="17.01"></line>
                <line x1="5" y1="12" x2="5" y2="12.01"></line>
                <line x1="7" y1="7" x2="7" y2="7.01"></line>
            </svg>
            <svg v-else xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moon" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
            </svg>
        </a>
    </div>
</template>

<script>
    export default {
        methods: {
            toggleDarkMode() {
                this.$store.commit('SET_DARK_MODE');
            }
        },
        computed: {
            darkMode() {
                return this.$store.getters.getMode
            }
        },
        mounted() {
            if (this.darkMode) {
                document.body.classList.add('theme-dark')
            } else {
                document.body.classList.remove('theme-dark')
            }
        }
    }
</script>

<style lang="scss">
    a.dark-mode-btn {
        border-radius: 50% !important;
        background-color: transparent;
        overflow: hidden;
        height: 25px;
        width: 25px;
        box-sizing: border-box;
        font-size: 20px;

        svg {
            color: #423f3f;
            height: 20px;
            width: 20px;
        }
    }

    body.theme-dark {
        a.dark-mode-btn {
            background-color: transparent;

            svg {
                color: white;
                height: 30px;
                width: 30px;
            }
        }
    }
</style>
