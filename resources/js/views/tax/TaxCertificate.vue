<template>
    <div class="content">
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="col-md-12" style="text-align: end">
                    <button type="button" id="printTaxBtn"
                            style="padding: 5px;margin-bottom: 2px;"
                            @click="printData" class="btn btn-success"><i
                        class="mdi mdi-printer"></i>Print
                    </button>
                </div>
            </div>

            <div id="mdp">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="datatable" v-if="!isLoading">
                                <div class="card-body">

                                    <!--                                <div class="phoneVerificationPart" v-if="!isSendOtp">-->
                                    <!--                                    <div class="d-flex">-->
                                    <!--                                        <div class="flex-grow-1">-->
                                    <!--                                            <div class="row">-->
                                    <!--                                                <div class="col-md-12">-->
                                    <!--                                                    <h4>Welcome to <span style="color: green">{{Name}} !</span> </h4>-->
                                    <!--                                                    <br>-->
                                    <!--                                                    <p>We’ve got your mobile number on file: <span style="color: #0a6aff">{{Mobile}}</span> </p>-->
                                    <!--                                                    <p>If this mobile number is incorrect, please contact with HR. </p>-->
                                    <!--                                                </div>-->

                                    <!--                                            </div>-->
                                    <!--                                            <div class="row">-->
                                    <!--                                                <div class="col-md-2">-->
                                    <!--                                                    <button type="submit" @click="sendOTP" class="btn btn-success"><i-->
                                    <!--                                                            class="mdi mdi-filter"></i>Send OTP-->
                                    <!--                                                    </button>-->
                                    <!--                                                </div>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <!--                                </div>-->

                                    <div class="phoneVerificationPart" v-if="isSendOtp && !isOTPVerification">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <input :value="Mobile" type="text" class="form-control" readonly>
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
                                                        <button type="submit" @click="verifyOTP" class="btn btn-success"><i
                                                            class="mdi mdi-filter"></i>Verify OTP
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="taxPart" v-if="isTaxPrintPart">
                                        <div class="row">
                                            <div class="col-md-12"
                                                 :style="{position:'',textAlign: `${companyDesignTemplate.LogoAlignment}`}">
                                                <div>
                                                    <div><img
                                                        :src="`${mainOrigin}CompanyLogo/${companyDesignTemplate.CompanyLogo}`"
                                                        style="height: 80px;" alt="user"/></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="font-size: 15px; font-family: Roboto, sans-serif; font-weight: 300;">
                                            <p style="text-align: right;font-weight: bold;margin: 0px">{{ PrintDate }}</p>
                                            <h2 style="text-align: center;text-decoration: underline;font-weight: bold;font-size: 25px">
                                                Certificate of Tax deduction at source from salary</h2>

                                            <div style="display: flex; justify-content: space-between; margin-top: 2rem;font-size: 15px">
                                                <div style="width: 52%;">
                                                    <p style="line-height: .5;"><span
                                                        style="display: inline-block;width: 210px;font-weight: bold">Name</span>
                                                        <span>: {{ TaxCertificate.EmpName }}</span></p>
                                                    <p style="line-height: .5;"><span
                                                        style="display: inline-block;width: 210px;font-weight: bold">Tax Deduction(Taka)</span>
                                                        <span v-if="TaxCertificate.Tax !=0">: {{
                                                                Number(TaxCertificate.Tax).toLocaleString()
                                                            }}</span>
                                                        <span v-else>: Nill</span>
                                                    </p>
                                                    <p style="width: 100%"><span
                                                        style="display: inline-block;width: 210px;font-weight: bold">In Word(Taka)</span>
                                                        <span v-if="TaxCertificate.Tax !=0">: {{ inWords(TaxCertificate.Tax) }}</span>
                                                        <span v-else>: Nill</span>
                                                    </p>
                                                    <p style="line-height: .5;"><span
                                                        style="display: inline-block;width: 210px;font-weight: bold">Income Year</span>
                                                        <span>: {{ TaxCertificate.IncomeYear }}</span></p>

                                                </div>
                                                <div style="width: 50%;">
                                                    <p style="line-height: .5;"><span
                                                        style="display: inline-block;width: 160px;font-weight: bold">Department</span>
                                                        <span>: {{ TaxCertificate.Department }}</span></p>
                                                    <p style="line-height: .5;"><span
                                                        style="display: inline-block;width: 160px;font-weight: bold">Designation</span>
                                                        <span>: {{ TaxCertificate.Designation }}</span></p>
                                                    <p style="line-height: .5;"><span
                                                        style="display: inline-block;width: 160px;font-weight: bold">E-Tin</span>
                                                        <span>: {{ TaxCertificate.TinNo }}</span></p>
                                                    <p style="line-height: .5;"><span
                                                        style="display: inline-block;width: 160px;font-weight: bold">Assessment Year</span>
                                                        <span>: {{ TaxCertificate.TaxYear }}</span></p>

                                                </div>
                                            </div>
                                            <p style="margin: 0px;font-size: 15px;font-weight: bold">Tax Deposit
                                                Details:</p>
                                            <div style="display: flex;">
                                                <div style="flex: 1;padding-right: 1rem;">
                                                    <table style="width:100%;border: 1px solid black;border-collapse: collapse;"

                                                           class="table-sm small">
                                                        <tr style="border: 1px solid black;border-collapse: collapse;">
                                                            <th style="border: 1px solid black;border-collapse: collapse;font-size: 15px ">
                                                                SL No.
                                                            </th>
                                                            <th style="border: 1px solid black;border-collapse: collapse;font-size: 15px">
                                                                Challan No
                                                            </th>
                                                            <th style="border: 1px solid black;border-collapse: collapse;font-size: 15px">
                                                                Challan Date
                                                            </th>
                                                            <th style="border: 1px solid black;border-collapse: collapse;font-size: 15px">
                                                                Total Amount in the Challan
                                                            </th>
                                                            <th style="border: 1px solid black;border-collapse: collapse;font-size: 15px">
                                                                Amount relating to this Cretificate
                                                            </th>
                                                        </tr>
                                                        <tr style="border: 1px solid black;border-collapse: collapse;"
                                                            v-if="TaxDepositFirstHalf.length>0"
                                                            v-for="(singleTaxDepositFirstHalf,firstHalfIndex) in TaxDepositFirstHalf"
                                                        >
                                                            <td style="border: 1px solid black;border-collapse: collapse; text-align: center">
                                                                {{ firstHalfIndex + 1 }}
                                                            </td>
                                                            <td style="width:30%;border: 1px solid black;border-collapse: collapse;text-align: center">
                                                                {{ singleTaxDepositFirstHalf.ChallanNo }}
                                                            </td>
                                                            <td style="width:20%;text-align:center;border: 1px solid black;border-collapse: collapse;">
                                                                {{
                                                                    moment(singleTaxDepositFirstHalf.ChallanDate).format('yyyy-MM-DD')
                                                                }}
                                                            </td>
                                                            <td style="border: 1px solid black;border-collapse: collapse;text-align: end">
                                                                {{
                                                                    Number(singleTaxDepositFirstHalf.Amount).toLocaleString()
                                                                }}
                                                            </td>
                                                            <td style="border: 1px solid black;border-collapse: collapse;text-align: end">
                                                                {{
                                                                    Number(singleTaxDepositFirstHalf.CAmount).toLocaleString()
                                                                }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div style="flex: 1;padding-left: 1rem;">
                                                    <table style="width:100%;border: 1px solid black;border-collapse: collapse;"
                                                           class="table-sm small">
                                                        <tr style="border: 1px solid black;border-collapse: collapse;">
                                                            <th style="font-size: 15px;border: 1px solid black;border-collapse: collapse;">
                                                                SL No.
                                                            </th>
                                                            <th style="font-size: 15px;border: 1px solid black;border-collapse: collapse;">
                                                                Challan No
                                                            </th>
                                                            <th style="width:20%;font-size: 15px;border: 1px solid black;border-collapse: collapse;">
                                                                Challan Date
                                                            </th>
                                                            <th style="font-size: 15px;border: 1px solid black;border-collapse: collapse;">
                                                                Total Amount in the Challan
                                                            </th>
                                                            <th style="font-size: 15px;border: 1px solid black;border-collapse: collapse;">
                                                                Amount relating to this Cretificate
                                                            </th>
                                                        </tr>
                                                        <tr style="border: 1px solid black;border-collapse: collapse;"
                                                            v-if="TaxDepositSecondHalf.length>0"
                                                            v-for="(singleTaxDepositSecondHalf,secondHalfIndex) in TaxDepositSecondHalf"
                                                        >
                                                            <td style="border: 1px solid black;border-collapse: collapse;text-align: center">
                                                                {{ TaxDepositFirstHalfLastIndex + secondHalfIndex }}
                                                            </td>
                                                            <td style="width:30%;border: 1px solid black;border-collapse: collapse;text-align: center">
                                                                {{ singleTaxDepositSecondHalf.ChallanNo }}
                                                            </td>
                                                            <td style="text-align:center;border: 1px solid black;border-collapse: collapse;">
                                                                {{
                                                                    moment(singleTaxDepositSecondHalf.ChallanDate).format('yyyy-MM-DD')
                                                                }}
                                                            </td>
                                                            <td style="border: 1px solid black;border-collapse: collapse;text-align: end">
                                                                {{
                                                                    Number(singleTaxDepositSecondHalf.Amount).toLocaleString()
                                                                }}
                                                            </td>
                                                            <td style="border: 1px solid black;border-collapse: collapse;text-align: end">
                                                                {{
                                                                    Number(singleTaxDepositSecondHalf.CAmount).toLocaleString()
                                                                }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <p style="margin-top: 5px;font-size: 15px">We further confirm that we have duly
                                                deducted and deposited teh above mentioned amount to Sonali Bnk
                                                Registration Complex Branch, Dhaka on basis of the following computation.
                                            </p>

                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">Basic
                                                    Salary</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.Basic }}</p>
                                            </div>
                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">Festival
                                                    Bonus</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.Bonus }}</p>
                                            </div>

                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">House Rent
                                                    Allowance</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.Rent }}</p>
                                            </div>

                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Accommodation Facilities (Actual Cost)</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.Srent }}</p>
                                            </div>

                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">Transport
                                                    Allowance</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.Transport }}</p>
                                            </div>

                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">Motor
                                                    Vehicle Facilities</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.CompanyCar }}</p>
                                            </div>

                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">Motor car
                                                    up to 2500CC(10000 per month *12 months)</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.CompanyCar1 }}</p>
                                            </div>

                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">Motor car
                                                    above 2500CC(25000 per month *12 months)</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.CompanyCar2 }}</p>
                                            </div>

                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Contribution to Recognized Provident Fund (Company's COntribution)</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.PF }}</p>
                                            </div>

                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;;width: 70%;line-height:1">
                                                    Entertainment Allowance</p>
                                                <p style="margin:0;padding-bottom: 5px;;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.ENTERTAIN }}</p>
                                            </div>

                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;;width: 70%;line-height:1">WPPF</p>
                                                <p style="margin:0;padding-bottom: 5px;;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.WPPF }}</p>
                                            </div>

                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;margin-bottom:10px;font-size: 15px;">
                                                <p style="font-weight:bolder;margin:0;padding-bottom: 5px;width: 70%;line-height:1">Salary
                                                    Income</p>
                                                <p style="margin:0;padding-bottom: 5px;;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="font-weight:bolder;margin:0;padding-bottom: 5px;;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.TotalA1 }}</p>
                                            </div>

                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;;width: 70%;line-height:1">Interest
                                                    on Recognized Provident Fund (RPF)</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1"><span
                                                    style="float: right;">{{ TaxCertificate.Interest }}</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.Interest1 }}</p>
                                            </div>


                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">Less
                                                    Exepmted upto 33% of salary income excluding RPF interest</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1"><span
                                                    style="float: right;">{{ TaxCertificate.Salaryrpf }}</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right; border-bottom: 2px solid;">
                                                    0</p>
                                            </div>

                                            <div style="margin-bottom:10px;display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="font-weight:bolder;margin:0;padding-bottom: 5px;width: 70%;line-height:1">Total
                                                    Salary income</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="font-weight:bolder;margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.TotalA2 }}</p>
                                            </div>

                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">Less
                                                    Exempted upto 1/3rd of salary income or taka 450000</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right; border-bottom: 2px solid;">
                                                    {{ TaxCertificate.LessSalary }}</p>
                                            </div>

                                            <div style="margin-bottom:10px;display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="font-weight:bolder;margin:0;padding-bottom: 5px;width: 70%;line-height:1">Total
                                                    Taxable Income from Salary</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="font-weight:bolder;margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.TotalA }}</p>
                                            </div>
                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">Investment
                                                    For Tax rebate-RPF(Company`s & Own Contribution)</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.LessInv }}</p>
                                            </div>
                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">Provident
                                                    Found Balance as on {{LastTaxDate}}</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.PFBal }}</p>
                                            </div>
                                            <div style="display: flex; justify-content: space-between;margin-top: 5px;font-size: 15px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">Provident
                                                    Found Loan Balance as on {{LastTaxDate}}</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ TaxCertificate.PFLoan }}</p>
                                            </div>


                                            <div style="display: flex; justify-content: space-between; margin-top: 50px; font-weight: bolder;">
                                                <div>
                                                    <div><img :src="`${mainOrigin}CompanyLogo/taxGmSignature.png`"
                                                              style="width: 200px" alt="user"/></div>
                                                    <hr style="
                  border: 1px solid rgb(51, 51, 51);
                  height: 1px;
                  width: 260px;
                  float: left;
                  background-color: black;
                  color: rgb(51, 51, 51);
                  margin-bottom: 0;
                  ">
                                                    <br>
                                                    <p style="font-size: 15px"> Name: Farida Rahman<br>Designation: GM,
                                                        Personnel</p></div>
                                                <p style="padding-top:60px;width: 30%;line-height:1"><span
                                                    style="float: right;">{{ EmpCode }} </span></p>
                                            </div>

                                        </div>
                                        <div style="position:fixed;margin-top:10px;bottom: 0px;"
                                             v-if="companyDesignTemplate.CompanyName !=='Creative Communication Limited'">
                                            <p style="margin: 0;font-size: 15px"
                                               v-if="companyDesignTemplate.FooterContentTop">
                                                {{ companyDesignTemplate.FooterContentTop }}</p>
                                            <p style="margin: 0;font-size: 15px"
                                               v-if="companyDesignTemplate.FooterContentBottom">
                                                {{ companyDesignTemplate.FooterContentBottom }}</p>
                                        </div>
                                        <div v-else style="position:fixed;margin-top:10px;bottom: 0px;">
                                            <div class="row">
                                                <div class="col-md-12" style="text-align: initial;">
                                                    <img :src="`${mainOrigin}CompanyLogo/creativecomltdfooter.png`"
                                                         alt="user"/>
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
            mdplist: [],
            TaxCertificate: {},
            TaxDeposit: {},
            companyDesignTemplate: {},
            TaxDepositFirstHalf: [],
            TaxDepositFirstHalfLastIndex: 0,
            TaxDepositSecondHalf: [],
            Name:'',
            EmpCode: '',
            Mobile: '',
            OTPCode: '',
            LastTaxDate:'',
            isMessage: false,
            isLoading: false,
            isSendOtp: false,
            isOTPVerification: false,
            isFormSubmit: false,
            isTaxPrintPart: true,
            PrintDate: moment().format('MMMM Do YYYY')
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
        this.getSupportingData()
        this.getTaxData()
        // if (this.isTaxPrintPart === true){
        //   $('#mdp').printThis({
        //     importCSS: true,
        //     loadCSS: "path/to/new/CSS/file",
        //   });
        // }
    },
    methods: {

        getSupportingData(){
            axios.get(baseurl + 'api/get-tax-supporting-data').then((response) => {
                this.Mobile = response.data.mobileNo
                this.Name = response.data.Name
            }).catch((error) => {

            })
        },

        sendOTP() {
            axios.get(baseurl + 'api/send-otp').then((response) => {
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
                    this.getTaxData()
                }
                else{
                    this.$toaster.error(response.data.message);
                }
            }).catch((error) => {

            })
        },
        getTaxData() {
            axios.get(baseurl + 'api/get-tax-data').then((response) => {
                this.TaxCertificate = response.data.TaxCertificate
                this.TaxDeposit = response.data.TaxDeposit
                this.EmpCode = response.data.EmpCode
                this.companyDesignTemplate = response.data.companyDesignTemplate
                this.LastTaxDate = (response.data.TaxCertificate.IncomeYear).substring(15, 26)

                if (this.TaxDeposit.length > 0 || this.TaxDeposit !== null) {
                    // Determine the middle index
                    let middleIndex = Math.floor(this.TaxDeposit.length / 2);
                    middleIndex = middleIndex + 1
                    this.TaxDepositFirstHalfLastIndex = middleIndex + 1

                    // Split the array into two parts
                    this.TaxDepositFirstHalf = this.TaxDeposit.slice(0, middleIndex);
                    this.TaxDepositSecondHalf = this.TaxDeposit.slice(middleIndex);
                }
                //this.printData();

            }).catch((error) => {

            })
        },
        printData(){
            setTimeout(
                $('#mdp').printThis({
                    importCSS: true,
                    // loadCSS: "path/to/new/CSS/file",
                }), 5000);

            window.onafterprint = function(e){
                $(window).off('mousemove', window.onafterprint);
                console.log('Print Dialog Closed..');
            };
        },
        loadSignature(signature) {
            return baseurl + "/signature/" + signature;
        },
        inWords(num) {
            let a = ['', 'one ', 'two ', 'three ', 'four ', 'five ', 'six ', 'seven ', 'eight ', 'nine ', 'ten ', 'eleven ', 'twelve ', 'thirteen ', 'fourteen ', 'fifteen ', 'sixteen ', 'seventeen ', 'eighteen ', 'nineteen '];
            let b = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

            //if ((num = num.toString()).length > 9) return 'overflow';
            let n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return;
            let str = '';
            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
            return str.toUpperCase();
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

.header {

}

.footer {

}
</style>

