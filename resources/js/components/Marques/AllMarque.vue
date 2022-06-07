<template>
 <div>

 <h2 class="text-center">Liste des marques</h2>

 <table class="table" id="example">
 <thead>
 <tr>
 <th>Nom Marques</th>
 <th>Image</th>
 <th>Type</th>
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="marq in Marque" :key="marq.id">
 <td>{{marq.nommarque}}</td>
 <td><img :src="'../storage/images/'+marq.imagemarque" :alt=marq.nomtype width="100"></td>
 <td>{{marq.types.nomtype}}</td>
 <td><button @click.prevent="deleteMarque(marq.id)"
class="btn btn-danger">Supprimer</button></td>
<router-link :to="{name: 'editMarque', params: { id: marq.id }}"
class="btn btn-success">Modifier
 </router-link> 
 </tr>
 </tbody>
 </table>
 </div>
</template>

<script>
//Bootstrap and jQuery libraries
import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery/dist/jquery.min.js';
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import $ from 'jquery';
 export default {
 data() {
 return {
 Marque: [],
 Type:[]

 }
 },
 mounted() {
 this.getMarque();

 },
 methods: {
 deleteMarque(id) {
 if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
 this.axios
 .delete(`http://localhost:8000/api/marque/${id}`)
 .then(res => {
 console.log(res)
 this.getMarque();
 })
 .catch(error => {
 console.log(error)
 });
 }
 },
 getMarque(){
 this.axios
 .get('http://localhost:8000/api/marque/')
 .then(res => {
 this.Marques= res.data;
 console.log(this.Marques)
 $(function() {$('#example').DataTable();});
 });

 }
 }
 }
</script>
