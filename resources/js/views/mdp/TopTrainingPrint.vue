<template>
  <div class="content" id="top_training">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <h4>Top Ranked Training List</h4>
                <div class="first_part">
                  <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                    <thead>
                    <tr style="color: black">
                      <th>SN</th>
                      <th>Appraisal Period</th>
                      <th>Training Title</th>
                      <th>Ranked</th>
                      <th>No. of Requirement</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(training, i) in getAllTopRankedTraining" :key="training.TrainingTitle" v-if="getAllTopRankedTraining.length">
                      <th>{{ ++i }}</th>
                      <td>{{ training.AppraisalPeriod }}</td>
                      <td>{{ training.TrainingTitle }}</td>
                      <td class="text-right">{{ training.ranking }}</td>
                      <td class="text-right">{{ training.Total }}</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "TopTrainingPrint",
  data() {
    return {
      isLoading: false,
    }
  },
  computed: {
    getAllTopRankedTraining(){
      return this.$store.state.allTopRankedTrainingValue;
    },
  },
  mounted() {
    // setTimeout(function(){
    //   window.print()
    // },2000)

    $('#top_training').printThis({
      importCSS: true,
      loadCSS: "path/to/new/CSS/file",
    });
  },
}
</script>

<style scoped>

</style>