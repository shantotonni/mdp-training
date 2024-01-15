<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Employee List']">
        <div class="col-sm-6">
          <div class="float-right d-none d-md-block">
            <div class="card-tools">
              <button type="button" class="btn btn-primary btn-sm" @click="exportEMPList" >
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
                      <!--                      <th class="text-center">Department</th>-->
                      <th class="text-center">StaffID</th>
                      <th class="text-center">EmployeeName</th>
                      <th class="text-center">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(ptc, i) in ptcs" v-if="ptcs.length"  >
                      <th scope="row">{{ ++i }}</th>
                      <td>{{ ptc.StaffID }}</td>
                      <td>{{ ptc.EmployeeName }}</td>
                      <td>{{ ptc.Status }}</td>

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
import Datepicker from 'vuejs-datepicker';
import moment from "moment";
import {baseurl} from '../../base_url'
import Multiselect from "vue-multiselect";
import {bus} from "../../app";
export default {
  name: "List",
  components: {
    Multiselect ,
    Datepicker
  },
  data() {
    return {
      isLoading: false,
      ptcs:[],
      routeData:[],
      pagination: {
        current_page: 1,
      },
      query: "",
    }
  },
  watch: {
    query: function(newQ, old) {
      if (newQ === "") {
        this.getAllEmployee();
      } else {
        this.searchData();
      }
    }
  },
  mounted() {
    document.title = 'Employee List';
    this.getAllEmployee();
  },
  created() {
    this.routeData = this.$route.params
  },
  methods: {
    getAllEmployee(){
      axios.post(baseurl + 'api/mdp-organized-pending-ptc-title-wise-employee/', {data: this.routeData}).then((response)=>{
        this.ptcs = response.data.ptc;
      });
    },

    exportEMPList(){
      axios.post(baseurl + 'api/mdp-organized-pending-ptc-title-wise-employee/',{data: this.$route.params}).then((response)=>{
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
          bus.$emit('data-table-import', dataSets, columns, 'MDP Training Employee List')
        }
      }).catch((error)=>{
        console.log(error)
      })
    },
  },
}
</script>

