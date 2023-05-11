<template>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="datatable" v-if="!isLoading">
                            <div class="card-body">
                              <div style="text-align: center">
                                <img :src="`${mainOrigin}logo/logo.png`" style="height: 60px;" alt="user" class="rounded-circle" />
                                <h3>Personal Training Commitment 2023-2024</h3>
                              </div>
                              <br>
                              <br>
                              <div class="first_part">
                                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                                  <thead>
                                  <tr>
                                    <th class="text-center">Staff ID</th>
                                    <th class="text-center">Employee Name</th>
                                    <th class="text-center">Designation</th>
                                    <th class="text-center">Joining Date</th>
                                    <th class="text-center">Present Job Starte On</th>
                                    <th class="text-center">Mobile</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr>
                                    <td class="text-center">{{ mdplist.StaffID }}</td>
                                    <td class="text-center">{{ mdplist.EmployeeName }}</td>
                                    <td class="text-center">{{ mdplist.Designation }}</td>
                                    <td class="text-center">{{ mdplist.JoiningDate }}</td>
                                    <td class="text-center">{{ mdplist.PresentJobStartedOn }}</td>
                                    <td class="text-center">{{ mdplist.Mobile }}</td>
                                  </tr>
                                  </tbody>
                                </table>
                              </div>

                              <br>
                              <br>

                              <div class="first_part">
                                <p>Training Received so far: List Attached</p>
                                <hr>
                                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                                  <thead>
                                  <tr>
                                    <th class="text-center">Area of Performance Improvement</th>
                                    <th class="text-center">Required Training/Learning Topic</th>
                                    <th class="text-center">Program Type</th>
                                    <th class="text-center">Planned Month</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr v-for="(training, i) in mdplist.training" :key="training.ID" v-if="mdplist.training.length">
                                    <td class="text-center">In-house or External Training</td>
                                    <td class="text-center">{{ training.TrainingTitle }}</td>
                                    <td class="text-center">{{ training.TrainingType }}</td>
                                    <td class="text-center"></td>
                                  </tr>
                                  </tbody>
                                </table>
                              </div>
                              <br>
                              <br>
                              <hr>
                              <br>
                              <br>
                              <br>
                              <div class="first_part">
                               <div style="display: flex">
                                 <div style="width: 33%">
                                   <p>
                                     <span style="display: inline-block;border-top: 1px solid;width: 160px;text-align: center"></span>
                                   </p>
                                   <p>Signature of the Incumbent</p>
                                   <p>Form No: TR-00301/06</p>
                                 </div>
                                 <div style="text-align: center;width: 33%">
                                   <p>
                                     <span style="display: inline-block;border-top: 1px solid;width: 200px;text-align: center"></span>
                                   </p>
                                   <p>Signature of the Supervisor</p>
                                 </div>
                                 <div style="text-align: center;width: 33%">
                                   <p>
                                     <span style="display: inline-block;border-top: 1px solid;width: 200px;text-align: center"></span>
                                   </p>
                                   <p>Signature of the Department Head</p>
                                 </div>
                               </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {baseurl} from '../../base_url'
export default {
    name: "List",
    data() {
        return {
          mdplist: [],
            pagination: {
                current_page: 1
            },
            isMessage : false,
            query: "",
            editMode: false,
            isLoading: false,
            form: new Form({
                id:'',
                generator_name:'',
                unique_generator_code: '',
                generator_model: '',
                brand_id:'',
                rating: '',
                generator_serial: '',
                engine_brand: '',
                engine_serial: '',
            }),
        }
    },
  created() {
    axios.get(baseurl + `api/mdp/print/${this.$route.params.ID}`).then((response)=>{
      console.log(response)
      this.mdplist = response.data.data
      setTimeout(function(){
        window.print()
      },2000)
    });
  },

    methods: {
      //
    },
}
</script>

<style lang="scss" scoped>

</style>
