<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['User List']"/>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <div class="row">
                      <div class="col-md-2">
                        <input v-model="query" type="text" class="form-control" placeholder="Search">
                      </div>
                    </div>
                  </div>
                  <div class="card-tools">
                    <button type="button" class="btn btn-success btn-sm" @click="createUserModel">
                      <i class="fas fa-plus"></i>
                      Add User
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" @click="reload">
                      <i class="fas fa-sync"></i>
                      Reload
                    </button>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                    <thead>
                    <tr>
                      <th class="text-center">SN</th>
                      <th class="text-center">EmpCode</th>
                      <th class="text-center">Business</th>
                      <th class="text-center">Type</th>
                      <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(user, i) in users" :key="user.student_id" v-if="users.length">
                      <th scope="row">{{ ++i }}</th>
                      <td>{{ user.EmpCode }}</td>
                      <td>{{ user.Business }}</td>
                      <td>{{ user.type }}</td>
                      <td class="text-center">
                        <button @click="edit(user)" class="btn btn-success btn-sm"><i class="far fa-edit"></i></button>
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
                      @paginate="query === '' ? getAllUser() : searchData()"
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
            <h5 class="modal-title mt-0" id="myLargeModalLabel">{{ editMode ? "Edit" : "Add" }} User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" @click="closeModal">×</button>
          </div>
          <form @submit.prevent="editMode ? update() : store()" @keydown="form.onKeydown($event)">
            <div class="modal-body">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>EmpCode</label>
                      <input type="text" name="EmpCode" v-model="form.EmpCode" class="form-control" :class="{ 'is-invalid': form.errors.has('EmpCode') }">
                      <div class="error" v-if="form.errors.has('EmpCode')" v-html="form.errors.get('EmpCode')" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Business</label>
                      <input type="text" name="Business" v-model="form.Business" class="form-control" :class="{ 'is-invalid': form.errors.has('Business') }">
                      <div class="error" v-if="form.errors.has('Business')" v-html="form.errors.get('Business')" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Admin Type</label>
                      <input type="text" name="type" v-model="form.type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                      <div class="error" v-if="form.errors.has('type')" v-html="form.errors.get('type')" />
                    </div>
                  </div>

                  <div class="col-md-6" v-if="!editMode">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="Password" v-model="form.Password" class="form-control" :class="{ 'is-invalid': form.errors.has('Password') }">
                      <div class="error" v-if="form.errors.has('Password')" v-html="form.errors.get('Password')" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal">Close</button>
              <button :disabled="form.busy" type="submit" class="btn btn-primary">{{ editMode ? "Update" : "Create" }} User</button>
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
export default {
  name: "List",
  components: {
    Datepicker
  },
  data() {
    return {
      users: [],
      pagination: {
        current_page: 1
      },
      query: "",
      editMode: false,
      isLoading: false,
      form: new Form({
        ID :'',
        EmpCode:'',
        Business:'',
        type:'',
        Password:'',
      }),
    }
  },
  watch: {
    query: function(newQ, old) {
      if (newQ === "") {
        this.getAllUser();
      } else {
        this.searchData();
      }
    }
  },
  mounted() {
    document.title = 'User List | Bill';
    this.getAllUser();
  },
  methods: {
    getAllUser(){
      this.isLoading = true;
      axios.get(baseurl+ 'api/users?page='+ this.pagination.current_page).then((response)=>{
        this.users = response.data.data;
        this.pagination = response.data.meta;
        this.isLoading = false;
      }).catch((error)=>{

      })
    },
    searchData(){
      axios.get(baseurl+"api/search/users/" + this.query + "?page=" + this.pagination.current_page).then(response => {
        this.users = response.data.data;
        this.pagination = response.data.meta;
      }).catch(e => {
        this.isLoading = false;
      });
    },
    reload(){
      this.getAllUser();
      this.query = "";
      this.$toaster.success('Data Successfully Refresh');
    },
    closeModal(){
      $("#StudentModelModal").modal("hide");
    },
    createUserModel(){
      this.editMode = false;
      this.form.reset();
      this.form.clear();
      $("#StudentModelModal").modal("show");
    },
    store(){
      this.form.busy = true;
      this.form.post(baseurl+ "api/users").then(response => {
        $("#StudentModelModal").modal("hide");
        this.getAllUser();
      }).catch(e => {
        this.isLoading = false;
      });
    },
    edit(role) {
      this.editMode = true;
      this.form.reset();
      this.form.clear();
      this.form.fill(role);
      $("#StudentModelModal").modal("show");
    },
    update(){
      this.form.busy = true;
      this.form.put(baseurl+"api/users/" + this.form.user_id).then(response => {
        $("#StudentModelModal").modal("hide");
        this.getAllUser();
      }).catch(e => {
        this.isLoading = false;
      });
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
          axios.delete(baseurl+'api/users/'+ id).then((response)=>{
            this.getAllUser();
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

</style>
