<template>
  <div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
      <div id="sidebar-menu">
        <ul class="metismenu" id="side-menu">
          <li class="menu-title">Main</li>
          <li @click="hideSideBar()">
            <router-link :to="{name : 'Dashboard'}" class="waves-effect"><i class="ti-home"></i> <span>Connect</span></router-link>
          </li>
          <li>
            <a href="javascript:void(0);" class="waves-effect">
              <i class="mdi mdi-clipboard-arrow-up-outline"></i>
              <span>Training<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
            </a>
            <ul class="submenu">
              <li @click="hideSideBar()"><router-link :to="{name: 'MDPList'}" ><i class="mdi mdi-format-list-bulleted-type"></i>MDP List</router-link></li>
              <li @click="hideSideBar()" v-if="EmpCode === 'Admin'"><router-link :to="{name: 'TrainingFeedback'}" ><i class="mdi mdi-format-list-bulleted-type"></i>MDP Training Status</router-link></li>
<!--              <li v-if="EmpCode === 'admin'"><router-link :to="{name: 'TrainingFeedback2nd'}" ><i class="mdi mdi-format-list-bulleted-type"></i>Training Feedback</router-link></li>-->
              <li @click="hideSideBar()" v-if="EmpCode === 'admin'"><router-link :to="{name: 'AdditionalTraining'}" ><i class="mdi mdi-format-list-bulleted-type"></i>Additional Training</router-link></li>
              <li @click="hideSideBar()" v-if="EmpCode === 'admin'"><router-link :to="{name: 'TopRankedTraining'}" ><i class="mdi mdi-format-list-bulleted-type"></i>Top Ranked Training</router-link></li>
              <li @click="hideSideBar()" v-if="EmpCode === 'admin'"><router-link :to="{name: 'EmployeeIndividualTraining'}" ><i class="mdi mdi-format-list-bulleted-type"></i>Employee Individual Training</router-link></li>
              <li @click="hideSideBar()" v-if="EmpCode === 'admin'"><router-link :to="{name: 'employeeWiseReport'}" ><i class="mdi mdi-format-list-bulleted-type"></i>Training Title Wise Employee List</router-link></li>
            </ul>
          </li>
          <li v-if="EmpCode === 'admin'">
            <a href="javascript:void(0);" class="waves-effect">
              <i class="mdi mdi-twitch"></i>
              <span>Report<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
            </a>
            <ul class="submenu">
              <li @click="hideSideBar()">
                <router-link :to="{name: 'ApprovedMDPStatusReport'}" ><i class="mdi mdi-floor-plan"></i>MDP Approved List Report</router-link>
                <router-link :to="{name: 'PendingMDPStatusReport'}" ><i class="mdi mdi-floor-plan"></i>MDP Pending List Report</router-link>
                <router-link :to="{name: 'NotSubmittedMDPStatusReport'}" ><i class="mdi mdi-floor-plan"></i>Not Submitted MDP List Report</router-link>
                <router-link :to="{name: 'MDPChartReport'}" ><i class="mdi mdi-floor-plan"></i>MDP Echart Report</router-link>
                <router-link :to="{name: 'PendingPTCReport'}" ><i class="mdi mdi-floor-plan"></i>Pending PTC Report</router-link>
                <router-link :to="{name: 'ApprovedPTCReport'}" ><i class="mdi mdi-floor-plan"></i>Approved PTC Report</router-link>
                <router-link :to="{name: 'TotalReport'}" ><i class="mdi mdi-floor-plan"></i>Total Report</router-link>

              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0);" class="waves-effect">
              <i class="mdi mdi-clipboard-arrow-up-outline"></i>
              <span>Action Plan<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
            </a>
            <ul class="submenu">
              <li @click="hideSideBar()">
                <router-link :to="{name: 'ActionPlanList'}" ><i class="mdi mdi-floor-plan"></i>Action Plan</router-link>
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript:void(0);" class="waves-effect">
              <i class="mdi mdi-twitch"></i>
              <span>Job Description<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
            </a>
            <ul class="submenu">
              <li @click="hideSideBar()">
                <router-link :to="{name: 'JobDescriptionList'}" ><i class="mdi mdi-floor-plan"></i>Job Description List</router-link>
              </li>
            </ul>
          </li>
          <li v-if="Type === 'sepadmin'">
            <a href="javascript:void(0);" class="waves-effect">
              <i class="mdi mdi-twitch"></i>
              <span>SEP Automation<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
            </a>
            <ul class="submenu">
              <li @click="hideSideBar()">
                <router-link :to="{name: 'SEPPortfolio'}" ><i class="mdi mdi-floor-plan"></i>SEP Portfolio List</router-link>
              </li>
              <li @click="hideSideBar()">
                <router-link :to="{name: 'SEPDepartment'}" ><i class="mdi mdi-floor-plan"></i>SEP Department List</router-link>
              </li>
              <li @click="hideSideBar()">
                <router-link :to="{name: 'SEPDesignation'}" ><i class="mdi mdi-floor-plan"></i>SEP Designation List</router-link>
              </li>
              <li @click="hideSideBar()">
                <router-link :to="{name: 'SEPAutomation'}" ><i class="mdi mdi-floor-plan"></i>SEP Automation List</router-link>
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript:void(0);" class="waves-effect">
              <i class="mdi mdi-clipboard-arrow-up-outline"></i>
              <span>Tax Certificate<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
            </a>
            <ul class="submenu">
              <li @click="hideSideBar()">
                <router-link :to="{name: 'TaxCertificate'}" ><i class="mdi mdi-floor-plan"></i>Tax Certificate</router-link>
              </li>
              <li @click="hideSideBar()">
                <router-link :to="{name: 'TaxReturnAcknowledgement'}" ><i class="mdi mdi-checkbox-multiple-marked-outline"></i>Tax Return Acknowledgement</router-link>
              </li>
              <li @click="hideSideBar()" v-if="EmpCode === 'admin'">
                <router-link :to="{name: 'TaxReturnAcknowledgementReport'}" ><i class="mdi mdi-table-large"></i>Tax Return Acknowledgement Report</router-link>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0);" class="waves-effect">
              <i class="mdi mdi-format-list-numbered"></i>
              <span>Idea Hub<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
            </a>
            <ul class="submenu">
              <li @click="hideSideBar()">
                <router-link :to="{name: 'IdeaSubmissionForm'}" ><i class="mdi mdi-floor-plan"></i>Idea Submission</router-link>
              </li>
              <li @click="hideSideBar()">
                <router-link :to="{name: 'IdeaHub'}" ><i class="mdi mdi-checkbox-multiple-marked-outline"></i>Ideas</router-link>
              </li>
            </ul>
          </li>

          <li v-if="EmpCode === 'admin'">
            <a href="javascript:void(0);" class="waves-effect">
              <i class="mdi mdi-clipboard-arrow-up-outline"></i>
              <span>Admin User<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
            </a>
            <ul class="submenu">
              <li>
                <router-link :to="{name: 'UserList'}" ><i class="mdi mdi-floor-plan"></i>User List</router-link>
              </li>
            </ul>
          </li>

        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</template>
<script>
import {Common} from "../../mixins/common";
export default {
  mixins: [Common],
  data(){
    return {
      user_menu:[],
      EmpCode:'',
      Type:'',
      isAdmin: false,
    }
  },
  created() {
    //
  },
  mounted() {
    setTimeout(()=>{
      $("#side-menu").metisMenu();
    },1000);
    this.getData();
  },
  methods:{
    getData() {
      this.axiosPost('me', {}, (response) => {
        console.log(response.payload.EmpCode)
        if (response.payload){
           this.EmpCode = response.payload.EmpCode;
           this.Type = response.payload.Type;
        }else {
          this.EmpCode ='';
        }
        this.$store.commit('me', response);
      }, (error) => {
        localStorage.removeItem('token');
        this.redirect(this.mainOrigin + 'login')
        //this.errorNoti(error);
      });
    },
    hideSideBar() {
      if (window.innerWidth <= 768) {
        setTimeout(() => {
          document.body.classList.add('enlarged');
        }, 100);
      }
    }
  }
}
</script>
