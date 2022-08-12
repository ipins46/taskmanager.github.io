<template>
    <!-- <v-app id="inspire"> -->
        <v-app-bar app
        color="white"
        elevate-on-scroll
        elevation="4"
        @handeDrawer="drawer = !drawer"
        style="background-color: white;"
        >
        <v-app-bar-nav-icon @click="$emit('handeDrawer')"></v-app-bar-nav-icon>

        <v-spacer />

        <v-col lg="6" cols="12" class="mt-4">
            <v-form>
            <v-text-field rounded outlined dense placeholder="Search Here" append-icon="search" />
            </v-form>
        </v-col>

        <!-- <v-toolbar-title>Title</v-toolbar-title> -->

        <v-spacer />

        <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
            <span v-bind="attrs" v-on="on" style="cursor: pointer" class="mx-5 mr-10">
                <v-badge offset-x="10" offset-y="10" color="red" content="5">
                <v-icon>notifications</v-icon>
                </v-badge>
            </span>
            </template>

            <v-list three-line width="250">
            <template v-for="(item, index) in items">
                <v-subheader
                v-if="item.header"
                :key="item.header"
                v-text="item.header"
                ></v-subheader>

                <v-divider
                v-else-if="item.divider"
                :key="index"
                :inset="item.inset"
                ></v-divider>

                <v-list-item
                v-else
                :key="item.title"
                >
                <v-list-item-avatar>
                    <v-img :src="item.avatar"></v-img>
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title v-html="item.title"></v-list-item-title>
                    <v-list-item-subtitle v-html="item.subtitle"></v-list-item-subtitle>
                </v-list-item-content>
                </v-list-item>
            </template>
            </v-list>
        </v-menu>

        <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
            <span v-bind="attrs" v-on="on" style="cursor: pointer" class="mx-5 mr-10">
                <v-chip link>
                <v-badge dot bottom offset-y="10" offset-x="10" color="orange">
                    <v-avatar size="40">
                    <img src="https://randomuser.me/api/potraits/women/81.jpg" alt="">
                    </v-avatar>
                </v-badge>
                <span>Muhamad Arifin</span>
                </v-chip>
            </span>
            </template>
            <v-list width="250" class="py-0">
            <v-list-item two-line>
                <v-list-item-avatar>
                <img src="https://randomuser.me/api/potraits/women/81.jpg" alt="">
                </v-list-item-avatar>
                <v-list-item-content>
                <v-list-item-title>
                    Muhamad Arifin
                </v-list-item-title>
                <v-list-item-subtitle>
                    Logged In
                </v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
            <v-list-item v-for="(menu,index) in menus" :key="index" link>
                <v-list-item-icon>
                <v-icon>{{menu.icon}}</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                <v-list-item-title>{{menu.title}}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            </v-list>
        </v-menu>
        </v-app-bar>
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
