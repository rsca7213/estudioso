<template>
    <div class="text-center" v-show="this.ciclos == 0">
        <p> ¡Las evaluaciones del curso se iran colocando aquí a medida que se agregen! </p>
    </div>
</template>

<script>
export default {
    
    props: ['ciclos'],

    mounted() {
        console.log('Componente de tabla vacia montado.');
    },

    
}
</script>