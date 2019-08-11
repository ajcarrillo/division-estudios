import NotFound from "../components/NotFoundComponent";

export default {
    mode: 'history',
    routes: [
        {
            path: '*',
            component: NotFound
        }
    ]
}
