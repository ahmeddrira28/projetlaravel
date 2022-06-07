<template lang="">

<form @submit.prevent="ajouterType">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" v-model="nomtype">
 </div>
 <div class="form-group">
      <FilePond max-files="1" @change="onFileChange"/>

 <input type="file" class="form-control" placeholder="Image" @change="onFileChange">
 </div>



 <button type="submit" class="btn btn-block btn-primary">Ajouter Types</button>
</form>
</template>
<script>
import vueFilePond from 'vue-filepond';
import 'filepond/dist/filepond.min.css';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
export default {
    components: {
 FilePond: vueFilePond(FilePondPluginImagePreview)
 }, 

 data() {
 return {
 nomtype: "",
 imagetype: "",
 }
 },
 methods: {

 ajouterType(){
 const ty = {
 nomtype:this.nomtype,
 imagetype:this.imagetype
 }
 this.axios.post("http://localhost:8000/api/types/",ty)
 .then(() => {
 this.$router.push('/types')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.imagetype = e.target.files[0].name;
 }
 }
}
</script>
<style lang="">

</style>
