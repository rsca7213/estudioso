<template>
    <span>
        <button
            class="btn btn-danger btn-lg ml-2 mr-4"
            data-toggle="modal"
            :data-target="modal_target"
        >Borrar</button>
        <div
            class="modal fade"
            tabindex="-1"
            :id="this.modal_id"
            role="dialog"
            aria-labelledby="mySmallModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">
                    <div>
                        <div class="modal-header">
                            <b>
                                <h5>Borrar Curso</h5>
                            </b>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row text-center">
                                <p class="ml-3">
                                    <b>¿Está seguro que desea borrar el curso?</b>
                                </p>
                                <p class="ml-4">
                                    <b>Curso:</b>
                                    <span v-text="this.c_n"></span>
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <button
                                    type="button"
                                    class="btn btn-secondary mr-2"
                                    data-dismiss="modal"
                                >Cancelar</button>
                                <form :action="actionLink" method="POST">
                                    <input type="hidden" name="_token" v-bind:value="this.csrf" />
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" class="btn btn-danger ml-2">Borrar</button>
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
    props: ["c_id", "c_n", "u_id", "csrf"],

    mounted() {
        console.log("boton borrar montado.");
    },

    data() {
        return {
            actionLink: "/cursos/ver/" + this.u_id + "/borrar/" + this.c_id,
            modal_id: "trashModal" + this.c_id,
            modal_target: "#trashModal" + this.c_id
        };
    }
};
</script>