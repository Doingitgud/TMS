<template>
  <table class="table">
     <thead class="table-header">
         <tr class="table-row">
             <th class="table-col">Id</th>
             <th class="table-col">Name</th>
             <th class="table-col">Password</th>
             <th class="table-col">Mobile</th>
             <th class="table-col">Address</th>
             <th class="table-col">Branch</th>
         </tr>
     </thead>
     <tbody>
         <tr v-for="admin in result" v-bind:key="admin.id">

             <td>{{ admin.id}}</td>
             <td>{{ admin.name}}</td>
             <td>{{ admin.password}}</td>
             <td>{{ admin.mobile }}</td>
             <td>{{ admin.address }}</td>
             <td>{{ admin.branch}}</td>
             <td>
                 <button type="button" class="button" @click="edit(admin)">Edit</button>
                 <button type="button" class="button" @click="remove(admin)">Delete</button>
             </td>
         </tr>

     </tbody>
 </table>

 <div class="wrapper">
     <form @submit.prevent="save">

         <label class="lc">Name</label>
         <input type="text" v-model="admin.name" class="ic" placeholder="Admin name">
         <label class="lc">Password</label>
         <input type="text" v-model="admin.password" class="ic" placeholder="Admin Password">
         <label class="lc">Number</label>
         <input type="text" v-model="admin.mobile" class="ic" placeholder="Admin mobile number ">
         <label class="lc">Address</label>
         <input type="text" v-model="admin.address" class="ic" placeholder="Branch location">
         <label class="lc">Branch</label>
         <input type="text" v-model="admin.branch" class="ic" placeholder="Branch location">
         <button type="submit" class="buttonSave">Save</button>

     </form>
 </div>


</template>

<script>
import axios from 'axios';

export default{
name:'Admin',
data() {
     return {
         result: {},
         admin: {
             id: '',
             name: '',
             password: '',
             mobile: '',
             address: '',
             branch: ''

         }
     }
 },
 created() {
     this.adminLoad();
 },
 mounted() {

 },
methods:{
 adminLoad() {
         var page = "http://127.0.0.1:8000/api/admin";
         axios.get(page)
             .then(
                 ({ data }) => {
                     console.log(data);
                     this.result = data;
                 }
             );
     },
     save() {
         if (this.admin.id == '') {
             this.saveData();
         }
         else {
             this.updateData();
         }

     },
     saveData() {
         axios.post("http://127.0.0.1:8000/api/admin/save", this.admin)
             .then(
                 ({ data }) => {
                     alert("A new administrator was hired!");
                     this.adminLoad();
                 }

             ).catch(error => {
                 console.log(error.response);
             });

     },
     updateData() {
         var editrecords = 'http://127.0.0.1:8000/api/admin/update/' + this.admin.id;
         axios.put(editrecords, this.admin)
             .then(
                 ({ data }) => {
                     this.id = '';
                     this.admin.name = '';
                     this.admin.password = '';
                     this.admin.mobile = '';
                     this.admin.address = '';
                     this.admin.branch='';
                     alert("Your admininstrator's info has been updated");
                     this.adminLoad();
                 }
             );

     },
     edit(admin) {
         alert("You are going to edit the administrator's info!");
         this.admin = admin;

     },
     remove(admin) {
         var url = 'http://127.0.0.1:8000/api/admin/delete/' + admin.id;
         axios.delete(url);
         alert("This administrator has been fired!");
         this.adminLoad();
     }



}//end of method scope



}
</Script>

<style src="@/assets/styles/driverStyles.css"/>