<template>
    <span>
        <img :src="image_src" alt="borrar" style="width: 1.4rem; cursor: pointer;"  @click="confirmarAccion"
        data-toggle="modal" :data-target="modal_target"> 

        <div class="modal fade bd-example-modal-sm" tabindex="-1" :id="this.modal_id" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">
                    <div>
                        <div class="modal-header">
                            <b> <h5> Borrar Evaluación </h5> </b>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row text-justify">
                                <p><b> ¿Está seguro que desea borrar la evaluación? </b> </p>
                                <p class="ml-4"><b>Evaluación: </b> <span v-text="this.evn"></span>
                                <br><b>Fecha: </b> <span v-text="this.evf"></span>
                                <br><b>Porcentaje: </b> <span v-text="this.evp"></span>%
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">                          
                                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal"> Cancelar </button>
                                <form :action="actionLink" method="POST">
                                    <input type="hidden" name="_token" v-bind:value="this.csrf">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger ml-2"> Borrar </button>
                                </form>
                            </div>
                        </div>
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
        console.log('Componente de borrar montado.');
    },

    methods: {
        confirmarAccion() {
            this.show_btn = !this.show_btn;
        }
    },

    data() {
        return {
            image_src: '/img/icons/trash.svg',
            show_btn: false,
            actionLink: "/cursos/agregar/" + this.userid + "/" + this.cursoid + "/evaluaciones/borrar/" + this.evid,
            modal_id: "trashModal" + this.evid,
            modal_target: "#trashModal" + this.evid,
        }
    },
}
</script>