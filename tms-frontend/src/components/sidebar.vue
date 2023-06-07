<template>
   <div class="sidebar">
      <div class="title">
         Truck Management System
      </div>
      <div class="menu-items">
         <router-link to="/home" active-class="active"  exact tag="button"  class="side-btn">
            <div class="link-container">
               Home
            </div>
         </router-link>
         <router-link to="/admin" active-class="active"  exact tag="button"  class="side-btn">
            <div class="link-container">
               Admin
            </div>
         </router-link>
         <router-link to="/tasks" active-class="active" exact tag="button"  class="side-btn">
            <div class="link-container">
               Tasks
            </div>
         </router-link>
         <router-link to="/vehicles" active-class="active" exact tag="button"  class="side-btn">
            <div class="link-container">
               Vehicle
            </div>
         </router-link>
         <router-link to="/drivers" active-class="active" exact tag="button"  class="side-btn">
            <div class="link-container">
               Drivers
            </div>
         </router-link>
        

      </div>

   </div>
</template>
    
<script>
export default {
   name: "sidebar",
}
</script>
    
    
<style scoped>
.title{
   color: white;
   font-size: 24px;
   margin-top: 10px;
}
.menu-items{
   display: flex;
   flex-direction: column;
   margin-top: 40px;
}
.menu-items > *{
   margin-top: 60px;
}
.side-btn:focus{
   outline: none;
}
.side-btn{
   border: none;
   padding: 15px 0px;
   cursor: pointer;
   font-size: 15px;
   color: white;
   background-color: transparent;
}
.side-btn.active{
   position: relative;
   background-color: white;
   color: teal;
   font-weight: 500;
}

a { text-decoration: none;
 }

</style>