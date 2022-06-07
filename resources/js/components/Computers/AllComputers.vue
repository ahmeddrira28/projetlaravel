<template>
 <div>
 <h2 class="text-center">Liste des ordinateurs </h2>

 <table class="table" id="example">
 <thead><th>Référence</th>
 <th>Ecran</th>
 <th>Processeur</th>
 <th>Ram</th>
 <th>Disque</th>
 <th>CarteGraphique</th>
 <th>prix</th>
 <th>imagecompetitf</th>
 <th>imagecomgrandf</th>
  <th>typeID</th>
  <th>marqueID</th>

 <th>Actions</th>

 </thead>
 <tbody>
 <tr v-for="p in Computers" :key="p.id">
 <td>{{p.Reference}}</td>
 <td>{{p.Ecran}}</td>
 <td>{{p.Processeur}}</td>
 <td>{{p.Ram}}</td>
 <td>{{p.Disque}}</td> 
 <td>{{p.CarteGraphique}}</td>
 <td>{{p.prix}}</td>
 

 <td>{{p.types.nomtype}}</td>
 <td>{{p.marques.nommarque}}</td>
 <td><img :src="p.imageartpetitf" :alt=p.Reference
width="100"></td>
 <td><div v-for="pg in JSON.parse(p.imageartgrandf)"
:key="pg"><img :src="pg" :alt=p.Reference width="70"></div></td>
 <td>
 <button @click.prevent="deleteComputer(p.id)" class="btn
btn-danger">Supprimer</button></td>
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
 Computers: [] }
 },
 mounted() {
 this.getComputers();
 },
 methods: {
 deleteComputer(id) {
 if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
 this.axios
 .delete(`http://localhost:8000/api/computers/${id}`)
 .then(res => {
 console.log(res)
 this.getComputers();
 })
 .catch(error => {
 console.log(error)
 });
 }
 },
 getComputers(){
 this.axios
 .get('http://localhost:8000/api/computers/')
 .then(response => {
 this.Computers = response.data;
 $(function() {$('#example').DataTable();});
 });
 }
 }
 }
</script>