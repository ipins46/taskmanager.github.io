<template>
    <!-- <v-app id="inspire"> -->
        <v-navigation-drawer :drawer="drawer"
        v-model="drawer"
        app
        >
        <v-img src="https://preview.pixlr.com/images/800wm/1439/2/1439104804.jpg" class="pa-4" style="background-color: aqua;">
            <div class="text-center mt-5">
            <v-avatar class="mb-4" color="grey darken-1" size="64">
                <v-img aspect-ratio="30" src="https://randomuser.me/api/portraits/women/81.jpg"></v-img>
            </v-avatar>

            <h2 class="text-white">Arifin Admin</h2>
            </div>
        </v-img>

        <v-divider></v-divider>

        <v-row justify="center">
        <v-dialog v-model="dialog" persistent max-width="600px">
            <template v-slot:activator="{ on, attrs }">
            <v-btn rounded class="ml-4 mt-3" dark v-bind="attrs" v-on="on" style="background-color: grey;">
                CREATE TASK
                <v-icon>add</v-icon>
            </v-btn>
            </template>
            <v-card>
            <v-card-title>
                <span class="text-h5">Add Task</span>
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
                Submit
                </v-btn>
            </v-card-actions>
            </v-card>
        </v-dialog>
        </v-row>

        <v-list>
            <v-list-item
            v-for="[icon, text] in links"
            :key="icon"
            link
            >
            <v-list-item-icon>
                <v-icon>{{ icon }}</v-icon>
            </v-list-item-icon>

            <v-list-item-content class="ml-2">
                <v-list-item-title>{{ text }}</v-list-item-title>
            </v-list-item-content>
            </v-list-item>
        </v-list>
        </v-navigation-drawer>
    <!-- </v-app> -->
</template>

<script>
    import { ref } from 'vue'

  export default {
    name: 'example',
    props:['drawer'],
    data: () => ({
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
            { id: 0, title: 'Item A', list: 1},
            { id: 1, title: 'Item B', list: 1},
            { id: 2, title: 'Item C', list: 2},
            { id: 3, title: 'Item D', list: 3},
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
  }
</script>
