<template>
    <span>
        <img :src="image_src" alt="editar" style="width: 1.4rem; cursor: pointer;"  @click="confirmarAccion"
        data-toggle="modal" :data-target="modal_target"> 

        <div class="modal fade" tabindex="-1" :id="this.modal_id" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div>
                        <div class="modal-header">
                            <b> <h5> Editar Evaluación </h5> </b>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form :action="actionLink" method="POST">
                            <div class="modal-body">
                                <p class="ml-2 col-12"><b> Datos de la Evaluación </b></p>
                                <div class="form-group row">
                                    <label for="nombreEv" class="col-form-label text-md-right ml-3"> Nombre </label>
                                    <input id="nombreEv" type="text" class="col-8 form-control mx-4" name="nombreEv" v-model="this.evn">
                                </div>
                                <div class="form-group row">
                                    <label for="fechaEv" class="col-form-label text-md-right ml-3 mr-3"> Fecha </label>
                                    <input id="fechaEv" type="date" class="col-6 form-control mx-4" name="fechaEv" v-model="this.evf">
                                </div>
                                <div class="form-group row">
                                    <label for="porcEv" class="col-form-label text-md-right ml-3"> Porcentaje </label>
                                    <div class="d-flex align-items-center">
                                        <input id="porcEv" type="number" class="col-4 form-control ml-3" name="porcEv" v-model="this.evp">
                                        <span class="ml-2"> % </span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="row">                          
                                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal"> Cancelar </button>
                                    <input type="hidden" name="_token" v-bind:value="this.csrf">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-primary ml-2"> Editar </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </span>
</template>

<script>
export default {
    props: ['evid','evn','evf','evp','csrf','userid','cursoid'],

    mounted() {
        console.log('id->'+this.evid);
        console.log('n->'+this.evn);
        console.log('f->'+this.evf);
        console.log('p->'+this.evp);
        console.log('Componente de editar montado.');
    },

    methods: {
        confirmarAccion() {
            this.show_btn = !this.show_btn;
        }
    },

    data() {
        return {
            image_src: '/img/icons/edit.svg',
            show_btn: false,
            actionLink: "",
            modal_id: "editModal" + this.evid,
            modal_target: "#editModal" + this.evid,
        }
    },
}
</script>