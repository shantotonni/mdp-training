<template>
    <div class="content">
        <div class="container-fluid">
          <breadcrumb :options="['Personal Training Commitment ']">
            <div class="col-sm-6">
              <div class="float-right d-none d-md-block">
                <div class="card-tools">
                  <router-link :to="{name: 'MDPList'}" class="btn btn-primary btn-sm" style="margin-top: 100px">
                    <i class="fas fa-backward"></i>
                    Back
                  </router-link>
                </div>
              </div>
            </div>
          </breadcrumb>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="datatable" v-if="!isLoading">
                            <div class="card-body">
                              <div style="text-align: center">
                                <img :src="`${mainOrigin}logo/logo.png`" style="height: 60px;" alt="user" class="rounded-circle" />
                                <h3>Personal Training Commitment {{AppraisalPeriod}}</h3>
                              </div>
                              <div class="first_part">
                                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                                  <thead>
                                    <tr style="background: white;color: black">
                                      <th class="text-center">Staff ID</th>
                                      <th class="text-center">Employee Name</th>
                                      <th class="text-center">Designation</th>
                                      <th class="text-center">Joining Date</th>
                                      <th class="text-center">Present Job Started On</th>
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

                              <div class="first_part">
<!--                                <p>Training Received so far: List Attached</p>-->
                                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                                  <thead>
                                    <tr style="background: white;color: black">
                                      <th>Area of Performance Improvement</th>
                                      <th>Required Training/Learning Topic</th>
                                      <th>Program Type</th>
                                      <th>Planned Month</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>In-house or External Training By the Company for Delivering Present Job Responsibility</td>
                                      <td><p v-for="(train, i) in training" :key="i" v-if="training.length">{{ train.TrainingTitle }}</p></td>
                                      <td><p v-for="(train, i) in training" :key="i" v-if="training.length">{{ train.TrainingType }}</p></td>
                                      <td><p v-for="(train, i) in training" :key="i" v-if="training.length">{{ customFormatter(train.TrainingDate) }}</p></td>
                                    </tr>
                                    <tr>
                                      <td>Personal Development / Training to Deliver Future Job Responsibilities</td>
                                      <td>
                                        <p>{{ mdplist.AreaOneTitle }}</p>
                                        <p>{{ mdplist.AreaTwoTitle }}</p>
                                      </td>
                                      <td><p v-for="(init, i) in initiative" :key="i" v-if="initiative.length">{{ init.Type }}</p></td>
                                      <td style="width: 8%"><p v-for="(init, i) in initiative" :key="i" v-if="initiative.length">{{ customFormatter(init.Date) }}</p></td>
                                    </tr>
                                    <tr>
                                      <td>Knowledge and skill will be Acquire at personal Initiative</td>
                                      <td><p v-for="(init, i) in initiative" :key="i" v-if="initiative.length">{{ init.Name }}</p></td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <br>
                              <div class="first_part">
                               <div style="display: flex">
                                 <div style="width: 33%">
                                   <p>
                                     <span style="display: inline-block;border-bottom: 1px solid;width: 160px;text-align: center">
                                       <img v-if="mdplist.Signature" :src="loadSignature(mdplist.Signature)" style='height: 40px; width: 150px' />
                                     </span>
                                   </p>
                                   <p>Signature of the Incumbent</p>
                                 </div>
                                 <div style="text-align: center;width: 33%;margin-top: 20px">
                                   <p style="text-align: center">
                                     <span style="display: inline-block;border-bottom: 1px solid;width: 200px;text-align: center" v-if="mdplist.MDPStatus === 'Approved'">
                                       Electronically Approved
                                     </span>
                                     <span style="display: inline-block;border-bottom: 1px solid;width: 200px;text-align: center" v-if="mdplist.MDPStatus === 'Pending'">

                                     </span>
                                   </p>
                                   <p>Signature of the Supervisor</p>
                                 </div>
                                 <div style="text-align: center;width: 33%;margin-top: 20px">
                                   <p>
                                     <span style="display: inline-block;border-top: 1px solid;width: 200px;text-align: center"></span>
                                   </p>
                                   <p>Signature of the Department Head</p>
                                 </div>
                               </div>
                                <div style="position: fixed;
                                  bottom: 0;
                                  width: 100%;
                                  text-align: left;
                                  font-size: 12px;">
                                  <p>Form No: TR-003-01/07</p>
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
import moment from "moment/moment";

export default {
    name: "List",
    data() {
        return {
          mdplist: [],
          initiative: [],
          training: [],
          area: [],
            pagination: {
                current_page: 1
            },
            isMessage : false,
            query: "",
          AppraisalPeriod: "",
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
      this.training = response.data.data.training
      this.initiative = response.data.data.initiative
      this.area = response.data.data.area
      this.AppraisalPeriod = response.data.data.AppraisalPeriod

      setTimeout(function(){
        window.print()
      },2000)
    });
  },
  methods: {
    loadSignature(signature){
      return 'https://hrconnect.acigroup.info' + "/signature/" + signature;
    },
    customFormatter(date) {
      return moment(date).format('YYYY-MM-DD');
    },
    },
}
</script>

<style scoped>
.content-page .content {
  padding: 0 15px 10px 15px;
   margin-top: 0px!important;
  margin-bottom: 60px;
}
@media print{
  @page {
    size: landscape
  }
}
p{
  margin:0
}
</style>
