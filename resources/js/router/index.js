import Home from '../views/Home'
import Sidebar from '../components/Sidebar'
import NewTask from '../views/tasks/Create'
import TableofTask from '../views/tasks/Table'
import ShowTheTask from '../views/tasks/Show'
import EditTask from '../views/tasks/Edit'

export default {
    mode: 'history',

    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/sidebar',
            name: 'pages.sidebar',
            component: Sidebar
        },
        {
            path: '/tasks/create',
            name: 'tasks.create',
            component: NewTask
            // component: require('../views/tasks/Create.vue')
        },
        {
            path: '/tasks/table',
            name: 'tasks.table',
            component: TableofTask
        },
        {
            path: '/tasks/:id',
            name: 'tasks.show',
            component: ShowTheTask
        },
        {
            path: '/tasks/:id/edit',
            name: 'tasks.edit',
            component: EditTask
        },
    ]
}
