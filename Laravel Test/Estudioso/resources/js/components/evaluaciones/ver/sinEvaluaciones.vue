<template>
    <div class="h5 text-center" v-show="!this.ex">
        ¡Este curso no tiene evaluaciones!
        <br />Puedes agregarlas haciendo click
        <br />en "Editar Curso".
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Texto sin evaluaciones montado.");
    },

    props: ["ex"]
};
</script>

<style>
</style>