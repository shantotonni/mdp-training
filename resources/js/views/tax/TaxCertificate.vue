<template>
  <div class="content" id="mdp">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <div style="position: fixed;top: 0;display: flex">
                  <div><img :src="`${mainOrigin}logo/logo.png`" style="height: 80px;" alt="user" class="rounded-circle" /></div>
                </div>
                <div>Content</div>
                <div style="position: fixed;bottom: 00px;">
                  <p style="margin: 0;font-size: 16px">Head Office: 245 Tejgaon Industrial Area, Dhaka 1208, Bangladesh. Telephone: (8802) 887 8603, Fax - (8802) 8878619, 8878626</p>
                  <p style="margin: 0;font-size: 13px">Factory: 7 Hajeegonj Road, Godnyl, Narayangonj, Bangladesh,Telephone: -PABX-7630493, 7630496, 7630525, FAX - 880-2-7630524 & HO PABX 280, 281, 282, 283</p>
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
import {baseurl} from '../../base_url'
import printJS from 'print-this'
export default {
  name: "List",
  data() {
    return {
      mdplist: [],
      isMessage : false,
      isLoading: false,
    }
  },
  created() {
    // axios.get(baseurl + `api/mdp/print/${this.$route.params.ID}`).then((response)=>{
    //   this.mdplist = response.data.data
    //   this.initiative = response.data.data.initiative
    //   this.training = response.data.data.training
    //   this.Area = response.data.data.area
    //
    // });
  },
  mounted() {
    $('#mdp').printThis({
      importCSS: true,
      loadCSS: "path/to/new/CSS/file",
    });
  },
  methods: {
    loadSignature(signature){
      return baseurl + "/signature/" + signature;
    }
  },
}
</script>
<style scoped>
.header {

}
.footer {

}
</style>

