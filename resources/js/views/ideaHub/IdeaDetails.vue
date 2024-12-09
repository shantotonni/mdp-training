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
                            <h4 style=" color: #0c5460;font-weight: bold;text-align: center;">{{list.Title}}</h4>
                            <p style=" color: #072f36;font-weight: bold;text-align: center;font-size: 12px">{{list.Summary}}</p>
                          </div>
                        </div>
                        <br>
                      </div>
                    </div>
                  </div>
                  <div class="taxPart" >
                    <div class="row">
                      <div class="col-md-12" :style="{position:'',textAlign: `${companyDesignTemplate.LogoAlignment}`}">
                        <div>
                            <form  @submit.prevent="store()" @keydown="form.onKeydown($event)" enctype="multipart/form-data">
                              <div class="modal-body" >
                                <div class="row" style="font-size: 12px;">
                                  <div class="col-md-12">
                                    <div class="form-divider m-b-15">
                                      <div class="form-divider-title">
                                          <div class="col-md-12">
                                            <p style=" width: 230px; font-size: 18px ; font-weight: bold" ><span style="color: green">Employee Information<br></span ></p>
                                          </div>
                                      </div>
                                      <div class="row pt-2">
                                        <div class="col-md-3">
                                         <div class="row">
                                           <label class="col-md-3  text-right">Name :</label>
                                           <div class="col-md-9">
                                             <div>{{personalInfo.EmpCode}}: {{personalInfo.EmployeeName}}</div>
                                           </div>
                                         </div>
                                        </div>

                                        <div class="col-md-3">
                                          <div class="row">
                                            <label class="col-md-3  text-right">Department :</label>
                                            <div class="col-md-9">
                                              <div>{{personalInfo.DeptName}}</div>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-3">
                                          <div class="row">
                                            <label class="col-md-3  text-right">Position :</label>
                                            <div class="col-md-9">
                                              <div>{{personalInfo.DesgName}}</div>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-3">
                                          <div class="row">
                                            <label class="col-md-3 text-right">Contact Email :</label>
                                            <div class="col-md-9">
                                              <div>{{list.Email}}</div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <br>
                                  <div class="col-md-12">
                                    <div class="form-divider m-b-15">
                                      <div class="form-divider-title">
                                        <div class="col-md-12">
                                            <p style=" width: 110px; font-size: 18px; ; font-weight: bold" ><span style="color: green">Details<br></span ></p>
                                        </div>
                                      </div>
                                      <div class="row ">
                                        <div class="col-md-12">
                                          <h5 style="color: #10a1b9">Problem Statement :</h5>
                                        </div>
                                      </div>
                                      <div class="row ">
                                        <div class="col-md-12">
                                          <label>Current Issue :</label> <p>{{list.CurrentIssue}}</p>
                                        </div>
                                      </div>
                                      <div class="row ">
                                        <div class="col-md-12">
                                          <label>Impact of the Issue :</label> <p>{{list.ImpactOfTheIssue}}</p>
                                        </div>
                                      </div>
                                      <div class="row ">
                                        <div class="col-md-12">
                                          <h5 style="color: #10a1b9">Proposed Solution</h5>
                                        </div>
                                      </div>
                                      <div class="row ">
                                        <div class="col-md-12">
                                          <label>Solution Overview :</label> <p>{{list.SolutionOverView}}</p>
                                        </div>
                                      </div>
                                      <div class="row ">
                                        <div class="col-md-12">
                                          <label>Why This Solution Works :</label> <p>{{list.Reason}}</p>
                                        </div>
                                      </div>
                                      <div class="row ">
                                        <div class="col-md-12">
                                          <h5 style="color: #10a1b9">Expected Benefits</h5>
                                        </div>
                                      </div>
                                      <div class="row ">
                                        <div class="col-md-12">
                                          <label>Cost Savings or Revenue Generation :</label> <p>{{list.CostSavings}}</p>
                                        </div>
                                      </div>
                                      <div class="row ">
                                      <div class="col-md-12">
                                        <label>Efficiency Gains :</label> <p>{{list.Gains}}</p>
                                      </div>
                                      </div>
                                      <div class="row ">
                                        <div class="col-md-12">
                                          <label>Employee or Customer Impact :</label> <p>{{list.Impact}}</p>
                                        </div>
                                      </div>


                                      <div class="row ">
                                        <div class="col-md-12">
                                          <h5 style="color: #10a1b9">Resource Requirements</h5>
                                        </div>
                                      </div>
                                      <div class="row ">
                                        <div class="col-md-4">
                                          <label>Budget Estimate (if any) :</label> <p>{{list.Budget}}</p>
                                        </div>
                                        <div class="col-md-4">
                                          <label>Department :</label> <p>{{list.Staffing}}</p>
                                        </div>
                                        <div class="col-md-4">
                                          <label>Technology or Tools Required :</label> <p>{{list.Technology}}</p>
                                        </div>
                                      </div>


                                      <div class="row ">
                                        <div class="col-md-12">
                                          <h5 style="color: #10a1b9">Additional Comments or Supporting Information</h5>
                                        </div>
                                      </div>
                                      <div class="row " >

                                        <div class="col-md-4" v-for="(item , index) in attachment">
                                          <label>Attachment {{++index}}: </label>

                                          <a :href="`${mainOrigin}file/Idea/${item.Attachment}`" target="_blank" download>
                                          <i class="mdi mdi-download"></i> Download</a>
                                        </div>
                                      </div>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <div class="modal-footer">
                                <button :disabled="form.busy" type="submit" class="btn btn-primary"> Submit</button>
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
        EstimateSavings:'',
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
      personalInfo: [],
      list: [],
      attachment: [],
      isLoading: false,
    }
  },
  created() {
  },
  mounted() {
    this.getIdeaDetails()
  },
  methods: {
    getIdeaDetails(){
      axios.get(baseurl + 'api/idea-hub-details/'+this.$route.params.IdeaID).then((response) => {
        console.log(response.data.data)
        this.personalInfo = response.data.data.personal;
        this.list = response.data.data.list;
        this.attachment = response.data.data.files;
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

      reader.readAsDataURL(file); // Read file as base64 string
      reader.onload = function () {
        // Push the processed image to an array (to handle multiple uploads)
        instance.form.Attachment.push({
          name: file.name,
          content: reader.result, // Base64 string of the image
        });

      };

      reader.onerror = function (error) {
        console.error("Error processing file:", error);
      };
    },

    store(){
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
  padding-left: 0 !important;
  padding-right: 0 !important;
  font-weight: 600;
  color: #0c5460;

}
.form-divider {
  padding: 6px 20px 5px 20px;
  border: 1px solid green;
  border-radius: 13px;
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

