<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Create Job Description']">
        <div class="col-sm-6">
          <div class="float-right d-none d-md-block">
            <div class="card-tools">
              <router-link :to="{name: 'JobDescriptionList'}" class="btn btn-primary btn-sm">
                <i class="fas fa-sync"></i>
                Back
              </router-link>
            </div>
          </div>
        </div>
      </breadcrumb>
      <div class="row">
        <div class="col-xl-12">
          <form @submit.prevent="store()" @keydown="form.onKeydown($event)">
            <div class="row">
              <div class="col-md-7">
                <div class="card">
                  <div class="datatable" v-if="!isLoading">
                    <div class="card-body">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="form-group">
                                <label>Job Description Period</label>
                                <input type="text" name="JobDescriptionPeriod" readonly v-model="form.JobDescriptionPeriod" class="form-control" :class="{ 'is-invalid': form.errors.has('JobDescriptionPeriod') }">
                                <div class="error" v-if="form.errors.has('JobDescriptionPeriod')" v-html="form.errors.get('JobDescriptionPeriod')" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="form-group">
                                <label>Staff ID</label>
                                <input type="text" name="StaffID" id="StaffID" v-model="form.StaffID" class="form-control" :class="{ 'is-invalid': form.errors.has('StaffID') }" @change="getEmployeeByStaffID">
                                <div class="error" v-if="form.errors.has('StaffID')" v-html="form.errors.get('StaffID')" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Employee Name</label>
                              <input type="text" name="EmployeeName" v-model="form.EmployeeName" readonly class="form-control" :class="{ 'is-invalid': form.errors.has('EmployeeName') }">
                              <div class="error" v-if="form.errors.has('EmployeeName')" v-html="form.errors.get('EmployeeName')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Designation</label>
                              <input type="text" name="Designation" readonly v-model="form.Designation" class="form-control" :class="{ 'is-invalid': form.errors.has('Designation') }">
                              <div class="error" v-if="form.errors.has('Designation')" v-html="form.errors.get('Designation')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Official Email</label>
                              <input type="text" name="OfficialEmail" v-model="form.OfficialEmail" class="form-control" :class="{ 'is-invalid': form.errors.has('OfficialEmail') }">
                              <div class="error" v-if="form.errors.has('OfficialEmail')" v-html="form.errors.get('OfficialEmail')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Mobile</label>
                              <input type="text" name="Mobile" v-model="form.Mobile" class="form-control" :class="{ 'is-invalid': form.errors.has('Mobile') }">
                              <div class="error" v-if="form.errors.has('Mobile')" v-html="form.errors.get('Mobile')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Current Position</label>
                              <input type="text" name="CurrentPosition" v-model="form.CurrentPosition" readonly class="form-control" :class="{ 'is-invalid': form.errors.has('CurrentPosition') }">
                              <div class="error" v-if="form.errors.has('CurrentPosition')" v-html="form.errors.get('CurrentPosition')" />
                            </div>
                          </div>
                          <div class="col-4 col-md-4">
                            <div class="form-group">
                              <label>Division</label>
                              <select v-model="form.Division" name="Division" id="Division" class="form-control" :class="{ 'is-invalid': form.errors.has('Division') }" @change="getAllDepartment()">
                                <option value="">Select Division</option>
                                <option :value="div.Division" v-for="(div,index) in divisions" :key="index">{{div.Division}}</option>
                              </select>
                              <div class="error" v-if="form.errors.has('Division')" v-html="form.errors.get('Division')" />
                            </div>
                          </div>
                          <div class="col-4 col-md-4">
                            <div class="form-group">
                              <label>Department</label>
                              <select v-model="form.Department" name="Department" id="Department" class="form-control" :class="{ 'is-invalid': form.errors.has('Department') }">
                                <option value="">Select Portfolio</option>
                                <option :value="dept.DeptName" v-for="(dept,index) in departments" :key="index">{{dept.DeptName}}</option>
                              </select>
                              <div class="error" v-if="form.errors.has('Department')" v-html="form.errors.get('Department')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Business</label>
                              <input type="text" name="Business" v-model="form.Business" class="form-control" :class="{ 'is-invalid': form.errors.has('Business') }">
                              <div class="error" v-if="form.errors.has('Business')" v-html="form.errors.get('Business')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Job Title</label>
                              <input type="text" name="JobTitle" v-model="form.JobTitle" class="form-control" :class="{ 'is-invalid': form.errors.has('JobTitle') }">
                              <div class="error" v-if="form.errors.has('JobTitle')" v-html="form.errors.get('JobTitle')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Portfolio</label>
                              <input type="text" name="Portfolio" v-model="form.Portfolio" class="form-control" :class="{ 'is-invalid': form.errors.has('Portfolio') }">
                              <div class="error" v-if="form.errors.has('Portfolio')" v-html="form.errors.get('Portfolio')" />
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Purpose Of Job</label>
                              <textarea id="textarea" class="form-control" rows="2" v-model="form.PurposeOfJob"></textarea>
<!--                              <input type="text" name="JobCustomerInternal" v-model="form.JobCustomerInternal" class="form-control" :class="{ 'is-invalid': form.errors.has('JobCustomerInternal') }">-->
                              <div class="error" v-if="form.errors.has('PurposeOfJob')" v-html="form.errors.get('PurposeOfJob')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Job Customer Internal</label>
                              <textarea id="textarea" class="form-control" rows="2" v-model="form.JobCustomerInternal"></textarea>
<!--                              <input type="text" name="JobCustomerInternal" v-model="form.JobCustomerInternal" class="form-control" :class="{ 'is-invalid': form.errors.has('JobCustomerInternal') }">-->
                              <div class="error" v-if="form.errors.has('JobCustomerInternal')" v-html="form.errors.get('JobCustomerInternal')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Job Customer External</label>
                              <textarea id="textarea" class="form-control" rows="2" v-model="form.JobCustomerExternal" required></textarea>
<!--                              <input type="text" name="JobCustomerExternal" v-model="form.JobCustomerExternal" class="form-control" :class="{ 'is-invalid': form.errors.has('JobCustomerExternal') }">-->
                              <div class="error" v-if="form.errors.has('JobCustomerExternal')" v-html="form.errors.get('JobCustomerExternal')" />
                            </div>
                          </div>
                        </div>
                        <hr>
                       </div>

                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Supervisor Staff ID</label>
                              <input type="text" name="SuppervisorStaffID" v-model="form.SuppervisorStaffID" class="form-control" :class="{ 'is-invalid': form.errors.has('SuppervisorStaffID') }" @change="getSupervisorByStaffID">
                              <div class="error" v-if="form.errors.has('SuppervisorStaffID')" v-html="form.errors.get('SuppervisorStaffID')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Supervisor Name</label>
                              <input type="text" name="SuppervisorName" readonly v-model="form.SuppervisorName" class="form-control" :class="{ 'is-invalid': form.errors.has('SuppervisorName') }">
                              <div class="error" v-if="form.errors.has('SuppervisorName')" v-html="form.errors.get('SuppervisorName')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Supervisor Designation</label>
                              <input type="text" name="SuppervisorDesignation" readonly v-model="form.SuppervisorDesignation" class="form-control" :class="{ 'is-invalid': form.errors.has('SuppervisorDesignation') }">
                              <div class="error" v-if="form.errors.has('SuppervisorDesignation')" v-html="form.errors.get('SuppervisorDesignation')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Supervisor Email</label>
                              <input type="text" name="SuppervisorEmail" readonly v-model="form.SuppervisorEmail" class="form-control" :class="{ 'is-invalid': form.errors.has('SuppervisorEmail') }">
                              <div class="error" v-if="form.errors.has('SuppervisorEmail')" v-html="form.errors.get('SuppervisorEmail')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Supervisor Mobile</label>
                              <input type="text" name="SuppervisorMobile" v-model="form.SuppervisorMobile" class="form-control" :class="{ 'is-invalid': form.errors.has('SuppervisorMobile') }">
                              <div class="error" v-if="form.errors.has('SuppervisorMobile')" v-html="form.errors.get('SuppervisorMobile')" />
                            </div>
                          </div>
                        </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="datatable" v-if="!isLoading">
                    <div class="card-body">
                      <div class="col-md-12">
                        <hr>
                        <div class="row">
                          <div class="col-6 col-md-6">
                            <label>Major Job Responsibilities</label>
                          </div>
                        </div>
                        <div class="row" v-for="(find, index) in form.finds" :key="index">
                          <div class="col-6 col-md-6">
                            <div class="form-group">
                              <textarea id="textarea" class="form-control" rows="2" v-model="find.JobResponsibilities" required></textarea>
                              <div class="error" v-if="form.errors.has('jobResponsibilities')" v-html="form.errors.get('jobResponsibilities')" />
                            </div>
                          </div>

                          <div class="col-2">
                            <button type="button" class="btn btn-danger btn-sm" @click="deleteFind(index)">x Delete</button>&nbsp;
                            <button type="button" class="btn btn-success btn-sm" @click="addFind">+ Add</button>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {baseurl} from '../../base_url'
import Datepicker from 'vuejs-datepicker';
import moment from "moment";
import {Common} from "../../mixins/common";
// Basic Use - Covers most scenarios
import { VueEditor } from "vue2-editor";
export default {
  name: "List",
  mixins: [Common],
  components: {
    Datepicker,
    VueEditor
  },
  data() {
    return {
      employee: [],
      supervisor: [],
      divisions: [],
      departments: [],
      form: new Form({
        ID :'',
        JobDescriptionPeriod :'2023-2024',
        StaffID :'',
        EmployeeName :'',
        Designation :'',
        Division: '',
        Department: '',
        Business: '',
        OfficialEmail:'',
        Mobile:'',
        CurrentPosition:'',
        Qualification:'',
        SuppervisorStaffID:'',
        SuppervisorName:'',
        SuppervisorDesignation:'',
        SuppervisorEmail:'',
        SuppervisorMobile:'',

        JobTitle:'',
        Portfolio:'',
        PurposeOfJob: '',
        JobCustomerInternal: '',
        JobCustomerExternal: '',
        finds: [{ JobResponsibilities: '' }],
      }),
      isLoading: false,
    }
  },
  mounted() {
    document.title = 'Job Description Create | Job Description';
    this.getAllDivision();
  },
  created() {
    this.getUserData()
  },
  methods: {
    store(){
      this.form.busy = true;
      this.form.post(baseurl + "api/job-description-store").then(response => {
        console.log(response)
        if (response.data.status === 'error'){
          this.errorNoti(response.data.message);
        }else {
          this.redirect(this.mainOrigin + 'job-description-list')
          this.successNoti(response.data.message);
        }
      }).catch(e => {
        this.isLoading = false;
      });
    },
    getEmployeeByStaffID(){
      axios.post(baseurl +'api/job-description/get-employee-by-employee-code/', {
        EmpCode: this.form.StaffID,
      }).then((response)=>{
        this.training_history = response.data.training_history;
        this.form.EmployeeName = response.data.employee.EmployeeName;
        this.form.Designation = response.data.employee.Designation;
        //this.form.Department = response.data.employee.Department;
        this.form.OfficialEmail = response.data.employee.OfficialEmail;
        this.form.Mobile = response.data.employee.Mobile;
        this.form.Qualification = response.data.employee.Qualification;
        this.form.StaffID = response.data.employee.StaffID;
        this.form.CurrentPosition = response.data.employee.CurrentPosition;
        //this.form.Division = response.data.employee.Division;
      }).catch((error)=>{

      })
    },
    getSupervisorByStaffID(){
      axios.post(baseurl +'api/job-description/get-supervisor-by-employee-code/', {
        EmpCode: this.form.StaffID,
        SuperVisorEmpCode: this.form.SuppervisorStaffID,
      }).then((response)=>{
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
    getUserData() {
      this.axiosPost('me', {}, (response) => {
        this.image = `${this.mainOrigin}assets/images/avatar.png`;
        this.$store.commit('me', response);
        console.log(response)
        if(response.payload.Type ==='employee'){
          this.form.StaffID = response.payload.EmpCode;
          this.getEmployeeByStaffID()
          $('#StaffID').attr('readonly', true);
        }
      }, (error) => {
        this.errorNoti(error);
      });
    },
    customFormatter(date) {
      return moment(date).format('YYYY-MM-DD');
    },
    getAllDivision(){
      axios.get(baseurl + 'api/get-all-division/').then((response) => {
        console.log(response)
        this.divisions = response.data.divisions;
      }).catch((error) => {

      })
    },
    getAllDepartment(){
      axios.post(baseurl +'api/get-all-department/', {
        Division: this.form.Division,
      }).then((response)=>{
        console.log(response)
        this.departments = response.data.departments;
      }).catch((error)=>{

      })
    },
    //for finds
    addFind: function () {
      this.form.finds.push({ JobResponsibilities: ''});
    },
    deleteFind: function (index) {
      this.form.finds.splice(index, 1);
    },
  },
}
</script>

<style scoped>
.side_note label{
  font-size: 11px!important;
  margin-bottom: 0;
}
.side_note .form-control {
  height: 25px!important;
}
.side_note .form-group {
  margin-bottom: 0;
}
.form-group label{
  font-size:12px!important
}
.form-control {
  font-size: 12px!important;
}
</style>
