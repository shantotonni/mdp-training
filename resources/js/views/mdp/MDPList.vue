<template>
    <div class="content">
        <div class="container-fluid">
            <breadcrumb :options="['MDP List']"/>
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
                                      <router-link :to="{name: 'MDPCreate'}" class="btn btn-success btn-sm" style="color: white">
                                        <i class="fas fa-plus"></i>
                                        Add MDP
                                      </router-link>
<!--                                        <button type="button" class="btn btn-primary btn-sm" @click="exportGenerator">-->
<!--                                            <i class="mdi mdi-database-export"></i>-->
<!--                                            Export-->
<!--                                        </button>-->
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
                                              <th class="text-center">Employee Name</th>
                                              <th class="text-center">Designation</th>
                                              <th class="text-center">Department</th>
                                              <th class="text-center">OfficialEmail</th>
                                              <th class="text-center">Mobile</th>
                                              <th class="text-center">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr v-for="(mdp, i) in mdplist" :key="mdp.ID" v-if="mdplist.length">
                                              <th class="text-center" scope="row">{{ ++i }}</th>
                                              <td class="text-center">{{ mdp.EmployeeName }}</td>
                                              <td class="text-center">{{ mdp.Designation }}</td>
                                              <td class="text-center">{{ mdp.Department }}</td>
                                              <td class="text-center">{{ mdp.OfficialEmail }}</td>
                                              <td class="text-center">{{ mdp.Mobile }}</td>
                                              <td class="text-center">
                                                <router-link :to="`mdp-edit/${mdp.ID}`" class="btn btn-info btn-sm"><i class="mdi mdi-square-edit-outline"></i></router-link>
                                                <router-link :to="`mdp-print/${mdp.ID}`" class="btn btn-info btn-sm"><i class="mdi mdi-printer"></i></router-link>
                                                <router-link :to="`mdp-print_two/${mdp.ID}`" class="btn btn-info btn-sm"><i class="mdi mdi-printer"></i></router-link>
<!--                                                  <button @click="destroy(mdp.ID)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>-->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {baseurl} from '../../base_url'
export default {
    name: "List",
    data() {
        return {
          mdplist: [],
            pagination: {
                current_page: 1
            },
            isMessage : false,
            query: "",
            editMode: false,
            isLoading: false,
            form: new Form({
                id:'',
                generator_name:'',
                unique_generator_code: '',
                generator_model: '',
                brand_id:'',
                rating: '',
                generator_serial: '',
                engine_brand: '',
                engine_serial: '',
            }),
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
        document.title = 'MDP List | Diesel Engine';
        this.getAllMDPList();
    },
    methods: {
      getAllMDPList(){
            this.isLoading = true;
            axios.get(baseurl + 'api/mdp/list?page='+ this.pagination.current_page).then((response)=>{
                console.log(response)
                this.mdplist = response.data.data;
                this.pagination = response.data.meta;
                this.isLoading = false;
            }).catch((error)=>{

            })
        },
        searchData(){
            axios.get(baseurl + "api/search/mdp/list/" + this.query + "?page=" + this.pagination.current_page).then(response => {
                this.mdplist = response.data.data;
                this.pagination = response.data.meta;
            }).catch(e => {
                this.isLoading = false;
            });
        },
        reload(){
            this.getAllMDPList();
            this.query = "";
            this.$toaster.success('Data Successfully Refresh');
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
</style>
