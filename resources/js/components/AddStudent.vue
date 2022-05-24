
<template>

    <form class="p-3" @submit.prevent="goToUploadImage()">
        <div class="font-size-18 text-muted border-bottom border-aliceblue pb-2 mb-2">Add More Students</div>
        <div class="form-group mb-2">
            <div class="w-100 font-size-13 text-muted">Enter Student Name</div>
            <input type="text" class="form-control font-size-13" v-model="form.name">
        </div>
        <div class="form-group mb-2">
            <div class="w-100 font-size-13 text-muted">Enter Student Contact</div>
            <input type="text" class="form-control font-size-13" v-model="form.contact">
        </div>
        <div class="form-group mb-2">
            <div class="w-100 font-size-13 text-muted">Upload Student Profile</div>
            <input type="file" accept="image/*" @change="doctorImageSelected" ref="doctorImage" />
        </div>
        <button class="btn btn-sm btn-success py-2 text-capitalize font-size-14 w-100 mt-3"> <i class="fas fa-plus fa-lg fa-fw"></i> continue </button>
        <div v-if="showimg"> <img :src="showimg" class="myimg" alt=""> </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: '',
                contact: '',
            },
            image: {},
            showimg: null,
        }
    },
    methods: {
        doctorImageSelected(e) {
        let file = e.target.files[0];
        let reader = new FileReader();
        reader.onloadend = (file) => {
        this.image = reader.result;
        }
        reader.readAsDataURL(file);
        reader.onload = e => {
        this.showimg = e.target.result;
        }
        },
        goToUploadImage() {
            var formData = new FormData;
            formData.append("pic", this.image);
            let axios = require('axios');
            axios.post('api/student/store',formData, {
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                })
                .then(response => {
                    if (response.status === 200) {
                        console.log(response);
                    }
                })
                .catch(e => {
                    console.log(e);
                });
        }
    }
}
</script>

<style>
.myimg{
    width: 100px;
    height: 100px;
}
</style>

