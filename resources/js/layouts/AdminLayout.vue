<template>
    <div>
        <div v-if="permissionLoaded">
            <admin-vertical-layout v-if="setting.nav_position == 'left'" />
            <admin-horizontal-layout v-else-if="setting.nav_position == 'top'" />
            <div v-else>
                <!-- <h3>{{ $t('error') }}!</h3>
                <p>{{ $t('something_went_wrong') }}! {{ $t('app_layout_not_found') }}!</p> -->
            </div>
        </div>
    </div>
</template>

<script>
import Loader from "../components/Loader.vue";
import AdminHorizontalLayout from "./AdminHorizontalLayout.vue";
import AdminVerticalLayout from "./AdminVerticalLayout.vue";

export default {
    components: {
        Loader,
        AdminVerticalLayout,
        AdminHorizontalLayout
    },
    methods: {
        async setfavicon() {
            await this.$store.dispatch("setting/fetchSetting");

            const favicon = document.getElementById("favicon");
            if (favicon) {
                favicon.setAttribute("href", this.setting.favicon_url);
            }
        }
    },
    computed: {
        permissionLoaded() {
            return this.$store.getters[
                "rolepermission/getPermissionLoadingStatus"
            ];
        },
        setting() {
            return this.$store.getters["setting/setting"];
        }
    },
    mounted() {
        setTimeout(() => {
            this.setfavicon();
        }, 1000);
    }
};
</script>
