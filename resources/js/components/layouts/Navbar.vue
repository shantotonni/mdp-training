<template>
  <div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
      <router-link :to="{name : 'Dashboard'}" class="logo" style="color: white!important;font-size: 14px!important;">
        <span><img src="assets/images/logo.png" alt="" height="60" /> </span><i><img src="assets/images/logo-sm.png" alt="" height="35" /></i>
      </router-link>
    </div>
    <nav class="navbar-custom">
      <ul class="navbar-right list-inline float-right mb-0">
        <li class="dropdown notification-list list-inline-item">
          <div class="dropdown notification-list nav-pro-img">
            <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <img :src="`${mainOrigin}assets/images/avatar.png`" alt="user" class="rounded-circle" />
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
              <!-- item-->
<!--              <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>-->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="javascript:void(0)" @click="logout"><i class="mdi mdi-power text-danger"></i> Logout</a>
            </div>
          </div>
        </li>
      </ul>
      <ul class="navbar-right list-inline float-right mb-0">
        <li class="dropdown notification-list list-inline-item">
          <div class="dropdown notification-list nav-pro-img">
            <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              {{ Name ? Name: 'Admin' }}
            </a>
          </div>
        </li>
      </ul>
      <ul class="list-inline menu-left mb-0">
        <li class="float-left">
          <button class="button-menu-mobile open-left waves-effect" @click="toggleSidebar"><i class="mdi mdi-menu"></i></button>
        </li>
      </ul>
    </nav>
  </div>
</template>
<script>
import {Common} from '../../mixins/common'
export default {
  mixins: [Common],
  data() {
    return {
      image: '',
      Name: ''
    }
  },
  created() {
    this.getData();
  },
  methods: {
    toggleSidebar(e) {
      console.log("testtt")
      $("body").toggleClass("enlarged")
    },
    getData() {
      this.axiosPost('me', {}, (response) => {
        this.image = `${this.mainOrigin}assets/images/avatar.png`;
        this.$store.commit('me', response);
        if (response.payload.Name){

          this.Name =response.payload.Name
        }else {
          this.Name = ''
        }

      }, (error) => {
        this.errorNoti(error);
      });
    },
    logout() {
      this.axiosPost("logout", {}, (response) => {
            localStorage.setItem("token", "");
            this.$router.push(this.mainOrigin + "login");
            //this.successNoti(response.message)
          },
          (error) => {
            this.errorNoti(error);
          }
      );

    }
  }
}
</script>
<style scoped>
.topbar .topbar-left .logo {
   line-height: 30px;
}
</style>
