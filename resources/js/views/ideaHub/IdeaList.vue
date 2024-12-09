<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Idea Hub']">
      <div class="col-sm-6">
        <div class="float-right d-none d-md-block">
          <div class="card-tools">
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
            <div class="datatable" v-if="contents.length>0">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small" v-if="contents.length>0">
                    <thead class="thead-dark">
                    <tr>
                      <th v-for="(item, index) in headers" v-if=" index !== 15">
                        {{ item.replace(/_/g, ' ', " $1").trim() }}
                      </th>
                      <th style="width: 100px">Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item, index) in contents" >
                      <td>
                        {{item.SL}}
                      </td>
                      <td>
                        {{item.Name}}
                      </td>
                      <td>
                        {{item.Title}}
                      </td>
                      <td>
                        {{item.Summary}}...
                      </td>
                      <td>
                      <router-link :to="{name: 'IdeaHubDetails', params: {IdeaID:item.SL}}" ><i class="mdi mdi-eye-circle"></i> Show</router-link>

                      </td>
                    </tr>
                    </tbody>
                  </table>

                  <br>
                  <pagination
                      v-if="pagination.last_page > 1"
                      :pagination="pagination"
                      :offset="5"
                      @paginate="getAllIdea()"
                  ></pagination>
                </div>
              </div>
            </div>
            <div v-else>
              <div class="form-divider" style="text-align: center;color: #04702e">
                <div class="form-divider-title">
                  <h5>It appears that no ideas have been submitted yet!</h5>
                  <button type="submit" class="btn btn-success btn-sm"><router-link :to="{name: 'IdeaSubmissionForm'}" style="color: white;" >Submit Your Idea Here <i class="mdi mdi-arrow-down-bold"></i></router-link></button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
<!--      <div class="row" v-else>-->
<!--        <div class="col-xl-12">-->
<!--          <skeleton-loader :row="14"/>-->
<!--        </div>-->
<!--      </div>-->
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
      pagination: {
        current_page: 1,
        from: 1,
        to: 1,
        total: 1,
      },
      query: '',
      editMode: false,
      isLoading: false,
      dialog: false,
    }
  },
  watch: {
  },
  mounted() {
    document.title = 'Idea Hub';
    this.getAllIdea();

  },
  methods: {
    getAllIdea(){
      this.isLoading= false
      axios.get(baseurl+ 'api/idea-hub?page='+ this.pagination.current_page
          + "&query=" + this.query
      ).then((response)=>{
        if (response.data.data.data.length >0){
          this.contents = response.data.data.data
          this.headers = Object.keys(response.data.data.data[0])
          this.form.pagination.current_page = response.data.paginationData[0].current_page;
          this.form.pagination.from = response.data.paginationData[0].from;
          this.form.pagination.to = response.data.paginationData[0].to;
          this.form.pagination.total = response.data.paginationData[0].total;
          this.form.pagination.last_page = response.data.paginationData[0].last_page;
          this.isLoading= true
        }

      }).catch((error)=>{

      })
    },
    isInt(value) {
      return !isNaN(parseInt(value * 1))
    },
    reload(){
      this.getAllIdea();
      this.query = "";
      this.$toaster.success('Data Successfully Refresh');
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
.form-divider {
  padding: 50px 20px 20px 20px;
  border: 1px solid green;
  border-radius: 13px;
  margin: 0 auto;
}
.form-divider-title {
  position: relative;
  top: -20px;
}

.form-divider-title p {
  position: absolute;
  padding: 0 25px;
  background: #ffffff;
  font-weight: bold;
  color: green !important;
  font-size: 12px;
}
</style>
