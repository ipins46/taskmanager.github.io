<template>
    <div class="container">
        <h1>{{ task.title }}</h1>
        <hr>
        <p>{{ task.content }}</p>
    </div>

</template>

<script>
export default {
    data() {
        return {
            task: [],
        }
    },

    mounted() {
        // console.log(this.$route.params.id);
        this.getTask();
    },

    methods: {
        async getTask() {
            let response = await axios.get('/api/tasks/' + this.$route.params.id)
            this.task = response.data.data
        }
    },
}
</script>

<style>

</style>
