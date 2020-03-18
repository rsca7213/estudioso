<template>
    <span :class="color">(en {{this.dias}} dias)</span>
</template>

<script>
export default {
    props: ["dias"],

    mounted() {
        if (this.dias < 5) this.color = "text-danger";
        else if (this.dias > 5 && this.dias < 15) this.color = "text-primary";
        else this.color = "";
        console.log("Componente de dias para evaluacion montado.");
    },

    data() {
        return {
            color: ""
        };
    }
};
</script>
 
<style>
</style>