<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['SEP List']">
      <div class="col-sm-6">
        <div class="float-right d-none d-md-block">
          <div class="card-tools">
            <button type="button" class="btn btn-success btn-sm" @click="createSEPModel">
              <i class="fas fa-plus"></i>
              Add SEP Automation
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
                          <select id="DivCode" class="form-control" v-model="DivCode" @change="getAllDepartment()">
                            <option value="">Select Division</option>
                            <option :value="div.Deptunit" v-for="(div,index) in divisions" :key="index">{{div.Deptunit}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <select id="DeptCode" class="form-control" v-model="DeptCode">
                            <option value="">Select Departments</option>
                            <option :value="div.DeptCode" v-for="(div,index) in departments" :key="index">{{div.ShortName}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <select id="DesgCode" class="form-control" v-model="DesgCode">
                            <option value="">Select Designation</option>
                            <option :value="div.DesgCode" v-for="(div,index) in designations" :key="index">{{div.DesgName}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <button type="submit" @click="getAllSEP" class="btn btn-success"><i class="mdi mdi-filter"></i>Filter</button>
                      </div>
                      <div class="col-md-3" >
                        <input v-model="query" type="text" class="form-control" placeholder="Search by Division">
                      </div>
                    </div>

                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                    <thead>
                    <tr>
                      <th class="text-center">SN</th>
                      <th class="text-center">Division</th>
                      <th class="text-center">Department</th>
                      <th class="text-center">Designation</th>
                      <th class="text-center">SepFile</th>
                      <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(sep, i) in seps" :key="sep.SEPID" v-if="seps.length">
                      <th scope="row">{{ ++i }}</th>
                      <td>{{ sep.DivCode }}</td>
                      <td>{{ sep.ShortName }}</td>
                      <td>{{ sep.Designation }}</td>
                      <td class="text-left">
                            <img v-if="sep.SepFile" height="40" width="40" :src="tableImage(sep.SepFile)" alt="" @click="modalImageShow(sep)" >{{sep.SepFile}}

<!--                      <div class="dialog" v-if="dialog" >-->
<!--                        <div class="dialog-content">-->
<!--                          <button @click="toggleDialog()" class="close-icon" >x</button>-->
<!--                          <img :src="tableImage2(sep.SepFile)">-->
<!--                        </div>-->
<!--                      </div>-->

                      </td>
                      <td class="text-center">
                        <button @click="edit(sep)" class="btn btn-success btn-sm"><i class="far fa-edit"></i></button>
                        <!--<button @click="destroy(service_category.id)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>-->
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <br>
                  <pagination
                      v-if="pagination.last_page > 1"
                      :pagination="pagination"
                      :offset="5"
                      @paginate="query === '' ? getAllSEP() : searchData()"
                  ></pagination>
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
            <h5 class="modal-title mt-0" id="myLargeModalLabel">{{ editMode ? "Edit" : "Add" }} SEP</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" @click="closeModal">×</button>
          </div>
          <form @submit.prevent="editMode ? update() : store()" @keydown="form.onKeydown($event)">
            <div class="modal-body">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-6 col-md-6">
                    <div class="form-group">
                      <label>Division</label>
                      <select v-model="form.DivCode" name="Division" id="Division" class="form-control" :class="{ 'is-invalid': form.errors.has('Division') }" @change="getAllDepartment()">
                        <option value="">Select Division</option>
                        <option :value="div.Deptunit" v-for="(div,index) in divisions" :key="index">{{div.Deptunit}}</option>
                      </select>
                      <div class="error" v-if="form.errors.has('Division')" v-html="form.errors.get('Division')" />
                    </div>
                  </div>
                  <div class="col-6 col-md-6">
                    <div class="form-group">
                      <label>Department</label>
                      <select v-model="form.DeptCode" name="department" id="department" class="form-control" :class="{ 'is-invalid': form.errors.has('department') }" >
                        <option value="">Select Department</option>
                        <option :value="div.DeptCode" v-for="(div,index) in departments" :key="index">{{div.ShortName}}</option>
                      </select>
                      <div class="error" v-if="form.errors.has('Department')" v-html="form.errors.get('Department')" />
                    </div>
                  </div>
                  <div class="col-6 col-md-6">
                    <div class="form-group">
                      <label>Designation</label>
                      <select v-model="form.DesgCode" name="Designation" id="Designation" class="form-control" :class="{ 'is-invalid': form.errors.has('Designation') }" >
                        <option value="">Select Designation</option>
                        <option :value="div.DesgCode" v-for="(div,index) in designations" :key="index">{{div.DesgName}}</option>
                      </select>
                      <div class="error" v-if="form.errors.has('Designation')" v-html="form.errors.get('Designation')" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sep File <small>(Image type:jpeg,jpg,png,svg)</small></label>
                      <input @change="changeImage($event)" type="file" name="SepFile"
                             class="form-control"
                             :class="{ 'is-invalid': form.errors.has('SepFile') }">
                      <div class="error" v-if="form.errors.has('SepFile')"
                           v-html="form.errors.get('SepFile')"/>
                      <img v-if="form.SepFile" :src="showImage(form.SepFile)" alt="" height="40px"
                           width="40px">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal">Close</button>
              <button :disabled="form.busy" type="submit" class="btn btn-primary">{{ editMode ? "Update" : "Create" }} SEP</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade bs-example-modal-center" id="showImageModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
<!--            <img :src="showImage(form.SepFile)" alt="" height="40px" width="40px">-->
            <img :src="tableImage2(form.SepFile)" alt="" v-model="form.ModalImage" height="500" width="450">
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import moment from "moment";
import {baseurl} from '../../base_url'
export default {
  name: "List",
  components: {
    Datepicker
  },
  data() {
    return {
      seps: [],
      divisions: [],
      departments: [],
      designations: [],
      pagination: {
        current_page: 1
      },
      query: "",
      type: '',
      Deptunit: "",
      DivCode:'',
      DeptCode:'',
      DesgCode:'',
      editMode: false,
      isLoading: false,
      dialog: false,
      form: new Form({
        SEPID :'',
        DivCode:'',
        DeptCode:'',
        DesgCode:'',
        SepFile:'',
        ModalImage:'',
      }),
    }
  },
  watch: {
    query: function(newQ, old) {
      if (newQ === "") {
        this.getAllSEP();
      } else {
        this.searchData();
      }
    }
  },
  mounted() {
    document.title = 'SEP Automation List';
    this.getAllSEP();
    this.getAllDivision();
    this.getAllDepartment();
    this.getAllDesignation();
  },
  methods: {
    getAllSEP(){
      this.isLoading = true;
      axios.get(baseurl+ 'api/sep-automation?page='+ this.pagination.current_page
          + "&query=" + this.query
          + "&DivCode=" + this.DivCode
          + "&DesgCode=" + this.DesgCode
          + "&DeptCode=" + this.DeptCode
      ).then((response)=>{
        this.seps = response.data.data;
        this.pagination = response.data.meta;
        this.isLoading = false;
      }).catch((error)=>{

      })
    },
    searchData(){
      axios.get(baseurl+"api/search/sep-automation/" + this.query + "?page=" + this.pagination.current_page).then(response => {
        this.seps = response.data.data;
        this.pagination = response.data.meta;
      }).catch(e => {
        this.isLoading = false;
      });
    },
    getAllDivision(){
      axios.get(baseurl + 'api/all-division').then((response) => {
        this.divisions = response.data.data;
      }).catch((error) => {

      })
    },
    getAllDesignation(){
      axios.get(baseurl + 'api/all-designation').then((response) => {
        this.designations = response.data.data;
      }).catch((error) => {

      })
    },
    getAllDepartment(){
      console.log(this.DivCode)
      axios.post(baseurl +'api/all-department/', {
        DivCode: this.form.DivCode,
        DivCode2: this.DivCode
      }).then((response)=>{
        this.departments = response.data.data;
      }).catch((error)=>{

      })
    },
    changeImage(event) {
      let file = event.target.files[0];
      let reader = new FileReader();
      reader.onload = event => {
        this.form.SepFile = event.target.result;
      };
      reader.readAsDataURL(file);
    },
    // toggleDialog(sep) {
    //   this.dialog = !this.dialog;
    //   setTimeout(()=>{
    //     this.tableImage2(sep);
    //   },1000)
    // },
    modalImageShow(sep){
      // this.tableImage2(image)
      this.form.fill(sep);
      setTimeout(()=>{
        $("#showImageModal").modal("show");
      },300)
    },
    showImage() {
      let img = this.form.SepFile;
      if (img.length > 100) {
        return this.form.SepFile;
      } else {
        return window.location.origin + "/mdp-training/public/file/SEP/" + this.form.SepFile;
      }
    },
    tableImage2(sep) {
      console.log(sep)
        return window.location.origin + "/mdp-training/public/file/SEP/" + sep;
    },
    tableImage(SepFile) {
      return window.location.origin + "/mdp-training/public/file/SEP/" + SepFile;
    },
    reload(){
      this.getAllSEP();
      this.query = "";
      this.$toaster.success('Data Successfully Refresh');
    },
    closeModal(){
      $("#StudentModelModal").modal("hide");
    },
    createSEPModel(){
      this.editMode = false;
      this.form.reset();
      this.form.clear();
      $("#StudentModelModal").modal("show");
    },
    store(){
      this.form.busy = true;
      this.form.post(baseurl+ "api/sep-automation").then(response => {
        $("#StudentModelModal").modal("hide");
        this.getAllSEP();
      }).catch(e => {
        this.isLoading = false;
      });
    },
    edit(sep) {
      this.editMode = true;
      this.form.reset();
      this.form.clear();
      this.form.fill(sep);
      this.getAllDivision();
      this.getAllDepartment();
      this.getAllDesignation();
      $("#StudentModelModal").modal("show");
    },
    update(){
      this.form.busy = true;
      this.form.put(baseurl+"api/sep-automation/" + this.form.SEPID).then(response => {
        $("#StudentModelModal").modal("hide");
        this.getAllSEP();
      }).catch(e => {
        this.isLoading = false;
      });
    },
    destroy(SEPID){
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
          axios.delete(baseurl+'api/sep-automation/'+ SEPID).then((response)=>{
            this.getAllSEP();
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
