<template>
    <div id="mainContent">
        <div class="form-container">
            <h4>Recruitment Requisition Form</h4>
            <form @submit.prevent="handleSubmit">
            <div class="form-grid">
                <div class="form-row">
                    <label>Date of Requisition:</label>
                    <div class="row">
                        <div class="col-md-12">
                            <date-picker v-model="form.dateOfRequisition" id="dateOfRequisition" format="MMM DD YYYY" valueType="format"
                            placeholder="Requisition Date"></date-picker>
                            <span v-if="errors.dateOfRequisition" class="error">{{ errors.dateOfRequisition }}</span>
                        </div>
                    </div>
                    
                    <label>Department:</label>
                    <div class="row">
                        <div class="col-md-12">
                            <multiselect
                                v-model="form.department"
                                :options="departments"
                                label="DeptName"
                                :multiple="false"
                                track-by="DeptCode"
                                placeholder="Select Department">
                            </multiselect>
                            <span v-if="errors.department" class="error">{{ errors.department }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <label>Job Title:</label>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" v-model="form.jobTitle">
                            <span v-if="errors.jobTitle" class="error">{{ errors.jobTitle }}</span>
                        </div>
                    </div>

                    <label>Job Grade/Salary Range:</label>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" v-model="form.salaryRange">
                            <span v-if="errors.salaryRange" class="error">{{ errors.salaryRange }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <label>Reporting to:</label>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" v-model="form.reportingTo">
                            <span v-if="errors.reportingTo" class="error">{{ errors.reportingTo }}</span>
                        </div>
                    </div>

                    <label>Req. no. of manpower:</label>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="number" v-model="form.manpower">
                            <span v-if="errors.manpower" class="error">{{ errors.manpower }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <label>Job Location:</label>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" v-model="form.jobLocation">
                            <span v-if="errors.jobLocation" class="error">{{ errors.jobLocation }}</span>
                        </div>
                    </div>

                    <label>Expected Joining Date:</label>
                    <div class="row">
                        <div class="col-md-12">
                            <date-picker v-model="form.joiningDate" id="joiningDate" format="MMM DD YYYY" valueType="format"
                                placeholder="joining Date"></date-picker>
                            <span v-if="errors.joiningDate" class="error">{{ errors.joiningDate }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-row full-width">
                    <label>Person specification: (if any)</label>
                    <div class="row">
                        <div class="col-md-10" v-for="(specification, index) in specifications" :key="index">
                            <p style="text-align: left; margin-bottom: 0px;"><u>specification - {{index+1}}</u> <span v-if="specifications.length != 1"><span style="cursor: pointer; width: 40px; height: 20px; padding-top: 0px; padding-bottom: 21px; color: red; margin-left: 10px;" @click="deleteSpecification(index)"><i class="fa fa-trash"  aria-hidden="true"></i></span></span></p>
                            <textarea v-model="specification.details"></textarea>
                        </div>
                        <!-- <span v-if="errors.specification" class="error">{{ errors.specification }}</span> -->
                        <div class="col-md-2" style="margin-top: 9%;">
                            <span class="btn btn-success" @click="addSpecification"><i class="ti-plus"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <label>Type of employment:</label>
                    <div class="row">
                        <div class="col-md-12">
                            <select v-model="form.employmentType" class="form-control" id="recruitmentType">
                                <option value="Permanent">Permanent</option>
                                <option value="Contractual">Contractual</option>
                            </select>
                            <span v-if="errors.employmentType" class="error">{{ errors.employmentType }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <label>Type of Recruitment:</label>
                    <div class="row">
                        <div class="col-md-12">
                            <select v-model="form.recruitmentType" class="form-control" id="recruitmentType">
                                <option value="Replacement">Replacement</option>
                                <option value="AdditionalManpower">Additional Manpower</option>
                            </select>
                            <span v-if="errors.recruitmentType" class="error">{{ errors.recruitmentType }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-container">
                <button v-if="!isLoading" type="submit" class="download-button">Submit</button>
                <button v-else><img :src="`${mainOrigin}assets/images/loaders/mini.svg`" class="download-button" alt="min loader">Loading....</button>
            </div>
            </form>
        </div>
    </div>
  </template>
  
<script>
import {ModelSelect} from 'vue-search-select'
import Multiselect from 'vue-multiselect'
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
import {Common} from "../../mixins/common";
  
  export default {
    components: {ModelSelect, Multiselect, DatePicker},
    mixins: [Common],
    data() {
      return {
        isLoading: false,
        form: {
          dateOfRequisition: '',
          department: '',
          jobTitle: '',
          salaryRange: '',
          reportingTo: '',
          manpower: '',
          jobLocation: '',
          joiningDate: '',
          employmentType: '',
          recruitmentType: '',
        },
        departments: [],
        specifications: [
            {
                details: ''
            }
        ],
        errors: {}
      };
    },
    mounted() {
        this.getDepartments()
    },
    methods: {
        getDepartments(){
            this.axiosGet('get-all-departments',
            (response) => {
                this.departments = response.data
            }, (error) => {
                this.errorNoti(error)
            })
        },
        addSpecification() {
            this.specifications.push({
                details: "",
            })
        },
        deleteSpecification(index) {
            this.specifications =  this.specifications.filter((specification, Index) => index !== Index)
        },
        validateForm() {
            const errors = {};
            if (!this.form.dateOfRequisition) {
                errors.dateOfRequisition = 'Date of Requisition is required';
            }
            if (!this.form.department) {
                errors.department = 'Department is required';
            }
            if (!this.form.jobTitle) {
                errors.jobTitle = 'Job Title is required';
            }
            if (!this.form.salaryRange) {
                errors.salaryRange = 'Job Grade/Salary Range is required';
            }
            if (!this.form.reportingTo) {
                errors.reportingTo = 'Reporting to is required';
            }
            if (!this.form.manpower) {
                errors.manpower = 'Req. no. of manpower is required';
            }
            if (!this.form.jobLocation) {
                errors.jobLocation = 'Job Location is required';
            }
            if (!this.form.joiningDate) {
                errors.joiningDate = 'Expected Joining Date is required';
            }
            // if (!this.form.specification) {
            //     errors.specification = 'Person specification is required';
            // }
            if (!this.form.employmentType) {
                errors.employmentType = 'Type of employment is required';
            }
            if (this.form.recruitmentType.length === 0) {
                errors.recruitmentType = 'Type of Recruitment is required';
            }

            this.errors = errors;

            return Object.keys(errors).length === 0;
        },
        handleSubmit() {
            if (this.validateForm()) {
                this.submitForm();
            }
        },
        
        submitForm() {
            this.isLoading = true;
            let url = 'store-recruitment-requisition'
            this.axiosPost(url, {
                formData: this.form,
                specifications: this.specifications,
            }, (response) => {
                this.isLoading = false
                this.successNoti(response.message);
                this.form = {
                    dateOfRequisition: '',
                    department: '',
                    jobTitle: '',
                    salaryRange: '',
                    reportingTo: '',
                    manpower: '',
                    jobLocation: '',
                    joiningDate: '',
                    specification: '',
                    employmentType: '',
                    recruitmentType: [],
                    raisedBy: '',
                    approvedBy: ''
                },
                this.specifications = [
                    {
                        details: ''
                    }
                ];
            }, (error) => {
                this.errorNoti(error);
                this.isLoading = false;
            })
        }
    }
  };
  </script>
  
  <style scoped>
#mainContent {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
.form-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 20px;
}

h1 {
  margin-bottom: 20px;
}

.error {
  color: red;
  font-size: 12px;
  margin-top: -10px;
  margin-bottom: 10px;
}

form {
  width: 80%;
  max-width: 800px;
  background: #f9f9f9;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.form-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 10px;
}

.form-row {
  display: contents;
}

.full-width {
  grid-column: span 2;
}

label {
  margin-bottom: 5px;
}

input, textarea {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.button-container {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.download-button {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: auto;
}

.download-button:hover {
  background-color: #45a049;
}
</style>
  