<template>
    <div id="test">

    <h1>Retour: {{ displayMsg  }}</h1>
    </div>
</template>
<script>
import axios from 'axios'


export default{

data:()=>({
displayMsg:""
}),
 
methods:{

},
async created(){
 let header= {"Authorization": localStorage.getItem('token')};
let ok = await axios.get(
      "http://localhost:15000/test.php",
         {headers: header}  
   
    );
    console.log(ok)
    
 this.displayMsg = ok.data;
}
}
</script>


<style>
#test{
    color: black;
}
</style>