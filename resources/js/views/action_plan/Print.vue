<template>
    <div class="content" id="action">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="datatable" v-if="!isLoading">
                            <div class="card-body margin_p">
                              <div class="first_part">
                                <h3 style="text-align:center">ACI Limited</h3>
                                <p style="text-align:center;font-size: 18px;font-weight: bold;margin-left: 190px;">Management Staff Action Plan and Performance Appraisal Form
                                  <span style="font-weight: normal;border: 1px solid;padding: 15px;margin-left: 20px">Private & Confidential</span>
                                </p>
                                <hr>
                                <p style="font-size: 18px">
                                  Name of employee <span style="display: inline-block;border-bottom: 1px solid;width: 300px;text-align: center">{{ action_plan.EmployeeName }}</span>
                                  Position <span style="display: inline-block;border-bottom: 1px solid;width: 270px;text-align: center">{{ action_plan.Designation }}</span>
                                  Staff Id <span style="display: inline-block;border-bottom: 1px solid;width: 100px;text-align: center">{{ action_plan.StaffID }}</span>
                                </p>
                                <p style="font-size: 18px">
                                  Name of Supervisor <span style="display: inline-block;border-bottom: 1px solid;width: 290px;text-align: center">{{ action_plan.SuppervisorName }}</span>
                                  Position <span style="display: inline-block;border-bottom: 1px solid;width: 270px;text-align: center">{{ action_plan.SuppervisorDesignation }}</span>
                                  Staff Id <span style="display: inline-block;border-bottom: 1px solid;width: 100px;text-align: center">{{ action_plan.SuppervisorStaffID }}</span>
                                </p>
                              </div>

                              <div class="first_part" style="margin-top: 9px">
                                <p style="font-size: 18px">
                                  Agreed Action Plan for the Period : {{ action_plan.ActionPlanPeriod }}
                                </p>
                                <table class="table table-bordered" style="border: 1px solid #000000 !important">
                                  <thead>
                                    <tr style="background: white;color: black;font-size: 18px">
                                      <th class="text-center" rowspan="2" style="vertical-align: middle;">Task/Objective (70% Quantitative;  30% Qualitative)</th>
                                      <th class="text-center" rowspan="2" style="vertical-align: middle;">Target Date Of Completion</th>
                                      <th class="text-center" rowspan="2" style="vertical-align: middle;">Criterion Of Measurement</th>
                                      <th class="text-center" colspan="2"> Level of Achievement*</th>
                                    </tr>
                                    <tr style="background: white;color: black;font-size: 18px">
                                      <th class="text-center"> Rating by Employee</th>
                                      <th class="text-center"> Rating by Supervisor</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr v-for="(item, i) in task" :key="item.ID" v-if="task.length" style="font-size: 17px">
                                      <td class="text-left" style="width: 50%;">{{i+1}}. {{ item.TaskName }}</td>
                                      <td class="text-center">{{ customFormatter(item.TargetDateOfCompletion) }}</td>
                                      <td class="text-center" >{{ item.CriterionOfMeasurement }}</td>
                                      <td style="background: #c1c1c1"></td>
                                      <td style="background: #c1c1c1"></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <p style="font-size: 18px">(You may insert new rows if it is required)</p>
                              </div>

                              <div class="third_part">
                                <div style="display: flex">
                                    <div class="col-md-3" style="text-align: left">
                                      <p style="font-size: 18px">Signature of Employee</p>
                                      <div style="width: 200px;height: 55px; border: 1px solid black; box-sizing: border-box;">
                                        <img v-if="action_plan.Signature" :src="loadSignature(action_plan.Signature)" style="height: 40px; width: 150px;margin-left: 25px;margin-top: 5px;" />
                                      </div>
<!--                                      <div class="fake-input">-->
<!--&lt;!&ndash;                                        <input type="text" />&ndash;&gt;-->
<!--                                        -->
<!--                                      </div>-->
                                    </div>
                                  <div class="col-md-3">
                                    <p style="font-size: 18px">Signature of Supervisor</p>
                                    <input type="text">
                                  </div>
                                  <div class="col-md-3">
                                    <p style="font-size: 18px">Signature of Employee</p>
                                    <input type="text">
                                  </div>
                                  <div class="col-md-3">
                                    <p style="font-size: 18px">Signature of Supervisor</p>
                                    <input type="text">
                                  </div>
                                </div>
                              </div>
                              <br>
                              <div class="third_part" style="margin-top: 10px;">
                                <div style="display: flex">
                                  <div class="col-md-3" style="text-align: left">
                                    <p style="font-size: 18px">Preparation Date of Action Plan</p>
                                  </div>
                                  <div class="col-md-3">
                                    <input type="text" style="height: 40px">
                                  </div>
                                  <div class="col-md-3">
                                    <p style="font-size: 18px">Date of Appraisal Interview</p>
                                  </div>
                                  <div class="col-md-3">
                                    <input type="text" style="height: 40px">
                                  </div>
                                </div>
                              </div>
                              <div>
                                <p style="font-size: 18px">*Rating Scale</p>
                                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                                  <thead>
                                  <tr style="background: white;color: black;font-size: 18px">
                                    <th class="text-center" style="vertical-align: middle;">Outstanding</th>
                                    <th class="text-center" colspan="2" style="vertical-align: middle;">Very Good</th>
                                    <th class="text-center" colspan="2" style="vertical-align: middle;">Good</th>
                                    <th class="text-center" colspan="2" style="vertical-align: middle;">Satisfactory</th>
                                    <th class="text-center" colspan="2" style="vertical-align: middle;">Tolerable</th>
                                    <th class="text-center" style="vertical-align: middle;">Poor</th>
                                  </tr>
                                  <tr style="background: white;color: black;font-size: 18px">
                                    <th class="text-center"> 9</th>

                                    <th class="text-center"> 8</th>
                                    <th class="text-center"> 7</th>

                                    <th class="text-center"> 6</th>
                                    <th class="text-center"> 5</th>

                                    <th class="text-center"> 4</th>
                                    <th class="text-center"> 3</th>

                                    <th class="text-center"> 2</th>
                                    <th class="text-center"> 1</th>

                                    <th class="text-center"> 0</th>
                                  </tr>
                                  </thead>
                                </table>
                              </div>
                              <div class="fourth_part">
                                <div style="display: flex">
                                  <div class="col-md-3">
                                    <p>Average Rating <input type="text" style="margin-left: 20px;font-size: 18px"></p>
                                  </div>
                                </div>
                              </div>

                              <p style="page-break-before: always"></p>
                              <div class="fourth_part">
                                <p style="font-size: 20px">B. From your Job Description if you were to list three most significant achievements and contributions during the year,
                                  which ones would you mention?</p>
                                1. <p style="font-size: 20px"></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center"></span></p>
                                <br>
                                2. <p style="font-size: 20px"></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center"></span></p>
                                <br>
                                3. <p style="font-size: 20px"></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center"></span></p>
                                <br>
                                <p style="font-size: 20px">Comment of appraiser </p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center"></span></p>
                                <br>
                                <p style="font-size: 20px">C. If you were to identify one item from your Job Description that you did least well, which one would you mention?
                                  What factor was responsible for it and what could have been done to avoid this lapse?</p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center"></span></p>

                                <p style="font-size: 20px">Comment of appraiser </p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                                <p><span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center"></span></p>
                              </div>

                              <p style="page-break-before: always"></p>

                              <div class="table_part">
                                <table class="table table-bordered" style="border: 1px solid #000000 !important">
                                  <thead>
                                  <tr style="background: white;color: black">
                                    <th class="text-center" colspan="2" style="font-size: 20px"> Definitions of Rating Standards</th>
                                  </tr>
                                  <tr style="background: white;color: black">
                                    <th class="text-center" style="font-size: 20px"> Outstanding</th>
                                    <th style="font-size: 20px"> Has far exceeded all performance objectives and standards.
                                      Made unusually significant contribution resulting in major changes or significant improvements within own areas of responsibility.</th>
                                  </tr>
                                  <tr style="background: white;color: black">
                                    <th class="text-center" style="font-size: 20px"> Very Good</th>
                                    <th style="font-size: 20px"> Has exceeded overall performance objectives and standards.
                                      Has skills to be consistently successful in meeting difficult challenges.</th>
                                  </tr>
                                  <tr style="background: white;color: black">
                                    <th class="text-center" style="font-size: 20px"> Good</th>
                                    <th style="font-size: 20px">Has successfully achieved performance objectives. In few instances may have exceeded some objectives and missed some;
                                      but on the balance has competently performed the duties of the job.</th>
                                  </tr>
                                  <tr style="background: white;color: black">
                                    <th class="text-center" style="font-size: 20px"> Satisfactory</th>
                                    <th style="font-size: 20px">Has adequately performed most of the responsibilities.
                                      Met a few objectives but has not met agreed standards of performance objectives in respect of quality or volume in several areas.</th>
                                  </tr>
                                  <tr style="background: white;color: black">
                                    <th class="text-center" style="font-size: 20px"> Tolerable</th>
                                    <th style="font-size: 20px">Has somehow performed most of the responsibilities.
                                      Met a few objectives but has not reached agreed standards of quality or quantity of performance objectives.</th>
                                  </tr>
                                  <tr style="background: white;color: black">
                                    <th class="text-center" style="font-size: 20px"> Poor</th>
                                    <th style="font-size: 20px">Has not performed the tasks satisfactorily.
                                      On the balance, has not achieved established performance objectives.</th>
                                  </tr>
                                  </thead>
                                </table>
                              </div>

                              <p style="page-break-before: always"></p>
                              <p style="font-size: 20px">D. Taking into consideration your achievements under A, Observations under B & C on page No. 2 and keeping in view the broad objectives of your job,
                                rate your overall performance on the basis of the definitions on the opposite page. You are allowed to rate up to one decimal point.</p>
                              <br>
                              <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                                <thead>
                                <tr style="background: white;color: black">
                                  <th class="text-center" style="vertical-align: middle;font-size: 20px">Standard Rating Point</th>
                                  <th class="text-center" style="vertical-align: middle;font-size: 20px">Outstanding</th>
                                  <th class="text-center" style="vertical-align: middle;font-size: 20px">Very Good</th>
                                  <th class="text-center" style="vertical-align: middle;font-size: 20px">Good</th>
                                  <th class="text-center" style="vertical-align: middle;font-size: 20px">Satisfactory</th>
                                  <th class="text-center" style="vertical-align: middle;font-size: 20px">Tolerable</th>
                                  <th class="text-center" style="vertical-align: middle;font-size: 20px">Poor</th>
                                </tr>
                                <tr style="background: white;color: black">
                                  <th class="text-center"> </th>
                                  <th class="text-center" style="font-size: 20px"> 9</th>
                                  <th class="text-center" style="font-size: 20px"> 7 to 8</th>
                                  <th class="text-center" style="font-size: 20px"> 5 to 6</th>
                                  <th class="text-center" style="font-size: 20px"> 3 to 4</th>
                                  <th class="text-center" style="font-size: 20px"> 1 to 2</th>
                                  <th class="text-center" style="font-size: 20px"> 0</th>
                                </tr>
                                <tr style="background: white;color: black">
                                  <th class="text-center" style="font-size: 20px">Assessed by Appraisee</th>
                                  <th class="text-center"> </th>
                                  <th class="text-center"></th>
                                  <th class="text-center"></th>
                                  <th class="text-center"></th>
                                  <th class="text-center"></th>
                                  <th class="text-center"></th>
                                </tr>
                                <tr style="background: white;color: black">
                                  <th class="text-center" style="font-size: 20px">Assessed by Appraiser</th>
                                  <th class="text-center"> </th>
                                  <th class="text-center"></th>
                                  <th class="text-center"></th>
                                  <th class="text-center"></th>
                                  <th class="text-center"></th>
                                  <th class="text-center"></th>
                                </tr>
                                </thead>
                              </table>
                              <br>
                              <div style="display: flex">
                                <div class="col-md-6" style="text-align: left">
                                  <p style="font-size: 20px">
                                    Signature of Appraisee <span style="display: inline-block;border-bottom: 1px solid;width: 200px;text-align: center">
                                    <img v-if="action_plan.Signature" :src="loadSignature(action_plan.Signature)" style='height: 40px; width: 150px' />
                                  </span>
                                  </p>
<!--                                  <p style="font-size: 20px">Signature of Appraisee-->
<!--                                    <span style="display: inline-block;border-bottom: 1px solid;width: 200px;text-align: center"></span>-->
<!--                                  </p>-->
                                </div>
                                <div class="col-md-6">
                                  <p style="font-size: 20px">Signature of Appraiser
                                    <span style="display: inline-block;border-bottom: 1px solid;width: 200px;text-align: center"></span>
                                  </p>
                                </div>
                              </div>
                              <div style="display: flex">
                                <div class="col-md-6" style="text-align: left">
                                  <p>Date
                                    <span style="display: inline-block;border-bottom: 1px solid;width: 300px;text-align: center"></span>
                                  </p>
                                </div>
                                <div class="col-md-6">
                                  <p>Date
                                    <span style="display: inline-block;border-bottom: 1px solid;width: 300px;text-align: center"></span>
                                  </p>
                                </div>
                              </div>
                              <br>
                              <p style="font-size: 20px">In case the score by Appraiser is '9' or '0' or the difference in score between the Appraisee and the Appraiser is 3 points or more,
                                it is mandatory for the Appraiser to prepare a report giving details to substantiate the rating or the reason for the difference.</p>
                              <div class="six_part">
                                <p style="font-size: 20px">
                                  Appraisal Interview held on <span style="display: inline-block;border-bottom: 1px solid;width: 300px;text-align: center"></span>
                                </p>
                              </div>
                              <br>
                              <p style="font-size: 20px">General comment by the Appraiser after the Appraisal Interview,
                                indicating major points discussed and if the Appraisee accepts the rating made by the Appraiser.</p>
                              <br>
                              <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                              <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                              <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                              <p><span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center"></span></p>

                              <br>

                              <p style="font-weight: bold;font-size: 20px">Remarks of Superior of Appraiser</p>
                              <p style="font-size: 20px">Indicate below if you agree or disagree with the assessment of the Appraiser.
                                Would you modify or add to the above assessment in any manner?</p>
                              <br>
                              <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                              <p><span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span></p>
                              <p><span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center"></span></p>

                              <br>
                              <div style="display: flex">
                                <div class="col-md-6" style="text-align: left">
                                  <p style="font-size: 20px">Signature
                                    <span style="display: inline-block;border-bottom: 1px solid;width: 300px;text-align: center;"></span>
                                  </p>
                                </div>
                                <div class="col-md-6">
                                  <p style="font-size: 20px">Date
                                    <span style="display: inline-block;border-bottom: 1px solid;width: 300px;text-align: center"></span>
                                  </p>
                                </div>
                              </div>

                              <div class="six_part">
                                <p style="font-size: 20px">
                                  Designation <span style="display: inline-block;border-bottom: 1px solid;width: 500px;text-align: center"></span>
                                </p>
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
          action_plan: [],
          task: [],
          isMessage : false,
          query: "",
          editMode: false,
          isLoading: false,
        }
    },
  created() {
    axios.get(baseurl + `api/action_plane_print/${this.$route.params.ID}`).then((response)=>{
      console.log(response)
      this.action_plan = response.data.data
      this.task = response.data.data.finds

      // setTimeout(function(){
      //   window.print()
      // },1000)
      $('#action').printThis({
        importCSS: true,
        loadCSS: baseurl+"css/app.css",
      });
    });
  },
  methods: {
    loadSignature(signature){
      return baseurl + "/action_plan/signature/" + signature;
    },
    customFormatter(date) {
      if (date){
        return moment(date).format('MMMM YYYY');
      }else {
        return 'On Demand';
      }
    },
  },
}
</script>
<style scoped>
.table thead th {
  vertical-align: middle;
}
#action {
  font-family: 'Nunito', sans-serif;
  color: #000000;
}
table tr th,table tr td {
  color: #000000 !important;
}
.table-bordered {
  border: 1px solid #000000 !important;
}
.table-bordered td, .table-bordered th {
  border: 1px solid #000000 !important;
}
.margin_p p{
  margin: 0;
  font-size: 18px;
}
.margin_p .table>tbody>tr>td, .table>tfoot>tr>td, .table>thead>tr>td {
  /* padding: 15px 12px; */
}
.div1 {
  width: 300px;
  height: 100px;
  border: 1px solid black;
  box-sizing: border-box;
}

</style>

