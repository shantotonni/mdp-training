<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Training Feedback']"/>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <div class="d-flex">
                  <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm" @click="exportLearningFeedback">
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
                      <th>Appraisal Period</th>
                      <th>Training Title </th>
<!--                      <th>Training Type</th>-->
<!--                      <th>Training Date</th>-->
                      <th>Feedback</th>
                      <th>Total</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(list, i) in learning_lists" :key="list.ID" v-if="learning_lists.length">
                      <th>{{ ++i }}</th>
                      <td>{{ list.AppraisalPeriod }}</td>
                      <td>{{ list.TrainingTitle }}</td>
<!--                      <td>{{ list.TrainingType }}</td>-->
<!--                      <td>{{ list.TrainingDate }}</td>-->
                      <td>{{ list.Feedback }}</td>
                      <td>{{ list.Total }}</td>
                      <td>
                        <router-link :to="`feedback-details/${list.AppraisalPeriod}/${list.TrainingTitle}`" class="btn btn-info btn-sm"><i class="mdi mdi-printer"></i>Details</router-link>
                      </td>
                    </tr>
                    </tbody>
                  </table>
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
import {baseurl} from '../../../base_url'
import {Common} from "../../../mixins/common";
import {bus} from "../../../app";

export default {
  name: "List",
  mixins: [Common],
  data() {
    return {
      learning_lists:[],
      isMessage: false,
      editMode: false,
      isLoading: false,
    }
  },
  watch: {
    query: function (newQ, old) {
      if (newQ === "") {
        this.getAllLearningTransfer();
      }
    }
  },
  mounted() {
    document.title = 'Training Feedback List | Training Feedback';
    this.getAllLearningFeedback();

  },
  methods: {
    getAllLearningFeedback() {
      axios.get(baseurl + `api/mdp-period-wise-feedback/${this.$route.params.Period}`).then((response)=>{
        console.log(response);
        this.learning_lists = response.data.data;
      }).catch((error) => {

      })
    },
    reload() {
      this.query = "";
      this.getAllLearningFeedback();
    },

    exportLearningFeedback(){
      axios.get(baseurl + `api/mdp-period-wise-feedback/${this.$route.params.Period}`).then((response)=>{
        let dataSets = response.data.data;
        if (dataSets.length > 0) {
          let columns = Object.keys(dataSets[0]);
          columns = columns.filter((item) => item !== 'row_num');
          let rex = /([A-Z])([A-Z])([a-z])|([a-z])([A-Z])/g;
          columns = columns.map((item) => {
            let title = item.replace(rex, '$1$4 $2$3$5')
            return {title, key: item}
          });
          bus.$emit('data-table-import', dataSets, columns, 'MDP Training Feedback')
        }
      }).catch((error)=>{
        console.log(response)
      })
    },
  },
}
</script>

