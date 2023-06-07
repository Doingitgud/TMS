<template>
    <table class="table">
        <thead class="table-header">
            <tr class="table-row">
                <th class="table-col">Id</th>
                <th class="table-col">Vehicle Driver Name</th>
                <th class="table-col">Password</th>
                <th class="table-col">Address</th>
                <th class="table-col">Mobile</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="driver in result" v-bind:key="driver.id">

                <td>{{ driver.id }}</td>
                <td>{{ driver.name }}</td>
                <td>{{ driver.password }}</td>
                <td>{{ driver.address }}</td>
                <td>{{ driver.mobile }}</td>
                <td>
                    <button type="button" class="button" @click="edit(driver)">Edit</button>
                    <button type="button" class="button" @click="remove(driver)">Delete</button>
                </td>
            </tr>

        </tbody>
    </table>

    <div class="wrapper">
        <form @submit.prevent="save">

            <label class="lc">Vehicle Driver Name</label>
            <input type="text" v-model="driver.name" class="ic" placeholder="Vehicle driver name">
            <label class="lc">Password</label>
            <input type="text" v-model="driver.password" class="ic" placeholder="Password of Driver Employee">
            <label class="lc">Address</label>
            <input type="text" v-model="driver.address" class="ic" placeholder="Driver's Address ">
            <label class="lc">Mobile</label>
            <input type="text" v-model="driver.mobile" class="ic" placeholder="Driver's mobile number">
            <button type="submit" class="buttonSave">Save</button>

        </form>
    </div>
</template>
 
<script>
import axios from 'axios';
export default {
    name: 'Drivers',
    data() {
        return {
            result: {},
            driver: {
                id: '',
                name: '',
                password: '',
                address: '',
                mobile: ''

            }
        }
    },
    created() {
        this.driverLoad();
    },
    mounted() {

    },
    methods: {
        driverLoad() {
            var page = "http://127.0.0.1:8000/api/vehicleDriver";
            axios.get(page)
                .then(
                    ({ data }) => {
                        console.log(data);
                        this.result = data;
                    }
                );
        },
        save() {
            if (this.driver.id == '') {
                this.saveData();
            }
            else {
                this.updateData();
            }

        },
        saveData() {
            axios.post("http://127.0.0.1:8000/api/vehicleDriver/save", this.driver)
                .then(
                    ({ data }) => {
                        alert("A new vehicle driver was hired");
                        this.driverLoad();
                    }

                ).catch(error => {
                    console.log(error.response);
                });

        },
        updateData() {
            var editrecords = 'http://127.0.0.1:8000/api/vehicleDriver/update/' + this.driver.id;
            axios.put(editrecords, this.tasks)
                .then(
                    ({ data }) => {
                        this.id = '';
                        this.driver.name = '';
                        this.driver.password = '';
                        this.driver.address = '';
                        this.driver.mobile = '';
                        alert("Your driver employee's info has been updated");
                        this.driverLoad();
                    }
                );

        },
        edit(driver) {
            alert("You are going to edit a driver employee's info!");
            this.driver = driver;

        },
        remove(driver) {
            var url = 'http://127.0.0.1:8000/api/vehicleDriver/delete/' + driver.id;
            axios.delete(url);
            alert("A  driver has been fired!");
            this.driverLoad();
        }


    }//end of method scope




}
</Script>
 
<style src="@/assets/styles/driverStyles.css"/>
