<template lang="">

<form @submit.prevent="ajouterMarque">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" v-model="nommarque">
 </div>
 <div class="form-group">
 <FilePond max-files="1" @change="onFileChange"/>
</div>
 <div class="form-group">
 Type
 <select class="form-control" v-model="typeID">
 <option v-for="ty in Types" :key="ty.id" :value="ty.id">{{ty.nomtype}}</option>
 </select>
 </div>
<button type ="submit" class="btn btn-block btn-primary">Ajouter Marque
</button>
</form>
</template>
<script>
import vueFilePond from 'vue-filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

// Import styles
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

// Create FilePond component
export default {
 components: {
 FilePond: vueFilePond(FilePondPluginImagePreview)
 },
 data() {
 return {
 nommarque: "",
 imagemarque: "",
 typeID:"",
 Types:[]
 }
 },
 methods: {

 ajouterMarque(){
 const ma = {
 nommarque:this.nommarque,
 imagemarque:this.imagemarque,
 typeID:this.typeID
 }
 this.axios.post("http://localhost:8000/api/marque",ma)
 .then(() => {
 this.$router.push('/marque')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.imagemarque = "marque/"+e.target.files[0].name;
 },
 getTypes(){
 this.axios.get('http://localhost:8000/api/types').then(res =>
{
 this.Types = res.data;
 }).catch(error => {
 console.log(error)
 });
 }

 },
 created() {
 this.getTypes();
 }
}
</script>
<style lang="">

</style>