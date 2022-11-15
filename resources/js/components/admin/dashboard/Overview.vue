<template>
    <div class="row">

        <div class="col-sm-6 col-12 col-md-4 col-lg-4 col-xl-3 mb-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <span class="text-white avatar hw-50 bg-info">
                                <icon-users />
                            </span>
                        </div>
                        <div class="col">
                            <div class="fz-20">
                                {{ $t("students") }}
                            </div>
                            <div class="font-weight-bold fz-20">
                                {{ overview.total_student }}
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
                            <span class="bg-indigo text-white avatar hw-50 bg-primary">
                                <icon-users />
                            </span>
                        </div>
                        <div class="col">
                            <div class="fz-20">
                                {{ $t("teachers") }}
                            </div>
                            <div class="font-weight-bold fz-20">
                                {{ overview.total_teacher }}
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
                            <span class="bg-cyan text-white avatar hw-50 bg-info">
                                <icon-users />
                            </span>
                        </div>
                        <div class="col">
                            <div class="fz-20">
                                {{ $t("staff") }}
                            </div>
                            <div class="font-weight-bold fz-20">
                                {{ overview.total_staff }}
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
                            <span class="bg-secondary text-white avatar hw-50">
                                <icon-users />
                            </span>
                        </div>
                        <div class="col">
                            <div class="fz-20">
                                {{ $t("parents") }}
                            </div>
                            <div class="font-weight-bold fz-20">
                                {{ overview.total_parent }}
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
                            <span class="bg-success text-white avatar hw-50">
                                <icon-cash />
                            </span>
                        </div>
                        <div class="col">
                            <div class="fz-20">
                                {{ $t("income") }}
                            </div>
                            <div class="font-weight-bold fz-20">
                                Rp {{ overview.total_income }}
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
                            <span class="bg-danger text-white avatar hw-50">
                                <icon-wallet />
                            </span>
                        </div>
                        <div class="col">
                            <div class="fz-20">
                                {{ $t("expense") }}
                            </div>
                            <div class="font-weight-bold fz-20">
                                Rp {{ overview.total_expense }}
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
                            <span class="bg-yellow text-white avatar hw-50 bg-warning">
                                <icon-pen-paper />
                            </span>
                        </div>
                        <div class="col">
                            <div class="fz-20">
                                {{ $t("exams") }}
                            </div>
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
                            <span class="bg-primary text-white avatar hw-50">
                                <icon-event />
                            </span>
                        </div>
                        <div class="col">
                            <div class="fz-20">
                                {{ $t("events") }}
                            </div>
                            <div class="font-weight-bold fz-20">
                                {{ overview.total_event }}
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

    </div>
</template>

<script>
    export default {
        props: {
            overview: {
                type: Object,
                required: true,
            },
        },
        data() {
            return {
                rollNo: {},
            };
        },
        methods: {
        async profileUpdate() {
            const response = await this.profileForm.post(`/api/user/profile/update`, {
                transformRequest: [
                    function (data) {
                        return serialize(data);
                    },
                ],
            });

            if (this.profileForm.image) {
                window.location.reload();
            } else {
                await this.loadData();
            }

            this.toastSuccess(response.message);
        },
        onImageChange(e) {
            this.profileForm.image = e.target.files[0];
        },
        async loadData() {
            let response = await axios.get("/api/users/authuser-details");
            this.userData = response.data;
            this.rollNo = 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=' + response.data.roll_no;
        },
    },
    async mounted() {
        await this.loadData();
        this.profileForm.fill(this.userData);
        this.profileForm.name = this.userData.user.name;
        this.profileForm.email = this.userData.user.email;
    },
    };
</script>
