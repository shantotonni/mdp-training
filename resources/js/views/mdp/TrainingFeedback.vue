<template>
  <div class="content" style="margin-bottom: 300px">
    <div class="container-fluid">
      <breadcrumb :options="['MDP Training Status']">
        <div class="col-sm-6">
          <div class="float-right d-none d-md-block">
            <div class="card-tools">
              <router-link :to="{name: 'MDPList'}" class="btn btn-primary btn-sm">
                <i class="fas fa-backward"></i>
                Back
              </router-link>
              <button type="button" class="btn btn-primary btn-sm" @click="reload">
                <i class="fas fa-sync"></i>
                Reload
              </button>
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
                          <select name="AppraisalPeriod" id="AppraisalPeriod" v-model="AppraisalPeriod" class="form-control">
                            <option value="">Select Session</option>
                            <option v-for="(session,index) in sessions" :value="session.Name" :key="index">{{session.Name}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="text" class="form-control" name="empcode" v-model="empcode" placeholder="Enter Employee Code">
                        </div>
                      </div>
                      <div class="col-md-2">
                          <button type="button" class="btn btn-info" @click="getAllEmpCodeWiseTraingList" >
                            <i class="mdi mdi-filter"></i>
                            Filter
                          </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" v-if="tableDataVisible">
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" readonly v-model="EmployeeName" class="form-control" name="EmployeeName">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" readonly v-model="Designation" class="form-control" name="Designation">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" readonly v-model="Department" class="form-control" name="Department">
                    </div>
                  </div>
                </div>
                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                  <thead>
                  <tr>
                    <th style="width: 10%">Training Title</th>
<!--                    <th>Training Type</th>-->
                    <th>Task Progress</th>
                    <th>Done Date</th>
                    <th>Offer Date One</th>
                    <th>Offer Date Two</th>
                    <th>Offer Date Three</th>
                    <th>Offer Date Four</th>
                    <th>Offer Date Five</th>
                    <th>Feedback</th>
                    <th>Learning Transfer</th>
                    <th>Trainer Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(training, i) in form.training_list" :key="training.ID" v-if="form.training_list.length && tableDataVisible">
                      <td>{{ training.TrainingTitle }}</td>
<!--                      <td>{{ training.TrainingType }}</td>-->
                      <td>
                        <select name="Status" id="Status" v-model="training.Status" class="form-control">
                          <option value="done">Done</option>
                          <option value="offered">Offered</option>
                        </select>
                      </td>
                      <td><datepicker v-model="training.DoneDate" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                      <td><datepicker v-model="training.OfferDateOne" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                      <td><datepicker v-model="training.OfferDateTwo" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                      <td><datepicker v-model="training.OfferDateThree" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                      <td><datepicker v-model="training.OfferDateFour" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                      <td><datepicker v-model="training.OfferDateFive" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                      <td><input type="number" class="form-control" name="Feedback" v-model="training.Feedback"></td>
                      <td><input type="number" class="form-control" name="learning_transfer" v-model="training.LearningTransfer"></td>
                      <td><input type="text" class="form-control" name="TrainerName" v-model="training.TrainerName"></td>
                      <td>
                        <button type="button" @click="trainingFeedbackSubmit(i)" class="btn btn-info btn-sm">Update</button>
                      </td>
                    </tr>
                  </tbody>
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
      sessions: [],
      personal: {},
      empcode: '',
      AppraisalPeriod: '',
      isLoading: false,
      tableDataVisible: false,
      EmployeeName: '',
      Designation: '',
      Department: '',
      form: new Form({
        id:'',
        empcode: '',
        AppraisalPeriod: '',
        training_list: [
          { TrainingTitle: '' , Status: '', DoneDate: '', OfferDateOne:'',OfferDateTwo:'',
            OfferDateThree:'',OfferDateFour:'',OfferDateFive:'',EmpCode: '',AppraisalPeriod:'',Feedback: '',LearningTransfer : '',TrainerName: ''
          },
        ],
      }),
    }
  },

  mounted() {
    document.title = 'MDP Training Status | MDP';
    this.getData();
    this.getAllSession();
  },
  methods: {
    getAllEmpCodeWiseTraingList() {
      axios.get(baseurl + 'api/empcode-wise-training-list?empcode=' + this.empcode
          + "&AppraisalPeriod="+ this.AppraisalPeriod
      ).then((response) => {
        console.log(response)
        this.tableDataVisible = true;
        this.form.fill(response.data.training_list);
        this.EmployeeName = response.data.EmpInfo.EmployeeName
        this.Designation = response.data.EmpInfo.Designation
        this.Department = response.data.EmpInfo.Department
      }).catch((error) => {

      })
    },
    trainingFeedbackSubmit(i){
      let row_data = this.form.training_list[i];
      this.form.busy = true;
      axios.post(baseurl + "api/training-feedback-submit",{row_data: row_data}).then(response => {
        if (response.data.status === 200){
          this.$toaster.success('Data Successfully Updated');
        }else {
          this.$toaster.error(response.data.message);
        }
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
    getAllSession(){
      axios.get(baseurl + 'api/get-all-session/').then((response) => {
        this.sessions = response.data.sessions;
      }).catch((error) => {

      })
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
