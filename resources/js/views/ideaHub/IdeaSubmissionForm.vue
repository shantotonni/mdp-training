<template>
  <div class="content">
    <div class="container-fluid">
      <div id="mdp">
        <div class="row" style="font-family:'Nunito' !important; font-weight: 300;">
          <div class="col-xl-12">
            <div class="card">
              <div class="datatable" v-if="!isLoading">
                <div class="card-body">
                  <div class="phoneVerificationPart">
                    <div class="d-flex">
                      <div class="flex-grow-1">
                        <div class="row">
                          <div class="col-md-12">

                            <h6 style="margin: 0">
                              <span style="color: #000000">
                                {{Name}},
                              </span>
                            </h6>
                            <p style="margin: 0;font-size: 16px">
                              Please Submit Your Innovative Idea below <i class="mdi mdi-arrow-down-bold"></i></p>
                          </div>
                        </div>
                        <br>
                      </div>
                    </div>
                  </div>
                  <div class="taxPart" >
                    <div class="row">
                      <div class="col-md-12" :style="{position:'',textAlign: `${companyDesignTemplate.LogoAlignment}`}">
                        <div >
                            <form  @submit.prevent="store()" @keydown="form.onKeydown($event)" enctype="multipart/form-data">

                              <div class="modal-body" style=" text-align: -webkit-center;">
                                <div class="row" style="font-size: 12px;">
                                  <div class="col-md-12">
                                    <div class="form-divider m-b-15">
                                      <div class="form-divider-title">
                                          <div class="col-md-12">
                                            <p style=" width: 248px; font-size: 18px; ; font-weight: bold" ><span style="color: green">Employee Information<br></span ></p>
                                          </div>
                                      </div>
                                      <div class="row p-3">
                                        <div class="col-md-3">
                                          <ValidationProvider name="Name" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">
                                            <label for="Name" >Name : </label>
                                            <input type="text" class="form-control"
                                                   id="Name"
                                                   readonly
                                                   data-required="false"
                                                   name="Name"
                                                   v-model="Name"
                                                   placeholder="Name">
                                            <span class="error-message"> {{ errors[0] }}</span>
                                          </ValidationProvider>
                                        </div>
                                        <div class="col-md-3">
                                          <ValidationProvider name="Department" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">
                                            <div class="form-group">
                                              <label for="Department">Department : </label>
                                              <input type="text" class="form-control"
                                                     id="Department"
                                                     readonly
                                                     data-required="false"
                                                     name="Department"
                                                     v-model="Department"
                                                     placeholder="Department">
                                              <span class="error-message"> {{ errors[0] }}</span>
                                            </div>
                                          </ValidationProvider>
                                        </div>
                                        <div class="col-md-3">
                                          <ValidationProvider name="Position" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">
                                            <label for="Position">Position : </label>
                                            <input type="text" class="form-control"
                                                   id="Position"
                                                   readonly
                                                   data-required="false"
                                                   name="Position"
                                                   v-model="Designation"
                                                   placeholder="Position">
                                            <span class="error-message"> {{ errors[0] }}</span>
                                          </ValidationProvider>
                                        </div>
                                        <div class="col-md-3">
                                          <ValidationProvider name="Email" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">
                                            <label for="Email" >Contact Email : </label>
                                            <input type="email" class="form-control"
                                                   id="Email"
                                                   data-required="true"
                                                   name="Email"
                                                   v-model="form.Email"
                                                   placeholder="Email" required>
                                            <span class="error-message"> {{ errors[0] }}</span>
                                          </ValidationProvider>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-12 mt-3">
                                    <div class="form-divider m-b-15">
                                      <div class="form-divider-title">
                                        <div class="col-md-12">
                                          <p style=" width: 100px; font-size: 18px; ; font-weight: bold" ><span style="color: green">Idea<br></span ></p>
                                        </div>
                                      </div>
                                      <div class="row p-3">
                                        <div class="col-md-4">
                                          <ValidationProvider name="Title" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">
                                            <div class="form-group">
                                              <label>Idea Title :</label>
                                              <input type="text" class="form-control"
                                                     id="Title"
                                                     data-required="true"
                                                     name="Title"
                                                     v-model="form.Title"
                                                     placeholder="Title" required>
                                              <span class="error-message"> {{ errors[0] }}</span>
                                              <div class="subtitle" >
                                                (Provide a clear and concise title for your idea.)  </div>
                                            </div>
                                          </ValidationProvider>
                                        </div>
                                        <div class="col-md-8">
                                          <ValidationProvider name="Summary " mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">

                                            <div class="form-group">
                                              <label>Idea Summary ({{ wordCount }}/50 words) :</label>
                                              <textarea id="textarea" class="form-control" rows="2"  v-model="form.Summary"
                                                        placeholder="Enter at least 50 words"
                                                        style="height: 60px !important;" maxlength="8000" data-required="true" required></textarea>

                                              <p class="error-message" v-if="wordCount<49 & wordCount!==0" >You must enter at least 50 words. </p>
                                              <span class="error-message">
                                                 {{ errors[0] }}</span>
                                              <div class="subtitle" >(Briefly summarize your idea. What is the main goal or improvement it seeks to address?)  </div>
                                            </div>
                                          </ValidationProvider>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 mt-3">
                                    <div class="form-divider m-b-15">
                                      <div class="form-divider-title">
                                        <div class="col-md-12">
                                          <p style=" width: 250px; font-size: 18px; font-weight: bold" ><span style="color: green">Problem Statement<br></span ></p>
                                        </div>
                                      </div>
                                      <div class="row p-3">
                                        <div class="col-md-4">
                                          <ValidationProvider name="CurrentIssue" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">
                                            <div class="form-group">
                                              <label>Current Issue :</label>
                                              <textarea id="textarea" class="form-control" rows="2" v-model="form.CurrentIssue" style="height: 60px !important;"  maxlength="8000"></textarea>
                                              <span class="error-message"> {{ errors[0] }}</span>
                                              <div class="subtitle" >(Describe the current problem or area for improvement. Include specific details on how it impacts the company, team, or customers.)  </div>
                                            </div>
                                          </ValidationProvider>
                                        </div>
                                        <div class="col-md-8">
                                          <ValidationProvider name="ImpactOfTheIssue" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">

                                            <div class="form-group">
                                              <label>Impact of the Issue : </label>
                                              <textarea id="textarea" class="form-control" rows="2" v-model="form.ImpactOfTheIssue" style="height: 60px !important;" maxlength="8000" ></textarea>
                                              <span class="error-message"> {{ errors[0] }}</span>
                                              <div class="subtitle" >(Provide quantitative or qualitative evidence if possible (e.g., time, cost, employee/customer satisfaction))  </div>
                                            </div>
                                          </ValidationProvider>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 mt-3">
                                    <div class="form-divider m-b-15">
                                      <div class="form-divider-title">
                                        <div class="col-md-12">
                                          <p style=" width: 220px; font-size: 18px; ; font-weight: bold" ><span style="color: green">Proposed Solution<br></span ></p>
                                        </div>
                                      </div>
                                      <div class="row p-3">
                                        <div class="col-md-4">
                                          <ValidationProvider name="SolutionOverView" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">
                                            <div class="form-group ">
                                              <label>Solution Overview :</label>
                                              <textarea id="textarea" class="form-control" rows="2" v-model="form.SolutionOverView" style="height: 50px !important;" maxlength="8000" ></textarea>
                                              <span class="error-message"> {{ errors[0] }}</span>
                                              <div class="subtitle" >(Describe your proposed solution, including any relevant steps or phases.)  </div>
                                            </div>
                                          </ValidationProvider>
                                        </div>
                                        <div class="col-md-8">
                                          <ValidationProvider name="Reason" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">

                                            <div class="form-group ">
                                              <label>Why This Solution Works :  </label>
                                              <textarea id="textarea" class="form-control" rows="2" v-model="form.Reason" style="height: 50px !important;" maxlength="8000"></textarea>
                                              <span class="error-message"> {{ errors[0] }}</span>
                                              <div class="subtitle" >(Explain how the idea effectively addresses the issue. Mention any successful examples from similar initiatives, if applicable.)  </div>
                                            </div>
                                          </ValidationProvider>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 mt-3">
                                    <div class="form-divider m-b-15">
                                      <div class="form-divider-title">
                                        <div class="col-md-12">
                                          <p style=" width: 220px; font-size: 18px; ; font-weight: bold" ><span style="color: green">Expected Benefits<br></span ></p>
                                        </div>
                                      </div>
                                      <div class="row p-3">
                                        <div class="col-md-4">
                                          <ValidationProvider name="CostSavings" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">
                                            <div class="form-group ">
                                              <label>Cost Savings or Revenue Generation :</label>
                                              <textarea id="textarea" class="form-control" rows="2" v-model="form.CostSavings" style="height: 50px !important;" maxlength="8000" ></textarea>
                                              <span class="error-message"> {{ errors[0] }}</span>
                                              <div class="subtitle" >(Estimate potential savings or revenue the idea might generate.)  </div>
                                            </div>
                                          </ValidationProvider>
                                        </div>
                                        <div class="col-md-4">
                                          <ValidationProvider name="EstimateSavings" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">

                                            <div class="form-group ">
                                              <label>Efficiency Gains :  </label>
                                              <textarea id="textarea" class="form-control" rows="2" v-model="form.Gains" style="height: 50px !important;" maxlength="8000"></textarea>
                                              <span class="error-message"> {{ errors[0] }}</span>
                                              <div class="subtitle" >(Describe any potential improvements in productivity, resource use, or processes.)  </div>
                                            </div>
                                          </ValidationProvider>
                                        </div>
                                        <div class="col-md-4">
                                          <ValidationProvider name="Gains" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">

                                            <div class="form-group ">
                                              <label>Employee or Customer Impact :  </label>
                                              <textarea id="textarea" class="form-control" rows="2" v-model="form.Impact" style="height: 50px !important;" maxlength="8000"></textarea>
                                              <span class="error-message"> {{ errors[0] }}</span>
                                              <div class="subtitle" >(Explain how this idea will benefit employees or customers, if applicable.)  </div>
                                            </div>
                                          </ValidationProvider>
                                        </div>
                                      </div>

                                    </div>
                                  </div>
                                  <div class="col-md-12 mt-3">
                                    <div class="form-divider m-b-15">
                                      <div class="form-divider-title">
                                        <div class="col-md-12">
                                          <p style=" width: 300px; font-size: 18px; ; font-weight: bold" ><span style="color: green">Resource Requirements<br></span ></p>
                                        </div>
                                      </div>
                                      <div class="row p-3">
                                        <div class="col-md-4">
                                          <ValidationProvider name="Budget" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">
                                            <div class="form-group ">
                                              <label>Budget Estimate (if any) :</label>
                                              <textarea id="textarea" class="form-control" rows="2" v-model="form.Budget" style="height: 50px !important;" maxlength="8000"></textarea>
                                              <span class="error-message"> {{ errors[0] }}</span>
                                            </div>
                                          </ValidationProvider>
                                        </div>
                                        <div class="col-md-4">
                                          <ValidationProvider name="Name" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">

                                            <div class="form-group ">
                                              <label>Staffing or Support Needed :  </label>
                                              <textarea id="textarea" class="form-control" rows="2" v-model="form.Staffing" style="height: 50px !important;" maxlength="8000"></textarea>
                                              <span class="error-message"> {{ errors[0] }}</span>
                                            </div>
                                          </ValidationProvider>
                                        </div>
                                        <div class="col-md-4">
                                          <ValidationProvider name="Technology" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">

                                            <div class="form-group ">
                                              <label>Technology or Tools Required :  </label>
                                              <textarea id="textarea" class="form-control" rows="2" v-model="form.Technology" style="height: 50px !important;" maxlength="8000"></textarea>
                                              <span class="error-message"> {{ errors[0] }}</span>
                                            </div>
                                          </ValidationProvider>
                                        </div>
                                      </div>

                                    </div>
                                  </div>
                                  <div class="col-md-12 mt-3">
                                    <div class="form-divider m-b-15">
                                      <div class="form-divider-title">
                                        <div class="col-md-12">
                                          <p style=" width: 500px; font-size: 18px; ; font-weight: bold" ><span style="color: green">Additional Comments or Supporting Information<br></span ></p>
                                        </div>
                                      </div>
                                      <div class="row p-3">
                                        <div class="col-md-12">
                                          <ValidationProvider name="Attachment" mode="eager"
                                                              rules="required"
                                                              v-slot="{ errors }">
                                            <div class="form-group ">
                                              <label>Attachment : </label>
                                              <input
                                                  type="file"
                                                  @change="imgUpload($event)"
                                                  name="file"
                                                  multiple
                                                  :class="{ 'is-invalid': form.errors.has('Attachment') }">
                                              <span class="error-message"> {{ errors[0] }}</span>
                                            </div>
                                          </ValidationProvider>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button :disabled="form.busy"  type="submit" class="btn btn-primary"> Submit</button>
                              </div>
                            </form>
                        </div>
                        <div >
                        </div>
                      </div>
                      <br>


                    </div>

                  </div>
                </div>
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
import printJS from 'print-this'
import moment from "moment";

export default {
  name: "List",
  data() {
    return {
      companyDesignTemplate: {},
      form: new Form({
        EmpCode:'',
        Email:'',
        Title:'',
        Summary:'',
        CurrentIssue:'',
        ImpactOfTheIssue:'',
        SolutionOverView:'',
        Reason:'',
        CostSavings:'',
        Gains:'',
        Impact:'',
        Budget:'',
        Staffing:'',
        Technology:'',
        Attachment:[],
      }),
      Name:'',
      Designation:'',
      Department:'',
      personal: [],
      isLoading: false,
    }
  },
  computed: {
    wordCount() {
      return this.form.Summary.trim().split(/\s+/).filter(word => word).length;

    }
  },
  mounted() {
    this.getAllEmpInfo()
  },

  methods: {
    getAllEmpInfo(){
      axios.get(baseurl + 'api/get-emp-data').then((response) => {
        this.form.EmpCode = response.data.EmpCode;
        this.Name = response.data.EmployeeName;
        this.Designation = response.data.DesgName;
        this.Department = response.data.DeptName;
      }).catch((error) => {

      })
    },
    customFormatter(date) {
      return moment(date).format('YYYY-MM-DD');
    },
    imgUpload(e) {
     // console.log(e.target.files);
      const input = e.target;
      const files = input.files; // Get all selected files

      if (files.length === 0) {
        this.$toaster.error("No files selected");
        return;
      }

      // Loop through each file and process it
      for (let i = 0; i < files.length; i++) {
        this.processImage(files[i]);
      }
    },

    processImage(file) {
      let instance = this;
      const reader = new FileReader();

      reader.readAsDataURL(file);
      reader.onload = function () {
        instance.form.Attachment.push({
          name: file.name,
          content: reader.result,
        });
      };
      reader.onerror = function (error) {
        console.error("Error processing file:", error);
      };
    },

    store(){
      if (this.wordCount>49){
        this.form.busy = true;
        this.form.post(baseurl+ "api/store-idea").then(response => {
          if (response.data.status === 'Success'){
            this.isLoading = false;
            this.$toaster.success(response.data.message);
            location.reload()
          }else{
            this.$toaster.error(response.data.message);
          }

        }).catch(e => {
          this.isLoading = false;
        });
      }else {
        this.$toaster.error("Idea Summary Field Needed Minimum 50 Words!");
      }

    },


  },
}
</script>
<style scoped>
.subtitle{
  /*margin: 6px 43px;*/
  color: rgba(44, 97, 245, 0.71);
  font-size: 12px;
}
.form-control{
  height: 30px !important;
}
.taxBreakdown {
  display: flex;
  justify-content: space-between;
  margin-top: 5px;
  font-size: 15px;
}

label {
  text-align: left;
  padding-left: 5px !important;
  padding-right: 5px !important;
  font-weight: 600;

}
.form-divider {
  padding: 6px 5px 5px 5px;
  border: 1px solid green;
  border-radius: 13px;
  margin: 0 auto;
}
.form-divider-title {
  position: relative;
  top: -20px;
}

.form-divider-title p {
  position: absolute;
  padding: 0 25px;
  background: #ffffff;
  font-weight: bold;
  color: green !important;
  font-size: 12px;
}
</style>

