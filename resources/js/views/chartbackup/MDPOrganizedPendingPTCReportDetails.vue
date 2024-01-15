<template>
  <div class="content">
    <div class="container-fluid">
      <br>
      <br>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <div id="main" style="min-height:1000px"></div>
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
import {baseurl} from '../../base_url'
import {Common} from "../../mixins/common";
import {bus} from "../../app";
import Multiselect from 'vue-multiselect'
import * as echarts from 'echarts';
export default {
  name: "List",
  components: { Multiselect },
  mixins: [Common],
  data() {
    return {
      isLoading: false,
      ptc:[],
      key:[],
      values:[],
      title: '',
      total: 0,
    }
  },
  mounted() {
    document.title = 'MDP Chart | MDP'
  },

  created() {
    axios.get(baseurl + `api/mdp-organized-pending-ptc-details/${this.$route.params.Period}/${this.$route.params.Status}`).then((response)=>{
      console.log(response)
      response.data.ptc.forEach((getRecord, index) => {
        this.key.push(getRecord.TrainingTitle);
        this.values.push(getRecord.Total);
      })
      this.loadChart()
    });
  },
  methods: {
    loadChart(){
      let myChart = echarts.init(document.getElementById('main'));
      myChart.setOption({
        title: {
          text: 'Organized vs Pending PTC'
        },
        tooltip: {
          trigger: 'axis',
          axisPointer: {
            type: 'shadow'
          }
        },
        grid: {
          left: 0,
          right: 40,
          top: 35,
          bottom: 0,
          containLabel: true
        },
        legend: {},
        xAxis: {
          type: 'value',
          min: 0,
          max: 100
        },
        yAxis: {
          type: 'category',
          data: this.key
        },
        series: [
          {
            type: 'bar',
            data: this.values
          },
        ]
      });
      myChart.on('click', (params) =>{
        this.title = params.name;
        console.log('',this.title)
        this.$router.push({
          name: 'MDPOrganizedPendingPTCTitleWiseEmployee',
          params: { Title: this.title, Period: this.$route.params.Period, Status: this.$route.params.Status}
        });
      });
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
