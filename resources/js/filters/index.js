import Vue from 'vue';

Vue.filter('dateForHummans', function (value) {
    return dateForHummans(value);
});

Vue.filter('statusForHummans', function (value) {
    switch (value) {
        case 'E':
            return 'Enviado';
        case 'P':
            return 'Pendiente';
        case 'C':
            return 'Concluido';
    }
});
