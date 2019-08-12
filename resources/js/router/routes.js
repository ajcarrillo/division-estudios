import App from '../views/App'
import NotFound from "../components/NotFoundComponent"
import TitulacionesHome from '../views/titulaciones/Home'
import ConvalidacionesHome from '../views/convalidaciones/Home'

export default {
    mode: 'history',
    routes: [
        {
            path: '*',
            component: NotFound
        },
        {
            path: '/app',
            component: App,
            children: [
                {
                    path: 'titulaciones',
                    component: TitulacionesHome,
                    name: 'titulaciones'
                },
                {
                    path: 'convalidaciones',
                    component: ConvalidacionesHome,
                    name: 'convalidaciones'
                },
            ]
        },
    ]
}
