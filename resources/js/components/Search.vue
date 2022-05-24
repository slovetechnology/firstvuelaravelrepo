
<template>
<form @submit.prevent="search()">
    <div class="form-group mx-3 p-relative d-flex align-items-center">
        <div class="p-absolute top-0 left-0 m-2"><i class="fas fa-search fa-lg fa-fw text-muted"></i></div>
        <input type="text" placeholder="Search For Student here..." id="" class="form-control font-size-13 px-5 rounded-0" v-model="form.searchText">
        <button class="btn btn-sm btn-primary rounded-0 font-size-12 py-2">search</button>
    </div>
</form>
</template>

<script>
export default {
    data() {
        return {
            form: {
                searchText: '',
            }
        }
    },
    methods: {
        search() {
            if(this.form.searchText !== '') {
                const axios = require('axios');
                axios.get('api/student/search', {
                    form: this.form
                })
                .then( response => {
                    if(response.status === 200) {
                        console.log(response.data);
                    }
                })
                .catch( error => {
                    console.log( error );
                })
            }
        }
    }
}
</script>

<style>

</style>

