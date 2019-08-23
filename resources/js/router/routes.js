import App from '../views/App'
import NotFound from '../components/NotFoundComponent'
import TitulacionesHome from '../views/titulaciones/Home'
import TitulacionesIndex from '../views/titulaciones/Index';
import ConvalidacionesHome from '../views/convalidaciones/Home'
import CreateSinodales from '../views/titulaciones/CreateSinodales';
import EditSinodales from '../views/titulaciones/EditSinodales';
import CreateNombramiento from '../views/titulaciones/CreateNombramiento';
import EditNombramiento from '../views/titulaciones/EditNombramiento';
import CatalogosHome from '../views/catalogos/Home';
import DepartamentosIndex from '../views/catalogos/departamentos/Index';
import MaestrosIndex from '../views/catalogos/maestros/Index';
import CarrerasIndex from '../views/catalogos/carreras/Index';

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
                            path: ':id/editar',
                            component: EditNombramiento,
                            name: 'edit-nombramiento',
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
                    path: 'catalogos',
                    component: CatalogosHome,
                    children: [
                        {
                            path: 'departamentos',
                            component: DepartamentosIndex,
                            name: 'catalogos-departamentos'

                        },
                        {
                            path: 'maestros',
                            component: MaestrosIndex,
                            name: 'catalogos-maestros'
                        },
                        {
                            path: 'carreras',
                            component: CarrerasIndex,
                            name: 'catalogos-carreras'
                        },
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
