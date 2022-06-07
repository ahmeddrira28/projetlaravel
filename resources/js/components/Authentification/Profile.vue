<template>
 <div class="container">
 <header class="jumbotron">
 <h3>
 <strong>{{user}}</strong> Profile
 </h3>
 <button type="button" class="btn btn-success" @click="reRender()">Valider
l'accès</button> 

 </header>
 <p>
 <strong>Created At:</strong>
 {{user}}
 </p>
 <p>
 <strong>Email:</strong>
 {{user}}
 </p>
 </div>
</template>
<script>
const API_URL = 'http://localhost:8000/api/auth/';
export default {
 name: 'Profile',data(){
 return{
 user:{}
 }
 },
 methods: {
 currentUser() {
 let user = JSON.parse(localStorage.getItem('user'));
 console.log(user.token)
 return this.axios.get(API_URL + 'user-profile', { headers: {
Authorization: 'Bearer ' + user.token }})
 .then(response => (
 this.user=response.data
 ))
 .catch(err => console.log(err))
 },
 reRender(){
 this.$router.go()
 }, 

 },
mounted(){
 this.currentUser()
}

};
</script>