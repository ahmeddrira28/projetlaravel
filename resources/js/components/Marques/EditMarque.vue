<template lang="">
<form @submit.prevent="modifierMarque">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" v-model="Marque.nommarque">
 </div>
 <div class="form-group">
 <FilePond max-files="1" @change="onFileChange"
:files="'../storage/images/'+Marque.imagemarque"/>
</div>
 <div class="form-group">
 Marques<select class="form-control" v-model="Marque.typeID">

 <option v-for="c in Type" :key="c.id"
:value="c.id">{{c.nomtype}}</option>
 </select>
 </div>
 <button type="submit" class="btn btn-block btn-primary">Modifier Marque</button>
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
 Marques:[],
 Types:[]
 }
 },
 methods: {

 modifierMarque(){
 const scateg = {
 nommarque:this.Marques.nommarque,
 imagemarque:this.Marques.imagemarque,
 typeID:this.Marques.typeID }
 this.axios.put(`http://localhost:8000/api/marques/${this.$route.params.id}`,scateg)
 .then(() => {
 this.$router.push('/marques')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.Marques.imagemarque =
"marques/"+e.target.files[0].name;
 },
 getTypes(){
 this.axios.get('http://localhost:8000/api/type').then(res =>
{
 this.Types = res.data;
 }).catch(error => {
 console.log(error)
 });
 },

 getOneMarques(){
 this.axios
 .get(`http://localhost:8000/api/marques/${this.$route.params.id}`)
 .then((res) => {
 this.Marques = res.data;
 console.log(this.Marques)
 });
 }

 },
 created() {
 this.getTypes();
 this.getOneMarques();
 }
}
</script>
<style lang="">

</style>