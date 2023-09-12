<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Top Ranked Training']"/>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <select id="sessionP" class="form-control" v-model="sessionP">
                            <option value="">Select Session</option>
                            <option v-for="(session,index) in sessions" :value="session.Name" :key="index">{{session.Name}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Enter Top number" v-model="top">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <button type="submit" @click="getTopRankedTraining" class="btn btn-success"><i class="mdi mdi-filter"></i>Filter</button>
                        <button type="submit" @click="getTopRankedTrainingExport" class="btn btn-success"><i class="mdi mdi-database-export"></i>Export</button>
                        <button type="submit" @click="getTopRankedTrainingPrint" class="btn btn-success"><i class="mdi mdi-printer"></i>Print</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                    <thead>
                    <tr>
                      <th>SN</th>
                      <th>Appraisal Period</th>
                      <th>Training Title</th>
                      <th>Ranked</th>
                      <th>No. of Requirement</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(training, i) in top_training" :key="training.TrainingTitle" v-if="top_training.length">
                      <th>{{ ++i }}</th>
                      <td>{{ training.AppraisalPeriod }}</td>
                      <td>{{ training.TrainingTitle }}</td>
                      <td class="text-right">{{ training.ranking }}</td>
                      <td class="text-right">{{ training.Total }}</td>
                    </tr>
                    </tbody>
                  </table>
                  <br>
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
import {baseurl} from "../../base_url";
import {Common} from "../../mixins/common";
import {bus} from "../../app";

export default {
  name: "TopRankedTraining",
  mixins: [Common],
  data() {
    return {
      top_training: [],
      sessions: [],
      isLoading: false,
      sessionP: '',
      top: '100',
    }
  },
  mounted() {
    document.title = 'Top Ranked Training List | MDP';
    this.getAllSession();
  },
  methods: {
    getTopRankedTraining(){
      axios.get(baseurl + 'api/mdp/get-top-ranked-training?sessionP='+ this.sessionP
          + "&top=" + this.top
      ).then((response)=>{
        this.top_training = response.data.top_training;
      }).catch((error)=>{

      })
    },
    getAllSession(){
      axios.get(baseurl + 'api/get-all-session/').then((response) => {
        this.sessions = response.data.sessions;
      }).catch((error) => {

      })
    },
    getTopRankedTrainingExport(){
      axios.get(baseurl + 'api/mdp/get-top-ranked-training?sessionP='+ this.sessionP
          + "&top=" + this.top
      ).then((response)=>{
        let dataSets = response.data.top_training;
        if (dataSets.length > 0) {
          let columns = Object.keys(dataSets[0]);
          columns = columns.filter((item) => item !== 'row_num');
          let rex = /([A-Z])([A-Z])([a-z])|([a-z])([A-Z])/g;
          columns = columns.map((item) => {
            let title = item.replace(rex, '$1$4 $2$3$5')
            return {title, key: item}
          });
          bus.$emit('data-table-import', dataSets, columns, 'Top Ranked Training List')
        }
      }).catch((error)=>{
      })
    },

    getTopRankedTrainingPrint(){
      let topTraining = this.top_training;
      this.$store.commit('topTraining', topTraining);
      this.$router.push({name: 'TopTrainingPrint'})
    },
  }
}
</script>

<style scoped>

</style>