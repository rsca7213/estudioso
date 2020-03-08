<template>
    <div>
        <div class="text-right">  
            <button type="button" class="btn btn-primary" @click="agregarEv" v-show="boton"> Agregar Evaluación </button>
        </div>
        <div v-show="popup">
            <hr class="bg-secondary mt-4">
            <div class="row justify-content-center">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header bg-dark text-light text-center"> 
                            <span class="h5"> Agregar Evaluación </span>
                        </div>
                        <div class="card-body justify-content-center border border-secondary" style="background-color: #D0D0D0;">
                            <form action="" id="formEv" v-on:submit.prevent="submitEv">
                                <label for="nombreEv" class="col-form-label text-md-right"> Nombre </label>
                                <input id="nombreEv" type="text" class="col-9 form-control" name="nombreEv" required autocomplete="nombreEv">
                                <label for="fechaEv" class="col-form-label text-md-right"> Fecha </label>
                                <input id="fechaEv" type="date" class="col-5 form-control" name="fechaEv" required autocomplete="fechaEv">
                                <label for="porcEv" class="col-form-label text-md-right"> Porcentaje </label>
                                <div class="d-flex align-items-center">
                                    <input id="porcEv" type="text" class="col-2 form-control" name="porcEv" required autocomplete="porcEv">
                                    <span class="ml-2"> % </span>
                                </div>
                                <div class="text-center"> <button type="submit" class="btn btn-primary mt-4"> Agregar Evaluación </button> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        mounted() {
            console.log('Boton agregar evaluacion montado.');
        },

        methods: {
            submitEv() {
                document.getElementById("nombreEv").value = "";
                document.getElementById("fechaEv").value = "";
                document.getElementById("porcEv").value = "";
                this.boton = !this.boton;
                this.popup = !this.popup;
                return false;
            },
            agregarEv() {
                this.boton = !this.boton;
                this.popup = !this.popup;
            }
        },

        data() {
            return {
                popup: false,
                boton: true
            }
        }
    }
</script>
