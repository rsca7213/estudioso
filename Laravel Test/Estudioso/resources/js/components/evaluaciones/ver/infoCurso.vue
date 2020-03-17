<template>
    <span>
        <button
            class="btn btn-primary mx-3"
            data-toggle="modal"
            :data-target="modal_target"
        >Información del Curso</button>
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
                    <div class="modal-header text-dark">
                        <b>
                            <h5>Información del Curso</h5>
                        </b>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-dark">
                        <div class="row d-flex justify-content-center">
                            <h5>
                                <b>{{ this.cn }}</b>
                            </h5>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <table class="table mx-4 px-4 table-striped my-4">
                                <tbody>
                                    <tr class="table-active">
                                        <th scope="row">Total Evaluado</th>
                                        <td v-text="totEv + '%'"></td>
                                        <td v-text="totEvP + ' de 20'"></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <th scope="row">Total Sin Evaluar</th>
                                        <td v-text="totSE + '%'"></td>
                                        <td v-text="totSEP + ' de 20'"></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr class="table-active">
                                        <th scope="row">Total Obtenido</th>
                                        <td v-text="totOb + '%'"></td>
                                        <td v-text="totObP + ' de 20'"></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <th scope="row">Total Perdido</th>
                                        <td v-text="totPe + '%'"></td>
                                        <td v-text="totPeP + ' de 20'"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row d-flex text-right">
                            <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </span>
</template>

<script>
export default {
    props: ["cid", "cn", "uid"],

    mounted() {
        this.getInfo();
        console.log("Componente de informacion montado.");
    },

    methods: {
        getInfo() {
            console.log("%cAxios: Making get request.", "color: lightblue");
            axios
                .get(
                    "/cursos/ver/" +
                        this.uid +
                        "/evaluaciones/" +
                        this.cid +
                        "/info"
                )
                .then(response => {
                    console.log(response.data);
                    this.totEv = response.data["TotEv"];
                    this.totSE = response.data["TotSE"];
                    this.totOb = response.data["TotOb"];
                    this.totPe = response.data["TotPe"];
                    console.log(
                        "%cAxios: Get request succesful.",
                        "color: lightgreen"
                    );
                    this.totEvP = (this.totEv * 20) / 100;
                    this.totSEP = (this.totSE * 20) / 100;
                    this.totObP = (this.totOb * 20) / 100;
                    this.totPeP = (this.totPe * 20) / 100;
                })

                .catch(errors => {
                    console.log("%cAxios: Error in get request.", "color: red");
                });
        }
    },

    data() {
        return {
            modal_target: "#infoCurso" + this.cid,
            modal_id: "infoCurso" + this.cid,
            totEv: 0,
            totSE: 0,
            totOb: 0,
            totPe: 0,
            totEvP: 0,
            totSEP: 0,
            totObP: 0,
            totPeP: 0
        };
    }
};
</script>

<style>
</style>