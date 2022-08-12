<template>

<v-app>
    <v-main>
      <v-container class="py-8 px-6" fluid>
        <div class="title-bar px-5 mb-5">
            Task Manager
        </div>

        <v-row style="margin-bottom: 50px">
            <v-col lg="4" cols="4" style="border-right: 1px solid #A6A6A6; padding-bottom: 60px;">
                <div class="todo">
                    <v-subheader>
                        <!-- <h3>Dashboard</h3> -->
                        <v-btn rounded color="black text-white">
                            To do
                        </v-btn>
                        <v-btn icon style="margin-left: auto;">
                            <v-icon >more_vert</v-icon>
                        </v-btn>
                    </v-subheader>
                </div>

                <div class="drop-zone" @drop="onDrop($event, 1)" @dragenter.prevent @dragover.prevent>
                    <v-card color="#385F73" dark class="mt-5 mb-5" v-for="item in getList(1)" :key="item.id" draggable="true" @dragstart="startDrag($event, item)">

                        <v-btn rounded color="blue text-white my-5 ml-5">
                        In Development
                        </v-btn>

                        <!-- @foreach($taskmanager as $index => $tm) -->
                        <v-img
                        src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                        height="200px"
                        class="mx-5"
                        ></v-img>

                        <v-card-title class="text-h5">
                            {{ item.title }}
                            <!-- {{ $tm.title }} -->
                        </v-card-title>

                        <v-card-subtitle>
                            {{ item.content }}
                            <!-- {{ $tm.content }} -->
                        </v-card-subtitle>
                        <!-- @endforeach -->

                        <!-- <v-card-actions>
                        <v-btn style="left: 75%">
                            <v-icon class="me-1" style="font-size: 16px">edit</v-icon>
                            Edit
                        </v-btn>
                        </v-card-actions> -->

                        <v-row>
                            <v-dialog v-model="dialog" persistent max-width="600px">
                                <template v-slot:activator="{ on, attrs }">
                                <v-btn class="mb-3 mt-5 w-100" v-bind="attrs" v-on="on">
                                    <v-icon class="me-1" style="font-size: 16px">edit</v-icon>
                                    Edit

                                </v-btn>
                                </template>
                                <v-card>
                                <v-card-title>
                                    <span class="text-h5">Edit Task</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                    <v-row>
                                        <v-col cols="12">
                                            <v-file-input label="Image input" filled prepend-icon="add_a_photo"></v-file-input>
                                        </v-col>
                                        <v-col cols="12">
                                        <v-text-field label="Title" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                        <v-text-field label="Content" required></v-text-field>
                                        </v-col>
                                    </v-row>
                                    </v-container>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="dialog = false">
                                    Close
                                    </v-btn>
                                    <v-btn color="blue darken-1" text @click="dialog = false">
                                    Edit
                                    </v-btn>
                                </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-row>

                    </v-card>
                </div>
            </v-col>

            <v-col lg="4" cols="4" style="border-right: 1px solid #A6A6A6; padding-bottom: 60px;">
                <div class="inProgress">
                    <v-subheader>
                        <!-- <h3>Dashboard</h3> -->
                        <v-btn rounded color="primary text-white">
                            In Progress
                        </v-btn>
                        <v-btn icon style="margin-left: auto;">
                            <v-icon >more_vert</v-icon>
                        </v-btn>
                    </v-subheader>
                </div>

                <div class="drop-zone" @drop="onDrop($event, 2)" @dragenter.prevent @dragover.prevent>
                    <v-card color="#385F73" dark class="mb-5 mt-5" v-for="item in getList(2)" :key="item.id" draggable="true" @dragstart="startDrag($event, item)">

                        <v-btn rounded color="blue text-white my-5 ml-5">
                        In Development
                        </v-btn>

                        <v-img
                        src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                        height="200px"
                        class="mx-5"
                        ></v-img>

                        <v-card-title class="text-h5">
                            {{ item.title }}
                        </v-card-title>

                        <v-card-subtitle>
                            {{ item.content }}
                        </v-card-subtitle>

                        <!-- <v-card-actions>
                        <v-btn style="left: 75%">
                            <v-icon class="me-1" style="font-size: 16px">edit</v-icon>
                            Edit
                        </v-btn>
                        </v-card-actions> -->

                        <v-row>
                            <v-dialog v-model="dialog" persistent max-width="600px">
                                <template v-slot:activator="{ on, attrs }">
                                <v-btn class="mb-3 mt-5" v-bind="attrs" v-on="on">
                                    <v-icon class="me-1" style="font-size: 16px">edit</v-icon>
                                    Edit

                                </v-btn>
                                </template>
                                <v-card>
                                <v-card-title>
                                    <span class="text-h5">Edit Task</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                    <v-row>
                                        <v-col cols="12">
                                            <v-file-input label="Image input" filled prepend-icon="add_a_photo"></v-file-input>
                                        </v-col>
                                        <v-col cols="12">
                                        <v-text-field label="Title" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                        <v-text-field label="Content" required></v-text-field>
                                        </v-col>
                                    </v-row>
                                    </v-container>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="dialog = false">
                                    Close
                                    </v-btn>
                                    <v-btn color="blue darken-1" text @click="dialog = false">
                                    Edit
                                    </v-btn>
                                </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-row>

                    </v-card>
                </div>
            </v-col>

            <v-col lg="4" cols="4" style="padding-bottom: 60px;">
                <div class="completed">
                    <v-subheader>
                    <!-- <h3>Dashboard</h3> -->
                    <v-btn rounded color="warning text-white">
                        Completed
                    </v-btn>
                    <v-btn icon style="margin-left: auto;">
                        <v-icon >more_vert</v-icon>
                    </v-btn>
                    </v-subheader>
                </div>

                <div class="drop-zone" @drop="onDrop($event, 3)" @dragenter.prevent @dragover.prevent>
                    <v-card color="#385F73" dark class="mb-5 mt-5" v-for="item in getList(3)" :key="item.id" draggable="true" @dragstart="startDrag($event, item)">

                        <v-btn rounded color="blue text-white my-5 ml-5">
                        In Development
                        </v-btn>

                        <v-img
                        src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                        height="200px"
                        class="mx-5"
                        ></v-img>

                        <v-card-title class="text-h5">
                            {{ item.title }}
                        </v-card-title>

                        <v-card-subtitle>
                            {{ item.content }}
                        </v-card-subtitle>

                        <!-- <v-card-actions>
                        <v-btn style="left: 75%">
                            <v-icon class="me-1" style="font-size: 16px">edit</v-icon>
                            Edit
                        </v-btn>
                        </v-card-actions> -->

                        <v-row>
                            <v-dialog v-model="dialog" persistent max-width="600px">
                                <template v-slot:activator="{ on, attrs }">
                                <v-btn class="mb-3 mt-5" v-bind="attrs" v-on="on">
                                    <v-icon class="me-1" style="font-size: 16px">edit</v-icon>
                                    Edit

                                </v-btn>
                                </template>
                                <v-card>
                                <v-card-title>
                                    <span class="text-h5">Edit Task</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                    <v-row>
                                        <v-col cols="12">
                                            <v-file-input label="Image input" filled prepend-icon="add_a_photo"></v-file-input>
                                        </v-col>
                                        <v-col cols="12">
                                        <v-text-field label="Title" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                        <v-text-field label="Content" required></v-text-field>
                                        </v-col>
                                    </v-row>
                                    </v-container>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="dialog = false">
                                    Close
                                    </v-btn>
                                    <v-btn color="blue darken-1" text @click="dialog = false">
                                    Edit
                                    </v-btn>
                                </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-row>

                    </v-card>
                </div>
            </v-col>
        </v-row>
      </v-container>
    </v-main>

  </v-app>




</template>

<script>
    import { ref } from 'vue'

  export default {

    name: 'example',
    props:['drawer'],
    data: () => ({
        taskmanager: [],
      cards: ['Today', 'Yesterday'],
      drawer: true,
      dialog: false,
      links: [
        ['dashboard', 'Dashboard'],
        ['task', 'Task Manager'],
        ['insights', 'Analytics'],
        ['report', 'Spam'],
      ],
      menus: [
        {title: "Profile", icon: "person"},
        {title: "Change Password", icon: "vpn_key"},
        {title: "Setting", icon: "settings"},
        {title: "Logout", icon: "logout"}
      ],
      items: [
        { header: 'Today' },
        {
          avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
          title: 'Brunch this weekend?',
          subtitle: `<span class="text--primary">Ali Connors</span> &mdash; I'll be in your neighborhood doing errands this weekend. Do you want to hang out?`,
        },
        { divider: true, inset: true },
        {
          avatar: 'https://cdn.vuetifyjs.com/images/lists/2.jpg',
          title: 'Summer BBQ <span class="grey--text text--lighten-1">4</span>',
          subtitle: `<span class="text--primary">to Alex, Scott, Jennifer</span> &mdash; Wish I could come, but I'm out of town this weekend.`,
        },
        { divider: true, inset: true },
        {
          avatar: 'https://cdn.vuetifyjs.com/images/lists/3.jpg',
          title: 'Oui oui',
          subtitle: '<span class="text--primary">Sandra Adams</span> &mdash; Do you have Paris recommendations? Have you ever been?',
        },

      ],
    }),

    setup() {
        const items = ref([
            { id: 0, title: 'Item A', content: 'Coding coding coding', list: 1},
            { id: 1, title: 'Item B', content: 'Coding coding coding', list: 1},
            { id: 2, title: 'Item C', content: 'Coding coding coding', list: 2},
            { id: 3, title: 'Item D', content: 'Coding coding coding', list: 3},
        ])

        const getList = (list) => {
            return items.value.filter((item) => item.list == list)
        }

        const startDrag = (event, item) => {
            console.log(item)
            event.dataTransfer.dropEffect = 'move'
            event.dataTransfer.effectAllowed = 'move'
            event.dataTransfer.setData('itemID', item.id)
        }

        const onDrop = (event, list) => {
            const itemID = event.dataTransfer.getData('itemID')
            const item = items.value.find((item) => item.id == itemID)
            item.list = list
        }

        return {
            getList,
            onDrop,
            startDrag
        }
    },

    created() {
        axios.get('http://127.0.0.1:8000/api/taskmanagers')
        .then(tes => {
            this.taskmanager = tes.data
            console.log(this.$ref)
        })
    },
  }
</script>

<style lang="scss" scoped>
.drop-zone {
    width: 100%;
    margin: 10px auto;
    background-color: #ecf0f1;
    padding: 10px;
    min-height: 200px;
    height: 100%;
}

.title-bar {
    font-size: 30px;
    font-weight: 800;
    /* border: 2px solid black; */
    padding-bottom: inherit;
    text-decoration: underline;
}

</style>
