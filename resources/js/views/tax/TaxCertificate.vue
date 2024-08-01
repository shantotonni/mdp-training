<template>
  <div class="content" id="mdp">
    <div class="container-fluid">
      <br>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <div class="phoneVerificationPart" v-if="isPhoneVerification">
                  <div class="d-flex">
                    <div class="flex-grow-1">
                      <div class="row">
                        <div class="col-md-2">
                          <input v-model="Mobile" type="text" class="form-control" required placeholder="Enter Mobile">
                        </div>
                        <div class="col-md-2">
                          <button type="submit" @click="sendOTP" class="btn btn-success"><i class="mdi mdi-filter"></i>Send OTP</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="phoneVerificationPart" v-if="isFormSubmit">

                </div>
                <div class="taxPart" v-if="isTaxPrintPart">
                  <div style="position: fixed;top: 0;display: flex">
                    <div><img :src="`${mainOrigin}logo/logo.png`" style="height: 80px;" alt="user" class="rounded-circle" /></div>
                  </div>
                  <div style="font-size: 20px; font-family: 'Aileron', sans-serif; font-weight: 500;">
                    <p style="text-align: right;font-weight: bold;margin-top: 5rem;">Date: 12 October, 2021</p>
                    <h2 style="text-align: center;text-decoration: underline;font-weight: bold;">Certificate of Tax deduction at source from salary</h2>

                    <div style="display: flex; justify-content: space-between; margin-top: 2rem;">
                      <div style="width: 60%;">
                        <p style="line-height: .5;"><span style="display: inline-block;width: 210px;">Name</span> <span>:</span></p>
                        <p style="line-height: .5;"><span style="display: inline-block;width: 210px;">Tax Deduction(Taka)</span> <span>:</span></p>
                        <p style="line-height: .5;"><span style="display: inline-block;width: 210px;">In Word(Taka)</span> <span>:</span></p>
                        <p style="line-height: .5;"><span style="display: inline-block;width: 210px;">Income Year</span> <span>:</span></p>

                      </div>
                      <div style="width: 40%;">
                        <p style="line-height: .5;"><span style="display: inline-block;width: 160px;">Department</span> <span>:</span></p>
                        <p style="line-height: .5;"><span style="display: inline-block;width: 160px;">Designation</span> <span>:</span></p>
                        <p style="line-height: .5;"><span style="display: inline-block;width: 160px;">E-Tin</span> <span>:</span></p>
                        <p style="line-height: .5;"><span style="display: inline-block;width: 160px;">Assessment Year</span> <span>:</span></p>

                      </div>
                    </div>
                    <p style="margin-top: 1rem;">Tax Deposit Details:</p>
                    <div style="display: flex;">
                      <div style="flex: 1;padding-right: 1rem;">
                        <table style="width:100%;border: 1px solid black;border-collapse: collapse;">
                          <tr style="border: 1px solid black;border-collapse: collapse;">
                            <th style="border: 1px solid black;border-collapse: collapse; ">SL No.</th>
                            <th style="border: 1px solid black;border-collapse: collapse;">Challan No</th>
                            <th style="border: 1px solid black;border-collapse: collapse;">Challan Date</th>
                            <th style="border: 1px solid black;border-collapse: collapse;">Total Amount in the Challan</th>
                            <th style="border: 1px solid black;border-collapse: collapse;">Amount relating to this Cretificate</th>
                          </tr>
                          <tr style="border: 1px solid black;border-collapse: collapse;">
                            <td style="border: 1px solid black;border-collapse: collapse; height: 30px;"></td>
                            <td style="border: 1px solid black;border-collapse: collapse;"></td>
                            <td style="border: 1px solid black;border-collapse: collapse;"></td>
                            <td style="border: 1px solid black;border-collapse: collapse;"></td>
                            <td style="border: 1px solid black;border-collapse: collapse;"></td>
                          </tr>
                        </table>
                      </div>
                      <div style="flex: 1;padding-left: 1rem;">
                        <table style="width:100%;border: 1px solid black;border-collapse: collapse;">
                          <tr style="border: 1px solid black;border-collapse: collapse;">
                            <th style="border: 1px solid black;border-collapse: collapse;">SL No.</th>
                            <th style="border: 1px solid black;border-collapse: collapse;">Challan No</th>
                            <th style="border: 1px solid black;border-collapse: collapse;">Challan Date</th>
                            <th style="border: 1px solid black;border-collapse: collapse;">Total Amount in the Challan</th>
                            <th style="border: 1px solid black;border-collapse: collapse;">Amount relating to this Cretificate</th>
                          </tr>
                          <tr style="border: 1px solid black;border-collapse: collapse;">
                            <td style="border: 1px solid black;border-collapse: collapse; height: 30px;"></td>
                            <td style="border: 1px solid black;border-collapse: collapse;"></td>
                            <td style="border: 1px solid black;border-collapse: collapse;"></td>
                            <td style="border: 1px solid black;border-collapse: collapse;"></td>
                            <td style="border: 1px solid black;border-collapse: collapse;"></td>
                          </tr>
                        </table>
                      </div>
                    </div>

                    <p style="margin-top: 1rem;">We further confirm that we have duly deducted and deposited teh above mentioned amount to Sonali Bnk
                      Registration Complex Branch, Dhaka on basis of the following computation.
                    </p>

                    <div style="display: flex; justify-content: space-between;margin-top: 3rem;">
                      <p style="width: 70%;line-height:1">Basic Salary</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>
                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">Festival Bonus</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>

                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">House Rent Allowance</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>

                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">Acconodation Facilities (Actual Cost)</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>

                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">Transport Allowance</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>

                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">Motor Vehicle Facilities</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>

                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">Motor car up to 2500CC(10000 per month *12 months)</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>

                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">Motor car above 2500CC(10000 per month *12 months)</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>

                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">Contribution to Recognized Provident Fund (Company's COntribution)</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>

                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">Entertainment Allowance</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>

                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">WPPF</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>

                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">Salary Income</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>

                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">Interest on Recognized Provident Fund (RPF)</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>


                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">Less Exepmted upto 33% of salary income excluding RPF interest</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right; border-bottom: 2px solid;">147780</p>
                    </div>

                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">Total Salary income</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>

                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">Less Exempted upto 1/3rd of salary income or taka 450000</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right; border-bottom: 2px solid;">147780</p>
                    </div>

                    <div  style="display: flex; justify-content: space-between;">
                      <p style="width: 70%;line-height:1">Total Taxable Income from Salary</p>
                      <p style="width: 10%;line-height:1">. . . . <span style="float: right;">TK.</span></p>
                      <p style="width: 20%;line-height:1;text-align: right;">147780</p>
                    </div>


                    <div  style="display: flex; justify-content: space-between; margin-top: 5rem; font-weight: bolder;">
                      <div>
                        <hr style="
                  border: 1px solid rgb(51, 51, 51);
                  height: 1px;
                  width: 235px;
                  float: left;
                  background-color: black;
                  color: rgb(51, 51, 51);
                  margin-bottom: 0;
                  ">
                        <p> Name: Farida Rahman<br>Designation: GM, Personnel</p></div>
                      <p style="width: 30%;line-height:1"> <span style="float: right;">24630 </span></p>
                    </div>

                  </div>
                  <div style="position: fixed;bottom: 00px;">
                    <p style="margin: 0;font-size: 16px">Head Office: 245 Tejgaon Industrial Area, Dhaka 1208, Bangladesh. Telephone: (8802) 887 8603, Fax - (8802) 8878619, 8878626</p>
                    <p style="margin: 0;font-size: 13px">Factory: 7 Hajeegonj Road, Godnyl, Narayangonj, Bangladesh,Telephone: -PABX-7630493, 7630496, 7630525, FAX - 880-2-7630524 & HO PABX 280, 281, 282, 283</p>
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
export default {
  name: "List",
  data() {
    return {
      mdplist: [],
      Mobile: '',
      isMessage : false,
      isLoading: false,
      isPhoneVerification : true,
      isFormSubmit : false,
      isTaxPrintPart : false
    }
  },
  created() {
    // axios.get(baseurl + `api/mdp/print/${this.$route.params.ID}`).then((response)=>{
    //   this.mdplist = response.data.data
    //   this.initiative = response.data.data.initiative
    //   this.training = response.data.data.training
    //   this.Area = response.data.data.area
    //
    // });
  },
  mounted() {
    if (this.isTax === true){
      $('#mdp').printThis({
        importCSS: true,
        loadCSS: "path/to/new/CSS/file",
      });
    }
  },
  methods: {
    sendOTP(){
      axios.get(baseurl+'api/send-otp?Mobile=' + this.Mobile).then((response)=>{
        console.log(response)
      }).catch((error)=>{

      })
    },
    loadSignature(signature){
      return baseurl + "/signature/" + signature;
    }
  },
}
</script>
<style scoped>

.header {

}
.footer {

}
</style>

