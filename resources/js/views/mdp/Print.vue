<template>
    <div class="content" id="mdp">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="datatable" v-if="!isLoading">
                            <div class="card-body">
                              <div style="display:flex;">
                                <div>
                                  <img :src="`${mainOrigin}logo/logo.png`" style="height: 60px;" alt="user" class="rounded-circle" />
                                  <p style="font-size:20px">Advanced Chemical Industries Limited</p>
                                </div>
                                <div >
                                  <p style="font-size:15px;margin-left: 400px;margin-top: 20px;width: 200px;height: 55px; border: 1px solid black;
                                   box-sizing: border-box;text-align: center"><span style="margin-top: 14px;display: block;font-weight: bold;font-style: italic">Private & Confidential</span></p>
                                </div>
                              </div>
                              <div class="first_part">
                                <h4 style="text-align:center;text-transform: uppercase">Management Development Plan</h4>
                                <hr>
                                <br>
                                <p style="font-size: 20px">
<!--                                  Appraisal Period <span style="display: inline-block;border-bottom: 1px solid;width: 200px;text-align: center">{{ mdplist.AppraisalPeriod }}</span>-->
                                  Appraisal period from July <span style="display: inline-block;border-bottom: 1px solid;width: 315px;text-align: center">{{ mdplist.from_period }}</span>
                                  to June <span style="display: inline-block;border-bottom: 1px solid;width: 315px;text-align: center">{{ mdplist.to_period }}</span>
                                </p>
                                <p style="font-size: 20px">
                                  Name of Employee: <span style="display: inline-block;border-bottom: 1px solid;width: 390px;text-align: center">{{ mdplist.EmployeeName }}</span>
                                  Employee ID: <span style="display: inline-block;border-bottom: 1px solid;width: 250px;text-align: center">{{ mdplist.StaffID }}</span>
                                </p>
                                <p style="font-size: 20px">
                                  Designation: <span style="display: inline-block;border-bottom: 1px solid;width: 350px;text-align: center">{{ mdplist.Designation }}</span>
                                  Department: <span style="display: inline-block;border-bottom: 1px solid;width: 350px;text-align: center">{{ mdplist.Department }}</span>
<!--                                  Date of birth <span style="display: inline-block;border-bottom: 1px solid;width: 306px;text-align: center">{{ mdplist.DateOfBirth }}</span>-->
                                </p>
                                <p style="font-size: 20px">
                                  Present Job Started on:<span style="display: inline-block;border-bottom: 1px solid;width: 270px;text-align: center">{{ mdplist.PresentJobStartedOn }}</span>
<!--                                  Present Age <span style="display: inline-block;border-bottom: 1px solid;width: 350px;text-align: center">{{ mdplist.Age }}</span>-->
                                  Date of Joining in ACI: <span style="display: inline-block;border-bottom: 1px solid;width: 250px;text-align: center">{{ mdplist.JoiningDate }}</span>
                                </p>
                                <p style="font-size: 20px">
                                  Date of Birth: <span style="display: inline-block;border-bottom: 1px solid;width: 220px;text-align: center">{{ mdplist.DateOfBirth }}</span>
<!--                                  Present Job Started <span style="display: inline-block;border-bottom: 1px solid;width: 370px;text-align: center">{{ mdplist.PresentJobStartedOn }}</span>-->
                                  Educational Qualification: <span style="display: inline-block;border-bottom: 1px solid;width: 360px;text-align: center">{{ mdplist.Qualification }}</span>
                                </p>
                              </div>
                              <br>
                              <div class="second_part">
                                <p style="font-weight: bold;font-size: 20px">A. To improve the performance of your present job, list below the areas where you feel that you require additional knowledge or better understanding.</p>
                                <p style="font-size: 20px">Which you will acquire at your personal initiative:</p>

                                <p v-for="(number, i) in row_number" :key="i" style="font-size: 20px">
                                 <span style="display: inline-block;border-bottom: 1px solid;width: 940px;">{{ initiative[i] !== undefined ? initiative[i].Name: '' }}</span>
                                </p>
                              </div>
                              <br>
                              <br>
                              <div class="third_part">
                                <p style="font-size: 20px">Which will require in-house or external training that you think should be organized by the Company:</p>
<!--                                <p>-->
<!--                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>-->
<!--                                </p>-->
                                <p v-for="(number, i) in row_number" :key="i" style="font-size: 20px">
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;">{{ training[i] !== undefined ? training[i].TrainingTitle: '' }}</span>
                                </p>
                              </div>

                              <div style="display: flex">
                                <div>
                                  <p style="font-size: 20px">Form No.: TR-003-01/07</p>
                                </div>
                                <div style="margin-left: 600px">
                                  <p style="text-align: right;font-size: 20px">Page No.: 1 of 2</p>
                                </div>
                              </div>

                              <br>
                              <br>
                              <div class="fourth_part">
                                <p style="font-weight: bold;font-size: 20px">B. For development to take future responsibilities</p>
                                <p style="font-size: 20px">Other than those mentioned in A, list below two areas of personal development / training that you would
                                  like to see happen in your case in the coming years and explain how those trainings will help the company.</p>

<!--                                1. <p v-for="(number, i) in row_number" :key="i" v-if="Area.length">-->
<!--                                 <span style="display: inline-block;border-bottom: 1px solid;width: 940px;">{{ Area[i] !== undefined ? Area[i].AreaOneName: '' }}</span>-->
<!--                                </p>-->
                                <span style="font-size: 20px">1.</span> <p style="font-size: 20px">
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;">
                                    <b v-if="mdplist.FutureTrainingOne">{{mdplist.FutureTrainingOne}}: </b>
                                    {{ mdplist.AreaOne }}</span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 700px;text-align: center"></span>
                                </p>
                              </div>
                              <br>
                              <div class="fifth_part">
                                <span style="font-size: 20px">2.</span>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;font-size: 20px">
                                    <span style="display: inline-block;border-bottom: 1px solid;width: 940px;">
                                      <b v-if="mdplist.FutureTrainingTwo">{{mdplist.FutureTrainingTwo}}: </b>{{ mdplist.AreaOne }}</span>
                                  </span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 700px;text-align: center"></span>
                                </p>
                              </div>
                              <br>
                              <div class="six_part">
                                <p style="font-size: 20px">
                                  Signature of employee: <span style="display: inline-block;border-bottom: 1px solid;width: 300px;text-align: center">
                                    <img v-if="mdplist.Signature" :src="loadSignature(mdplist.Signature)" style='height: 40px; width: 150px' />
                                  </span>
                                </p>
                                <p style="font-size: 20px">
                                  Date: <span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center">
                                  {{ mdplist.CreatedDate }}
                                </span>
                                </p>
                              </div>
                              <br>
                              <div class="fourth_part">
                                <p style="font-size: 20px">Remarks and recommendations of Superior</p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
<!--                                <p>-->
<!--                                  <span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center"></span>-->
<!--                                </p>-->
                              </div>
                              <br>
                              <div class="six_part">
                                <p style="font-size: 20px"> Signature:
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 300px;text-align: center" v-if="mdplist.MDPStatus === 'Approved'">
                                  Electronically Approved
                                  </span>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 300px;text-align: center" v-if="mdplist.MDPStatus === 'Pending'"></span>
                                </p>
                                <p style="font-size: 20px">
                                  Date: <span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center">
                                  {{ mdplist.CreatedDate }}
                                </span>
                                </p>
                              </div>
                              <br>
                              <p style="font-size: 20px"><span style="font-weight: bold">Note</span>: Keep a copy in the Department Training file and forward the original to Personnel Department.</p>
                              <br>
                              <div style="display: flex">
                                <div>
                                  <p style="font-size: 20px">Form No.: TR-003-01/07</p>
                                </div>
                                <div style="margin-left: 600px">
                                  <p style="text-align: right;font-size: 20px">Page No.: 2 of 2</p>
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
          initiative: [],
          training: [],
          Area: [],
            pagination: {
                current_page: 1
            },
            isMessage : false,
            query: "",
            editMode: false,
            isLoading: false,
            form: new Form({
                id:'',
                generator_name:'',
                unique_generator_code: '',
                generator_model: '',
                brand_id:'',
                rating: '',
                generator_serial: '',
                engine_brand: '',
                engine_serial: '',
            }),
          row_number: [
            {number: 0},
            {number: 1},
            {number: 2},
            {number: 3},
            {number: 4},
            {number: 5},
            {number: 6},
          ],
        }
    },
  created() {
    axios.get(baseurl + `api/mdp/print/${this.$route.params.ID}`).then((response)=>{
      this.mdplist = response.data.data
      this.initiative = response.data.data.initiative
      this.training = response.data.data.training
      this.Area = response.data.data.area
      $('#mdp').printThis({
        importCSS: true,
        loadCSS: "path/to/new/CSS/file",
      });
    });
  },
  methods: {
      loadSignature(signature){
        return 'https://hrconnect.acigroup.info' + "/signature/" + signature;
      }
    },
}
</script>
<style scoped>

</style>

