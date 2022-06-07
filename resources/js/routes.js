import { createRouter,createWebHashHistory } from 'vue-router'
import Home from "./Home";
import AllTypes from "./components/Types/AllTypes"; 
import AddType from "./components/Types/AddType"; 
import EditType from "./components/Types/EditType"; 
import AllMarque from "./components/Marques/AllMarque"; 
import AddMarque from "./components/Marques/AddMarque"; 
import EditMarque from "./components/Marques/EditMarque"; 
import AllComputers from "./components/Computers/AllComputers"; 
import Register from './components/Authentification/Register.vue';
import Login from './components/Authentification/Login.vue';
import Profile from './components/Authentification/Profile.vue'; 
import Logout from './components/Authentification/Logout.vue'; 

const routes = [
 {
 path: '/',
 name: 'home',
 component: Home
 },
 {
 path: '/types',
 name: 'types',
 component: AllTypes
 },
 {
  path: '/addtype',
  name: 'addtype',
  component: AddType
  },
  {
    path: '/edittype', 
    name: 'edittype',
    component: EditType
    },{
      path: '/marque',
      name: 'marque',
      component: AllMarque
      }, {
        path: '/addMarque',
        name: 'addMarque',
        component: AddMarque
        }, 
        {
          path: '/editmarque',
          name: 'editmarque',
          component: EditMarque
          },{
            path: '/computers',
            name: 'computers',
            component: AllComputers
            }, 
            {
              name: 'register',
              path: '/register',
              component: Register
              },
              {
              name: 'login',
              path: '/login',
              component: Login
              },
              {
              name: 'profile',
              path: '/profile',
              component: Profile },{
 name: 'logout',
 path: '/logout',
 component: Logout
 }, 

 ];
const router = createRouter({
 history: createWebHashHistory(),
 routes
 })

export default router 