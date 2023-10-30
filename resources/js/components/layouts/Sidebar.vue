<template>
  <div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
      <div id="sidebar-menu">
        <ul class="metismenu" id="side-menu">
          <li class="menu-title">Main</li>
          <li>
            <router-link :to="{name : 'Dashboard'}" class="waves-effect"><i class="ti-home"></i> <span>Dashboard</span></router-link>
          </li>
          <li>
            <a href="javascript:void(0);" class="waves-effect">
              <i class="mdi mdi-clipboard-arrow-up-outline"></i>
              <span>Training<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
            </a>
            <ul class="submenu">
              <li><router-link :to="{name: 'MDPList'}" ><i class="mdi mdi-format-list-bulleted-type"></i>MDP List</router-link></li>
              <li v-if="EmpCode === 'admin'"><router-link :to="{name: 'TrainingFeedback'}" ><i class="mdi mdi-format-list-bulleted-type"></i>MDP Training Status</router-link></li>
              <li v-if="EmpCode === 'admin'"><router-link :to="{name: 'TrainingFeedback2nd'}" ><i class="mdi mdi-format-list-bulleted-type"></i>Training Feedback</router-link></li>
              <li v-if="EmpCode === 'admin'"><router-link :to="{name: 'AdditionalTraining'}" ><i class="mdi mdi-format-list-bulleted-type"></i>Additional Training</router-link></li>
              <li v-if="EmpCode === 'admin'"><router-link :to="{name: 'TopRankedTraining'}" ><i class="mdi mdi-format-list-bulleted-type"></i>Top Ranked Training</router-link></li>
              <li v-if="EmpCode === 'admin'"><router-link :to="{name: 'EmployeeIndividualTraining'}" ><i class="mdi mdi-format-list-bulleted-type"></i>Employee Individual Training</router-link></li>
              <li v-if="EmpCode === 'admin'"><router-link :to="{name: 'employeeWiseReport'}" ><i class="mdi mdi-format-list-bulleted-type"></i>Training Title Wise Employee List</router-link></li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0);" class="waves-effect">
              <i class="mdi mdi-clipboard-arrow-up-outline"></i>
              <span>Action Plan<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
            </a>
            <ul class="submenu">
              <li>
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
              <li>
                <router-link :to="{name: 'JobDescriptionList'}" ><i class="mdi mdi-floor-plan"></i>Job Description List</router-link>
              </li>
            </ul>
          </li>
          <li >
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
      EmpCode: '',
      isAdmin: false,
    }
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
        if (response.payload){
           this.EmpCode = response.payload.EmpCode;
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
  }
}
</script>
