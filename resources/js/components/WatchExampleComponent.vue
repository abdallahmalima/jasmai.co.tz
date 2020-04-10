<template>

<form>
  <div class="form-group">
   
    <input type="email" v-model="num1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">{{mpya}}</small>
  </div>
  <div class="form-group">
   
    <input type="email" v-model="num2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">{{mpya}}</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">{{num3}}</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</template>

<script>
    export default {
        data:function(){
            return{
               num3:0,
               num1:0,
               num2:0,
            };
           
        },
        mounted() {
            console.log('Component mounted.')
        },

        watch:{
          num1:function(newval){
           
              this.num3=parseInt(this.num2)*parseInt(newval)
          },
          num2:function(newval){
              this.num3=parseInt(this.num1)*parseInt(newval)
          }
        }
    }
</script>
