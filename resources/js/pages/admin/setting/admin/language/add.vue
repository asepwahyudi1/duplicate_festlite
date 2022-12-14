<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">{{ $t("add") + " " + $t("language") }}</h4>
            <div>
                <router-link :to="{ name: 'setting-admin-language' }" class="btn btn-primary btn-custom">{{ $t("back") }}
                </router-link>
            </div>
        </div>
        <div class="card-body border-bottom py-3 pb-5" style="padding-bottom: 250px !important">
            <loader v-if="loading" />
            <form v-else @submit.prevent="saveLanguage" autocomplete="off" class="pb-5">
                <div class="mb-3 pb-3 border-bottom">
                    <label for="code" class="form-label">{{ $t("language") + " " + $t("code") }}</label>
                    <input v-model="languageForm.code" :class="{ 'is-invalid': languageForm.errors.has('code') }"
                        type="text" class="form-control" :placeholder="$t('language_code')" id="code" />
                    <has-error :form="languageForm" field="code"></has-error>
                </div>
                <table class="table table-striped table-bordered mt-0 pt-0"
                    id="tranlation-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="50%">English Text</th>
                            <th width="50%">Translation Text</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(value, key) in data" :key="key">
                            <td class="key text-capitalize">{{ key | replace('_',' ') }}</td>
                            <td>
                                <input type="text" class="form-control value" style="width:100%"
                                    v-model="data[key]" :name="data[key]">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="lang-btn btn btn-primary mt-5" v-if="checkPermission('setting-edit')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l5 5l10 -10"></path>
                    </svg>
                    {{ $t("save") }}
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
    data() {
        return {
            loading: false,
            data: {},
            languageForm: new Form({
                code: ""
            })
        };
    },
    computed: {
        ...mapGetters({
            languageList: "getAllLocales"
        })
    },
    methods: {
        async getDefaultLanguageContents() {
            try {
                let defaultLang =
                    process.env.VUE_APP_I18N_FALLBACK_LOCALE || "en";
                const { data } = await axios.get(
                    "/api/languages/" + defaultLang
                );

                this.data = data;
            } catch (error) {
                this.toastError();
            }
        },
        async saveLanguage() {
            try {
                let { data } = await this.languageForm.post("/api/language", {
                    data: {
                        code: this.languageForm.code,
                        translations: this.data,
                        languages: this.languageList
                    }
                });

                setTimeout(() => {
                    location.reload();
                }, 2000);

                this.toastSuccess("Language created successfully!");
                this.redirect("setting-admin-language");
            } catch (err) {
                this.toastError();
            }
        }
    },
    mounted() {
        this.getDefaultLanguageContents();
    }
};
</script>

<style scoped>
    .lang-btn {
        position: fixed;
        left: 50%;
        bottom: 50px;
        width: 200px;
        padding: 15px;
        text-align: center;
    }

    @media (max-width: 420px) {
        .btn-custom {
            font-size: 10px;
            padding: 2px 5px;
        }
        .card-title {
            font-size: 15px;
        }
        .btn-custom {
            font-size: 10px;
            padding: 2px 5px;
        }
        .card-title {
            font-size: 15px;
        }
        .lang-btn {
            left: 33%;
            width: 100px;
            padding: 5px;
        }
    }
</style>
