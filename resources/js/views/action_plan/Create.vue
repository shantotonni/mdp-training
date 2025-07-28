<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Create Action Plan']">
        <div class="col-sm-6">
          <div class="float-right d-none d-md-block">
            <div class="card-tools">
              <router-link :to="{name: 'ActionPlanList'}" class="btn btn-primary btn-sm">
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
                                <label>Action Plan Period</label>
                                <input type="text" name="ActionPlanPeriod" readonly v-model="form.ActionPlanPeriod" class="form-control" :class="{ 'is-invalid': form.errors.has('ActionPlanPeriod') }">
                                <div class="error" v-if="form.errors.has('ActionPlanPeriod')" v-html="form.errors.get('ActionPlanPeriod')" />
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
<!--                          <div class="col-md-4">-->
<!--                            <div class="form-group">-->
<!--                              <label>Department</label>-->
<!--                              <input type="text" name="Department" readonly v-model="form.Department" class="form-control" :class="{ 'is-invalid': form.errors.has('Department') }">-->
<!--                              <div class="error" v-if="form.errors.has('Department')" v-html="form.errors.get('Department')" />-->
<!--                            </div>-->
<!--                          </div>-->
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
                              <label>Portfolio</label>
                              <select v-model="form.Department" name="Department" id="Department" class="form-control" :class="{ 'is-invalid': form.errors.has('Department') }">
                                <option value="">Select Portfolio</option>
                                <option :value="dept.DeptName" v-for="(dept,index) in departments" :key="index">{{dept.DeptName}}</option>
                              </select>
                              <div class="error" v-if="form.errors.has('Department')" v-html="form.errors.get('Department')" />
                            </div>
                          </div>
                          <!--signature-->
                          <div class="col-md-4" >
                            <div class="form-group">
                              <label>Signature</label>
                              <!-- Trigger -->
                              <input type="file" @change="onFileChange"  ref="fileInput" accept="image/*" :disabled="previewUrl" :required="!isSignature"/>

                            </div>
                          </div>
                          <div class="col-md-4" >
                            <div class="form-group">
                              <div v-if="previewUrl || existingSignatureUrl">
                                <label>Preview:</label> <span>
                                    <button type="button" class="btn btn-danger btn-sm" @click="resetCropper" v-if="previewUrl">x</button>&nbsp;
                                  </span>
                                <img :src="previewUrl||existingSignatureUrl" style="width: 200px; height: 60px;" />
                              </div>
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
                        <p style="font-size: 13px;font-weight:bold;color:#0000B9">Agreed Action Plan for the Period</p>
                        <hr>
                        <div class="row">
                          <div class="col-4 col-md-4">
                            <label>Task (70% Quantitativ;  30% Qualitative)</label>
                          </div>
                          <div class="col-2 col-md-2">
                            <label>Target Date Of Completion</label>
                          </div>
                          <div class="col-3 col-md-3">
                            <label>Criterion Of Measurement</label>
                          </div>
                        </div>
                        <div class="row" v-for="(find, index) in form.finds" :key="index">
                          <div class="col-4 col-md-4">
                            <div class="form-group">
                              <textarea id="textarea" class="form-control" rows="2" v-model="find.TaskName" required></textarea>
<!--                              <input v-model="find.TaskName" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('TaskName') }" name="TaskName" required>-->
                              <div class="error" v-if="form.errors.has('TaskName')" v-html="form.errors.get('TaskName')" />
                            </div>
                          </div>

                          <div class="col-2 col-md-2">
                            <div class="form-group">
                              <datepicker v-model="find.TargetDateOfCompletion" :format="customFormatter" placeholder="Enter Date" input-class="form-control" :typeable=true ></datepicker>
                              <div class="error" v-if="form.errors.has('TargetDateOfCompletion')" v-html="form.errors.get('TargetDateOfCompletion')" />
                            </div>
                          </div>

                          <div class="col-3 col-md-3">
                            <div class="form-group">
                              <input v-model="find.CriterionOfMeasurement" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('CriterionOfMeasurement') }" name="CriterionOfMeasurement">
                              <div class="error" v-if="form.errors.has('CriterionOfMeasurement')" v-html="form.errors.get('CriterionOfMeasurement')" />
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
    <!-- signature Modal -->
    <div>
      <loader v-if="PreLoader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>
    </div>
    <div class="modal fade" id="cropperModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="height: 90vh; display: flex; flex-direction: column;">

          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title">Crop Image</h5>
            <button type="button" class="close" data-dismiss="modal" @click="resetCropper">
              <span>&times;</span>
            </button>
          </div>

          <!-- Modal Body (Flex Grow) -->
          <div class="modal-body p-0" style="flex: 1; display: flex; flex-direction: column; overflow: hidden;">
            <div v-if="imageUrl" style="flex: 1; position: relative;">
              <cropper
                  ref="cropper"
                  :src="imageUrl"
                  :aspect-ratio="10 / 3"
                  :auto-crop-area="1"
                  :view-mode="0"
                  :min-crop-box-width="200"
                  :min-crop-box-height="60"
                  :zoomable="true"
                  :scalable="true"
                  :movable="true"
                  :crop-box-resizable="true"
                  :background="false"
                  :responsive="true"
                  :wheel-zoom-ratio="0.1"
                  style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;"
                  required
              />
            </div>
          </div>
          <div class="error" v-if="form.errors.has('Signature')" v-html="form.errors.get('Signature')"/>
          <!--Modal Footer -->
          <div class="modal-footer">
            <button class="btn btn-secondary btn-sm" data-dismiss="modal" @click="resetCropper">Cancel</button>
            <button class="btn btn-info btn-sm" @click="prepareCrop">Crop</button>
          </div>

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

import 'vue-advanced-cropper/dist/style.css';

import Cropper from 'vue-cropperjs'
import 'cropperjs/dist/cropper.css'
import { v4 as uuidv4 } from 'uuid';
export default {
  name: "List",
  mixins: [Common],
  components: {
    Datepicker,
    VueEditor,
    Cropper
  },
  data() {
    return {
      previewUrl: null,
      existingSignatureUrl: null, // This will hold the URL to the stored image
      imageDimensions: '',
      croppedBlob: null,
      imageUrl: null,
      cropper: null,
      isSignature: null,

      employee: [],
      supervisor: [],
      divisions: [],
      departments: [],
      form: new Form({
        ID :'',
        ActionPlanPeriod :'2025-2026',
        StaffID :'',
        EmployeeName :'',
        Designation :'',
        Division: '',
        Department: '',
        OfficialEmail:'',
        Mobile:'',
        CurrentPosition:'',
        Qualification:'',
        SuppervisorStaffID:'',
        SuppervisorName:'',
        SuppervisorDesignation:'',
        SuppervisorEmail:'',
        SuppervisorMobile:'',
        Signature:'',
        finds: [{ TaskName: '' , TargetDateOfCompletion: '', CriterionOfMeasurement: ''}],
      }),
      isLoading: false,
      PreLoader: false,
    }
  },
  mounted() {
    document.title = 'Action Plan Create | Action Plan';
    this.getAllDivision();
  },
  created() {
    this.getUserData()
  },
  methods: {
    onFileChange(e) {
      const file = e.target.files[0];
      if (file) {
        this.imageUrl = URL.createObjectURL(file); // this stores the image URL
        this.previewUrl = null;
        this.croppedBlob = null;

        $('#cropperModal').modal('show');
      }
    },
    prepareCrop() {
      const canvas = this.$refs.cropper.getCroppedCanvas({
        width: 200,
        height: 60,
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high',
      });

      if (!canvas) {
        alert("Something went wrong! Image source not readable");
        return;
      }

      canvas.toBlob(blob => {
        if (!blob) {
          alert("Failed to generate cropped image.");
          return;
        }
        this.croppedBlob = blob;
        // Optional: Preview base64 image from the blob
        const reader = new FileReader();
        reader.onload = e => {
          this.form.Signature = e.target.result; // for preview or hidden input
        };
        reader.readAsDataURL(blob);
        this.previewUrl = URL.createObjectURL(blob)
      }, 'image/png');
      $('#cropperModal').modal('hide')
    },
    resetCropper() {
      this.imageUrl = null
      this.previewUrl = null
      this.croppedBlob = null
      this.$nextTick(() => {
        this.$refs.fileInput.value = null;
      });
      $('#cropperModal').modal('hide')
    },
    change({coordinates, canvas}) {
      //
    },
    store(){
      this.form.busy = true;
      this.PreLoader = true;
      this.form.post(baseurl + "api/hr_action_plane_store").then(response => {
        if (response.data.status === 'error'){
          this.errorNoti(response.data.message);
        }else {
          this.redirect(this.mainOrigin + 'action-plan-list')
          this.successNoti(response.data.message);
        }
        this.PreLoader = false;
      }).catch(e => {
        this.isLoading = false;
        this.PreLoader = false;
      });
    },
    getEmployeeByStaffID(){
      axios.post(baseurl +'api/action-plan/get-employee-by-employee-code/', {
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
      axios.post(baseurl +'api/action-plan/get-supervisor-by-employee-code/', {
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
    changeImage(event) {
      let file = event.target.files[0];
      let reader = new FileReader();
      reader.onload = event => {
        this.form.Signature = event.target.result;
      };
      reader.readAsDataURL(file);
    },
    showImage() {
      let img = this.form.Signature;
      if (img.length > 100) {
        return this.form.Signature;
      } else {
        return window.location.origin + "/signature/" + this.form.Signature;
      }
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
      this.form.finds.push({ TaskName: '' , TargetDateOfCompletion: '', CriterionOfMeasurement: ''});
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
