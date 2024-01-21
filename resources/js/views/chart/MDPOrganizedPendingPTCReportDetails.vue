<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Training List']">
        <div class="col-sm-6">
          <div class="float-right d-none d-md-block">
            <div class="card-tools">
              <button type="button" class="btn btn-primary btn-sm" @click="exportTraining" >
                <i class="fa fa-file-excel"></i>
                Export Excel
              </button>
            </div>
          </div>
        </div>
      </breadcrumb>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                    <thead>
                    <tr>
                      <th class="text-center">SN</th>
                      <th class="text-center">Training Title</th>
                      <th class="text-center">Training Type</th>
                      <th class="text-center">Training Date</th>
                      <th class="text-center">Training Type Status</th>
                      <th class="text-center">Employee Name</th>
                      <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(ptc, i) in ptcs" v-if="ptcs.length">
                        <th scope="row" class="text-center">{{ ++i }}</th>
                        <td>{{ ptc.TrainingTitle }}</td>
                        <td class="text-right">{{ ptc.TrainingType }}</td>
                        <td class="text-right">{{ ptc.TrainingDate }}</td>
                        <td class="text-right">{{ ptc.TrainingTypeStatus }}</td>
                        <td class="text-right">{{ ptc.EmployeeName }}</td>
                        <td class="text-center">
                          <button type="button" @click="redirectToNext(ptc.TrainingTitle )"class="btn btn-info btn-sm">Details</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <br>
                </div>
              </div>
            </div>
            <div v-else>
              <skeleton-loader :row="14"/>
            </div>
            <data-export/>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {baseurl} from '../../base_url'
import {Common} from "../../mixins/common";
import {bus} from "../../app";
import Multiselect from 'vue-multiselect'
import * as echarts from 'echarts';
export default {
  name: "List",
  components: { Multiselect },
  mixins: [Common],
  data() {
    return {
      isLoading: false,
      ptcs:[],
    }
  },
  mounted() {
    document.title = 'MDP Chart | MDP'
  },

  created() {
    axios.get(baseurl + `api/mdp-organized-pending-ptc-details/${this.$route.params.Period}/${this.$route.params.Status}`).then((response)=>{
      this.ptcs = response.data.ptc
    });
  },
  methods: {
    redirectToNext(ptc){
      this.title = ptc;
      this.$router.push({
        name: 'MDPOrganizedPendingPTCTitleWiseEmployee',
        params: { Title: this.title, Period: this.$route.params.Period, Status: this.$route.params.Status}
      });
    },
    exportTraining(){
      axios.get(baseurl + `api/mdp-organized-pending-ptc-details/${this.$route.params.Period}/${this.$route.params.Status}`).then((response)=>{
        console.log(response)
        let dataSets = response.data.ptc;
        if (dataSets.length > 0) {
          let columns = Object.keys(dataSets[0]);
          columns = columns.filter((item) => item !== 'row_num');
          let rex = /([A-Z])([A-Z])([a-z])|([a-z])([A-Z])/g;
          columns = columns.map((item) => {
            let title = item.replace(rex, '$1$4 $2$3$5')
            return {title, key: item}
          });
          bus.$emit('data-table-import', dataSets, columns, 'MDP Training List')
        }
      }).catch((error)=>{
        console.log(error)
      })
    },
  },
}
</script>

<style lang="scss" scoped>
.document-upload-modal {
  .delete {
    color: red;
    position: absolute;
    right: 25px;
    display: none;
    top: 10px;
  }

  .title:hover .delete {
    display: block
  }
}
</style>
