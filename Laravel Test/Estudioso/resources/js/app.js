/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Cursos
Vue.component("agregar-evaluacion", require("./components/cursos/agregar/agregarEvaluacion.vue").default);
Vue.component("tabla-vacia", require("./components/cursos/agregar/tablaVacia.vue").default);
Vue.component("editar-evaluacion", require("./components/cursos/agregar/editarEvaluacion.vue").default);
Vue.component("borrar-evaluacion", require("./components/cursos/agregar/borrarEvaluacion.vue").default);
Vue.component("borrar-button", require("./components/cursos/ver/borrarBtn.vue").default);
Vue.component("sin-cursos", require("./components/cursos/ver/sinCursos.vue").default);

//Evaluaciones
Vue.component("calif-comp", require("./components/evaluaciones/ver/calificacion.vue").default);
Vue.component("borrar-curso", require("./components/evaluaciones/ver/borrarCursoBtn.vue").default);
Vue.component("info-button", require("./components/evaluaciones/ver/infoCurso.vue").default);
Vue.component("sin-evaluaciones", require("./components/evaluaciones/ver/sinEvaluaciones.vue").default);

//Home
Vue.component("dias-evaluacion", require("./components/home/diasEvaluacion.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});
