<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['SEP Portfolio List']">
      <div class="col-sm-6">
        <div class="float-right d-none d-md-block">
          <div class="card-tools">
            <button type="button" class="btn btn-success btn-sm" @click="createPortfolio">
              <i class="fas fa-plus"></i>
              Add Portfolio
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
                          <select id="DivCode" class="form-control" v-model="DivCode">
                            <option value="">Select Division</option>
                            <option :value="div.Deptunit" v-for="(div,index) in divisions" :key="index" >{{div.Deptunit}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <button type="submit" @click="getAllPortfolio" class="btn btn-success"><i class="mdi mdi-filter"></i>Filter</button>
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
                      <th class="text-center">Division</th>
                      <th class="text-center">Portfolio Name</th>
                      <th class="text-center">Portfolio Code</th>
                      <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(port, i) in ports" :key="port.PortfolioID" v-if="ports.length">
                      <th scope="row">{{ ++i }}</th>
                      <td>{{ port.DivCode }}</td>
                      <td>{{ port.PortfolioName }}</td>
                      <td>{{ port.PortfolioCode }}</td>
                      <td class="text-center">
                        <button @click="edit(port)" class="btn btn-success btn-sm"><i class="far fa-edit"></i></button>
                        <!--<button @click="destroy(service_category.id)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>-->
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <br>
                  <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5" @paginate="query === '' ? getAllPortfolio() : searchData()"></pagination>
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
            <h5 class="modal-title mt-0" id="myLargeModalLabel">{{ editMode ? "Edit" : "Add" }} Portfolio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" @click="closeModal">×</button>
          </div>

          <form @submit.prevent="editMode ? update() : store()" @keydown="form.onKeydown($event)">
            <div class="modal-body">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-6 col-md-6">
                    <div class="form-group">
                      <label>Division</label>
                      <select v-model="form.DivCode" name="Division" id="Division" class="form-control" :class="{ 'is-invalid': form.errors.has('Division') }" >
                        <option value="">Select Division</option>
                        <option :value="div.Deptunit" v-for="(div,index) in divisions" :key="index">{{div.Deptunit}}</option>
                      </select>
                      <div class="error" v-if="form.errors.has('Division')" v-html="form.errors.get('Division')" />
                    </div>
                  </div>
                  <div class="col-6 col-md-6">
                    <div class="form-group">
                      <label>Portfolio Name</label>
                      <input type="text" name="PortfolioName"
                             class="form-control" v-model="form.PortfolioName"
                             :class="{ 'is-invalid': form.errors.has('PortfolioName') }">
                      <div class="error" v-if="form.errors.has('PortfolioName')"
                           v-html="form.errors.get('PortfolioName')"/>
                      <span class="text-danger">{{ notifmsg}} </span>
                    </div>
                  </div>
                  <div class="col-6 col-md-6">
                    <div class="form-group">
                      <label>Portfolio Code</label>
                      <input type="text" name="PortfolioCode"
                             class="form-control" v-model="form.PortfolioCode"
                             :class="{ 'is-invalid': form.errors.has('PortfolioCode') }">
                      <div class="error" v-if="form.errors.has('PortfolioCode')"
                           v-html="form.errors.get('PortfolioCode')"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal">Close</button>
              <button :disabled="form.busy" type="submit" class="btn btn-primary">{{ editMode ? "Update" : "Create" }} Portfolio</button>
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
      notifmsg:'',
      ports: [],
      divisions: [],
      pagination: {
        current_page: 1,
      },
      query: "",
      type: '',
      Deptunit: "",
      DivCode:'',
      editMode: false,
      isLoading: false,
      dialog: false,
      form: new Form({
        PortfolioID:'',
        DivCode:'',
        PortfolioCode:'',
        PortfolioName:'',
      }),
    }
  },
  watch: {
    query: function(newQ, old) {
      if (newQ === "") {
        this.getAllPortfolio();
      } else {
        this.searchData();
      }
    }
  },
  mounted() {
    document.title = 'Portfolio List';
    this.getAllPortfolio();
    this.getAllDivision();
  },
  methods: {
    getAllPortfolio(){
      //this.isLoading = true;
      axios.get(baseurl+ 'api/sep-portfolio?page='+ this.pagination.current_page
          + "&query=" + this.query
          + "&DivCode=" +this.DivCode
      ).then((response)=>{
        this.ports = response.data.data;
        this.pagination = response.data.meta;
        //this.isLoading = false;
      }).catch((error)=>{

      })
    },
    searchData(){
      axios.get(baseurl+"api/search/sep-portfolio/" + this.query + "?page=" + this.pagination.current_page).then(response => {
        this.ports = response.data.data;
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

    reload(){
      this.getAllPortfolio();
      this.query = "";
      this.$toaster.success('Data Successfully Refresh');
    },
    closeModal(){
      $("#StudentModelModal").modal("hide");
    },
    createPortfolio(){
      this.editMode = false;
      this.form.reset();
      this.form.clear();
      $("#StudentModelModal").modal("show");
    },
    store(){
      this.form.busy = true;
      this.form.post(baseurl+ "api/sep-portfolio").then(response => {
        if (response.data.message){
          this.notifmsg = response.data.message
        }else{
          $("#StudentModelModal").modal("hide");
          this.getAllPortfolio();
        }
      }).catch(e => {

        this.isLoading = false;
      });
    },
    edit(port) {
      this.editMode = true;
      this.form.reset();
      this.form.clear();
      this.form.fill(port);
      this.getAllDivision();
      $("#StudentModelModal").modal("show");
    },
    update(){
      this.form.busy = true;
      this.form.put(baseurl+"api/sep-portfolio/" + this.form.PortfolioID).then(response => {
        if (response.data.message){
          this.notifmsg = response.data.message
        }else{
          $("#StudentModelModal").modal("hide");
          this.getAllPortfolio();
        }
      }).catch(e => {
        this.notifmsg = e.response.data
        this.isLoading = false;
      });
    },
    destroy(PortfolioID){
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
          axios.delete(baseurl+'api/sep-portfolio/'+ PortfolioID).then((response)=>{
            this.getAllPortfolio();
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
