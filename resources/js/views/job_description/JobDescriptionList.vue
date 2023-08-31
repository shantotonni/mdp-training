<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Job Description']"/>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <div class="row" v-if="personal===null">
                      <div class="col-md-2">
                        <input v-model="query" type="text" class="form-control" placeholder="Search">
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <select id="Division" class="form-control" v-model="Division" @change="getAllDepartment()">
                            <option value="">Select Division</option>
                            <option v-for="(div,index) in divisions" :value="div.Division" :key="index">{{div.Division}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <select id="Department" class="form-control" v-model="Department">
                              <option value="">Select Department</option>
                              <option v-for="(dept,index) in departments" :value="dept.DeptName" :key="index">{{dept.DeptName}}</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <button type="submit" @click="getAllJobDescriptionList" class="btn btn-success"><i class="mdi mdi-filter"></i>Filter</button>
                      </div>
                    </div>
                  </div>
                  <div class="card-tools">
                    <router-link :to="{name: 'JobDescriptionCreate'}" class="btn btn-success btn-sm" style="color: white">
                      <i class="fas fa-plus"></i>
                      Add Job Description
                    </router-link>
                    <button type="button" class="btn btn-primary btn-sm" @click="reload">
                      <i class="fas fa-sync"></i>
                      Reload
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" @click="exportJobDescriptionList" v-if="personal===null">
                      <i class="fa fa-file-excel"></i>
                      Export Excel
                    </button>
                  </div>
                </div>
                <div class="table-responsive">
                  <table
                      class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                    <thead>
                    <tr>
                      <th>SN</th>
                      <th>Job Description Period</th>
                      <th>Staff ID</th>
                      <th>Employee Name</th>
                      <th>Designation</th>
                      <th>Division</th>
                      <th>Department</th>
                      <th>Official Email</th>
                      <th>Mobile</th>
                      <th>Job Title</th>
                      <th>Purpose Of Job</th>

                      <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(job, i) in job_description" :key="job.ID" v-if="job_description.length">
                      <th>{{ ++i }}</th>
                      <td>{{ job.JobDescriptionPeriod }}</td>
                      <td>{{ job.StaffID }}</td>
                      <td>{{ job.EmployeeName }}</td>
                      <td>{{ job.Designation }}</td>
                      <td>{{ job.Division }}</td>
                      <td>{{ job.Department }}</td>
                      <td>{{ job.OfficialEmail }}</td>
                      <td>{{ job.Mobile }}</td>
                      <td>{{ job.JobTitle }}</td>
                      <td>{{ job.PurposeOfJob }}</td>

                      <td class="text-center">
                        <router-link :to="`job-description-edit/${job.ID}`" class="btn btn-info btn-sm"><i class="mdi mdi-square-edit-outline"></i> Edit</router-link>
                        <router-link :to="`job-description-print/${job.ID}`" class="btn btn-info btn-sm"><i class="mdi mdi-printer"></i> Print</router-link>
                        <!--<button @click="destroy(plan.ID)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>-->
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <br>
                  <pagination
                      v-if="pagination.last_page > 1"
                      :pagination="pagination"
                      :offset="5"
                      @paginate="query === '' ? getAllJobDescriptionList() : searchData()"
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

export default {
  name: "List",
  mixins: [Common],
  data() {
    return {
      job_description: [],
      personal: {},
      departments: [],
      divisions: [],
      pagination: {
        current_page: 1
      },
      isMessage: false,
      query: "",
      Division: "",
      Department: "",
      editMode: false,
      isLoading: false,
    }
  },
  watch: {
    query: function (newQ, old) {
      if (newQ === "") {
        this.getAllJobDescriptionList();
      } else {
        this.searchData();
      }
    }
  },
  mounted() {
    document.title = 'Job Description List | Action Plan';
    this.getAllJobDescriptionList();
    this.getData();
    this.getAllDivision();
  },
  methods: {
    getAllJobDescriptionList() {
      axios.get(baseurl + 'api/job-description/list?page=' + this.pagination.current_page
          + "&query=" + this.query
          + "&Division=" + this.Division
          + "&Department=" + this.Department
      ).then((response) => {
        this.job_description = response.data.data;
        this.pagination = response.data.meta;
      }).catch((error) => {

      })
    },
    searchData() {
      axios.get(baseurl + "api/job-description-search/" + this.query + "?page=" + this.pagination.current_page).then(response => {
        this.job_description = response.data.data;
        this.pagination = response.data.meta;
      }).catch(e => {
        this.isLoading = false;
      });
    },
    getData() {
      this.axiosPost('me', {}, (response) => {
        this.$store.commit('me', response);
        this.personal = response.personal
      }, (error) => {
        this.errorNoti(error);
      });
    },
    getAllDivision(){
      axios.get(baseurl + 'api/get-all-division/').then((response) => {
        console.log(response)
        this.divisions = response.data.divisions;
      }).catch((error) => {

      })
    },
    getAllDepartment(){
      axios.post(baseurl +'api/get-all-department/', {
        Division: this.Division,
      }).then((response)=>{
        console.log(response)
        this.departments = response.data.departments;
      }).catch((error)=>{

      })
    },
    reload() {
      this.query = "";
      this.Division = "";
      this.Department = "";
      this.getAllJobDescriptionList();
    },
    exportJobDescriptionList() {
      axios.post(baseurl + 'api/export-job-description-list',{
        param: this.query
      })
          .then((response) => {
            let dataSets = response.data.data;
            if (dataSets.length > 0) {
              let columns = Object.keys(dataSets[0]);
              columns = columns.filter((item) => item !== 'row_num');
              let rex = /([A-Z])([A-Z])([a-z])|([a-z])([A-Z])/g;
              columns = columns.map((item) => {
                let title = item.replace(rex, '$1$4 $2$3$5')
                return {title, key: item}
              });
              bus.$emit('data-table-import', dataSets, columns, 'Job Description Export')
            }
          }).catch((error) => {
        console.log(error)
      })
    },
    destroy(id) {
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
          axios.delete(baseurl + 'api/job-description-delete/' + id).then((response) => {
            this.getAllJobDescriptionList();
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
</style>
