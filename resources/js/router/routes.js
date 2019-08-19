import App from '../views/App'
import NotFound from "../components/NotFoundComponent"
import TitulacionesHome from '../views/titulaciones/Home'
import TitulacionesIndex from "../views/titulaciones/Index";
import ConvalidacionesHome from '../views/convalidaciones/Home'
import CreateSinodales from "../views/titulaciones/CreateSinodales";
import EditSinodales from "../views/titulaciones/EditSinodales";
import CreateNombramiento from "../views/titulaciones/CreateNombramiento";

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
                    children: [
                        {
                            path: '',
                            component: TitulacionesIndex,
                            name: 'titulaciones-index'
                        },
                        {
                            path: ':nombramientoId/asignar/sinodales',
                            component: CreateSinodales,
                            name: 'sinodales-create'
                        },
                        {
                            path: ':nombramientoId/editar/sinodales',
                            component: EditSinodales,
                            name: 'sinodales-edit',
                            props: true
                        },
                        {
                            path: 'nueva',
                            component: CreateNombramiento,
                            name: 'titulaciones.nueva'
                        }
                    ]
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
