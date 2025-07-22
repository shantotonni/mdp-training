<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="[this.status +' MDP List Report']">
        <div class="col-md-6">
          <div class="float-right d-none d-md-block">
            <div class="card-tools">
              <button class="btn btn-outline-dark btn-sm" v-if="type ==='admin'">
                <i class="fas fa-address-card"></i>
                Approved MDP Count- {{this.mdpNo}}
              </button>
              <button type="button" class="btn btn-info btn-sm" @click="exportMDPList" v-if="type ==='admin'">
                <i class="fas fa-download"></i>
                Export {{status}} MDP
              </button>
              <button type="button" class="btn btn-primary btn-sm" @click="reload">
                <i class="fas fa-sync"></i>
                Reload
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
                          <select id="sessionP" class="form-control defineHeight" v-model="sessionP" @change="getAllBusiness()" >
                            <option value="">Period</option>
                            <option v-for="(session,index) in sessions" :value="session.Name" :key="index">{{session.Name}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3" v-if="type === 'admin'" >
                        <multiselect
                            v-if="Array.isArray(businessList)"
                            v-model="business"
                            :options="businessList"
                            :multiple="true"
                            :searchable="true"
                            :close-on-select="true"
                            :show-labels="true"
                            label="business"
                            track-by="business"
                            @input="getAllDepartment"
                            placeholder="Business"></multiselect>
                      </div>
                      <div class="col-md-3" v-if="type === 'admin'" >
                        <multiselect
                            v-model="Department"
                            :options="departments"
                            :multiple="true"
                            :searchable="true"
                            :close-on-select="true"
                            :show-labels="true"
                            label="DeptName"
                            track-by="DeptCode"
                            @input="getAllEmpID"
                            placeholder="Department"></multiselect>
                      </div>
                      <div class="col-md-3" v-if="type === 'admin'">
                        <div class="form-group">
                          <multiselect
                              v-model="EmployeeList"
                              :options="employees"
                              :multiple="true"
                              :searchable="true"
                              :close-on-select="true"
                              :show-labels="true"
                              label="Employee"
                              track-by="StaffID"

                              placeholder="Employee"></multiselect>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <button type="submit" @click="getAllMDPList('true')" class="btn btn-success defineHeight"><i class="mdi mdi-filter"></i>Filter</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                    <thead>
                    <tr>
                      <th>SN</th>
                      <th>Staff ID</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Department</th>
                      <th>Business</th>
                      <th>Official Email</th>
                      <th>Mobile</th>
                      <th>Appraisal Period</th>
                      <th>MDP Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(mdp, i) in mdplist" :key="mdp.ID" v-if="mdplist.length">
                      <th>{{ ++i }}</th>
                      <td>{{ mdp.StaffID }}</td>
                      <td>{{ mdp.EmployeeName }}</td>
                      <td>{{ mdp.Designation }}</td>
                      <td>{{ mdp.Department }}</td>
                      <td>{{ mdp.Business }}</td>
                      <td>{{ mdp.OfficialEmail }}</td>
                      <td>{{ mdp.Mobile }}</td>
                      <td>{{ mdp.AppraisalPeriod }}</td>
                      <td>
                        <span v-if="mdp.MDPStatus === 'Pending' " class="badge badge-danger"> Pending</span>
                        <span v-if="mdp.MDPStatus === 'Approved' " class="badge badge-success"> Approved</span>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <br>
                  <pagination
                      v-if="pagination.last_page > 1"
                      :pagination="pagination"
                      :offset="5"
                      @paginate="query === '' ? getAllMDPList() : searchData()"
                  ></pagination>
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
    <div>
      <loader v-if="PreLoader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>
    </div>
  </div>
</template>

<script>
import {baseurl} from '../../base_url'
import {Common} from "../../mixins/common";
import {bus} from "../../app";
import Multiselect from 'vue-multiselect';
import * as XLSX from 'xlsx';
import { saveAs } from 'file-saver';


export default {
  name: "List",
  components: { Multiselect },
  mixins: [Common],
  props: ['mdpIds'],
  data() {
    return {
      mdplist: [],
      type: '',
      departments: [],
      businessList: [],
      employees: [],
      business: '',
      sessions: '',
      pagination: {
        current_page: 1
      },
      isMessage : false,
      query: "",
      status: "Approved",
      Department: [],
      EmployeeList: [],
      mdpIDList: [],
      mdpNo: 0,
      sessionP: "",
      editMode: false,
      isLoading: false,
      PreLoader: false,
      filterStatus: false,
    }
  },
  watch: {
    query: function(newQ, old) {
      if (newQ === "") {
        this.getAllMDPList();
      } else {
        this.searchData();
      }
    }
  },
  mounted() {
    document.title = this.status +' MDP List Report | MDP';
    this.getAllMDPList();
    this.getAllSession();
    this.getAllBusiness();
    this.getAllDepartment();
    this.getAllEmpID();
    this.getData();

  },
  methods: {
    getAllMDPList(val){
      this.filterStatus = val;
      this.PreLoader = true;
      axios.get(baseurl + 'api/mdp/list?page='+ this.pagination.current_page
          + "&EmployeeList=" +  JSON.stringify(this.EmployeeList)
          + "&Department=" + JSON.stringify(this.Department)
          + "&Business=" + JSON.stringify(this.business)
          + "&sessionP=" + this.sessionP
          + "&status=" + this.status
      ).then((response)=>{
        this.getAllEmpID()
        this.mdplist = response.data.data;
        this.pagination = response.data.meta;
        this.mdpNo = response.data.meta.total
        this.mdpIDList = response.data.mdpIds
        this.PreLoader = false;
        localStorage.setItem('mdpIds', JSON.stringify(this.mdpIDList));
      }).catch((error)=>{
        this.PreLoader = false;

      })
    },
    searchData(){
      this.PreLoader = true;
      axios.get(baseurl + "api/mdp/search/list/" + this.query + "?page=" + this.pagination.current_page).then(response => {
        this.mdplist = response.data.data;
        this.pagination = response.data.meta;
        this.mdpNo = response.data.meta.last_page
        this.PreLoader = true;
      }).catch(e => {
        this.isLoading = false;
        this.PreLoader = false;
      });
    },
    getData() {
      this.axiosPost('me', {}, (response) => {
        this.$store.commit('me', response);
        this.type = response.payload.Type
      }, (error) => {
        this.errorNoti(error);
      });
    },
    getAllBusiness(){
      axios.get(baseurl + 'api/mdp/get-all-mdp-business?sessionP='+this.sessionP).then((response)=>{
        this.businessList = Array.isArray(response.data.business) ? response.data.business : [];
        this.getAllDepartment();
        this.getAllEmpID();
      }).catch((error)=>{

      })
    },
    getAllDepartment(){
      axios.get(baseurl + 'api/mdp/get-all-mdp-department?sessionP='+this.sessionP
          +"&Business=" + JSON.stringify(this.business)).then((response)=>{
        this.departments = response.data.departments;
        this.getAllEmpID();
      }).catch((error)=>{

      })
    },
    getAllEmpID(){
      axios.get(baseurl + 'api/mdp/get-all-mdp-employee?sessionP=' + this.sessionP
          +"&Business=" + JSON.stringify(this.business)
          + "&Department=" + JSON.stringify(this.Department)
      ).then((response)=>{
        this.employees = response.data.employees;
      }).catch((error)=>{

      })
    },
    getAllSession(){
      axios.get(baseurl + 'api/get-all-session/').then((response) => {
        this.sessions = response.data.sessions;
      }).catch((error) => {

      })
    },
    reload(){
      this.getAllMDPList();
      this.query = "";
      window.location.reload();
      // this.$toaster.success('Data Successfully Refresh');
    },
    exportMDPList(){
      if(this.sessionP.length>0){
        this.PreLoader = true;
        axios.get(baseurl + 'api/mdp/export-mdp-list?EmployeeList=' +  JSON.stringify(this.EmployeeList)
            + "&Business=" + JSON.stringify(this.business)
            + "&Department=" + JSON.stringify(this.Department)
            + "&sessionP=" + this.sessionP
            + "&status=" + this.status
        ).then((response)=>{
          let dataSets = response.data.data;
          if (dataSets.length > 0) {
            let columns = Object.keys(dataSets[0]);
            columns = columns.filter((item) => item !== 'row_num');
            let rex = /([A-Z])([A-Z])([a-z])|([a-z])([A-Z])/g;
            columns = columns.map((item) => {
              let title = item.replace(rex, '$1$4 $2$3$5')
              return {title, key: item}
            });
            bus.$emit('data-table-import', dataSets, columns, 'Export Approved List')
            this.PreLoader = false;
          }
        }).catch((error)=>{
          this.PreLoader = false;
        })
      }else{
        this.errorNoti('Please use the filter before proceeding.');
      }
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
.defineHeight{
  height: 43px;
}
</style>
