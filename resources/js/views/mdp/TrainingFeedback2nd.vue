<template>
  <div class="content" style="margin-bottom: 300px">
    <div class="container-fluid">
      <breadcrumb :options="['Training Feedback']"/>
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
                          <select name="AppraisalPeriod" id="AppraisalPeriod" 
                            v-model="AppraisalPeriod" class="form-control" @change="doLoadTranningTitle()">
                            <option v-for="(session,index) in sessions" :value="session.Name" :key="index">{{session.Name}}</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="date" class="form-control" name="TrainingDate" 
                            v-model="TrainingDate" placeholder="Training Date" 
                            @change="doLoadTranningTitle()">
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
                        <button type="submit" @click="getEmployeeIndividualTraining" class="btn btn-success"><i class="mdi mdi-filter"></i>Filter</button>
                      </div>

                    </div>
                  </div>
                </div>
                
                <div class="col-md-12" v-if="tableDataVisible">
                    <div class="col-md-2">
                        <label>Feedback</label>
                        <div class="form-group">
                            <input type="number" class="form-control" name="Feedback" 
                            v-model="Feedback" placeholder="Feedback">
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                  <thead>
                    <tr>
                        <th>Training ID</th>
                        <th style="width: 10%">Title</th>                    
                        <th>EmpCode</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Learning Transfer</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(training, i) in form.training_list" :key="training.ID" v-if="form.training_list.length && tableDataVisible">
                      <td>{{ training.TrainingFeedbackID }}</td>
                      <td>{{ training.TrainingTitle }}</td>
                      <td>{{ training.EmpCode }}</td>
                      <td>{{ training.Name }}</td>
                      <td>{{ training.DesgName }}</td>
                      <td>{{ training.DeptName }}</td>
                      <td><input type="number" class="form-control" name="LearningTransfer" 
                            v-model="training.LearningTransfer"></td> 
                      <!-- <td>
                        <button type="button" @click="trainingFeedbackSubmit(i)" class="btn btn-info btn-sm">Update</button>
                      </td> -->
                    </tr>
                  </tbody>
                  <tfoot v-if="tableDataVisible">
                    <tr>
                        <th colspan="6">
                            <button type="button" @click="trainingFeedbackSubmit2nd()" class="btn btn-info btn-sm">Update</button>        
                        </th>
                    </tr>
                  </tfoot>
                </table>
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
import {Common} from "../../mixins/common";
import Datepicker from 'vuejs-datepicker';
import moment from "moment";

export default {
  name: "List",
  components: {
    Datepicker
  },
  mixins: [Common],
  data() {
    return {
      personal: {},
      empcode: '',
      sessions: '',
      isLoading: false,
      tableDataVisible: false,
      TrainingTitle: [],
      trainingTitlesList: [],
      TrainingDate:'',
      AppraisalPeriod:'',
      Feedback:0,
      form: new Form({
        id:'',
        empcode: '',
        sessions: '',
        training_list: [
          { 
            TrainingFeedbackID: '' , Name: '', EmpCode: '', DesgName:'',DeptName:'', TrainingTitle:''
          },
        ],
      }),
    }
  },

  mounted() {
    document.title = 'Training Feedback | MDP';
    this.getData();
    this.getAllSession(); 
  },
  methods: {
    doLoadTranningTitle(){
        if(this.TrainingDate != '' && this.AppraisalPeriod != ''){
            axios.get(baseurl + 'api/load-date-wise-title?TrainingDate=' + this.TrainingDate
            + "&AppraisalPeriod="+ this.AppraisalPeriod
            ).then((response) => {
                console.log(response)
                this.trainingTitlesList = response.data.training_title;
            }).catch((error) => { })
        }        
    },
    getEmployeeIndividualTraining(){
        if(this.TrainingDate != '' && this.AppraisalPeriod != '' && this.TrainingTitle != ''){
        axios.post(baseurl + 'api/load-date-wise-training-wise-list' ,{TrainingDate:this.TrainingDate,AppraisalPeriod:this.AppraisalPeriod,TrainingTitle:this.TrainingTitle})
            .then((response) => {
              console.log(response)
                this.tableDataVisible = true;
                this.form.training_list = response.data.training_list;
                this.Feedback = response.data.training_list[0]['Feedback'];
            }).catch((error) => { })
        }
    },
    // getAllEmpCodeWiseTraingList() {
    //   axios.get(baseurl + 'api/empcode-wise-training-list?empcode=' + this.empcode
    //       + "&AppraisalPeriod="+ this.AppraisalPeriod
    //   ).then((response) => {
    //     console.log(response)
    //     this.tableDataVisible = true;
    //     this.form.fill(response.data.training_list);
    //     this.EmployeeName = response.data.EmpInfo.EmployeeName
    //     this.Designation = response.data.EmpInfo.Designation
    //     this.Department = response.data.EmpInfo.Department
    //   }).catch((error) => {

    //   })
    // },
    getAllSession(){
      axios.get(baseurl + 'api/get-all-session/').then((response) => {
        this.sessions = response.data.sessions;
        //this.getAllTrainingTitle();
      }).catch((error) => {

      })
    },
    trainingFeedbackSubmit2nd(){
      let row_data = this.form.training_list;
      this.form.busy = true;
      //console.log(row_data);
      axios.post(baseurl + "api/training-feedback-submit-2nd",{row_data: row_data, Feedback: this.Feedback}).then(response => {
        this.$toaster.success('Data Successfully Updated');
      }).catch(e => {
        this.isLoading = false;
      });
    },
    getData() {
      this.axiosPost('me', {}, (response) => {
        this.$store.commit('me', response);
        this.personal = response.personal
      }, (error) => {
        this.errorNoti(error);
      });
    },
    customFormatter(date) {
      return moment(date).format('YYYY-MM-DD');
    },
    reload() {
      this.training_list = "";
    },

  },
}
</script>

<style lang="scss" scoped>
.document-upload-modal {
  .delete {
    color: red;
    position: absolute;
    right: 25px;
    display: none;
    top: 10px;
  }

  .title:hover .delete {
    display: block
  }
}
</style>
