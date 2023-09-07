<template>
    <div class="content" id="action">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="datatable" v-if="!isLoading">
                            <div class="card-body margin_p">
                              <div class="first_part">
                                <div style="text-align:center"><img :src="`${mainOrigin}assets/images/logo-svg.png`" alt="user" class="rounded-circle" /></div>
                                <h2 style="text-align:center">ACI Limited</h2>
                              <p style="text-align:center;font-size: 22px;font-weight: bold;">Job Description</p>
                                <hr>
                                <p style="font-size: 16px">Job Title <span style="margin-left: 200px">: {{ job_description.JobTitle }}</span></p>
                                <p style="font-size: 16px">Division Name <span style="margin-left: 157px">: {{ job_description.Division }}</span></p>
                                <p style="font-size: 16px">Business Name <span style="margin-left: 150px">: {{ job_description.Business }}</span></p>
                                <p style="font-size: 16px">Department Name <span style="margin-left: 128px">: {{ job_description.Department }}</span></p>
                                <p style="font-size: 16px">Reporting To <span style="margin-left: 169px">: {{ job_description.SuppervisorName }}</span></p>
                                <p style="font-size: 16px">Purpose of the Job <span style="margin-left: 130px">: {{ job_description.PurposeOfJob }}</span></p>
                                <p style="font-size: 16px">Job Customer
                                  <span style="margin-left: 165px">: Internal - {{ job_description.JobCustomerInternal }}</span>
                                  <br>
                                  <span style="margin-left: 267px">: External - {{ job_description.JobCustomerExternal }}</span>
                                </p>
                                <p style="font-size: 16px">Major Job Responsibilities <span style="margin-left: 79px">:</span> </p>
                                <p style="font-size: 16px" v-for="(detail, i) in details" :key="detail.ID" v-if="details.length">{{ ++i }}. {{ detail.JobResponsibilities }}</p>

                                <br>
                                <p style="font-size: 16px">Signature of the Incumbent <span style="margin-left: 32px">: </span></p>
                                <p style="font-size: 16px">Name of Incumbent <span style="margin-left: 87px">: {{ job_description.EmployeeName }}</span></p>
                                <p style="font-size: 16px">Staff ID <span style="margin-left: 173px">: {{ job_description.StaffID }}</span></p>
                                <p style="font-size: 16px">Signature of Supervisor <span style="margin-left: 58px">: </span></p>
                                <p style="font-size: 16px">Date of Preparation <span style="margin-left: 87px">: </span></p>
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
          job_description: [],
          details: [],
          isMessage : false,
          query: "",
          editMode: false,
          isLoading: false,
        }
    },
  created() {
    axios.get(baseurl + `api/job-description-print/${this.$route.params.ID}`).then((response)=>{
      console.log(response)
      this.job_description = response.data.data
      this.details = response.data.data.finds

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
      customFormatter(date) {
        return moment(date).format('MMMM YYYY');
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

</style>

