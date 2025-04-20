<template>
  <div class="content">
    <div class="container-fluid">
      <div class="page-title-box">
        <div class="row align-items-center">
          <div class="col-sm-12">
            <h4 class="page-title" style="font-size: 30px;color:rgb(49 118 225)">Connect</h4>
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" style="font-size: 20px;color:rgb(5 55 132)">
              MDP, Action Plan, Tax Certificate, Job Description
                <sub> <span id="dots">...</span>
                <span id="more"> <br>
                Management Development Plan (MDP) at ACI is an annual learning and development commitment made by each management staff,
                  recommended and cross checked by the Supervisor.
                  The plan will be executed during the particular fiscal year by
                  means of formal training programs & several self-initiatives to enable the employee for improved performance
                  in his present and future job responsibilities.</span>
                <span @click="mdpInfoDetails()" id="myBtn">Read more</span>
              </sub>
              </li>

            </ol>
          </div>
          <div class="col-md-12" style="display: -webkit-inline-box;margin-top: 80px">
            <div class="d-none d-md-block" style="margin: 0 auto">
                <router-link :to="{name: 'MDPList'}" class="btn btn-success" style="color: white">
                  <div style="padding: 5px 100px;">
                    <h4>MDP</h4>
                  Management Development Plan
                </div>
              </router-link>
            </div>
          </div>
          <div class="col-sm-12" style="display: -webkit-inline-box;margin-top: 5px">
            <div class="d-none d-md-block" style="margin: 0 auto">
              <router-link :to="{name: 'ActionPlanList'}" class="btn btn-success" style="color: white;padding: 22px">
                <div style="padding: 2px 130px;">
                  <h4>Action Plan</h4>
                </div>
              </router-link>
            </div>
          </div>
          <div class="col-sm-12" style="display: -webkit-inline-box;margin-top: 5px">
            <div class="d-none d-md-block" style="margin: 0 auto">
              <router-link :to="{name: 'TaxCertificate'}" class="btn btn-success" style="color: white;padding: 22px">
                <div style="padding: 2px 113px;">
                  <h4>Tax Certificate</h4>
                </div>
              </router-link>
            </div>
          </div>
          <div class="col-sm-12" style="display: -webkit-inline-box;margin-top: 5px">
            <div class="d-none d-md-block" style="margin: 0 auto">
              <router-link :to="{name: 'JobDescriptionList'}" class="btn btn-success" style="color: white;padding: 22px">
                <div style="padding: 2px 108px;">
                  <h4>Job Description</h4>
                </div>
              </router-link>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-sm-12">
<!--          <p style="font-size:16px;color:#0a6aff">-->
<!--            Management Development Plan (MDP) at ACI is an annual learning and development commitment made by each management staff, recommended and cross checked by the Supervisor.-->
<!--            The plan will be executed during the particular fiscal year by means of formal training programs & several self-initiatives to enable the employee for improved performance in his present and future job responsibilities.-->
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
      isLoading: true,
      mdpDetails:false
    }
  },
  created() {
    // this.getData();
  },
  methods: {
    mdpInfoDetails(){
      let dots = document.getElementById("dots");
      let moreText = document.getElementById("more");
      let btnText = document.getElementById("myBtn");

      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
      }
    },
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
#more {display: none;}
</style>
