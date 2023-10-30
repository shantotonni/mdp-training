<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Training Title Wise Employee List']"/>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <select id="sessionP" class="form-control" v-model="sessionP">
                            <option value="">Select Session</option>
                            <option v-for="(session,index) in sessions" :value="session.Name" :key="index">{{session.Name}}</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <multiselect
                              v-model="TrainingTitle"
                              :options="trainingTitlesList"
                              :multiple="true"
                              :searchable="true"
                              :close-on-select="true"
                              :show-labels="true"
                              label="TrainingTitle"
                              track-by="TrainingTitle"
                              placeholder="Pick a value"></multiselect>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Enter EmpCode"
                            v-model="EmpCode">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <button type="submit" @click="getEmployeeIndividualTraining" class="btn btn-success"><i class="mdi mdi-filter"></i>Filter</button>
                        <button type="submit" @click="getEmployeeIndividualTrainingExport" class="btn btn-success"><i class="mdi mdi-database-export"></i>Export</button>
<!--                        <button type="submit" @click="getEmployeeIndividualTrainingPrint" class="btn btn-success"><i class="mdi mdi-printer"></i>Print</button>-->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                    <thead>
                    <tr>
                      <th>SN</th>
                      <th>Staff ID</th>
                      <th>Name</th>
                      <th>Appraisal Period</th>
                      <th>Training Title</th>
                      <th>Area Of Improvement</th>
                      <th>Action Plan</th>
                      <th>Ranked</th>
                      <th>No. of Requirement</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(training, i) in individual_training" :key="training.StaffID" v-if="individual_training.length">
                      <th>{{ ++i }}</th>
                      <td>{{ training.StaffID }}</td>
                      <td>{{ training.Name }}</td>
                      <td>{{ training.AppraisalPeriod }}</td>
                      <td>{{ training.TrainingTitle }}</td>
                      <td>{{ training.TrainingType }}</td>
                      <td>{{ training.Action }}</td>
                      <td class="text-right">{{ training.ranking }}</td>
                      <td class="text-right">{{ training.Total }}</td>
                    </tr>
                    </tbody>
                  </table>
                  <br>
                </div>
              </div>
            </div>
            <div v-else>
              <skeleton-loader :row="14"/>
            </div>
            <data-export/>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {baseurl} from "../../base_url";
import {Common} from "../../mixins/common";
import {bus} from "../../app";
import Multiselect from "vue-multiselect";

export default {
  name: "TopRankedTraining",
  mixins: [Common],
  components: { Multiselect },
  data() {
    return {
      individual_training: [],
      sessions: [],
      isLoading: false,
      sessionP: '',
      EmpCode: '',
      TrainingTitle: [],
      trainingTitlesList: [],
    }
  },
  mounted() {
    document.title = 'Training Title Wise Employee List | MDP,Action Plan,JD';
    this.getAllSession(); 
    this.getAllTrainingTitle();   
  },
  methods: {
    getAllTrainingTitle(){
      axios.get(baseurl + 'api/mdp/get-all-training-title').then((response)=>{
        this.trainingTitlesList = response.data.trainingtitle;
      }).catch((error)=>{

      })
    },
    getAllSession(){
      axios.get(baseurl + 'api/get-all-session/').then((response) => {
        this.sessions = response.data.sessions;
        //this.getAllTrainingTitle();
      }).catch((error) => {

      })
    },
    getEmployeeIndividualTraining(){
      axios.post(baseurl + 'api/mdp/get-employee-wise-report',{sessionP: this.sessionP,EmpCode: this.EmpCode,TrainingTitle: this.TrainingTitle}).then((response)=>{
        console.log(response)
        this.individual_training = response.data.individual_training;
      }).catch((error)=>{

      })
    },
    
    getEmployeeIndividualTrainingExport(){
      axios.post(baseurl + 'api/mdp/get-employee-wise-report',{sessionP: this.sessionP,EmpCode: this.EmpCode,TrainingTitle: this.TrainingTitle}).then((response)=>{
        let dataSets = response.data.individual_training;
        if (dataSets.length > 0) {
          let columns = Object.keys(dataSets[0]);
          columns = columns.filter((item) => item !== 'row_num');
          let rex = /([A-Z])([A-Z])([a-z])|([a-z])([A-Z])/g;
          columns = columns.map((item) => {
            let title = item.replace(rex, '$1$4 $2$3$5')
            return {title, key: item}
          });
          bus.$emit('data-table-import', dataSets, columns, 'Training Title Wise Employee Wise Report')
        }
      }).catch((error)=>{
      })
    },

    getEmployeeIndividualTrainingPrint(){
      let individualTraining = this.individual_training;
      this.$store.commit('topTraining', topTraining);
      this.$router.push({name: 'TopTrainingPrint'})
    },
  }
}
</script>

<style scoped>

</style>