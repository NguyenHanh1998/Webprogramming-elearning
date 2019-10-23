<template>
    <div>
        <p>{{this.value}}</p>
        <el-button type="danger">Hello</el-button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                value: "test"
            }
        },
        components: {
            
        },
        methods: {
            test() {
                // do st
            }
        },
        props: {
            propName: {
                type: Number,
                default: 10 
            },
        },
    }
</script>

<style lang="scss" scoped>

</style>