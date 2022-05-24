
<template>
<div class="container shadow rounded p-3 my-4">
    <div class="row">
        <div class="col-md-4">
            <div class="" v-if="openups">
                <add-student-vue v-on:updateList="getStudents()" />
            </div>
            <div class="" v-else>
                <update-student-vue v-on:closeUps="openups = true" :singleStudent="singleStudent" v-on:updateList="getStudents()" />
            </div>
        </div>
        <div class="col-md-8">
            <div class="p-2">
                <search-vue />
                <div class="studentdiv">
                    <div class="" v-for="student in students" :key="student.id">
                        <student-list-vue :student="student" @openupdate="getSingleData" v-on:viewups="openups = false" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import AddStudentVue from './AddStudent.vue'
import SearchVue from './Search.vue'
import StudentListVue from './StudentList.vue'
import UpdateStudentVue from './UpdateStudent.vue'
export default {
    data: function() {
        return {
            students: [],
            singleStudent: {},
            openups: true,
        }
    },
    components: {
        AddStudentVue,
        SearchVue,
        StudentListVue,
        UpdateStudentVue,
    },
    methods: {
        getStudents() {
            const axios = require('axios');
            axios.get('api/students')
            .then( response => {
                if(response.status === 200) {
                    this.students = response.data
                }
            })
            .catch( error => {
                return 'No Student Found';
            })
        },
        getSingleData(value) {
            const axios = require('axios');
            axios.get('api/student/'+ value)
            .then( response => {
                if(response.status === 200) {
                    this.singleStudent = response.data;
                }
            })
            .catch( error => {
                console.log(error);
            })
        }
    },
    created() {
        this.getStudents();
    }
}
</script>

<style>

.studentdiv{
    display: flex;
    flex-wrap: wrap;
    margin-top: 16px;
}
.studcont{
    margin: 0 0 14px 16px;
}
.studcont>div:nth-child(1) {
    z-index: 2;
}
.studcont>div:nth-child(2) {
    margin-left: -18px;
    padding: 10px 16px 10px 25px;
    border-top-right-radius: 50px;
    border-bottom-right-radius: 50px;
    cursor: pointer;
    background: #fff;
}
.studcont>div:nth-child(2):hover {
    background: whitesmoke;
}

</style>

