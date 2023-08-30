<template>
  <div class="content" style="margin-bottom: 300px">
    <div class="container-fluid">
      <breadcrumb :options="['Additional Training']"/>
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
                          <select name="AppraisalPeriod" id="AppraisalPeriod" v-model="form.AppraisalPeriod" class="form-control">
                            <option disabled value="">Select Appraisal Period</option>
                            <option value="2023-2024">2023-2024</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="text" class="form-control" name="empcode" v-model="form.empcode" placeholder="Enter Employee Code">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="text" class="form-control" name="TrainingTitle" v-model="form.TrainingTitle" placeholder="Enter Training Name">
                        </div>
                      </div>
                      <div class="col-2 col-md-2">
                        <div class="form-group">
                          <select v-model="form.TrainingType" name="TrainingType" id="TrainingType" class="form-control" :class="{ 'is-invalid': form.errors.has('TrainingType') }">
                            <option value="">Select Type</option>
                            <option value="Knowledge">Knowledge</option>
                            <option value="Skill">Skill</option>
                            <option value="Behavior">Behavior</option>
                          </select>
                          <div class="error" v-if="form.errors.has('TrainingType')" v-html="form.errors.get('TrainingType')" />
                        </div>
                      </div>
                      <div class="col-2 col-md-2">
                        <div class="form-group">
                          <datepicker v-model="form.TrainingDate" :format="customFormatter" :typeable=true input-class="form-control"></datepicker>
                          <div class="error" v-if="form.errors.has('TrainingDate')" v-html="form.errors.get('TrainingDate')" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                  <thead>
                  <tr>
                    <th>Status</th>
                    <th v-if="isEnable === 1">Done Date</th>
                    <th v-if="isEnable === 2">Offer Date One</th>
                    <th v-if="isEnable === 2">Offer Date Two</th>
                    <th v-if="isEnable === 2">Offer Date Three</th>
                    <th v-if="isEnable === 2">Offer Date Four</th>
                    <th v-if="isEnable === 2">Offer Date Five</th>
                    <th v-if="isEnable === 1">Feedback</th>
                    <th v-if="isEnable === 1">Learning Transfer</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <select name="Status" id="Status" v-model="form.Status" class="form-control" @change="changeStatus()">
                        <option disabled value="">Select Status</option>
                        <option value="done">Done</option>
                        <option value="offered">Offered</option>
                      </select>
                    </td>
                    <td v-if="isEnable === 1"><datepicker v-model="form.DoneDate" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                    <td v-if="isEnable === 2"><datepicker v-model="form.OfferDateOne" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                    <td v-if="isEnable === 2"><datepicker v-model="form.OfferDateTwo" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                    <td v-if="isEnable === 2"><datepicker v-model="form.OfferDateThree" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                    <td v-if="isEnable === 2"><datepicker v-model="form.OfferDateFour" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                    <td v-if="isEnable === 2"><datepicker v-model="form.OfferDateFive" :format="customFormatter" :typeable=true input-class="form-control"></datepicker></td>
                    <td v-if="isEnable === 1"><input type="number" class="form-control" name="Feedback" v-model="form.Feedback"></td>
                    <td v-if="isEnable === 1"><input type="number" class="form-control" name="learning_transfer" v-model="form.LearningTransfer"></td>
                    <td>
                      <button type="button" @click="additionalTrainingFeedbackSubmit()" class="btn btn-info btn-sm">Submit</button>
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
      personal: {},
      isMessage: false,
      editMode: false,
      isLoading: false,
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
        TrainingType: '',
        TrainingDate: '',
      }),
    }
  },

  mounted() {
    document.title = 'Training Feedback | MDP';
    this.getData();
  },
  methods: {
    changeStatus(){
      if (this.form.Status == 'done'){
        this.isEnable = 1;
      }else if (this.form.Status == 'offered'){
        this.isEnable = 2;
      }else {
        this.isEnable = 3;
      }
    },
    additionalTrainingFeedbackSubmit(){
      this.form.busy = true;
      this.form.post(baseurl + "api/additional-training-feedback-submit").then(response => {
        if (response.data.status === 'error'){
          this.$toaster.error(response.data.message);
        }else {
          this.$toaster.success(response.data.message);
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
