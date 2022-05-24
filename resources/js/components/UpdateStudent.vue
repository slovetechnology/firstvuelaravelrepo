
<template>

    <form class="p-3" @submit.prevent="updateStudent()">
        <div class="d-flex justify-content-between">
            <div class=""></div>
            <div class="btn btn-sm btn-secondary font-size-13 text-capitalize" @click="closeupdate()">Back</div>
        </div>
        <div class="font-size-18 text-muted border-bottom border-aliceblue pb-2 mb-2">Update Student Record</div>
        <div class="form-group mb-2">
            <div class="w-100 font-size-13 text-muted">Enter Student Name</div>
            <input type="text" class="form-control font-size-13" v-model="singleStudent.name">
        </div>
        <div class="form-group mb-2">
            <div class="w-100 font-size-13 text-muted">Enter Student Contact</div>
            <input type="text" class="form-control font-size-13" v-model="singleStudent.contact">
        </div>
        <div class="form-group mb-2">
            <div class="w-100 font-size-13 text-muted">Upload Student Profile</div>
            <input type="file" name="" id="" class="form-control font-size-13" v-on:change="form.image">
        </div>
        <button class="btn btn-sm btn-success py-2 text-capitalize font-size-14 w-100 mt-3 d-flex justify-content-between align-items-center">update <i class="fas fa-pencil fa-lg fa-fw"></i> </button>
        <div class="mt-3 btn btn-sm btn-danger text-capitalize font-size-14 w-100 d-flex justify-content-between align-items-center" @click="deleteStudent()">delete <i class="fas fa-trash-alt fa-lg fa-fw"></i> </div>
    </form>
</template>

<script>
export default {
    props: ['singleStudent'],
    methods: {
        updateStudent() {
            if(this.singleStudent.name === '') {
                alert('Name Field Must not be Empty');
            }else{
                if(this.singleStudent.contact === '') {
                    alert('Contact Field must not be Empty');
                }else{
                    const axios = require('axios');

                    axios.put('api/student/'+this.singleStudent.id, {
                        singleStudent: this.singleStudent
                    })
                    .then( response => {
                        if(response.status === 200) {
                            this.$emit('updateList');
                        }
                    })
                    .catch( error => {
                        alert(error);
                    })
                }
            }
        },
        deleteStudent() {
            const axios = require('axios');
            axios.delete('api/student/'+this.singleStudent.id)
            .then( response => {
                if(response.status === 200) {
                    this.$emit('updateList');
                    this.$emit('closeUps');
                }
            })
            .catch( error => {
                console.log(error);
            })
        },
        closeupdate() {
            this.$emit('closeUps');
        }
    }
}
</script>

<style>

</style>

