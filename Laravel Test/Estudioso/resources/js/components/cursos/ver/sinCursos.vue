<template>
    <div class="h4 text-center" v-show="!this.ex">
        ¡Aun no tienes cursos! <br> Puedes agregarlos haciendo click en la <br> barra de navegación
        o en el boton inferior.
    </div>
</template>

<script>
export default {

    props: ['ex'],

    mounted() {
        console.log('texto cursos vacios montado.');
    },

    data() {
        return {

        }
    },
}
</script>