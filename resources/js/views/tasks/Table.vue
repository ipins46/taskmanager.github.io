<template>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="task in tasks" :key="task.id">
                    <td><router-link :to="{ name: 'tasks.show', params: { id: task.id } }">{{ task.title }}</router-link></td>
                    <td>{{ task.content }}</td>
                    <td><router-link :to="{ name: 'tasks.edit', params: { id: task.id } }">Edit</router-link></td>
                    <td><delete-task :endpoint="task.id"/></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import DeleteTask from './Delete'

export default {
    components: {
        DeleteTask
    },

    data() {
        return {
            tasks: [],
        }
    },

    mounted() {
        // axios.get('/api/tasks').then((response) => {
        //     this.tasks = response.data.data
        // });

        this.getTasks();
    },

    methods: {
        async getTasks() {
            let response = await axios.get('/api/tasks')
            this.tasks = response.data.data
        }
    },
}
</script>

<style>

</style>
