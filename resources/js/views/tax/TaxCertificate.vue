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
                                    <div class="phoneVerificationPart" v-if="!isSendOtp">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>Welcome <span style="color: green">{{ Name }} !</span>
                                                        </h4>
                                                        <br>
                                                        <p>We’ve got your mobile number on file: <span
                                                                style="color: #0a6aff">{{ Mobile }}</span></p>
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
                                                        <input :value="Mobile" type="text" class="form-control"
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
                                        <div style="font-family:'Nunito' !important;font-size: 17px; font-weight: 300;">
                                            <h2 style="margin-top:0px;font-family:'Nunito' !important;text-align: center;font-weight: bold;font-size: 20px">
                                                Certificate of deduction or collection of tax at source from income
                                                <br>
                                                (other than salary paid by the Government) of the recipient
                                                <br>
                                                classifiable under the head "Income From Employment"
                                                <br>
                                                <span style="font-family:'Nunito' !important;font-size: 20px;text-decoration: underline">[Under Section 145 of ITA, 2023 & Rule 10(1)]</span>


                                            </h2>
                                            <p style="font-family:'Nunito' !important;font-size: 17px;text-align: right;font-weight: bold;margin: 0px">
                                                Issue Date:
                                                {{ moment('2024-09-30').format('DD MMMM YYYY') }}</p>

                                            <div style="display: flex;font-family:'Nunito' !important; justify-content: space-between; margin-top: 1rem;">
                                                <div style="width: 80%;">
                                                    <p style="line-height: .5;font-family:'Nunito' !important;"><span
                                                            style="font-family:'Nunito' !important;display: inline-block;width: 210px;">Name of Employee</span>
                                                        <span>: {{ TaxCertificate.EmpName }}</span></p>
                                                    <p style="font-family:'Nunito' !important;line-height: .5;"><span
                                                            style="display: inline-block;width: 210px;">Designation</span>
                                                        <span>: {{ TaxCertificate.Designation }}</span></p>
                                                    <p style="font-family:'Nunito' !important;line-height: .5;"><span
                                                            style="display: inline-block;width: 210px;">Department</span>
                                                        <span>: {{ TaxCertificate.Department }}</span></p>
                                                    <p style="font-family:'Nunito' !important;line-height: .5;"><span
                                                            style="display: inline-block;width: 210px;">Tax Deducted(Tk.)</span>
                                                        <span v-if="TaxCertificate.Tax !=0">: {{
                                                            Number(TaxCertificate.Tax).toLocaleString()
                                                            }}</span><span
                                                                v-else>: Nill</span></p>


                                                </div>
                                                <div style="width: 50%;">
                                                    <p style="font-family:'Nunito' !important;line-height: .5;"><span
                                                            style="display: inline-block;width: 160px;">E-Tin</span>
                                                        <span>: {{ TaxCertificate.TinNo }}</span></p>
                                                    <p style="font-family:'Nunito' !important;line-height: .5;"><span
                                                            style="display: inline-block;width: 160px;">Income Year</span>
                                                        <span>: {{ TaxCertificate.IncomeYear }}</span></p>
                                                    <p style="font-family:'Nunito' !important;line-height: .5;"><span
                                                            style="display: inline-block;width: 160px;">Assessment Year</span>
                                                        <span>: {{ TaxCertificate.TaxYear }}</span></p>

                                                </div>
                                            </div>
                                            <p style="font-family:'Nunito' !important;line-height: .5;"><span
                                                    style="display: inline-block;width: 210px;">In Word (Taka)</span>
                                                <span v-if="TaxCertificate.Tax !=0">:{{
                                                    inWords(TaxCertificate.Tax)
                                                    }}</span><span v-else>: Nill</span></p>

                                            <!--                                            <table style="width:100%;border: 1px solid black;border-collapse: collapse;"-->

                                            <!--                                                       class="table-sm">-->
                                            <!--                                                    <tr style="font-size: 17px;width: 9%">-->
                                            <!--                                                        <th style="font-family:'Nunito';font-size: 17px;width: 20%">Name of-->
                                            <!--                                                            Employee-->
                                            <!--                                                        </th>-->
                                            <!--                                                        <td>: {{ TaxCertificate.EmpName }}</td>-->

                                            <!--                                                        <th style="font-family:'Nunito';font-size: 17px;">E-TIN</th>-->
                                            <!--                                                        <td>: {{ TaxCertificate.TinNo }}</td>-->
                                            <!--                                                    </tr>-->
                                            <!--                                                    <tr style="font-size: 17px">-->
                                            <!--                                                        <th style="font-family:'Nunito';font-size: 17px;">Designation-->
                                            <!--                                                        </th>-->
                                            <!--                                                        <td>: {{ TaxCertificate.Designation }}</td>-->
                                            <!--                                                        <th style="font-family:'Nunito';font-size: 17px;">Income Year-->
                                            <!--                                                        </th>-->
                                            <!--                                                        <td style="width: 30%">: {{ TaxCertificate.IncomeYear }}</td>-->

                                            <!--                                                    </tr>-->
                                            <!--                                                    <tr style="font-size: 17px">-->
                                            <!--                                                        <th style="font-family:'Nunito';font-size: 17px;">Department-->
                                            <!--                                                        </th>-->
                                            <!--                                                        <td>: {{ TaxCertificate.Department }}</td>-->

                                            <!--                                                        <th style="width:20%;font-family:'Nunito';font-size: 17px;">Assessment-->
                                            <!--                                                            Year-->
                                            <!--                                                        </th>-->
                                            <!--                                                        <td>: {{ TaxCertificate.TaxYear }}</td>-->

                                            <!--                                                    </tr>-->
                                            <!--                                                    <tr style="font-size: 17px">-->
                                            <!--                                                        <th style="font-family:'Nunito';font-size: 17px;">Tax-->
                                            <!--                                                            Deducted(Tk.)-->
                                            <!--                                                        </th>-->
                                            <!--                                                        <td><span v-if="TaxCertificate.Tax !=0">: {{-->
                                            <!--                                                            Number(TaxCertificate.Tax).toLocaleString()-->
                                            <!--                                                            }}</span>-->
                                            <!--                                                            <span v-else>: Nill</span></td>-->

                                            <!--                                                    </tr>-->
                                            <!--                                                    <tr style="font-size: 17px;width: 100%">-->
                                            <!--                                                        <th style="font-family:'Nunito';font-size: 17px;">In-->
                                            <!--                                                            Word(Taka)-->
                                            <!--                                                        </th>-->
                                            <!--                                                        <td style="width: 40%">-->
                                            <!--                                                            <span v-if="TaxCertificate.Tax !=0">:-->
                                            <!--                                                                {{-->
                                            <!--                                                                inWords(TaxCertificate.Tax)-->
                                            <!--                                                                }}</span>-->
                                            <!--                                                            <span v-else>: Nill</span>-->

                                            <!--                                                        </td>-->

                                            <!--                                                    </tr>-->

                                            <!--                                                </table>-->
                                            <p style="font-family:'Nunito';margin: 0px;font-size: 17px;font-weight: bold">
                                                Details of tax deposit to the government treasury:</p>
                                            <div style="display: flex;">
                                                <div style="flex: 1;padding-right: 1rem;">
                                                    <table style="width:100%;border: 1px solid black;border-collapse: collapse;"

                                                           class="table-sm small">
                                                        <tr style="border: 1px solid black;border-collapse: collapse;">
                                                            <th style="text-align:center;border: 1px solid black;border-collapse: collapse;font-size: 15px;font-weight: bold ">
                                                                SL No.
                                                            </th>
                                                            <th style="text-align:center;border: 1px solid black;border-collapse: collapse;font-size: 15px;font-weight: bold">
                                                                Challan No
                                                            </th>
                                                            <th style="text-align:center;border: 1px solid black;border-collapse: collapse;font-size: 15px;font-weight: bold">
                                                                Challan Date
                                                            </th>
                                                            <th style="text-align:center;font-weight: bold;border: 1px solid black;border-collapse: collapse;font-size: 15px">
                                                                Total Amount in the Challan
                                                            </th>
                                                            <th style="text-align:center;font-weight: bold;border: 1px solid black;border-collapse: collapse;font-size: 15px">
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
                                                                moment(singleTaxDepositFirstHalf.ChallanDate).format('DD-MM-yyyy')
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
                                                            <th style="text-align:center;font-weight: bold;font-size: 15px;border: 1px solid black;border-collapse: collapse;">
                                                                SL No.
                                                            </th>
                                                            <th style="text-align:center;font-weight: bold;font-size: 15px;border: 1px solid black;border-collapse: collapse;">
                                                                Challan No
                                                            </th>
                                                            <th style="text-align:center;font-weight: bold;width:20%;font-size: 15px;border: 1px solid black;border-collapse: collapse;">
                                                                Challan Date
                                                            </th>
                                                            <th style="text-align:center;font-weight: bold;font-size: 15px;border: 1px solid black;border-collapse: collapse;">
                                                                Total Amount in the Challan
                                                            </th>
                                                            <th style="text-align:center;font-weight: bold;font-size: 15px;border: 1px solid black;border-collapse: collapse;">
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
                                                                moment(singleTaxDepositSecondHalf.ChallanDate).format('DD-MM-yyyy')
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
                                                        <tr>
                                                            <td colspan="4"
                                                                style="text-align: end;border-right: 1px solid">
                                                                <span style="font-weight: bold">Grand Total</span>
                                                            </td>
                                                            <td style="text-align: end">
                                                                {{ Number(TaxCertificate.Tax).toLocaleString() }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <p style="font-family:'Nunito';font-size: 17px;margin-top: 5px;">We
                                                further
                                                confirm that we have
                                                duly
                                                deducted and deposited the above mentioned amount to Sonali Bank
                                                Ltd,
                                                Registration Complex Branch, Dhaka on basis of the following
                                                computation.
                                            </p>

                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Basic
                                                </p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. .
                                                    . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.Basic).toLocaleString() }}</p>
                                            </div>
                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Festival
                                                    Bonus</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. .
                                                    . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.Bonus).toLocaleString() }}</p>
                                            </div>

                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    House
                                                    Rent
                                                    Allowance</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. .
                                                    . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.Rent).toLocaleString() }}</p>
                                            </div>

                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Accommodation Facilities (Actual Cost)</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. .
                                                    . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.Srent).toLocaleString() }}</p>
                                            </div>

                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Transport
                                                    Allowance</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. .
                                                    . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.Transport).toLocaleString() }}</p>
                                            </div>

                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="font-weight:bold;margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Motor
                                                    Vehicle Facilities :</p>
                                                <!--                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. . . .-->
                                                <!--                                                    <span style="float: right;">TK.</span></p>-->
                                                <!--                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">-->
                                                <!--                                                    {{ Number(TaxCertificate.CompanyCar).toLocaleString() }}</p>-->
                                            </div>

                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Motor
                                                    car
                                                    up to 2500CC(10000 per month *12 months)</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. .
                                                    . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.CompanyCar1).toLocaleString() }}</p>
                                            </div>

                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Motor
                                                    car
                                                    above 2500CC(25000 per month *12 months)</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. .
                                                    . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.CompanyCar2).toLocaleString() }}</p>
                                            </div>

                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Contribution to Recognized Provident Fund (Company's
                                                    Contribution)</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. .
                                                    . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.PF).toLocaleString() }}</p>
                                            </div>

                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;;width: 70%;line-height:1">
                                                    Entertainment Allowance</p>
                                                <p style="margin:0;padding-bottom: 5px;;width: 10%;line-height:1">.
                                                    . .
                                                    .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.ENTERTAIN).toLocaleString() }}</p>
                                            </div>

                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;;width: 70%;line-height:1">
                                                    WPPF</p>
                                                <p style="margin:0;padding-bottom: 5px;;width: 10%;line-height:1">.
                                                    . .
                                                    .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.WPF).toLocaleString() }}</p>
                                            </div>

                                            <div style="font-family:'Nunito';font-size: 17px;border: 2px solid;display: flex; justify-content: space-between;margin-top: 5px;margin-bottom:10px;">
                                                <p style="font-weight:bold;margin:0;width: 70%">
                                                    Income from employment</p>
                                                <p style="margin:0;padding: 5px 0px;width: 10%;line-height:1">. . .
                                                    .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="padding: 5px 0px;font-weight:bolder;margin:0;padding-bottom: 5px;;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.TotalA1).toLocaleString() }}</p>
                                            </div>

                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;;width: 70%;line-height:1">
                                                    Interest
                                                    on Recognized Provident Fund (RPF)</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1"><span
                                                        style="float: right;">{{
                                                    Number(TaxCertificate.Interest).toLocaleString()
                                                    }}</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.Interest1).toLocaleString() }}</p>
                                            </div>


                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Less
                                                    Exepmted upto 33% of employment income excluding RPF
                                                    interest</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1"><span
                                                        style="float: right;">{{
                                                    Number(TaxCertificate.Salaryrpf).toLocaleString()
                                                    }}</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    0</p>
                                            </div>

                                            <div style="font-family:'Nunito';font-size: 17px;border: 2px solid;margin-bottom:10px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="font-weight:bold;margin:0;width: 70%;">
                                                    Total income from employment</p>

                                                <p style="margin:0;width: 10%;">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="font-weight:bolder;margin:0;width: 20%;text-align: right;">
                                                    {{ Number(TaxCertificate.TotalA2).toLocaleString() }}</p>
                                            </div>

                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Less
                                                    Exempted upto 1/3rd of employment income or taka 450000</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. .
                                                    . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.LessSalary).toLocaleString() }}</p>
                                            </div>

                                            <div style="font-family:'Nunito';font-size: 17px;border: 2px solid;margin-bottom:10px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="font-weight:bold;margin:0;width: 70%;">
                                                    Total Taxable Income from employment</p>
                                                <p style="margin:0;width: 10%;">. . . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="font-weight:bolder;margin:0;width: 20%;text-align: right;">
                                                    {{ Number(TaxCertificate.TotalA).toLocaleString() }}</p>
                                            </div>
                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Investment
                                                    for tax rebate-RPF(Company`s & Own Contribution)</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. .
                                                    . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.LessInv).toLocaleString() }}</p>
                                            </div>
                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Provident
                                                    Fund Balance as on {{ LastTaxDate }}</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. .
                                                    . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.PFBal).toLocaleString() }}</p>
                                            </div>
                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Provident
                                                    Fund Loan Balance as on {{ LastTaxDate }}</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. .
                                                    . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.PFLoan).toLocaleString() }}</p>
                                            </div>
                                            <div style="font-family:'Nunito';font-size: 17px;display: flex; justify-content: space-between;margin-top: 5px;">
                                                <p style="margin:0;padding-bottom: 5px;width: 70%;line-height:1">
                                                    Car loan balance as on {{ LastTaxDate }}</p>
                                                <p style="margin:0;padding-bottom: 5px;width: 10%;line-height:1">. .
                                                    . .
                                                    <span style="float: right;">TK.</span></p>
                                                <p style="margin:0;padding-bottom: 5px;width: 20%;line-height:1;text-align: right;">
                                                    {{ Number(TaxCertificate.Carloan).toLocaleString() }}</p>
                                            </div>


                                            <div style="display: flex; justify-content: space-between; margin-top: 5px; font-weight: bolder;">
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
                                                      margin-bottom: 0px;
                                                      margin-top: 0px;
                                                      ">
                                                    <p style="margin-bottom: 5px;font-family:'Nunito';font-size: 17px">
                                                        Farida Rahman<br>
                                                        GM,
                                                        Personnel</p></div>
                                                <!--                                                <p style="padding-top:60px;width: 30%;line-height:1"><span-->
                                                <!--                                                        style="float: right;">{{ EmpCode }} </span></p>-->
                                            </div>

                                        </div>
                                        <div style="position:fixed;margin-top:10px;height: 90px;bottom: 0;"
                                             v-if="companyDesignTemplate.CompanyName !=='Creative Communication Limited'">
                                            <p style="padding:0;font-family:'Nunito';margin-top: 0;margin-bottom:0;font-size: 17px"
                                               v-if="companyDesignTemplate.FooterContentTop">
                                                {{ companyDesignTemplate.FooterContentTop }}</p>
                                            <p style="padding:0;font-family:'Nunito';margin-top: 0;bottom:0;font-size: 17px"
                                               v-if="companyDesignTemplate.FooterContentBottom">
                                                {{ companyDesignTemplate.FooterContentBottom }}</p>
                                        </div>
                                        <div v-else style="position:fixed;margin-top:15px;bottom: 0;">
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
            Name: '',
            EmpCode: '',
            Mobile: '',
            OTPCode: '',
            LastTaxDate: '',
            isMessage: false,
            isLoading: false,
            isSendOtp: false,
            isOTPVerification: false,
            isFormSubmit: false,
            isTaxPrintPart: false,
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
        //this.getTaxData()
        // if (this.isTaxPrintPart === true){
        //   $('#mdp').printThis({
        //     importCSS: true,
        //     loadCSS: "path/to/new/CSS/file",
        //   });
        // }
    },
    methods: {

        getSupportingData() {
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
                } else {
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
                this.printData();

            }).catch((error) => {

            })
        },
        printData() {
            setTimeout(
                $('#mdp').printThis({
                    importCSS: true,
                    // loadCSS: "path/to/new/CSS/file",
                }), 5000);
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

