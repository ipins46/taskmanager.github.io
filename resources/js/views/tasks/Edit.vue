<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">New Task</div>
                    <div class="card-body">
                        <form action="#" method="post" @submit.prevent="update">
                            <div class="form-group mt-4">
                                <label for="title">Title</label>
                                <input type="text" v-model="form.title" id="title" class="form-control">
                                <div v-if="theErrors.title" class="mt-2 text-danger">{{ theErrors.title[0] }}</div>
                            </div>

                            <div class="form-group mt-4">
                                <!-- <select v-model="task" id="task" class="form-control"></select> -->
                                <label for="content">Content</label>
                                <input type="text" v-model="form.content" id="content" class="form-control">
                                <div v-if="theErrors.content" class="mt-2 text-danger">{{ theErrors.content[0] }}</div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                title: '',
                content: '',
            },
            tasks: [],
            theErrors: [],
        }
    },

    mounted() {
        this.getTasks();
        this.getTask();
    },

    methods: {
        async getTasks() {
            let response = await axios.get('/api/tasks')

            if(response.status == 200){
                this.tasks = response.data
            }
        },

        async getTask() {
            let response = await axios.get(`/api/tasks/${this.$route.params.id}`);
            this.form = response.data.data
            console.log(this.form);
        },

        async update() {
            let response = await axios.patch(`/api/tasks/${this.$route.params.id}/edit`, this.form);

            if (response.status == 200) {
                this.$toasted.show(response.data.message, {
                    type: 'success',
                    duration: 3000,
                })
                this.$router.push('/tasks/table')
            }
        }
    }

}
</script>
