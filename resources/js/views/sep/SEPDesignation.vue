<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['SEP Designation List']">
      <div class="col-sm-6">
        <div class="float-right d-none d-md-block">
          <div class="card-tools">
            <button type="button" class="btn btn-success btn-sm" @click="createDesignation">
              <i class="fas fa-plus"></i>
              Add Designation
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
<!--                     v-if="type ==='admin'"-->
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <select id="DepartmentID" class="form-control" v-model="DepartmentID">
                            <option value="">Select Department</option>
                            <option :value="div.DepartmentID" v-for="(div,index) in departments" :key="index" >{{div.DepartmentName}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <button type="submit" @click="getAllDepartment" class="btn btn-success"><i class="mdi mdi-filter"></i>Filter</button>
                      </div>
                      <div class="col-sm-8">
                        <div class="float-right d-none d-md-block">
                          <div class="card-tools">
                              <input v-model="query" type="text" class="form-control" placeholder="Search by Division">
                          </div>
                        </div>
                      </div>

                    </div>

                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                    <thead>
                    <tr>
                      <th class="text-center">SN</th>
                      <th class="text-center">Department</th>
                      <th class="text-center">Designation Name</th>
                      <th class="text-center">Designation Code</th>
                      <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(port, i) in ports" :key="port.DesignationID" v-if="ports.length">
                      <th scope="row">{{ ++i }}</th>
                      <td>{{ port.DepartmentName }}</td>
                      <td>{{ port.DesignationName }}</td>
                      <td>{{ port.DesignationCode }}</td>
                      <td class="text-center">
                        <button @click="edit(port)" class="btn btn-success btn-sm"><i class="far fa-edit"></i></button>
                        <!--<button @click="destroy(service_category.id)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>-->
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <br>
<!--                  <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5" @paginate="query === '' ? getAllDesignation() : searchData()"></pagination>-->
                </div>
              </div>
            </div>
            <div v-else>
              <skeleton-loader :row="14"/>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  Modal content for the above example -->
    <div class="modal fade" id="StudentModelModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title mt-0" id="myLargeModalLabel">{{ editMode ? "Edit" : "Add" }} Designation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" @click="closeModal">×</button>
          </div>
          <form @submit.prevent="editMode ? update() : store()" @keydown="form.onKeydown($event)">
            <div class="modal-body">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-6 col-md-6">
                    <div class="form-group">
                      <label>Department</label>
                      <select v-model="form.DepartmentID" name="Portfolio" id="Portfolio" class="form-control" :class="{ 'is-invalid': form.errors.has('Department') }" >
                        <option value="">Select Department</option>
                        <option :value="div.DepartmentID" v-for="(div,index) in departments" :key="index">{{div.DepartmentName}}</option>
                      </select>
                      <div class="error" v-if="form.errors.has('Department')" v-html="form.errors.get('Department')" />
                    </div>
                  </div>
                  <div class="col-6 col-md-6">
                    <div class="form-group">
                      <label>Designation Name</label>
                      <input type="text" name="DesignationName"
                             class="form-control" v-model="form.DesignationName"
                             :class="{ 'is-invalid': form.errors.has('DesignationName') }">
                      <div class="error" v-if="form.errors.has('DesignationName')"
                           v-html="form.errors.get('DesignationName')"/>
                    </div>
                  </div>
                  <div class="col-6 col-md-6">
                    <div class="form-group">
                      <label>Designation Code</label>
                      <input type="text" name="DesignationCode"
                             class="form-control" v-model="form.DesignationCode"
                             :class="{ 'is-invalid': form.errors.has('DesignationCode') }">
                      <div class="error" v-if="form.errors.has('DesignationCode')"
                           v-html="form.errors.get('DesignationCode')"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal">Close</button>
              <button :disabled="form.busy" type="submit" class="btn btn-primary">{{ editMode ? "Update" : "Create" }} port</button>
            </div>
          </form>
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
export default {
  name: "List",
  components: {
    Multiselect ,
    Datepicker
  },
  data() {
    return {
      ports: [],
      departments: [],
      pagination: {
        current_page: 1,
      },
      query: "",
      type: '',
      DepartmentID:'',
      editMode: false,
      isLoading: false,
      dialog: false,
      form: new Form({
        DepartmentID:'',
        DesignationID:'',
        DesignationCode:'',
        DesignationName:'',
      }),
    }
  },
  watch: {
    query: function(newQ, old) {
      if (newQ === "") {
        this.getAllDesignation();
      } else {
        this.searchData();
      }
    }
  },
  mounted() {
    document.title = 'Designation List';
    this.getAllDepartment();
    this.getAllDesignation();
  },
  methods: {
    getAllDesignation(){
      //this.isLoading = true;
      axios.get(baseurl+ 'api/sep-designation?page='+ this.pagination.current_page
          + "&query=" + this.query
          + "&DesignationID=" +this.DesignationID
      ).then((response)=>{
        this.ports = response.data.data;
        this.pagination = response.data.meta;
        //this.isLoading = false;
      }).catch((error)=>{

      })
    },
    searchData(){
      axios.get(baseurl+"api/search/sep-designation/" + this.query + "?page=" + this.pagination.current_page).then(response => {
        this.ports = response.data.data;
        this.pagination = response.data.meta;
      }).catch(e => {
        this.isLoading = false;
      });
    },
    getAllDepartment(){
      axios.get(baseurl + 'api/all-department').then((response) => {
        console.log('sas',response);
        this.departments = response.data.data;
      }).catch((error) => {

      })
    },

    reload(){
      this.getAllDesignation();
      this.query = "";
      this.$toaster.success('Data Successfully Refresh');
    },
    closeModal(){
      $("#StudentModelModal").modal("hide");
    },
    createDesignation(){
      this.editMode = false;
      this.form.reset();
      this.form.clear();
      $("#StudentModelModal").modal("show");
    },
    store(){
      this.form.busy = true;
      this.form.post(baseurl+ "api/sep-designation").then(response => {
        $("#StudentModelModal").modal("hide");
        this.getAllDesignation();
      }).catch(e => {
        this.isLoading = false;
      });
    },
    edit(port) {
      console.log(port)
      this.editMode = true;
      this.form.reset();
      this.form.clear();
      this.form.fill(port);
      $("#StudentModelModal").modal("show");
    },
    update(){
      console.log( this.form.DesignationID);
      this.form.busy = true;
      this.form.put(baseurl+"api/sep-designation/" + this.form.DesignationID).then(response => {
        $("#StudentModelModal").modal("hide");
        this.getAllDesignation();
      }).catch(e => {
        this.isLoading = false;
      });
    },
    destroy(DesignationID){
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
          axios.delete(baseurl+'api/sep-designation/'+ DesignationID).then((response)=>{
            this.getAllDesignation();
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
          })
        }
      })
    },
    customFormatter(date) {
      return moment(date).format('YYYY-MM-DD');
    }
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
.close-icon {
  float: right;
}
</style>
