<template>
 <div class="container">
<Menu /> 

 <nav class="navbar navbar-dark bg-dark">
 <a class="navbar-brand float-left">
 <router-link class="nav-link" to="/register"> Authentification
</router-link>
 </a>
 </nav>


<router-view> </router-view>

 </div>
</template>

<script>
import Menu from './Menu'
 export default {
 components: {
 Menu
 },
 data (){
 return {
 token : ""
 }
 },
 created(){
 if ((localStorage.getItem('user'))) {
 let user = JSON.parse(localStorage.getItem('user'));
 console.log(user)
 this.token=user.user;

 }

 }
 }
</script>
