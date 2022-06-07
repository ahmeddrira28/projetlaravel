<template lang="">

<form @submit.prevent="modifierType">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" v-model="Type.nomtype">
 </div>
 <div class="form-group">
 <input type="file" class="form-control" placeholder="Image" @change="onFileChange" :files="'../storage/images/types/'+Type.imagetype">
</div>

 <button type="submit" class="btn btn-block btn-primary">Modifier Type</button></form>
</template>
<script>


export default {
   
 data() {
 return {
 Type:[]
 }
 },
 mounted (){
 this.getOneType() ;
 },
 methods: {

 modifierType(){
 const typ = {
 nomtype:this.Type.nomtype,
 imagetype:this.Type.imagetype
 }
 this.axios.put(`http://localhost:8000/api/types/${this.$route.params.id}`,typ)
 .then(() => {
 this.$router.push('/types')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.Type.imagetype =
"types/"+e.target.files[0].name;
 },
 getOneType(){
 this.axios
 .get(`http://localhost:8000/api/types/${this.$route.params.id}`)
 .then((res) => {
 this.Type = res.data;
 });
 }
 }
} 
</script>
<style lang="">

</style>