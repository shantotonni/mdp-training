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
                            <option value="2023-2024">2024-2025</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="text" class="form-control" name="EmpCode" v-model="form.EmpCode" placeholder="Enter Employee Code" @change="getEmployeeInfo()">
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
                    </div>
                  </div>
                </div>
                <div class="row" v-if="tableDataVisible">
                  <div v-if="EmpFound" class="col-md-12">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="text" readonly v-model="EmployeeName" class="form-control" name="EmployeeName">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="text" readonly v-model="Designation" class="form-control" name="Designation">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="text" readonly v-model="Department" class="form-control" name="Department">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" v-else>
                    <p style="margin-left: 10px;color: red">
                      You havent filled out yet MDP Form. Please Fillup MDP
                      <button type="button" class="btn btn-success btn-sm" @click="getEmployeeByStaffID">Click</button>
                    </p>
                    <div class="col-md-12" v-if="MDPFormShow">
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <div class="form-group">
                              <label>Appraisal Period</label>
                              <input type="text" name="AppraisalPeriod" readonly v-model="form.AppraisalPeriod" class="form-control" :class="{ 'is-invalid': form.errors.has('AppraisalPeriod') }">
                              <div class="error" v-if="form.errors.has('AppraisalPeriod')" v-html="form.errors.get('AppraisalPeriod')" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <div class="form-group">
                              <label>Staff ID</label>
                              <input type="text" name="StaffID" id="StaffID" v-model="form.StaffID" class="form-control" :class="{ 'is-invalid': form.errors.has('StaffID') }" @change="getEmployeeByStaffID">
                              <div class="error" v-if="form.errors.has('StaffID')" v-html="form.errors.get('StaffID')" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Employee Name</label>
                            <input type="text" name="EmployeeName" v-model="form.EmployeeName" readonly class="form-control" :class="{ 'is-invalid': form.errors.has('EmployeeName') }">
                            <div class="error" v-if="form.errors.has('EmployeeName')" v-html="form.errors.get('EmployeeName')" />
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="Designation" readonly v-model="form.Designation" class="form-control" :class="{ 'is-invalid': form.errors.has('Designation') }">
                            <div class="error" v-if="form.errors.has('Designation')" v-html="form.errors.get('Designation')" />
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Department</label>
                            <input type="text" name="Department" readonly v-model="form.Department" class="form-control" :class="{ 'is-invalid': form.errors.has('Department') }">
                            <div class="error" v-if="form.errors.has('Department')" v-html="form.errors.get('Department')" />
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Official Email</label>
                            <input type="text" name="OfficialEmail" v-model="form.OfficialEmail" class="form-control" :class="{ 'is-invalid': form.errors.has('OfficialEmail') }">
                            <div class="error" v-if="form.errors.has('OfficialEmail')" v-html="form.errors.get('OfficialEmail')" />
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="Mobile" v-model="form.Mobile" class="form-control" :class="{ 'is-invalid': form.errors.has('Mobile') }">
                            <div class="error" v-if="form.errors.has('Mobile')" v-html="form.errors.get('Mobile')" />
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Date Of Birth</label>
                            <input type="text" name="DateOfBirth" v-model="form.DateOfBirth" readonly class="form-control" :class="{ 'is-invalid': form.errors.has('DateOfBirth') }">
                            <div class="error" v-if="form.errors.has('DateOfBirth')" v-html="form.errors.get('DateOfBirth')" />
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Joining Date</label>
                            <input type="text" name="JoiningDate" v-model="form.JoiningDate" readonly class="form-control" :class="{ 'is-invalid': form.errors.has('JoiningDate') }">
                            <div class="error" v-if="form.errors.has('JoiningDate')" v-html="form.errors.get('JoiningDate')" />
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Current Position</label>
                            <input type="text" name="CurrentPosition" v-model="form.CurrentPosition" readonly class="form-control" :class="{ 'is-invalid': form.errors.has('CurrentPosition') }">
                            <div class="error" v-if="form.errors.has('CurrentPosition')" v-html="form.errors.get('CurrentPosition')" />
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Present Job Started On</label>
                            <datepicker v-model="form.PresentJobStartedOn" :format="customFormatter" input-class="form-control"></datepicker>
                            <div class="error" v-if="form.errors.has('PresentJobStartedOn')" v-html="form.errors.get('PresentJobStartedOn')" />
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Qualification</label>
                            <input type="text" name="Qualification" v-model="form.Qualification" class="form-control" :class="{ 'is-invalid': form.errors.has('Qualification') }">
                            <div class="error" v-if="form.errors.has('Qualification')" v-html="form.errors.get('Qualification')" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                  <thead>
                  <tr>
                    <th>Status</th>
                    <th>Done Date</th>
                    <th>Offer Date One</th>
                    <th>Offer Date Two</th>
                    <th>Offer Date Three</th>
                    <th>Offer Date Four</th>
                    <th>Offer Date Five</th>
<!--                    <th>Feedback</th>-->
<!--                    <th>Learning Transfer</th>-->
                    <th>Trainer Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <select name="Status" id="Status" v-model="form.Status" class="form-control">
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
<!--                    <td><input type="number" class="form-control" name="Feedback" v-model="form.Feedback"></td>-->
<!--                    <td><input type="number" class="form-control" name="learning_transfer" v-model="form.LearningTransfer"></td>-->
                    <td><input type="text" class="form-control" name="TrainerName" v-model="form.TrainerName"></td>
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
import {bus} from "../../app";

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
      tableDataVisible: false,
      MDPFormShow: false,
      EmployeeName: '',
      Designation: '',
      Department: '',
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
        EmpCode: '',
        AppraisalPeriod: '2023-2024',
        TrainingTitle: '',
        TrainingType: '',
        TrainerName: '',

        EmployeeName :'',
        Designation :'',
        Department: '',
        OfficialEmail:'',
        Mobile:'',
        DateOfBirth:'',
        JoiningDate:'',
        CurrentPosition:'',
        PresentJobStartedOn:'',
        Qualification:'',
      }),
      EmpFound: false
    }
  },

  mounted() {
    document.title = 'Training Feedback | MDP';
    this.getData();
  },
  methods: {
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
    getEmployeeInfo(){
      axios.get(baseurl + 'api/get-employee-info?EmpCode='+ this.form.EmpCode
          + "&AppraisalPeriod=" + this.form.AppraisalPeriod
      ).then((response)=>{
        console.log(response)
        this.tableDataVisible = true;
        if(response.data.status === 'success'){
          this.EmpFound = true
          this.EmployeeName = response.data.EmpInfo.EmployeeName
          this.Designation = response.data.EmpInfo.Designation
          this.Department = response.data.EmpInfo.Department
          this.form.EmpCode = response.data.EmpInfo.StaffID
        }else {
          this.EmpFound = false
        }
      }).catch((error)=>{
      })
    },
    getEmployeeByStaffID(){
      this.MDPFormShow = true;
      console.log(this.form.EmpCode)
      axios.post(baseurl +'api/get-employee-by-employee-code/', {
        EmpCode: this.form.EmpCode,
      }).then((response)=>{
        console.log(response)
        this.form.EmployeeName = response.data.employee.EmployeeName;
        this.form.Designation = response.data.employee.Designation;
        this.form.Department = response.data.employee.Department;
        this.form.OfficialEmail = response.data.employee.OfficialEmail;
        this.form.Mobile = response.data.employee.Mobile;
        this.form.DateOfBirth = response.data.employee.DateOfBirth;
        this.form.JoiningDate = response.data.employee.JoiningDate;
        this.form.CurrentPosition = response.data.employee.CurrentPosition;
        this.form.PresentJobStartedOn = response.data.employee.PresentJobStartedOn;
        this.form.Qualification = response.data.employee.Qualification;
        this.form.StaffID = response.data.employee.StaffID;
      }).catch((error)=>{

      })
    },
    getSupervisorByStaffID(){
      axios.post(baseurl +'api/get-supervisor-by-employee-code/', {
        EmpCode: this.form.EmpCode,
        SuperVisorEmpCode: this.form.SuppervisorStaffID,
      }).then((response)=>{
        console.log(response)
        if (response.data.status === 'error'){
          this.errorNoti(response.data.message);
        }else {
          this.form.SuppervisorName = response.data.employee.SuppervisorName;
          this.form.SuppervisorDesignation = response.data.employee.SuppervisorDesignation;
          this.form.SuppervisorEmail = response.data.employee.SuppervisorEmail;
          this.form.SuppervisorMobile = response.data.employee.SuppervisorMobile;
          this.form.SuppervisorStaffID = response.data.employee.SuppervisorStaffID;
        }
      }).catch((error)=>{

      })
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
  .form-group label{
    font-size:12px!important
  }
  .form-control {
    font-size: 12px!important;
  }
}
</style>
