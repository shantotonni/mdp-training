<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Tax Return Acknowledgement Employee Information']">
        <div class="col-sm-6">
          <div class="float-right d-none d-md-block">
            <div class="card-tools">
<!--              <button type="button" class="btn btn-primary btn-sm" @click="reload">-->
<!--                <i class="fas fa-sync"></i>-->
<!--                Reload-->
<!--              </button>-->

                <router-link :to="{name: 'TaxReturnAcknowledgementReport'}"  class="btn btn-info btn-sm">
                  <i class="mdi mdi-arrow-left-bold"> Back</i>
                </router-link>

              <button type="button" class="btn btn-primary btn-sm" @click="getTRAEmp('Y')" v-if="headers.length > 0">
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
                    <h3 v-if="ZeroData.length>0" style="color: red; text-align: center" >{{ZeroData}}</h3>
                    <h6 v-if="Status === 'NotSubmitted' && headers.length > 0">{{contents[0].Department}}'s Employee Details  :</h6>
                    <h6  v-if=" Status === 'Submitted' && headers.length > 0">{{contents[0].Department}}'s Employee Details For Assessment Year {{contents[0].TaxYear}} :</h6>
                  </div>
                  <br>
                </div>
                <div class="table-responsive">
                  <table class="table  table-bordered table-striped nowrap dataTable no-footer dtr-inline table-sm small" style="max-height: 200px; overflow: scroll;">
                    <thead class="thead-dark" v-if="headers.length > 0">
                    <tr>
                      <th v-for="(item, index) in headers"  v-if="index !== 3 && index !== 8">
                        {{ item.replace(/_/g, ' ', " $1").trim() }}
                      </th>
                    </tr>

                    </thead>
                    <tbody>
                    <tr v-for="(item, index) in contents">
                      <td v-for="(item2, index) in headers" v-bind:class="isInt(item[item2]) === true ? 'text-right' : '' " v-if="index !== 3 && index !== 8">
                        {{ item[item2] }}
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <br>
                  <pagination
                      v-if="pagination.last_page > 1"
                      :pagination="pagination"
                      :offset="5"
                      @paginate="getTRAEmp('N')"
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
      departments: [],
      periods: [],
      pagination: {
        current_page: 1,
        from: 1,
        to: 1,
        total: 1,
      },
      ZeroData:'',
      Status:'',
      editMode: false,
      isLoading: false,
      dialog: false,
    }
  },
  watch: {

  },
  mounted() {
    document.title = 'Tax Return Acknowledgement Report';
    this.getTRAEmp();
    this.getAllPeriods();
    this.Status =this.$route.params.Status;
  },
  methods: {
    getTRAEmp(ex) {
      axios.get(baseurl + `api/get-tra-emp-list/${this.$route.params.Year}/${this.$route.params.Dept}/${this.$route.params.Status}`).then((response)=>{
        if (response.data.data.length > 0){
          if (ex === 'Y') {
            let dataSets = response.data.data;
            if (dataSets.length > 0) {
              let columns = Object.keys(dataSets[0]);
              columns = columns.filter((item) => item !== 'row_num');
              let rex = /([A-Z])([A-Z])([a-z])|([a-z])([A-Z])/g;
              columns = columns.map((item) => {
                let title = item.replace(rex, '$1$4 $2$3$5')
                return {title, key: item}
              });
              if (this.$route.params.Status ==='Submitted'){
                bus.$emit('data-table-import', dataSets, columns, 'Tax Return Acknowledgement Submitter List')
              }else {
                bus.$emit('data-table-import', dataSets, columns, 'Tax Return Acknowledgement Non Submitter List')
              }

            }
          } else {
            this.headers = Object.keys(response.data.data[0])
            this.contents = response.data.data;
          }
        }else {
          this.ZeroData = "No Data Found!"
        }

      })
    },

    isInt(value) {
      return !isNaN(parseInt(value * 1))
    },

    getAllPeriods(){
      axios.get(baseurl + 'api/get-periods').then((response) => {
        this.periods = response.data.data;
      }).catch((error) => {

      })
    },

    reload(){
      this.getTRAEmp('N');
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
