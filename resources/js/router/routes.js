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
import UsersHome from '../views/catalogos/usuarios/Home'
import UsersIndex from '../views/catalogos/usuarios/Index'
import CreateUser from '../views/catalogos/usuarios/CreateUser'
import EditUser from '../views/catalogos/usuarios/EditUser'
import AlumnosHome from '../views/catalogos/alumnos/Home'
import AlumnosIndex from '../views/catalogos/alumnos/Index'

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
                            path: 'alumnos',
                            component: AlumnosHome,
                            children: [
                                {
                                    path: '',
                                    component: AlumnosIndex,
                                    name: 'catalogos-alumnos'
                                }
                            ]
                        },
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
                        {
                            path: 'usuarios',
                            component: UsersHome,
                            children: [
                                {
                                    path: '',
                                    component: UsersIndex,
                                    name: 'catalogos-usuarios'
                                },
                                {
                                    path: 'nuevo',
                                    component: CreateUser,
                                    name: 'catalogos-usuarios-nuevo'
                                },
                                {
                                    path: ':id',
                                    component: EditUser,
                                    name: 'catalogos-usuarios-editar',
                                    props: true
                                },
                            ]
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
