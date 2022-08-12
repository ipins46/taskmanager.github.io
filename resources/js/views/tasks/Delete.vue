<template>
  <button ref="deleteTask" @click="destroyTask">Delete</button>
</template>

<script>
export default {
    props: ['endpoint'],

    methods: {
        async destroyTask() {
            // console.log('delete');
            let q = window.confirm("Are you sure delete this task ?")

            if(q = true) {
                let response = await axios.delete(`/api/tasks/${this.endpoint}/delete`);

                if (response.status == 200) {
                    this.$toasted.show(response.data.message, {
                        type: 'success',
                        duration: 3000,
                    })

                    this.$refs.deleteTask.parentNode.parentNode.remove();
                }
            }
        }
    }
}
</script>

<style>

</style>
