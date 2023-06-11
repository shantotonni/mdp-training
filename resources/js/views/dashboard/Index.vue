<template>
  <div class="content">
    <div class="container-fluid">
      <div class="page-title-box">
        <div class="row align-items-center">
          <div class="col-sm-6">
            <h4 class="page-title" style="font-size: 30px">Dashboard</h4>
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" style="font-size: 26px;color:rgb(10, 106, 255)">Welcome to Management Development Plan for 2023-2024</li>
            </ol>
          </div>
          <div class="col-sm-12" style="display: -webkit-inline-box;margin-top: 80px">
            <div class="d-none d-md-block" style="margin: 0 auto">
              <router-link :to="{name: 'MDPCreate'}" class="btn btn-success" style="color: white;padding: 22px">
                <i class="fas fa-plus"></i>
                Click To Fillup The Management Development Plan
              </router-link>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-sm-12">
          <p style="font-size:16px;color:#0a6aff">
            Management Development Plan (MDP) at ACI is an annual learning and development commitment made by each management staff, recommended and cross checked by the Supervisor.
            The plan will be executed during the particular fiscal year by means of formal training programs & several self-initiatives to enable the employee for improved performance in his present and future job responsibilities.
          </p>
<!--          <h4>What is Management Development Plan (MDP)? </h4>-->
<!--          <p>Organizations employ a comprehensive framework called a management development plan (MDP) to improve the knowledge and skills of their managers.-->
<!--            It is a methodical way to enhancing people's leadership and management skills; it is frequently employed in succession planning and career advancement.</p>-->
<!--          <p>-->
<!--            An MDP often involves a determination of the person's development priorities as well as an evaluation of their strengths and limitations.-->
<!--            The plan includes a series of goals and objectives, as well as the particular activities and resources that will be employed to attain them, based on this assessment.-->
<!--            Timelines, milestones, and performance indicators may also be included in the plan to track development and success.-->
<!--          </p>-->
<!--          <p>-->
<!--            MDPs can contain a range of learning and growth opportunities, including coaching, mentoring, work shadowing and Training.-->
<!--          </p>-->
<!--          <br>-->
<!--          <h4>Why need MDP? </h4>-->
<!--          <p>Management Development Plans (MDPs) are necessary for organizations for a number of reasons:</p>-->
<!--          <p>-->
<!--            Improve the leadership and management capabilities of their managers with MDPs: Organizations can improve the skills and competences of their managers using MDPs.-->
<!--            This is especially crucial in the fast-paced business climate of today, when managers must be flexible and able to handle challenging circumstances.-->
<!--          </p>-->
<!--          <p>-->
<!--            personnel attraction and retention: Offering possibilities for both personal and professional growth through MDPs can be a key element in luring and keeping top personnel.-->
<!--            People are more likely to stick with a company that supports their growth and offers prospects for promotion.-->
<!--          </p>-->
<!--          <p>-->
<!--            Boost productivity and performance: Managers with access to MDPs are better prepared to handle the demands of their jobs and deliver top-tier performance.-->
<!--          </p>-->
        </div>
      </div>
    </div>
    <!-- container-fluid -->
  </div>
</template>
<script>
import {Common} from "../../mixins/common";

export default {
  mixins: [Common],
  data() {
    return {
      isLoading: true
    }
  },
  created() {
    // this.getData();
  },
  methods: {
    getData() {
      // this.axiosGet('dashboard-data', (response) => {
      //    this.total_pending = response.total_pending;
      //    this.todays_order = response.todays_order;
      //    this.todays_amount = response.todays_amount;
      //    this.total_order = response.total_order;
      this.isLoading = false;
      // }, (error) => {
      //   this.errorNoti(error);
      // });
    }
  }
}
</script>


<style scoped>
.bg-blue {
  background: #626ed4!important;
  text-align: center;
  text-transform: uppercase;
}
.card-body {
  padding: 0.60rem !important;
}
.bg-blue span {
  font-size: 18px;
}
.task {
  background: #ff8c5e42;
  padding: 5px 8px;
  font-size: 14px;
  margin-bottom: 10px;
  border-radius: 5px;
  font-weight: bold;
}
.links {
  /*height: 148px;*/
}
.helpline {
  height: 120px;
  text-align: center;
  position: relative;
  background-image: linear-gradient(180deg,#ff8c5e8c,#ff8c5e47);
}
.helpline span {
  position: absolute;
  top: 40%;
  left: 0;
  right: 0;
  font-weight: bold;
  font-size: 20px;
  text-transform: uppercase;
  color: #2233c4;
}
.contact {
  height: 120px;
  text-align: center;
  padding-top: 20px;
  background-image: linear-gradient(180deg,#ff8c5e8c,#ff8c5e47);
}
.contact p {
  margin: 0;
  padding: 2px;
  font-weight: bold;
}
.header-bg {
  text-align: center;
  font-size: 16px;
  font-weight: bold;
  text-transform: uppercase;
}
</style>
