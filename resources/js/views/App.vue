<template>
<!--    <router-view/>-->
  <div><router-view/></div>
</template>
<script>
export default {
    data(){
        return{

        }
    },
    created() {
      $("body").toggleClass("enlarged");
      console.log(34);
    },
}
</script>
