<template>
<div>
    Output:{{number}}
    <button @click="clickMe()">click one</button>
    <button  @dblclick="doubleClickMe()">double click</button>
</div>
</template>

<script>
export default {
  data(){
      return{
         number:10,
      };
      
  },
  methods:{
     clickMe(){
         this.number++;
     },
     doubleClickMe(){
       
        this.number=this.number+10;
     },

  }, 
}
</script>