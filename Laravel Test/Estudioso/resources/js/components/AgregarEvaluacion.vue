<template>
    <div>
        <div class="text-right">  
            <button type="button" class="btn btn-primary" @click="agregarEv" v-show="boton"> Agregar Evaluación </button>
        </div>
        <div v-show="popup">
            <div class="row justify-content-center">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header bg-dark text-light text-center"> 
                            <span class="h5"> Agregar Evaluación </span>
                        </div>
                        <div class="card-body justify-content-center border border-secondary" style="background-color: #D0D0D0;">
                            <form :action="actionLink" id="formEv" method="POST" v-on:submit="checkInputs">
                                <input type="hidden" name="_token" v-bind:value="csrf">
                                <label for="nombreEv" class="col-form-label text-md-right"> Nombre </label>
                                <input id="nombreEv" type="text" class="form-control" name="nombreEv" v-model="nombreInput" :class="computedNombre">
                                <span class="text-danger ml-2 text-center" v-if="computedNombre"> <b> El nombre no puede empezar/terminar con espacios <br> &nbsp; ni tener más de 2 seguidos.<br> </b> </span>
                                <label for="fechaEv" class="col-form-label text-md-right"> Fecha </label>
                                <input id="fechaEv" type="date" class="col-5 form-control" name="fechaEv">
                                <label for="porcEv" class="col-form-label text-md-right"> Porcentaje </label>
                                <div class="d-flex align-items-center">
                                    <input id="porcEv" type="number" class="col-3 form-control" name="porcEv" v-model.number="porcInput" :class="computedPorc">
                                    <span class="ml-2"> % </span>
                                </div>
                                <span class="text-danger ml-2 text-center" v-if="parseInt(this.porc)+porcInput > 100"> <b> El porcentaje de las evaluaciones no debe sumar más de 100% </b> </span>
                                <div class="text-center"> <button type="submit" class="btn btn-primary mt-4" :class="computedBtn"> Agregar Evaluación </button> </div>
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
        
        props: ['userid','curso','csrf','porc'],

        mounted() {
            console.log('Boton agregar evaluacion montado.');
        },

        methods: {
            agregarEv() {
                this.popup = !this.popup;
                this.boton = !this.boton;
            },

            checkInputs(event) {
                if(computedBtn() != '') event.preventDefault();
            }
        },

        data() {
            return {
                porcInput: 0,
                nombreInput: "",
                errorPorcClass: "",
                popup: false,
                boton: true,
                actionLink: "/cursos/agregar/" + this.userid + "/" + this.curso + "/evaluaciones/crear"
            }
        },

        computed: {
            computedPorc() {
                if(parseInt(this.porc) + parseInt(this.porcInput) > 100) return 'is-invalid';
                else return '';
            },

            computedNombre() {
                if (this.nombreInput[0] === ' ' || this.nombreInput[this.nombreInput.length-1] === ' ') {
                    return 'is-invalid';
                } 
                else {
                    let i=0;
                    for (i=0; i<this.nombreInput.length-1; i++) {
                        if (this.nombreInput[i] === ' ' && this.nombreInput[i+1] === ' ' ) return 'is-invalid';
                    }
                    return false;
                }
                
            },

            computedBtn() {
                if(parseInt(this.porc) + parseInt(this.porcInput) > 100) return 'btn-danger disabled';
                if (this.nombreInput[0] === ' ' || this.nombreInput[this.nombreInput.length-1] === ' ') {
                    return 'btn-danger disabled';
                } 
                else {
                    let i=0;
                    for (i=0; i<this.nombreInput.length-1; i++) {
                        if (this.nombreInput[i] === ' ' && this.nombreInput[i+1] === ' ' ) return 'btn-danger disabled';
                    }
                    return '';
                }
                return '';
            },
        }
    }
</script>
