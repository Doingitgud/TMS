<template>
     <table class="table">
        <thead class="table-header">
            <tr class="table-row">
                <th class="table-col">Id</th>
                <th class="table-col">Model</th>
                <th class="table-col">License Number</th>
                <th class="table-col">Current driver</th>
                <th class="table-col">Mileage</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="vehicle in result" v-bind:key="vehicle.id">

                <td>{{ vehicle.id }}</td>
                <td>{{ vehicle.model }}</td>
                <td>{{ vehicle.licence_plate_number }}</td>
                <td>{{ vehicle.current_driver }}</td>
                <td>{{ vehicle.status}}</td>
                <td>
                    <button type="button" class="button" @click="edit(vehicle)">Edit</button>
                    <button type="button" class="button" @click="remove(vehicle)">Delete</button>
                </td>
            </tr>

        </tbody>
    </table>

    <div class="wrapper">
        <form @submit.prevent="save">

            <label class="lc">Vehicle Model</label>
            <input type="text" v-model="vehicle.model" class="ic" placeholder="Vehicle model">
            <label class="lc">License Number</label>
            <input type="text" v-model="vehicle.licence_plate_number" class="ic" placeholder="License Number">
            <label class="lc">Current Driver</label>
            <input type="text" v-model="vehicle.current_driver" class="ic" placeholder="Current Driver Running this vehicle">
            <label class="lc">Status</label>
            <input type="text" v-model="vehicle.status" class="ic" placeholder="Mileage Status">
            <button type="submit" class="buttonSave">Save</button>

        </form>
    </div>


 </template>
 
 <script>
 import axios from 'axios';

 export default{
 name:'Vehicles',
  data() {
        return {
            result: {},
            vehicle: {
                id: '',
                model: '',
                licence_plate_number: '',
                current_driver: '',
                status: ''

            }
        }
    },
    created() {
        this.vehicleLoad();
    },
    mounted() {

    },
   methods:{
    vehicleLoad() {
            var page = "http://127.0.0.1:8000/api/vehicle";
            axios.get(page)
                .then(
                    ({ data }) => {
                        console.log(data);
                        this.result = data;
                    }
                );
        },
        save() {
            if (this.vehicle.id == '') {
                this.saveData();
            }
            else {
                this.updateData();
            }

        },
        saveData() {
            axios.post("http://127.0.0.1:8000/api/vehicle/save", this.vehicle)
                .then(
                    ({ data }) => {
                        alert("A new vehicle was bought");
                        this.vehicleLoad();
                    }

                ).catch(error => {
                    console.log(error.response);
                });

        },
        updateData() {
            var editrecords = 'http://127.0.0.1:8000/api/vehicle/update/' + this.vehicle.id;
            axios.put(editrecords, this.tasks)
                .then(
                    ({ data }) => {
                        this.id = '';
                        this.vehicle.model = '';
                        this.vehicle.licence_plate_number = '';
                        this.vehicle.current_driver = '';
                        this.vehicle.status = '';
                        alert("Your vehicles's info has been updated");
                        this.vehicleLoad();
                    }
                );

        },
        edit(vehicle) {
            alert("You are going to edit the info of a vehicle!");
            this.vehicle = vehicle;

        },
        remove(vehicle) {
            var url = 'http://127.0.0.1:8000/api/vehicle/delete/' + vehicle.id;
            axios.delete(url);
            alert("A vehicle has been disposed off!");
            this.vehicleLoad();
        }



   }//end of method scope



 }
 </Script>
 
 <style scoped>
 .vehicles-div{
     display: flexbox;
     justify-content: center;
     align-items: center;
     height: 100%;
    width: 100%;
    font-weight: 500;
 }
 </style>

<style src="@/assets/styles/driverStyles.css"/>