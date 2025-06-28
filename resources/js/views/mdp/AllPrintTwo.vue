<template>
    <div class="content">
        <div class="container-fluid">
          <breadcrumb :options="['All Personal Training Commitment ']">
            <div class="col-sm-6">
              <div class="float-right d-none d-md-block">
                <div class="card-tools">
                  <router-link :to="{name: 'MDPList'}" class="btn btn-primary btn-sm">
                    <i class="fas fa-sync"></i>
                    Back
                  </router-link>
                </div>
              </div>
            </div>
          </breadcrumb>
            <div class="row"  v-for="(mdplist ,i) in mdpWholeList" :key="mdplist.ID" v-if="mdpWholeList.length">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="datatable" v-if="!isLoading">
                            <div class="card-body">
                              <div style="text-align: center">
                                <img :src="`${mainOrigin}logo/logo.png`" style="height: 60px;" alt="user" class="rounded-circle" />
                                <h3>Personal Training Commitment 2025-2026</h3>
                              </div>
                              <div class="first_part">
                                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                                  <thead>
                                    <tr style="background: white;color: black">
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
                                      <td><p v-for="(train, j) in training" :key="i" v-if="training.length">{{ train.TrainingTitle }}</p></td>
                                      <td><p v-for="(train, j) in training" :key="i" v-if="training.length">{{ train.TrainingType }}</p></td>
                                      <td><p v-for="(train, j) in training" :key="i" v-if="training.length">{{ customFormatter(train.TrainingDate) }}</p></td>
                                    </tr>
                                    <tr>
                                      <td>Personal Development / Training to Deliver Future Job Responsibilities</td>
                                      <td>
                                        <p>{{ mdplist.AreaOne }}</p>
                                        <p>{{ mdplist.AreaTwo }}</p>
                                      </td>
                                      <td><p v-for="(init, j) in mdplist.initiative" :key="j">{{ init.Type }}</p></td>
                                      <td><p v-for="(init, j) in mdplist.initiative" :key="j">{{ customFormatter(init.Date) }}</p></td>
                                    </tr>
                                    <tr>
                                      <td>Knowledge and skill will be Acquire at personal Initiative</td>
                                      <td><p v-for="(init, j) in initiative" :key="j" v-if="initiative.length">{{ init.Name }}</p></td>
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
                                   <p>Form No: TR-00301/06</p>
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
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <loader v-if="PreLoader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>

    </div>
</template>

<script>
import {baseurl} from '../../base_url'
import moment from "moment/moment";

export default {
    name: "List",
    data() {
        return {
          mdpIds: [],
          mdpWholeList: [],
          initiative: [],
          training: [],
          area: [],
            pagination: {
                current_page: 1
            },
          isMessage : false,
          query: "",
          PreLoader: false,
          editMode: false,
          isLoading: false,
        }
    },
  created() {
    this.PreLoader = true;
    const stored = JSON.parse(localStorage.getItem('mdpIds'))
    axios.post(baseurl +'api/mdp/all-mdp-print/', {
      mdpIds: stored
    }).then((response)=>{
      this.mdpWholeList = response.data.data
      this.initiative = response.data.data.initiative
      this.training = response.data.data.training
      this.Area = response.data.data.area
      this.PreLoader = false;
      setTimeout(function(){
        window.print()
      },2000)
    }).catch((error)=>{
      this.PreLoader = false;

    });
    localStorage.removeItem('mdpIds');
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
 @media print{@page {size: landscape}}
 p{
   margin:0
 }
 @media print {
   .page-break {
     page-break-after: always !important;
     break-before: page !important; /* modern browsers */
   }
 }
</style>
