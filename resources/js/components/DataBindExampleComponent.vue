<template>
    <div>
        <form>
            <div class="form-group">
              <label><a v-bind:href="link">This is the link</a></label>
              <input :value="name" type="text" class="form-control">
            </div>
            <div v-html="websiteTag" class="form-group">

            </div>
        </form>
    </div>
</template>

<script>
export default {
   data(){

       return {
          name:"juma",
          link:"www.google.com",
          websiteTag:"<input  type='text' class='form-control'>",
      };
   }  
}
</script>