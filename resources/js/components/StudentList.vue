<template>

    <div class="studcont d-flex align-items-center" @click="openUpdate()">
        <div class=""> <img :src="'asset/images/avatar.gif'" alt="" class="w-70px rounded-50 h-70px object-fit-cover"> </div>
        <div class="border border-aliceblue shadow-sm">
            <div class="font-size-13"> {{ student.name }} </div>
            <div class="font-size-13"> {{ student.contact }} </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['student'],
    methods: {
        openUpdate() {
            this.$emit('openupdate', this.student.id);
            this.$emit('viewups');
        }
    }
}
</script>

<style>

</style>


