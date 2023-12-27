<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Learning Transfer ']"/>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <div class="table-responsive">
                  <table
                      class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                    <thead>
                    <tr>
                      <th>SN</th>
                      <th>Training Title </th>
                      <th>Training Type</th>
                      <th>Training Date</th>
                      <th>Learning Transfer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(list, i) in learning_lists" :key="list.ID" v-if="learning_lists.length">
                      <th>{{ ++i }}</th>
                      <td>{{ list.TrainingTitle }}</td>
                      <td>{{ list.TrainingType }}</td>
                      <td>{{ list.TrainingDate }}</td>
                      <td>{{ list.LearningTransfer }}</td>
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
    document.title = 'Learning Transfer  List | Learning Transfer ';
    this.getAllLearningTransfer();

  },
  methods: {
    getAllLearningTransfer() {
      axios.get(baseurl + `api/mdp-period-wise-training/${this.$route.params.Period}`).then((response)=>{
        console.log(response);
        this.learning_lists = response.data.data;
      }).catch((error) => {

      })
    },
    reload() {
      this.query = "";
      this.getAllLearningTransfer();
    },
  },
}
</script>

