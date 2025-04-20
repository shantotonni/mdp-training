<template>
    <div class="content">
        <div class="container-fluid">
            <div id="mdp">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="datatable" v-if="!isLoading">
                                <div class="card-body">
                                    <div class="phoneVerificationPart" v-if="!isSendOtp">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4> <span style="color: green">{{ form.Name }},</span>Welcome to Tax Return Submission!
                                                        </h4>
                                                        <br>
                                                        <p>We’ve got your mobile number on file: <span
                                                                style="color: #0a6aff">{{ form.Mobile }}</span></p>
                                                        <p>If this mobile number is incorrect, please contact with
                                                            HR. </p>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <button type="submit" @click="sendOTP" class="btn btn-success">
                                                            <i
                                                                    class="mdi mdi-filter"></i>Send OTP
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="phoneVerificationPart" v-if="isSendOtp && !isOTPVerification">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <input :value="form.Mobile" type="text" class="form-control"
                                                               readonly>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <ValidationProvider name="OTP" mode="eager" rules="required"
                                                                            v-slot="{ errors }">
                                                            <input v-model="OTPCode" type="text" class="form-control"
                                                                   required placeholder="Enter OTP Code">
                                                            <span class="error-message"> {{ errors[0] }}</span>
                                                        </ValidationProvider>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" @click="verifyOTP"
                                                                class="btn btn-success"><i
                                                                class="mdi mdi-filter"></i>Verify OTP
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!--                                  v-if="isTaxPrintPart"-->
                                    <div class="taxPart" v-if="isTaxPrintPart">
                                        <div class="row">
                                          <div class="col-md-12"
                                                 :style="{position:'',textAlign: `${companyDesignTemplate.LogoAlignment}`}">
                                                <div>
                                                    <div><img
                                                            :src="`${mainOrigin}CompanyLogo/ACILimited.png`"
                                                            style="height: 80px;" alt="user"/></div>
                                                </div>
                                            </div>
                                          <br>
                                          <div class="col-md-12" :style="{position:'',textAlign: `${companyDesignTemplate.LogoAlignment}`}">
                                              <div style="font-family:'Nunito' !important;font-size: 17px; font-weight: 300;">
                                                <h4 style="text-align: center;font-weight: bold">
                                                  Information of Income Tax Return Submission({{form.TaxYear}})
                                                  <br>
<!--                                                  <span style="font-size: 16px">(আয়কর রিটার্ন জমাদান সংক্রান্ত তথ্য বিবরণী)</span>-->
                                                </h4>
                                                <br><br>
                                                <form  @submit.prevent="store()" @keydown="form.onKeydown($event)" enctype="multipart/form-data">
                                                  <div class="modal-body" style=" text-align: -webkit-center;">
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <div class="row">
                                                          <div class="col-md-12">
                                                            <ValidationProvider name="Name" mode="eager" rules="required" v-slot="{ errors }">
                                                              <div class="form-group row">
                                                                <label for="Name" class="col-lg-3 col-form-label">Name : </label>
                                                                <div class="col-lg-9">
                                                                  <input type="text" class="form-control"
                                                                         id="Name"
                                                                         readonly
                                                                         data-required="false"
                                                                         name="Name"
                                                                         v-model="form.Name"
                                                                         placeholder="Name">
                                                                  <span class="error-message"> {{ errors[0] }}</span>
                                                                </div>
                                                              </div>
                                                            </ValidationProvider>
                                                          </div>
                                                          <div class="col-md-12">
                                                            <ValidationProvider name="Department" mode="eager" rules="required" v-slot="{ errors }">
                                                              <div class="form-group row">
                                                                <label for="Department" class="col-lg-3 col-form-label">Department : </label>
                                                                <div class="col-lg-9">
                                                                  <input type="text" class="form-control"
                                                                         id="Department"
                                                                         v-model="form.Department"
                                                                         readonly
                                                                         data-required="false" name="Department"
                                                                         placeholder="Department">
                                                                  <span class="error-message"> {{ errors[0] }}</span>
                                                                </div>
                                                              </div>
                                                            </ValidationProvider>
                                                          </div>
                                                        </div>
                                                    </div>
                                                      <div class="col-md-6">
                                                          <div class="row">
                                                            <div class="col-md-12">
                                                              <ValidationProvider name="Designation" mode="eager" rules="required" v-slot="{ errors }">
                                                                <div class="form-group row">
                                                                  <label for="Designation" class="col-lg-3 col-form-label">Designation : </label>
                                                                  <div class="col-lg-9">
                                                                    <input type="text" class="form-control"
                                                                           id="Designation"
                                                                           readonly
                                                                           v-model="form.Designation"
                                                                           data-required="false" name="Designation"
                                                                           placeholder="Designation">
                                                                    <span class="error-message"> {{ errors[0] }}</span>
                                                                  </div>
                                                                </div>
                                                              </ValidationProvider>
                                                            </div>
                                                            <div class="col-md-12">
                                                              <ValidationProvider name="Joining Date" mode="eager" rules="required" v-slot="{ errors }">
                                                                <div class="form-group row">
                                                                  <label for="JoiningDate" class="col-lg-3 col-form-label">Joining Date : </label>
                                                                  <div class="col-lg-9">
                                                                    <input type="text" class="form-control"
                                                                           id="JoiningDate"
                                                                           readonly
                                                                           v-model="form.JoiningDate"
                                                                           data-required="false" name="JoiningDate">
                                                                    <span class="error-message"> {{ errors[0] }}</span>
                                                                  </div>
                                                                </div>
                                                              </ValidationProvider>
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="row">
                                                            <div class="col-md-12">
                                                              <ValidationProvider name="E-tin" mode="eager" rules="required" v-slot="{ errors }">
                                                                <div class="form-group row">
                                                                  <label for="E-tin" class="col-lg-3 col-form-label">E-TIN : </label>
                                                                  <div class="col-lg-9">
                                                                    <input type="text" class="form-control"
                                                                           :readonly ="TinNo.length>5"
                                                                           id="E-tin"
                                                                           v-model="form.Etin"
                                                                           data-required="true" name="E-tin"
                                                                           placeholder="E-tin" min="8">
                                                                    <span class="error-message"> {{ errors[0] }}</span>
                                                                  </div>
                                                                </div>
                                                              </ValidationProvider>
                                                            </div>
                                                            <div class="col-md-12">
                                                              <ValidationProvider name="Zone" mode="eager" rules="required" v-slot="{ errors }">
                                                                <div class="form-group row">
                                                                  <label class="col-lg-3 col-form-label">Tax Zone : </label>
                                                                  <div class="col-lg-9">
                                                                    <select id="Zone" class="form-control" v-model="form.Zone" @change="getTaxCircle(form.Zone)"  >
                                                                      <option value="">Select Tax Zone</option>
                                                                      <option :value="div.TaxZoneId" v-for="(div,index) in Zones" :key="index" >{{div.TaxZoneName}}</option>
                                                                    </select>
                                                                    <span class="error-message"> {{ errors[0] }}</span>
                                                                  </div>
                                                                </div>
                                                              </ValidationProvider>
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="row">
                                                            <div class="col-md-12">
                                                            <ValidationProvider name="Mobile" mode="eager" rules="required" v-slot="{ errors }">
                                                              <div class="form-group row">
                                                                <label for="Mobile" class="col-lg-3 col-form-label">Mobile No : </label>
                                                                <div class="col-lg-9">
                                                                  <input class="form-control"
                                                                         id="Mobile"
                                                                         readonly
                                                                         v-model="form.Mobile"
                                                                         data-required="true" name="Mobile"
                                                                         placeholder="Mobile No" type="tel" pattern='(01)?[0-9]{11}'>
                                                                  <span class="error-message"> {{ errors[0] }}</span>
                                                                </div>
                                                              </div>
                                                            </ValidationProvider>
                                                          </div>
                                                            <div class="col-md-12">
                                                              <ValidationProvider name="Circle" mode="eager" rules="required" v-slot="{ errors }">
                                                                <div class="form-group row">
                                                                  <label class="col-lg-3 col-form-label">Tax Circle : </label>
                                                                  <div class="col-lg-9">
                                                                    <select id="Circle" class="form-control" v-model="form.Circle" >
                                                                      <option value="">Select Tax Circle</option>
                                                                      <option :value="div.TaxCircleId" v-for="(div,index) in Circles" :key="index" >{{div.TaxCircleName}}</option>
                                                                    </select>
                                                                    <span class="error-message"> {{ errors[0] }}</span>
                                                                  </div>
                                                                </div>
                                                              </ValidationProvider>
                                                            </div>

                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="row">
                                                            <div class="col-md-12">
                                                              <ValidationProvider name="returnDate" mode="eager" rules="required" v-slot="{ errors }">
                                                                <div class="form-group row">
                                                                  <label for="returnDate" class="col-lg-3 col-form-label">Tax return Submission Date : </label>
                                                                  <div class="col-lg-9">
                                                                    <input type="date" class="form-control"
                                                                           id="ReturnDate"
                                                                           data-required="true"
                                                                           v-model="form.ReturnDate" name="ReturnDate">

                                                                    <span class="error-message"> {{ errors[0] }}</span>
                                                                  </div>
                                                                </div>
                                                              </ValidationProvider>
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="row">
                                                            <div class="col-md-12">
                                                              <ValidationProvider name="Serial" mode="eager" rules="required" v-slot="{ errors }">
                                                                <div class="form-group row">
                                                                  <label for="Serial" class="col-lg-3 col-form-label"> Provided serial number from the Income tax authority  : </label>
                                                                  <div class="col-lg-9">
                                                                    <input type="text" class="form-control"
                                                                           id="Serial"
                                                                           v-model="form.Serial"
                                                                           data-required="true" name="Serial"
                                                                           placeholder="Serial No">
                                                                    <span class="error-message"> {{ errors[0] }}</span>
                                                                  </div>
                                                                </div>
                                                              </ValidationProvider>
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
            Name:'',
            Designation:'',
            Department:'',
            JoiningDate:'',
            Etin:'',
            Zone:'',
            Circle:'',
            Mobile:'',
            ReturnDate:moment().format('YYYY-MM-DD'),
            Serial:'',
            TaxYear:'',
          }),

            TinNo: '',
            empCode: '',
            thisYear: '',
            NextYear: '',
            Mobile: '',
            OTPCode: '',
            Zones: [],
            Circles: [],
            personal: [],
            ModuleName: 'Tax Return Acknowledgement',
            isLoading: false,
            isSendOtp: false,
            isOTPVerification: false,
            isTaxPrintPart: false,
        }
    },
    created() {
      const currentYear = new Date().getFullYear();
      this.thisYear = currentYear ;
      this.NextYear = currentYear + 1;
      // this.form.TaxYear = `${this.thisYear}-${this.NextYear}`;
    },
    mounted() {
        this.getAllEmpInfo()
    },
    methods: {
      getAllEmpInfo(){
        axios.get(baseurl + 'api/get-emp-data').then((response) => {
          this.form.Name = response.data.EmployeeName;
          this.form.Designation = response.data.DesgName;
          this.form.Department = response.data.DeptName;
          this.form.JoiningDate =moment(response.data.JoiningDate).format('YYYY-MM-DD');
          this.form.Mobile = response.data.MobileNo
          this.form.Etin = response.data.TinNo
          this.TinNo = response.data.TinNo
          this.getAcknowledgement()
          this.getTaxZone()
        }).catch((error) => {

        })
      },
      sendOTP() {
            axios.get(baseurl + 'api/send-otp?ModuleName='+this.ModuleName).then((response) => {
                this.Mobile = response.data.mobileNo
                this.$toaster.success(response.data.message);
                if (response.data.status === 'success') {
                    this.isSendOtp = true;
                }

            }).catch((error) => {
            })
        },
        verifyOTP() {
            axios.get(baseurl + 'api/verify-otp?OTPCode=' + this.OTPCode
            ).then((response) => {
                if (response.data.status === 'success') {
                    this.$toaster.success(response.data.message);
                    this.isOTPVerification = true;
                    this.isTaxPrintPart = true
                    this.form.TaxYear = response.data.TaxYear ;
                    this.getAcknowledgement()
                } else {
                    this.$toaster.error(response.data.message);
                }
            }).catch((error) => {

            })
        },
        getTaxZone(){
            axios.get(baseurl+'api/get-tax-zone').then((response)=> {
            if (response.data){
              this.Zones = response.data.data
            } else {
              this.$toaster.error(response.data.message);
            }
            })
        },
        getTaxCircle(val){
            axios.get(baseurl+'api/get-tax-circle?id='+ val).then((response)=>{
              this.Circles = response.data.data
            })
          },
      getAcknowledgement(){
            axios.get(baseurl+'api/get-acknowledgement?taxYear='+this.form.TaxYear).then((response)=>{
              console.log(response)
              this.form.Circle = response.data.data.TaxCircleId
              this.form.Zone = response.data.data.TaxZoneId
              this.form.ReturnDate =   moment(response.data.data.DateOfReturnSubmission).format('YYYY-MM-DD')
              this.form.Serial = response.data.data.ReturnSerialNumber
              this.getTaxCircle( this.form.Zone);
            })
          },
      customFormatter(date) {
        return moment(date).format('YYYY-MM-DD');
      },
      store(){
        this.form.busy = true;
        this.form.post(baseurl+ "api/store-tax-return").then(response => {
          if (response.data.status === 'Success'){
            this.isLoading = false;
            this.$toaster.success(response.data.message);
            // location.reload()
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
.taxBreakdown {
    display: flex;
    justify-content: space-between;
    margin-top: 5px;
    font-size: 15px;
}

label {
  text-align: left;

}

.footer {

}
</style>

