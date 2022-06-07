<template>
 <div>

 <h2 class="text-center">Liste de Type</h2>

 <table class="table" id="example">
 <thead>
 <tr>
 <th>Nom Type</th>
 <th>Image</th>
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="ty in Types" :key="ty.id">
 <td>{{ty.nomtype}}</td>
 <td><img :src="'../storage/images/'+ty.imagetype" :alt=ty.nomtype width="70"></td>
 <td>
 <button @click.prevent="deleteType(ty.id)"
class="btn btn-danger">Delete</button>
 <router-link :to="{name: 'edittype', params: { id: ty.id }}" class="btn
btn-success">Modifier </router-link></td>
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
 Types: []
 }
 },
 mounted() {
 this.getTypes();
 },
 methods: {
 deleteType(id) {
 this.axios
 .delete(`http://localhost:8000/api/types/${id}`)
 .then(res => {
 console.log(res)
 this.getTypes();
 })
 
 .catch(error => {
 console.log(error)
 });


 },
 getTypes(){
 this.axios
 .get('http://localhost:8000/api/types/')
 .then(response => {
 this.Types = response.data;    
  $(function() {$('#example').DataTable();}); 

 });
 }
 
 }
 }
</script>