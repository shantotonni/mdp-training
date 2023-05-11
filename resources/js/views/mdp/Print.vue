<template>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="datatable" v-if="!isLoading">
                            <div class="card-body">
                              <div>
                                <img :src="`${mainOrigin}logo/logo.png`" style="height: 60px;margin-left: 879px" alt="user" class="rounded-circle" />
                              </div>
                              <div class="first_part">
                                <h3>7.15.2. Management Development Plan</h3>
                                <hr>
                                <br>
                                <p>
                                  Appraisal Period <span style="display: inline-block;border-bottom: 1px solid;width: 200px;text-align: center">{{ mdplist.AppraisalPeriod }}</span>
                                  Training Period From July <span style="display: inline-block;border-bottom: 1px solid;width: 200px;text-align: center">{{ mdplist.from_period }}</span>
                                  to June <span style="display: inline-block;border-bottom: 1px solid;width: 220px;text-align: center">{{ mdplist.to_period }}</span>
                                </p>
                                <p>
                                  Name of employee <span style="display: inline-block;border-bottom: 1px solid;width: 820px;text-align: center">{{ mdplist.EmployeeName }}</span>
                                </p>
                                <p>
                                  Designation <span style="display: inline-block;border-bottom: 1px solid;width: 500px;text-align: center">{{ mdplist.EmployeeName }}</span>
                                  Date of birth <span style="display: inline-block;border-bottom: 1px solid;width: 280px;text-align: center">{{ mdplist.DateOfBirth }}</span>
                                </p>
                                <p>
                                  Present Age <span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center"></span>
                                  Date of joining company <span style="display: inline-block;border-bottom: 1px solid;width: 305px;text-align: center">{{ mdplist.JoiningDate }}</span>
                                </p>
                                <p>
                                  Present Job Started <span style="display: inline-block;border-bottom: 1px solid;width: 430px;text-align: center">{{ mdplist.PresentJobStartedOn }}</span>
                                  Qualification <span style="display: inline-block;border-bottom: 1px solid;width: 300px;text-align: center">{{ mdplist.Qualification }}</span>
                                </p>
                              </div>
                              <br>
                              <div class="second_part">
                                <p style="font-width: bold;">A. To improve the performance of your present job, list below the areas where you feel that you require additional knowledge or better understanding.
                                  Which you will acquire at your personal initiative:
                                </p>

                                <p v-for="(number, i) in row_number" :key="i" v-if="initiative.length">
                                 <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center">{{ initiative[i] !== undefined ? initiative[i].Name: '' }}</span>
                                </p>
<!--                                <p>-->
<!--                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center" v-if="initiative.length">{{ mdplist.initiative[1].Name }}</span>-->
<!--                                </p>-->
<!--                                <p>-->
<!--                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center" v-if="initiative.length">{{ mdplist.initiative[2].Name }}</span>-->
<!--                                </p>-->
<!--                                <p>-->
<!--                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center" v-if="initiative.length">{{ mdplist.initiative[3].Name }}</span>-->
<!--                                </p>-->
<!--                                <p>-->
<!--                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center" v-if="initiative.length">{{ mdplist.initiative[4].Name }}</span>-->
<!--                                </p>-->
<!--                                <p>-->
<!--                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center" v-if="initiative.length">{{ mdplist.initiative[5].Name }}</span>-->
<!--                                </p>-->
<!--                                <p>-->
<!--                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center" v-if="initiative.length">{{ mdplist.initiative[6].Name }}</span>-->
<!--                                </p>-->
<!--                                <p>-->
<!--                                  <span style="display: inline-block;border-bottom: 1px solid;width: 700px;text-align: center" v-if="initiative.length">{{ mdplist.initiative[7].Name }}</span>-->
<!--                                </p>-->
                              </div>
                              <br>
                              <div class="third_part">
                                <p>Which will require in-house or external training that you think should be organized by the Company:</p>
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
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 700px;text-align: center"></span>
                                </p>
                              </div>
                              <br>
                              <div class="third_part">
                                <h4 style="font-width: bold;">Training & Development Policy</h4>
                                <p>
                                  Issued by: Ms. Sheema Abed Rahman, GM, CS
                                  <br>
                                 <span style="text-align: center;margin-left: 80px"> 30 June 2005</span>
                                </p>
                              </div>
                              <br><br><br><br><br><br><br><br>
                              <div>
                                <img :src="`${mainOrigin}logo/logo.png`" style="height: 60px;margin-left: 879px" alt="user" class="rounded-circle" />
                              </div>
                              <br>
                              <div class="fourth_part">
                                <p>B. For development to take future responsibilities Other than those mentioned in A,
                                  list below two areas of personal development/training that you would like to see happen in your case in the coming years and explain how those trainings will help the company.</p>
                                <p>
                                  1. <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
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
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 700px;text-align: center"></span>
                                </p>
                              </div>
                              <br>
                              <div class="fifth_part">
                                <p>
                                  2. <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
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
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 940px;text-align: center"></span>
                                </p>
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 700px;text-align: center"></span>
                                </p>
                              </div>
                              <br>
                              <div class="six_part">
                                <p>
                                  Signature of employee <span style="display: inline-block;border-bottom: 1px solid;width: 300px;text-align: center"></span>
                                </p>
                                <p>
                                  Date <span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center"></span>
                                </p>
                              </div>
                              <br>
                              <div class="fourth_part">
                                <p>Remarks and recommendations of superior</p>
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
                                <p>
                                  <span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center"></span>
                                </p>
                              </div>
                              <br>
                              <div class="six_part">
                                <p>
                                  Signature <span style="display: inline-block;border-bottom: 1px solid;width: 300px;text-align: center"></span>
                                </p>
                                <p>
                                  Date <span style="display: inline-block;border-bottom: 1px solid;width: 400px;text-align: center"></span>
                                </p>
                              </div>
                              <div class="third_part">
                                <h4 style="font-width: bold;">Training & Development Policy</h4>
                                <p>
                                  Issued by: Ms. Sheema Abed Rahman, GM, CS
                                  <br>
                                  <span style="text-align: center;margin-left: 80px"> 30 June 2005</span>
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
export default {
    name: "List",
    data() {
        return {
          mdplist: [],
          initiative: [],
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
            {number: 7},
          ],
        }
    },
  created() {
    axios.get(baseurl + `api/mdp/print/${this.$route.params.ID}`).then((response)=>{
      console.log(response.data.data.initiative)
      this.mdplist = response.data.data
      this.initiative = response.data.data.initiative
      // setTimeout(function(){
      //   window.print()
      // },2000)
    });
  },

    methods: {
      //
    },
}
</script>

<style lang="scss" scoped>

</style>
