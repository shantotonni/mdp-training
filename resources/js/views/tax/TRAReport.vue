<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Tax Return Acknowledgement Report']">
        <div class="col-sm-6">
          <div class="float-right d-none d-md-block">
            <div class="card-tools">
              <button type="button" class="btn btn-primary btn-sm" @click="reload">
                <i class="fas fa-sync"></i>
                Reload
              </button>
              <button type="button" class="btn btn-primary btn-sm" @click="getTRAReport('Y')" >
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
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <select id="TaxYear" class="form-control" v-model="TaxYear">
                            <option value="">Select Assessment Year</option>
                            <option :value="div.TaxYear" v-for="(div,index) in periods" :key="index">{{div.TaxYear}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <multiselect

                              v-model="Department"
                              :options="Department_List"
                              :multiple="true"
                              :searchable="true"
                              :close-on-select="true"
                              :show-labels="true"
                              label="DeptName"
                              track-by="DeptCode"
                              placeholder="Pick a Department"></multiselect>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <button type="submit" @click="getTRAReport('N')" class="btn btn-success"><i class="mdi mdi-filter"></i>Filter</button>
                      </div>
                    </div>
                    </div>
                  </div>
                <div class="table-responsive">
                  <table class="table  table-bordered table-striped nowrap dataTable no-footer dtr-inline table-sm small" style="max-height: 200px; overflow: scroll;">
                    <thead class="thead-dark" v-if="headers.length > 0">
                    <tr>
<!--                      <th v-for="(item, index) in headers" >-->
<!--                        {{ item.replace(/_/g, ' ', " $1").trim() }}-->
<!--                      </th>-->

                      <th>Department</th>
                      <th>TotalEmployee</th>
                      <th>Submitted</th>
                      <th>NotSubmitted</th>
                    </tr>

                    </thead>
                    <tbody>
                    <tr v-for="(item, index) in contents">
<!--                      <td v-for="(item2, index) in headers" v-bind:class="isInt(item[item2]) === true ? 'text-right' : '' " v-if="index !== 1">-->
<!--                        {{ item[item2] }}-->
<!--                      </td>-->
                      <td>{{item.DeptName}}</td>
                      <td>{{item.TotalEmployee}}</td>
                      <td>
                        <router-link :to="`tax-return-submit/${TaxYear}/${item.DeptCode}/submitted`" class="btn btn-info btn-sm" target= '_blank'> {{item.Submitted}}
                      </router-link>
                      </td>
                      <td>
                        <router-link :to="`tax-return-submit/${TaxYear}/${item.DeptCode}/not-submitted`" class="btn btn-info btn-sm" target= '_blank'> {{item.NotSubmitted}}
                      </router-link>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <br>
                  <pagination
                      v-if="pagination.last_page > 1"
                      :pagination="pagination"
                      :offset="5"
                      @paginate="getTRAReport('N')"
                  ></pagination>
                </div>
                </div>

              </div>
            </div>
            <data-export/>
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
      headers: [],
      contents: [],
      Department_List: [],
      periods: [],
      pagination: {
        current_page: 1,
        last_page: 1,
        from: 1,
        to: 1,
        total: 1,
      },
      Department:[],
      TaxYear:'',
      editMode: false,
      isLoading: false,
      dialog: false,
    }
  },
  watch: {

  },
  mounted() {
    document.title = 'Tax Return Acknowledgement Report';
    this.getAllPeriods();
  },
  methods: {
    getTRAReport(ex) {
      axios.post(baseurl + 'api/get-tra-report?TaxYear='+this.TaxYear
          +'&Department='+ JSON.stringify(this.Department)
          +'&page='+ this.pagination.current_page
      ).then((response) => {
        if (response.data.data.data.length > 0){
          if (ex === 'Y') {
            let dataSets = response.data.data.data;
            if (dataSets.length > 0) {
              let columns = Object.keys(dataSets[0]);
              columns = columns.filter((item) => item !== 'row_num');
              let rex = /([A-Z])([A-Z])([a-z])|([a-z])([A-Z])/g;
              columns = columns.map((item) => {
                let title = item.replace(rex, '$1$4 $2$3$5')
                return {title, key: item}
              });
              bus.$emit('data-table-import', dataSets, columns, 'Tax Return Acknowledgement List')
            }
          } else {
            this.headers = Object.keys(response.data.data.data[0])
            this.contents = response.data.data.data;
            // this.pagination.current_page = response.data.data.current_page;
            // this.pagination.from = response.data.data.from;
            // this.pagination.to = response.data.data.to;
            // this.pagination.total = response.data.data.total;
            // this.pagination.last_page = response.data.data.last_page;
          }
        }else {
          this.$toaster.error('No Data Found!');
        }

      })
    },
    getAllDepartment(){
      axios.get(baseurl + 'api/get-departments').then((response) => {
        this.Department_List = response.data.data;
        //this.getAllTrainingTitle();
      }).catch((error) => {

      })
    },

    isInt(value) {
      return !isNaN(parseInt(value * 1))
    },

    getAllPeriods(){
      axios.get(baseurl + 'api/get-periods').then((response) => {
        this.periods = response.data.data;
        this.getAllDepartment();

      }).catch((error) => {

      })
    },

    reload(){
      this.getTRAReport('N');
      this.query = "";
      this.$toaster.success('Data Successfully Refresh');
    },
    closeModal(){
      $("#StudentModelModal").modal("hide");
      $("#showImageModal").modal("hide");
    },
    customFormatter(date) {
      return moment(date).format('YYYY-MM-DD');
    },
    changeStatus() {
      this.loading = false
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

<style scoped>
.dialog {
  overflow: auto;
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  padding: 80px 40px;
  background: rgba(0,0,0,0.5);
  border: 1px solid #999;
  text-align: center;
}
.dialog-content {
  width: 400px;
  height: auto;
  margin: 0 auto;
  padding: 10px;
  margin-top: 20px;
}
.dialog-content img {
  width: 100%;
  height: auto;
}
.submited{
  background: #9cb7e0;
}
.close-icon {
  float: right;
}
</style>
