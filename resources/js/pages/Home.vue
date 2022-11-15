<template>
    <div>
        <admin-dashboard listClass="pt-lg-3"
            v-if="userType == 'admin' && user.original_role != 'Student' && userType != 'guardian' && user.original_role != 'Teacher' && user.original_role != 'Accountant'" />
        <students-dashboard listClass="pt-lg-3" v-if="userType == 'student' && user.original_role == 'Student'" />
        <parents-dashboard listClass="pt-lg-3" v-if="userType == 'guardian' && user.original_role == 'Guardian'" />
        <teachers-dashboard listClass="pt-lg-3" v-if="userType == 'staff' && user.original_role == 'Teacher'" />
        <accountants-dashboard listClass="pt-lg-3" v-if="userType == 'staff' && user.original_role == 'Accountant'" />
    </div>
</template>

<script>
    export default {
        components: {
            AdminDashboard: () => import("./admin/dashboard.vue"),
            StudentsDashboard: () => import("./student/dashboard.vue"),
            ParentsDashboard: () => import("./parent/dashboard.vue"),
            TeachersDashboard: () => import("./teacher/dashboard.vue"),
            AccountantsDashboard: () => import("./accountant/dashboard.vue"),
        },
        computed: {
            user() {
                return this.$store.getters["auth/user"];
            },
            userType() {
                return this.user.role;
            }
        },
    };
</script>
