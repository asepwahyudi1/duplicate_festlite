<template>
    <div class="row">
        <Loader v-if="loading" />
        <template v-else>
            <div class="col-sm-6 col-12 col-md-4 col-lg-4 col-xl-3 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <span class="bg-danger text-white avatar hw-50">
                                    <icon-cash />
                                </span>
                            </div>
                            <div class="col">
                                <div class="fz-20">{{ $t("due_fees") }}</div>
                                <div class="font-weight-bold fz-20">
                                    Rp {{ overview.total_due }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12 col-md-4 col-lg-4 col-xl-3 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <span class="bg-primary text-white avatar hw-50">
                                    <icon-book />
                                </span>
                            </div>
                            <div class="col">
                                <div class="fz-20">{{ $t("events") }}</div>
                                <div class="font-weight-bold fz-20">
                                    {{ overview.total_exam }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12 col-md-4 col-lg-4 col-xl-3 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <span class="bg-info text-white avatar hw-50">
                                    <icon-edit-circle />
                                </span>
                            </div>
                            <div class="col">
                                <div class="fz-20">{{ $t("exams") }}</div>
                                <div class="font-weight-bold fz-20">
                                    {{ overview.total_exam }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12 col-md-4 col-lg-4 col-xl-3 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <span class="bg-warning text-white avatar hw-50">
                                    <icon-wallet />
                                </span>
                            </div>
                            <div class="col">
                                <div class="fz-20">{{ $t("expenses") }}</div>
                                <div class="font-weight-bold fz-20">
                                    Rp {{ overview.total_expenses }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Quote -->
            <div class="col-sm-9 col-12 col-md-9 col-lg-9 col-xl-9 mb-2">
                <div class="card" style="min-height:335px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="fz-20">
                                    Quote
                                </div>
                                <br>
                                <div class="fz-20">
                                    {{ overview.quote.description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- QR -->
            <div class="col-sm-6 col-12 col-md-3 col-lg-3 col-xl-3 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="fz-15">
                                </div>
                                <div class="fz-20">
                                    <img v-bind:src="rollNo" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </template>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                overview: {
                    total_exam: 0,
                    total_event: 0,
                },
                rollNo: {},
                loading: true,
            };
        },
        async created() {
            this.loading = true;
            let response = await axios.get("/api/parent/dashboard/overview");
            this.overview = response.data;
            this.loading = false;
        },
    methods: {
        async loadData() {
            let response = await axios.get("/api/users/authuser-details");
            this.userData = response.data;
            this.rollNo = 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=' + response.data.roll_no;
        },
    },
    async mounted() {
        await this.loadData();
    },
    };
</script>
