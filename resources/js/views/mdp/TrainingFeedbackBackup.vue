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
                          <select name="AppraisalPeriod" id="AppraisalPeriod" v-model="AppraisalPeriod" class="form-control">
                            <option value="2023-2024">2023-2024</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="text" class="form-control" name="empcode" v-model="empcode" placeholder="Enter Employee Code" @change="getAllEmpCodeWiseTraingList">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Done Date</th>
                    <th>Offer Date One</th>
                    <th>Offer Date Two</th>
                    <th>Offer Date Three</th>
                    <th>Offer Date Four</th>
                    <th>Offer Date Five</th>
                    <th>Feedback</th>
                    <th>Learning Transfer</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-if="tableDataVisible">
                    <td>{{ form.TrainingTitle }}</td>
                    <td>
                      <select name="Status" id="Status" v-model="form.Status" class="form-control" @change="changeStatus()">
                        <option disabled value="">Select Status</option>
                        <option value="done">Done</option>
                        <option value="offered">Offered</option>
                      </select>
                    </td>
                    <td><datepicker v-model="form.DoneDate" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                    <td><datepicker v-model="form.OfferDateOne" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                    <td><datepicker v-model="form.OfferDateTwo" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                    <td><datepicker v-model="form.OfferDateThree" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                    <td><datepicker v-model="form.OfferDateFour" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                    <td><datepicker v-model="form.OfferDateFive" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                    <td><input type="number" class="form-control" name="Feedback" v-model="form.Feedback"></td>
                    <td><input type="number" class="form-control" name="learning_transfer" v-model="form.LearningTransfer"></td>
                    <td>
                      <button type="button" @click="trainingFeedbackSubmit()" class="btn btn-info btn-sm">Update</button>
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
      training_list: [],
      single_training_list: {},
      personal: {},
      empcode: '',
      AppraisalPeriod: '2023-2024',
      TrainingTitle: '',
      isMessage: false,
      editMode: false,
      isLoading: false,
     // Status: '',
    //  DoneDate: '',
    //  Feedback: '',
     // LearningTransfer: '',
      isEnable: '',
      tableDataVisible: false,
      form: new Form({
        id:'',
        Status: '',
        DoneDate: '',
        Feedback: '',
        LearningTransfer: '',
        OfferDateOne: '',
        OfferDateTwo: '',
        OfferDateThree: '',
        OfferDateFour: '',
        OfferDateFive: '',
        empcode: '',
        AppraisalPeriod: '',
        TrainingTitle: '',
      }),
    }
  },

  mounted() {
    document.title = 'Training Feedback | MDP';
    this.getData();
  },
  methods: {
    getAllEmpCodeWiseTraingList() {
      axios.get(baseurl + 'api/empcode-wise-training-list?empcode=' + this.empcode
          + "&AppraisalPeriod="+ this.AppraisalPeriod
      ).then((response) => {
        console.log(response)
        this.training_list = response.data.training_list;
        this.tableDataVisible = true;
      }).catch((error) => {

      })
    },
    getAllEmpCodeWiseSingleTrainingList() {
      axios.get(baseurl + 'api/empcode-wise-single-training-list?empcode=' + this.empcode
          + "&AppraisalPeriod="+ this.AppraisalPeriod
          + "&TrainingTitle="+ this.TrainingTitle
      ).then((response) => {
        console.log(response.data.data)
        if (response.data.data){
          this.single_training_list = response.data.data;
          this.form.fill(response.data.data);
          if (response.data.data.Status == 'done'){
            this.isEnable = 1;
          }else if (response.data.data.Status == 'offered'){
            this.isEnable = 2;
          }else {
            this.isEnable = 3;
          }
        }

      }).catch((error) => {

      })
    },
    changeStatus(){
      if (this.form.Status == 'done'){
        this.isEnable = 1;
      }else if (this.form.Status == 'offered'){
        this.isEnable = 2;
      }else {
        this.isEnable = 3;
      }
    },
    trainingFeedbackSubmit(){
      this.form.busy = true;
      this.form.empcode = this.empcode;
      this.form.AppraisalPeriod = this.AppraisalPeriod;
      this.form.TrainingTitle = this.TrainingTitle;

      this.form.post(baseurl + "api/training-feedback-submit").then(response => {
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
