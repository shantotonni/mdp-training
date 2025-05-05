<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Training Title Wise Employee List']">
        <div class="col-sm-6">
          <div class="float-right d-none d-md-block">
            <div class="card-tools">
              <button class="btn btn-outline-warning"><i class="mdi mdi-star-circle"></i> {{Ranking}}</button>
              <button class="btn btn-outline-info"><i class="mdi mdi-account-multiple"></i> {{TrnCount }}</button>
              <button type="submit" @click="getEmployeeIndividualTraining('Y')" class="btn btn-outline-primary"><i class="mdi mdi-database-export"></i>Export</button>
            </div>
          </div>
        </div>
      </breadcrumb>
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
                          <select id="sessionP" class="form-control" v-model="sessionP" style="  height: 43px;" required>
                            <option value="">Period</option>
                            <option v-for="(session,index) in sessions" :value="session.Name" :key="index">{{session.Name}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <multiselect
                              v-model="TrainingTitle"
                              :options="trainingTitlesList"
                              :multiple="false"
                              :searchable="true"
                              :close-on-select="true"
                              :show-labels="true"
                              label="TrainingTitle"
                              track-by="TrainingTitle"
                              placeholder="Training Title" required></multiselect>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <multiselect
                              v-model="Departments"
                              :options="Department_List"
                              :multiple="true"
                              :searchable="true"
                              :close-on-select="true"
                              :show-labels="true"
                              label="DeptUnit"
                              track-by="DeptCode"
                              placeholder="SBU's" required></multiselect>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <multiselect
                              v-model="Tasks"
                              :options="taskProgressList"
                              :multiple="true"
                              :searchable="true"
                              :close-on-select="true"
                              :show-labels="true"
                              label="task"
                              track-by="task"
                              placeholder="Task Progress" required></multiselect>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <button type="submit" @click="getEmployeeIndividualTraining('N')" class="btn btn-success"  style="  height: 43px;"><i class="mdi mdi-filter"></i>Filter</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                    <thead>
                    <tr>
                      <th>Select</th>
                      <th>SL.No</th>
                      <th>Staff ID</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Department</th>
                      <th>Business</th>
                      <th>TaskProgress</th>
                      <th>Done Date Or Offered Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(training, i) in individual_training"  v-if="individual_training.length">
                      <th><mark></mark></th>
                      <th>{{ ++i }}</th>
                      <td>{{ training.StaffID }}</td>
                      <td>{{ training.EmployeeName }}</td>
                      <td>{{ training.Designation }}</td>
                      <td>{{ training.Department }}</td>
                      <td>{{ training.Business }}</td>
                      <td>{{ training.TaskProgress }}</td>
                      <td>{{ training.DoneDateOrOfferedDate }}</td>
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
      Department_List: [],
      Departments: [],
      isLoading: false,
      sessionP: '',
      EmpCode: '',
      Ranking: '',
      TrnCount: '',
      Tasks: [],
      score: [],
      TrainingTitle: [],
      trainingTitlesList: [],
      taskProgressList: [
        {task:'Done'},
        {task:'Offered'},
        {task:'Pending'},
      ],
    }
  },
  mounted() {
    document.title = 'Training Title Wise Employee List | MDP,Action Plan,JD';
    this.getAllSession(); 
    this.getAllTrainingTitle();
    this.getAllSBU();

  },
  methods: {
    getEmployeeIndividualTraining(val){
      axios.post(baseurl + 'api/mdp/get-employee-wise-report',{
        sessionP: this.sessionP,
        // EmpCode: this.EmpCode,
        Tasks:  JSON.stringify(this.Tasks),
        TrainingTitle:  JSON.stringify(this.TrainingTitle),
        SBUs: JSON.stringify(this.Departments)
      }).then((response)=>{
        if (response.data.status=='success'){
          if (val==='Y'){
            let dataSets = response.data.data.List;
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
          }else {
            this.individual_training = response.data.data.List;
            this.Ranking = response.data.data.Ranking[0].Ranking;
            this.TrnCount = response.data.data.UserCount[0].UserCount;
          }
        }else {
          this.errorNoti(response.data.message);
        }
      }).catch((error)=>{

      })
    },
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
    getAllSBU(){
      axios.get(baseurl + 'api/get-strategic-business-unit').then((response) => {
        this.Department_List = response.data.data;
      }).catch((error) => {

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