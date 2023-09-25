<template>
    <div class="content" id="action">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="datatable" v-if="!isLoading">
                            <div class="card-body margin_p">
                              <div class="first_part">
                                <div style="text-align:center"><img :src="`${mainOrigin}assets/images/logo-svg.png`" alt="user" class="rounded-circle" /></div>
                                <h2 style="text-align:center">ACI Limited</h2>
                                <p style="text-align:center;font-size: 22px;font-weight: bold;">Job Description</p>
                                <hr>
                                <p style="font-size: 16px"><span style="font-weight: bold">Job Title</span> <span style="margin-left: 200px">: {{ job_description.JobTitle }}</span></p>
                                <p style="font-size: 16px"><span style="font-weight: bold">Division Name</span> <span style="margin-left: 157px">: {{ job_description.Division }}</span></p>
                                <p style="font-size: 16px"><span style="font-weight: bold">Business Name</span> <span style="margin-left: 150px">: {{ job_description.Business }}</span></p>
                                <p style="font-size: 16px"><span style="font-weight: bold">Department Name</span> <span style="margin-left: 128px">: {{ job_description.Department }}</span></p>
                                <p style="font-size: 16px"><span style="font-weight: bold">Reporting To</span> <span style="margin-left: 169px">: {{ job_description.SuppervisorName }}</span></p>

                                <div style="display:flex;">
                                  <p style="width: 35%;font-size: 16px"><span style="font-weight: bold">Purpose of the Job</span></p>
                                  <p style="width: 90%;font-size: 16px">: {{ job_description.PurposeOfJob }}</p>
                                </div>
                                
                                <p style="font-size: 16px"><span style="font-weight: bold">Assigned Portfolio/ Brand</span> <span style="margin-left: 77px">: {{ job_description.Portfolio }}</span></p>
                                <p style="font-size: 16px"><span style="font-weight: bold">Job Customer</span><span style="margin-left: 169px">: </span></p>
                                <p><span style="font-weight: bold">Internal -</span> {{ job_description.JobCustomerInternal }}</p>
                                <p><span style="font-weight: bold">External -</span> {{ job_description.JobCustomerExternal }}</p>

                                <p style="font-size: 16px;font-weight: bold;text-decoration: underline">Major Job Responsibilities <span style="margin-left: 79px">:</span> </p>
                                <p style="font-size: 16px" v-for="(detail, i) in details" :key="detail.ID" v-if="details.length">{{ ++i }}. {{ detail.JobResponsibilities }}</p>

                                <br>
                                <p style="font-size: 16px"><span style="font-weight: bold">Signature of the Incumbent</span> <span style="margin-left: 32px">: </span></p>
                                <p style="font-size: 16px"><span style="font-weight: bold">Name of Incumbent</span> <span style="margin-left: 87px">: {{ job_description.EmployeeName }}</span></p>
                                <p style="font-size: 16px"><span style="font-weight: bold">Staff ID</span> <span style="margin-left: 173px">: {{ job_description.StaffID }}</span></p>
                                <p style="font-size: 16px"><span style="font-weight: bold">Signature of Supervisor</span> <span style="margin-left: 58px">: </span></p>
                                <p style="font-size: 16px"><span style="font-weight: bold">Date of Preparation</span> <span style="margin-left: 87px">: {{ job_description.DateOfPreparation }}</span></p>
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

