<template>
    <span>
        <img
            :src="image_src"
            alt="editar"
            style="width: 1.4rem; cursor: pointer;"
            @click="confirmarAccion"
            data-toggle="modal"
            :data-target="modal_target"
        />

        <div
            class="modal fade"
            tabindex="-1"
            :id="this.modal_id"
            role="dialog"
            aria-labelledby="mySmallModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div>
                        <div class="modal-header">
                            <b>
                                <h5>Editar Evaluación</h5>
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
                                <p class="ml-2 col-12">
                                    <b>Datos de la Evaluación</b>
                                </p>
                                <div class="form-group row">
                                    <label
                                        for="nombreEv"
                                        class="col-form-label text-md-right ml-3"
                                    >Nombre</label>
                                    <input
                                        required
                                        id="nombreEv"
                                        type="text"
                                        class="col-8 form-control mx-4"
                                        name="nombreEv"
                                        v-model="evnx"
                                        :class="computedNombre"
                                    />
                                    <span
                                        class="offset-2 col text-danger ml-4 text-center"
                                        v-if="computedNombre === 'is-invalid'"
                                    >
                                        <b>
                                            El nombre no puede empezar/terminar con espacios
                                            <br />&nbsp; ni tener más de 2 seguidos.
                                            <br />
                                        </b>
                                    </span>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="fechaEv"
                                        class="col-form-label text-md-right ml-3 mr-3"
                                    >Fecha</label>
                                    <input
                                        required
                                        id="fechaEv"
                                        type="date"
                                        class="col-6 form-control mx-4"
                                        name="fechaEv"
                                        v-model="this.evf"
                                    />
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="porcEv"
                                        class="col-form-label text-md-right ml-3"
                                    >Porcentaje</label>
                                    <div class="d-flex align-items-center">
                                        <input
                                            required
                                            id="porcEv"
                                            type="number"
                                            class="col-4 form-control ml-3"
                                            name="porcEv"
                                            v-model="evpx"
                                            :class="computedPorc"
                                        />
                                        <span class="ml-2">%</span>
                                        <span
                                            class="text-danger ml-1 text-center"
                                            v-if="computedPorc === 'is-invalid'"
                                        >
                                            <b>El porcentaje de las evaluación no debe ser mayor a 100 % ni ser menor a 1%</b>
                                        </span>
                                    </div>
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
                                        :disabled="btnSubmit"
                                    >Editar</button>
                                </div>
                                <div class="row text-justify">
                                    <p>Recuerda: El porcentaje de las evaluaciones no debe sumar mas de 100%. Si se envia un porcentaje invalido será rechazado por el sistema.</p>
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
    props: ["evid", "evn", "evf", "evp", "csrf", "userid", "cursoid"],

    mounted() {
        console.log("Componente de editar montado.");
    },

    methods: {
        confirmarAccion() {
            this.show_btn = !this.show_btn;
        }
    },

    data() {
        return {
            image_src: "/img/icons/edit.svg",
            show_btn: false,
            actionLink:
                "/cursos/agregar/" +
                this.userid +
                "/" +
                this.cursoid +
                "/evaluaciones/editar/" +
                this.evid,
            modal_id: "editModal" + this.evid,
            modal_target: "#editModal" + this.evid,
            evnx: this.evn,
            evpx: this.evp,
            btnSubmit: false
        };
    },

    computed: {
        computedNombre() {
            var evnx = this.evnx;
            if (evnx[0] === " " || evnx[evnx.length - 1] === " ") {
                return "is-invalid";
            } else {
                let i = 0;
                for (i = 0; i < evnx.length - 1; i++) {
                    if (evnx[i] === " " && evnx[i + 1] === " ")
                        return "is-invalid";
                }
                return false;
            }
        },

        computedBtn() {
            if (this.computedNombre === "is-invalid") {
                this.btnSubmit = true;
                return "btn-danger disabled";
            } else if (this.computedPorc === "is-invalid") {
                this.btnSubmit = true;
                return "btn-danger disabled";
            } else {
                this.btnSubmit = false;
                return "";
            }
        },

        computedPorc() {
            var evpx = this.evpx;
            if (parseInt(this.evpx) > 100) return "is-invalid";
            else if (this.evpx < 1 && this.evpx != null) return "is-invalid";
            else return "";
        }
    }
};
</script>