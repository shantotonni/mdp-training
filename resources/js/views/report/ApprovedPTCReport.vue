<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Approved PTC List']">
        <div class="col-sm-6">
          <div class="float-right d-none d-md-block">
            <div class="card-tools">
              <button type="button" class="btn btn-primary btn-sm" @click="exportReport" >
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
                      <th v-for="(item, index) in headers" v-if="index !== 0 && index !== 32">
                        {{ item.replace(/_/g, ' ', " $1").trim() }}
                      </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item, index) in contents" >
                      <td v-for="(item2, index) in headers.slice(1)" v-bind:class="isInt(item[item2]) === true ? 'text-right' : '' " v-if="index !== 32">
                        {{ item[item2] }}
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>

                <div class="row">
                  <div class="col-4">
                    <div class="data-count">
                      Show {{ form.pagination.from }} to {{ form.pagination.to }} of {{ form.pagination.total }} rows
                    </div>
                  </div>
                  <div class="col-8">
                    <report-pagination
                        v-if="form.pagination.last_page > 1"
                        :pagination="form.pagination"
                        :offset="5"
                        @paginate="form.Query === '' ? ApprovedPTCReport() : ApprovedPTCReport()"
                    ></report-pagination>
                  </div>
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
      headers: [],
      contents: [],
      form: new Form({
        Period:'2023-2024',
        Query :'',
        Export :'',
        pagination: {
          current_page: 1,
          from: 1,
          to: 1,
          total: 1,
        },
        exportShow: false,
      }),
    }
  },
  mounted() {
    document.title = 'Approved PTC | MDP'
    this.ApprovedPTCReport();
  },
  created() {
    //
  },
  methods: {
    ApprovedPTCReport(){
      this.isLoading = true;
      this.form.post(baseurl + 'api/mdp-approved-ptc-report').then((response)=>{
        if (response.data.data.length > 0){
          this.headers = Object.keys(response.data.data[0])
          this.contents = response.data.data
          this.exportShow = true;
          this.isLoading = false
        }else {
          this.contents = []
          this.exportShow = false;
          this.isLoading = false
        }
        this.form.pagination.current_page = response.data.paginationData[0].current_page;
        this.form.pagination.from = response.data.paginationData[0].from;
        this.form.pagination.to = response.data.paginationData[0].to;
        this.form.pagination.total = response.data.paginationData[0].total;
        this.form.pagination.last_page = response.data.paginationData[0].last_page;

      }).catch((error)=>{

      })
    },
    exportReport(){
      this.form.Export = 'Y';
      this.form.post(baseurl + "api/mdp-approved-ptc-report").then(response => {
        let dataSets = response.data.data;
        console.log(dataSets)
        if (dataSets.length > 0) {
          let columns = Object.keys(dataSets[0]);
          columns = columns.filter((item) => item !== 'row_num');
          let rex = /([A-Z])([A-Z])([a-z])|([a-z])([A-Z])/g;
          columns = columns.map((item) => {
            let title = item.replace(rex, '$1$4 $2$3$5')
            return {title, key: item}
          });
          //this.generateExport(dataSets, columns, 'Job Card Report')
          bus.$emit('data-table-import', dataSets, columns, 'Approved PTC Report Export')
        }
      }).catch(e => {
        //
      });
    },
    isInt(value) {
      return !isNaN(parseInt(value * 1))
    },
    config() {
      let token = localStorage.getItem('token');
      return {
        headers: {Authorization: `Bearer ${token}`}
      };
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
