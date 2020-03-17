<template>
    <span>
        <span v-if="!calif">
            <img
                :src="addImage_src"
                alt="agregar"
                style="width: 1rem; cursor: pointer;"
                data-toggle="modal"
                :data-target="modal_target"
            />
        </span>
        <span v-else>
            <span>{{ calif }} de 20</span>
            <span>
                <img
                    :src="editImage_src"
                    alt="editar"
                    style="width: 1rem; cursor: pointer;"
                    data-toggle="modal"
                    :data-target="modal_target"
                />
            </span>
        </span>
        <span>
            <div
                class="modal fade bd-example-modal-sm"
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
                                    <h5>Calificación</h5>
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
                            <form :action="actionLink" method="POST">
                                <div class="modal-body">
                                    <div class="row text-justify">
                                        <p class="ml-4">
                                            <b>Evaluación:</b>
                                            <span v-text="this.evn"></span>
                                            <br />
                                        </p>
                                    </div>
                                    <div class="row d-flex align-items-baseline">
                                        <label
                                            for="porcEv"
                                            class="col-form-label text-md-right ml-4"
                                        >Porcentaje</label>
                                        <input
                                            required
                                            id="califEv"
                                            type="number"
                                            class="col-4 form-control ml-2"
                                            name="califEv"
                                            :value="c"
                                            :class="computedCalif"
                                        />
                                        <span class="ml-2">de 20</span>
                                        <span class="text-danger ml-2" v-if="computedCalif">
                                            <b>La calificación debe estar entre 0 y 20 puntos.</b>
                                        </span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row">
                                        <button
                                            type="button"
                                            class="btn btn-secondary mr-2"
                                            data-dismiss="modal"
                                        >Cancelar</button>
                                        <input type="hidden" name="_token" v-bind:value="this.csrf" />
                                        <input type="hidden" name="_method" value="PATCH" />
                                        <button
                                            type="submit"
                                            class="btn btn-primary ml-2"
                                            :class="computedBtn"
                                            :disabled="computedBtn != ''"
                                        >Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </span>
    </span>
</template>

<script>
export default {
    props: ["calif", "evid", "evn", "csrf", "cid", "uid"],

    mounted() {
        console.log("Componente de calificacion montado.");
    },

    data() {
        return {
            editImage_src: "/img/icons/edit.svg",
            addImage_src: "/img/icons/add.svg",
            modal_id: "califModal" + this.evid,
            modal_target: "#califModal" + this.evid,
            actionLink:
                "/cursos/ver/" +
                this.uid +
                "/evaluaciones/" +
                this.cid +
                "/calificacion/" +
                this.evid,
            c: this.calif
        };
    },

    computed: {
        computedCalif() {
            let c = this.c;
            if (parseInt(c) <= 20 && parseInt(c) >= 0) return "";
            else if (c != "") return "is-invalid";
            else return "";
        },
        computedBtn() {
            if (this.computedCalif === "is-invalid")
                return "btn-danger disabled";
            else return "";
        }
    }
};
</script>
