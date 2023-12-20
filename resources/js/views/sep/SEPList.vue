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
                          <select id="DivisionID" class="form-control" v-model="DivisionID" @change="getAllPortfolio()"  >
                            <option value="">Select Division</option>
                            <option :value="div.Deptunit" v-for="(div,index) in divisions" :key="index" >{{div.Deptunit}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <select id="PortfolioID" class="form-control" v-model="PortfolioID" @change="getAllDepartment()"  >
                            <option value="">Select Portfolio</option>
                            <option :value="div.PortfolioID" v-for="(div,index) in portfolios" :key="index" >{{div.PortfolioName}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <select id="DepartmentID" class="form-control" v-model="DepartmentID"  @change="getAllDesignation()">
                            <option value="">Select Departments</option>
                            <option :value="div.DepartmentID" v-for="(div,index) in departments" :key="index">{{div.DepartmentName}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <multiselect
                              v-model="DesignationID"
                              :options="designations"
                              :multiple="false"
                              :searchable="true"
                              :close-on-select="true"
                              :show-labels="true"
                              label="DesignationName"
                              track-by="DesignationID"
                              placeholder="Pick a Designation"></multiselect>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <button type="submit" @click="getAllSEP" class="btn btn-success"><i class="mdi mdi-filter"></i>Filter</button>
                      </div>
                      <div class="col-md-2" >
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
                      <th class="text-center">Portfolio</th>
                      <th class="text-center">Department</th>
                      <th class="text-center">Designation</th>
                      <th class="text-center">SepFile</th>
                      <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(sep, i) in seps" :key="sep.SEPID" v-if="seps.length">
                      <th scope="row">{{ ++i }}</th>
                      <td>{{ sep.DivisionID }}</td>
                      <td>{{ sep.PortfolioName}}</td>
                      <td>{{ sep.DepartmentName}}</td>
                      <td>{{ sep.DesignationName}}</td>
                      <td class="text-left">

                        <a :href="'public/file/SEP/'+sep.SepFile" download>{{sep.SepFile}}</a>

                      </td>

<!--                      <td class="text-left">-->
<!--                        <img v-if="sep.SepFile" height="40" width="40" :src="tableImage(sep.SepFile)" alt="" @click="modalImageShow(sep)" >{{sep.SepFile}}-->
<!--                      </td>-->
                      <td class="text-center">
                        <button @click="edit(sep)" class="btn btn-success btn-sm"><i class="far fa-edit"></i></button>
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
          <form @submit.prevent="editMode ? update() : store()" @keydown="form.onKeydown($event)" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-6 col-md-6">
                    <div class="form-group">
                      <label>Division</label>
                      <select v-model="form.DivisionID" name="Division" id="Division" class="form-control" :class="{ 'is-invalid': form.errors.has('Division') }" @change="getAllPortfolio()">
                        <option value="">Select Division</option>
                        <option :value="div.Deptunit" v-for="(div,index) in divisions" :key="index">{{div.Deptunit}}</option>
                      </select>
                      <div class="error" v-if="form.errors.has('Division')" v-html="form.errors.get('Division')" />
                    </div>
                  </div>
                  <div class="col-6 col-md-6">
                    <div class="form-group">
                      <label>Portfolio</label>
                      <select v-model="form.PortfolioID" name="Division" id="Division" class="form-control" :class="{ 'is-invalid': form.errors.has('Division') }" @change="getAllDepartment()">
                        <option value="">Select Division</option>
                        <option :value="div.PortfolioID" v-for="(div,index) in portfolios" :key="index">{{div.PortfolioName}}</option>
                      </select>
                      <div class="error" v-if="form.errors.has('Portfolio')" v-html="form.errors.get('Portfolio')" />
                    </div>
                  </div>
                  <div class="col-6 col-md-6">
                    <div class="form-group">
                      <label>Department</label>
                      <select v-model="form.DepartmentID" name="department" id="department" class="form-control" :class="{ 'is-invalid': form.errors.has('department') }"  @change="getAllDesignation()">
                        <option value="">Select Department</option>
                        <option :value="div.DepartmentID" v-for="(div,index) in departments" :key="index">{{div.DepartmentName}}</option>
                      </select>
                      <div class="error" v-if="form.errors.has('Department')" v-html="form.errors.get('Department')" />
                    </div>
                  </div>
                  <div class="col-6 col-md-6">
                    <div class="form-group">
                      <label>Designation</label>
                      <multiselect
                          v-model="form.DesignationID"
                          :options="designations"
                          :multiple="false"
                          :searchable="true"
                          :close-on-select="true"
                          :show-labels="true"
                          label="DesignationName"
                          track-by="DesignationID"
                          placeholder="Pick a Designation"></multiselect>

                      <div class="error" v-if="form.errors.has('Designation')" v-html="form.errors.get('Designation')" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sep File</label>
                      <input @change="imgUpload($event)" type="file" name="SepFile"
                             class="form-control"
                             :class="{ 'is-invalid': form.errors.has('SepFile') }"  >
                      <div class="error" v-if="form.errors.has('SepFile')"
                           v-html="form.errors.get('SepFile')"/>

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
<!--    <div class="modal fade bs-example-modal-center" id="showImageModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">-->
<!--      <div class="modal-dialog modal-dialog-centered">-->
<!--        <div class="modal-content">-->
<!--          <div class="modal-header">-->
<!--            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" @click="closeModal">×</button>-->
<!--          </div>-->
<!--          <div class="modal-body">-->
<!--            &lt;!&ndash;            <img :src="showImage(form.SepFile)" alt="" height="40px" width="40px">&ndash;&gt;-->
<!--            <img :src="tableImage2(form.SepFile)" alt="" v-model="form.ModalImage" height="500" width="450">-->
<!--          </div>-->
<!--        </div>-->
<!--        &lt;!&ndash; /.modal-content &ndash;&gt;-->
<!--       </div>-->
<!--      </div>-->
      <!-- /.modal-dialog -->
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
      seps: [],
      portfolios: [],
      divisions: [],
      departments: [],
      designations: [],
      pagination: {
        current_page: 1
      },
      query: "",
      type: '',
      Deptunit:'',
      DivisionID:'',
      PortfolioID:'',
      DepartmentID:'',
      DesignationID:'',
      editMode: false,
      isLoading: false,
      dialog: false,
      SepFileUpdate:'',
      form: new Form({
        SEPID:'',
        DivisionID:'',
        PortfolioID:'',
        DepartmentID:'',
        DesignationID:'',
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
    this.getAllPortfolio();
    this.getAllDepartment();
    this.getAllDesignation();
  },
  methods: {
    getAllSEP(){

      //this.isLoading = true;
      axios.get(baseurl+ 'api/sep-automation?page='+ this.pagination.current_page
          + "&query=" + this.query
          + "&DivisionID=" +this.DivisionID
          + "&DesignationID=" +JSON.stringify(this.DesignationID)
          + "&DepartmentID=" + this.DepartmentID
          + "&PortfolioID=" + this.PortfolioID
          // + "&DesignationID=" + this.DesignationID
      ).then((response)=>{
        this.seps = response.data.data;
        this.pagination = response.data.meta;
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
    getAllPortfolio(){
      axios.post(baseurl +'api/all-portfolio/', {
        DivisionID: this.form.DivisionID,
        DivisionID2: this.DivisionID
      }).then((response)=>{
        this.portfolios = response.data.data;
      }).catch((error)=>{

      })
    },
    getAllDepartment(){
      axios.post(baseurl +'api/all-department/', {
        PortfolioID: this.form.PortfolioID,
        PortfolioID2: this.PortfolioID
      }).then((response)=>{
        this.departments = response.data.data;
      }).catch((error)=>{

      })
    },
    getAllDesignation(){
      axios.post(baseurl +'api/all-designation/', {
        DepartmentID: this.form.DepartmentID,
        DepartmentID2: this.DepartmentID
      }).then((response)=>{
        console.log(response)
        this.designations = response.data.data;
      }).catch((error)=>{

      })
    },
    // tableImage(SepFile) {
    //   return window.location.origin + "/mdp-training/public/file/SEP/" + SepFile;
    // },

    // modalImageShow(sep){
    //   // this.tableImage2(image)
    //   this.form.fill(sep);
    //   setTimeout(()=>{
    //     $("#showImageModal").modal("show");
    //   },300)
    // },
    // showImage() {
    //   let img = this.form.SepFile;
    //   if (img.length > 100) {
    //     return this.form.SepFile;
    //   } else {
    //     return window.location.origin + "/mdp-training/public/file/SEP/" + this.form.SepFile;
    //   }
    // },
    // tableImage2(sep) {
    //   console.log(sep)
    //   return window.location.origin + "/mdp-training/public/file/SEP/" + sep;
    // },
    //

    // closeModal(){
    //   $("#StudentModelModal").modal("hide");
    //   $("#showImageModal").modal("hide");
    // },
    imgUpload(e) {
      var input = e.target
      var file = input.files[0]
      this.processImage(file)
    },
    processImage(file) {
      let instance = this
      var reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = function () {
        instance.form.SepFile = reader.result
      };
      reader.onerror = function (error) {
        console.log('Error: ', error);
      };
    },
    reload(){
      this.getAllSEP();
      this.query = "";
      this.$toaster.success('Data Successfully Refresh');
    },
    closeModal(){
      $("#StudentModelModal").modal("hide");
      $("#showImageModal").modal("hide");
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
      console.log(sep)
      this.editMode = true;
      this.form.reset();
      this.form.clear();
      this.form.fill(sep);
      this.getAllDivision();
      this.getAllPortfolio();
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
