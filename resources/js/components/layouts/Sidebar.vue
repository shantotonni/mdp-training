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
              <span>MDP<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
            </a>
            <ul class="submenu">
              <li><router-link :to="{name: 'MDPList'}" ><i class="mdi mdi-format-list-bulleted-type"></i>MDP List</router-link></li>
              <li v-if="EmpCode === 'admin'"><router-link :to="{name: 'TrainingFeedback'}" ><i class="mdi mdi-format-list-bulleted-type"></i>MDP Training Status</router-link></li>
              <li v-if="EmpCode === 'admin'"><router-link :to="{name: 'AdditionalTraining'}" ><i class="mdi mdi-format-list-bulleted-type"></i>Additional Training</router-link></li>
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
          console.log(response)
           this.EmpCode = response.payload.EmpCode;
        }else {
          this.EmpCode ='';
        }
        this.$store.commit('me', response);
        //this.personal = response.personal
      }, (error) => {
        this.errorNoti(error);
      });
    },
  }
}
</script>
