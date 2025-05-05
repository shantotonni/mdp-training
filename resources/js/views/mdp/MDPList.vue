<template>
    <div class="content">
        <div class="container-fluid">
            <breadcrumb :options="['Management Development Plan']">
                <div class="col-sm-6">
                  <div class="float-right d-none d-md-block">
                    <div class="card-tools">
                      <button class="btn btn-outline-dark btn-sm" v-if="type ==='admin'">
                        <i class="fas fa-address-card"></i>
                        MDP Count- {{this.mdpNo}}
                      </button>
                      <router-link :to="{name: 'MDPCreate'}" class="btn btn-success btn-sm" style="color: white">
                        <i class="fas fa-plus"></i>
                        Add Management Development Plan
                      </router-link>
<!--                      <button type="button" class="btn btn-primary btn-sm" @click="exportFeedback">-->
<!--                        <i class="mdi mdi-database-export"></i>-->
<!--                        Feedback Export-->
<!--                      </button>-->
                      <button type="button" class="btn btn-info btn-sm" @click="exportMDPDetailsList" v-if="type ==='admin'">
                        <i class="fas fa-download"></i>
                        Export-1
                      </button>
                      <button type="button" class="btn btn-info btn-sm" @click="exportMDPList" v-if="type ==='admin'">
                        <i class="fas fa-download"></i>
                        Export-2
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
                                              <select id="sessionP" class="form-control defineHeight"   v-model="sessionP"   @click="getAllEmpID" >
                                                <option value="">Period</option>
                                                <option v-for="(session,index) in sessions" :value="session.Name"
                                                     :key="index">{{session.Name}}</option>
                                              </select>
                                            </div>
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
                                                  track-by="DeptName"
                                                  @click="getAllEmpID"
                                                  placeholder="Department"></multiselect>
<!--                                                <input v-model="query" type="text" class="form-control" placeholder="Search By Staff ID">-->
                                            </div>

                                          <div class="col-md-3" v-if="type === 'admin'">
                                            <div class="form-group">
<!--                                              <select id="Department" class="form-control" v-model="Department">-->
<!--                                                <option value="">Select Department</option>-->
<!--                                                <option v-for="(dept,index) in departments" :value="dept.DeptName" :key="index">{{dept.DeptName}}</option>-->
<!--                                              </select>-->
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
                                          <div class="col-md-2">
                                            <button type="submit" @click="getAllMDPList" class="btn btn-success defineHeight"><i class="mdi mdi-filter"></i>Filter</button>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
<!--                                  <div class="row" v-if="mdplist.length>0">-->
<!--                                    <div class="col-md-12 text-left" style="background-color: #cfdef6; color: black">-->
<!--                                      <span>No. of Submitted MDPs: <b>{{mdplist.length}}</b> </span>-->
<!--                                    </div>-->
<!--                                  </div>-->
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
                                              <th class="text-center">Action</th>
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
                                              <td class="text-center">
                                                <router-link :to="`mdp-edit/${mdp.ID}`" class="btn btn-info btn-sm" ><i class="mdi mdi-square-edit-outline"></i> Edit</router-link>
                                                <router-link :to="`mdp-print/${mdp.ID}`" class="btn btn-info btn-sm" v-if="mdp.MDPStatus === 'Approved' || type === 'admin'">
                                                  <i class="mdi mdi-printer"></i> MDP</router-link>
                                                <router-link :to="`mdp-print_two/${mdp.ID}`" class="btn btn-info btn-sm" v-if="mdp.MDPStatus === 'Approved' || type === 'admin'">
                                                  <i class="mdi mdi-printer"></i> PTC</router-link>

                                                <button v-if="(mdp.Supervisor === 'Y' || type === 'admin') && mdp.MDPStatus === 'Pending'"
                                                        @click="approvedMDP(mdp.ID)" class="btn btn-success btn-sm"><i class="mdi mdi-printer"></i> Approved</button>
                                                <button v-if="(mdp.Supervisor === 'Y' || type === 'admin') && mdp.MDPStatus === 'Approved'"
                                                        @click="approvedMDP(mdp.ID)" class="btn btn-warning btn-sm"><i class="mdi mdi-printer"></i> Disapproved</button>

                                                <button @click="destroy(mdp.ID)"  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
    </div>
</template>

<script>
import {baseurl} from '../../base_url'
import {Common} from "../../mixins/common";
import {bus} from "../../app";
import Multiselect from 'vue-multiselect';
import * as XLSX from 'xlsx';
import { saveAs } from 'file-saver';
import moment from "moment";


export default {
    name: "List",
    components: { Multiselect },
    mixins: [Common],
    data() {
        return {
          mdplist: [],
          type: '',
          departments: [],
          employees: [],
          sessions: '',
          pagination: {
              current_page: 1
          },
          isMessage : false,
          query: "",
          Department: [],
          EmployeeList: [],
          mdpNo: 0,
          sessionP: "",
          editMode: false,
          isLoading: false,
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
        document.title = 'MDP List | MDP';
        this.getAllMDPList();
        this.getAllDepartment();
        this.getAllSession();
        this.getData();
    },
    methods: {
        getAllMDPList(){
            axios.get(baseurl + 'api/mdp/list?page='+ this.pagination.current_page
                + "&EmployeeList=" +  JSON.stringify(this.EmployeeList)
                + "&Department=" + JSON.stringify(this.Department)
                + "&sessionP=" + this.sessionP
            ).then((response)=>{
              console.log(response.data)
              this.getAllEmpID()
                this.mdplist = response.data.data;
                this.pagination = response.data.meta;
                this.mdpNo = response.data.meta.total
            }).catch((error)=>{

            })
        },
        searchData(){
            axios.get(baseurl + "api/search/mdp/list/" + this.query + "?page=" + this.pagination.current_page).then(response => {
                this.mdplist = response.data.data;
                this.pagination = response.data.meta;
               this.mdpNo = response.data.meta.last_page
            }).catch(e => {
                this.isLoading = false;
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
        getAllDepartment(){
          axios.get(baseurl + 'api/mdp/get-all-mdp-department').then((response)=>{
            this.departments = response.data.departments;
          }).catch((error)=>{

          })
        },
        getAllEmpID(){
              axios.get(baseurl + 'api/mdp/get-all-mdp-employee?sessionP=' + this.sessionP
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
            // this.$toaster.success('Data Successfully Refresh');
        },
        approvedMDP(mdpID) {
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {
              axios.get(baseurl + 'api/approved-mdp?mdpID=' + mdpID).then((response) => {
                this.getAllMDPList();
                Swal.fire(
                    response.data.title +'!',
                    response.data.message,
                    'success'
                )
              })
            }
          })
        },

      exportMDPList(){
          axios.get(baseurl + 'api/export-mdp-list?EmployeeList=' +  JSON.stringify(this.EmployeeList)
              + "&Department=" + JSON.stringify(this.Department)
              + "&sessionP=" + this.sessionP
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
                  bus.$emit('data-table-import', dataSets, columns, 'MDP Export Report')
                }
              }).catch((error)=>{
            console.log(response)
          })
        },
      exportMDPDetailsList(){
          axios.get(baseurl + 'api/export-mdp-details-list?EmployeeList=' +  JSON.stringify(this.EmployeeList)
              + "&Department=" + JSON.stringify(this.Department)
              + "&sessionP=" + this.sessionP
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
                  bus.$emit('data-table-import', dataSets, columns, 'MDP Export Details Report-'+moment().format('DD_MM_YYYY-h-mm a'))
                }
              }).catch((error)=>{
            console.log(response)
          })
        },
      // exportMDPDetailsList(){
      //   console.log(this.query)
      //   axios.get(baseurl + 'api/export-mdp-details-list?staffId=' +  this.query
      //       + "&Department=" + JSON.stringify(this.Department)
      //       + "&sessionP=" + this.sessionP
      //   ).then((response)=>{
      //     console.log(response.data)
      //     this.exportAllDataInOneSheet(response.data.data);
      //     // this.exportMultipleSheetsToExcel(response.data.data);
      //   }).catch((error)=>{
      //     console.log(response)
      //   })
      // },
      exportAllDataInOneSheet(data, fileName = 'MDP_Export.xlsx') {
        const wb = XLSX.utils.book_new();
        const wsData = [];

        let maxRows = 0;
        const sectionArrays = [];

        // Prepare each section horizontally
        Object.entries(data).forEach(([sectionTitle, rows]) => {
          if (!Array.isArray(rows) || rows.length === 0) return;

          const headers = Object.keys(rows[0]);
          const section = [];

          // Section Title (merged-like with empty cells)
          section.push([sectionTitle.toUpperCase(), ...Array(headers.length - 1).fill('')]);

          // Column Headers
          section.push(headers);

          // Row Data
          rows.forEach(row => {
            const rowData = headers.map(h => row[h]);
            section.push(rowData);
          });

          maxRows = Math.max(maxRows, section.length);
          sectionArrays.push(section);
        });

        // Combine sections side-by-side
        for (let i = 0; i < maxRows; i++) {
          const row = [];
          sectionArrays.forEach(section => {
            row.push(...(section[i] || Array(section[0].length).fill('')));
          });
          wsData.push(row);
        }

        const ws = XLSX.utils.aoa_to_sheet(wsData);
        XLSX.utils.book_append_sheet(wb, ws, 'MDP Summary');

        const wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });
        saveAs(new Blob([wbout], { type: 'application/octet-stream' }), fileName);
      },


      // exportAllDataInOneSheet(data, fileName = 'MDP_Export.xlsx') {
      //   const wb = XLSX.utils.book_new();
      //   const wsData = [];
      //
      //   Object.entries(data).forEach(([sectionTitle, rows]) => {
      //     if (!Array.isArray(rows) || rows.length === 0) return;
      //
      //     // Section Header
      //     wsData.push([sectionTitle.toUpperCase()]);
      //
      //     // Column Headers
      //     const headers = Object.keys(rows[0]);
      //     wsData.push(headers);
      //
      //     // Row Data
      //     rows.forEach(row => {
      //       const rowData = headers.map(h => row[h]);
      //       wsData.push(rowData);
      //     });
      //
      //     // Add an empty row for spacing
      //     wsData.push([]);
      //   });
      //
      //   const ws = XLSX.utils.aoa_to_sheet(wsData);
      //   XLSX.utils.book_append_sheet(wb, ws, 'MDP Summary');
      //
      //   const wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });
      //   saveAs(new Blob([wbout], { type: 'application/octet-stream' }), fileName);
      // },
      // exportMultipleSheetsToExcel(responseData, fileName = 'MDP_Export.xlsx') {
      //   const wb = XLSX.utils.book_new();
      //   Object.entries(responseData).forEach(([sheetName, data]) => {
      //     // Skip non-array fields like "status"
      //     if (!Array.isArray(data) || data.length === 0) return;
      //     console.log('dataara',data)
      //
      //     // Create worksheet
      //     const ws = XLSX.utils.json_to_sheet(data);
      //
      //     // Add worksheet to workbook
      //     XLSX.utils.book_append_sheet(wb, ws, sheetName);
      //   });
      //
      //   const wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });
      //   const blob = new Blob([wbout], { type: 'application/octet-stream' });
      //   saveAs(blob, 'MDP_Export.xlsx');
      // },


      exportFeedback(){
            axios.get(baseurl + 'api/export-mdp-feedback?query=' +  this.query
                + "&Department=" + JSON.stringify(this.Department)
                + "&sessionP=" + this.sessionP
            ).then((response)=>{
              // console.log(response)
                  let dataSets = response.data.data;
                  if (dataSets.length > 0) {
                    let columns = Object.keys(dataSets[0]);
                    columns = columns.filter((item) => item !== 'row_num');
                    let rex = /([A-Z])([A-Z])([a-z])|([a-z])([A-Z])/g;
                    columns = columns.map((item) => {
                      let title = item.replace(rex, '$1$4 $2$3$5')
                      return {title, key: item}
                    });
                    bus.$emit('data-table-import', dataSets, columns, 'MDP Export')
                  }
                }).catch((error)=>{
              console.log(response)
            })
          },
        destroy(id){
          Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
              if (result.isConfirmed) {
                  axios.delete(baseurl + 'api/mdp/delete/'+ id).then((response)=>{
                      this.getAllMDPList();
                      Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                      )
                  })
              }
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
.defineHeight{
  height: 43px;
}
</style>
