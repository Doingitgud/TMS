<template>
    <table class="table">
        <thead class="table-header">
            <tr class="table-row">
                <th class="table-col">Id</th>
                <th class="table-col">Vehicle Driver Name</th>
                <th class="table-col">Vehicle Number</th>
                <th class="table-col">Picup date</th>
                <th class="table-col">Dropoff date</th>
                <th class="table-col">Customer Name</th>
                <th class="table-col">Upload Place</th>
                <th class="table-col">Destination</th>
                <th class="table-col">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="tasks in result" v-bind:key="tasks.id">

                <td>{{ tasks.id }}</td>
                <td>{{ tasks.name }}</td>
                <td>{{ tasks.licence_plate_number }}</td>
                <td>{{ tasks.pickup_date }}</td>
                <td>{{ tasks.dropoff_date }}</td>
                <td>{{ tasks.customerName }}</td>
                <td>{{ tasks.upPlace }}</td>
                <td>{{ tasks.dropPlace }}</td>
                <td>{{ tasks.status }}</td>
                <td>
                    <button type="button" class="button" @click="edit(tasks)">Edit</button>
                    <button type="button" class="button" @click="remove(tasks)">Delete</button>
                </td>
            </tr>

        </tbody>
    </table>

  
        <form @submit.prevent="save" class="formS">
            <div class="form-head">
                <div class="form-input">
                    <label>Vehicle Driver Name</label>
                    <input type="text" v-model="tasks.name" class="form-control" placeholder="vehicle driver name">
                </div>
                <div class="form-input">
                    <label>Vehicle Number</label>
                    <input type="text" v-model="tasks.licence_plate_number" class="form-control"
                        placeholder="Vehicle Number">
                </div>
                <div class="form-input">
                    <label>Pickup Time</label>
                    <input type="text" v-model="tasks.pickup_date" class="form-control" placeholder="Pickup Time ">
                </div>
                <div class="form-input">
                    <label>Dropoff Time</label>
                    <input type="text" v-model="tasks.dropoff_date" class="form-control" placeholder="Dropoff time">
                </div>
                <div class="form-input">
                    <label>Customer Name</label>
                    <input type="text" v-model="tasks.customerName" class="form-control" placeholder="Customer name">
                </div>
                <div class="form-input">
                    <label>Starting Place</label>
                    <input type="text" v-model="tasks.upPlace" class="form-control"
                        placeholder="Your goods uploading place">
                </div>
                <div class="form-input">
                    <label>Destination</label>
                    <input type="text" v-model="tasks.dropPlace" class="form-control" placeholder="destination">
                </div>
                <div class="form-input">
                    <label>Status</label>
                    <input type="text" v-model="tasks.status" class="form-control" placeholder="Your ongoing status">
                </div>
                <div class="form-input"></div>
            </div>
            <button type="submit" class="buttonSave">Save</button>
        </form>

</template>
 
<script>

import axios from 'axios';
export default {
    name: 'Tasks',
    data() {
        return {
            result: {},
            tasks: {
                id: '',
                name: '',
                licence_plate_number: '',
                pickup_date: '',
                dropoff_date: '',
                customerName: '',
                upPlace: '',
                dropPlace: '',
                status: ''

            }
        }
    },
    created() {
        this.taskLoad();
    },
    mounted() {
        console.log("mounted() called.......");

    },
    methods: {
        taskLoad() {
            var page = "http://127.0.0.1:8000/api/task";
            axios.get(page)
                .then(
                    ({ data }) => {
                        console.log(data);
                        this.result = data;
                    }
                );
        },
        save() {
            if (this.tasks.id == '') {
                this.saveData();
            }
            else {
                this.updateData();
            }

        },
        saveData() {
            axios.post("http://127.0.0.1:8000/api/task/save", this.tasks)
                .then(
                    ({ data }) => {
                        alert("A new task has been added");
                        this.taskLoad();
                    }
                ).catch(error => {
                    console.log(error.response);
                });

        },
        updateData() {
            var editrecords = 'http://127.0.0.1:8000/api/task/update/' + this.tasks.id;
            axios.put(editrecords, this.tasks)
                .then(
                    ({ data }) => {
                        this.id = '';
                        this.tasks.name = '';
                        this.tasks.licence_plate_number = '';
                        this.tasks.pickup_date = '';
                        this.tasks.dropoff_date = '';
                        this.tasks.customerName = '';
                        this.tasks.upPlace = '';
                        this.tasks.dropPlace = '';
                        this.tasks.status = '';
                        alert("Your task data has been updated");
                        this.taskLoad();
                    }
                );

        },
        edit(tasks) {
            alert("You are going to edit a task!");
            this.tasks = tasks;

        },
        remove(tasks) {
            var url = 'http://127.0.0.1:8000/api/task/delete/' + tasks.id;
            axios.delete(url);
            alert("A task data has been deleted");
            this.taskLoad();
        }


    }//end of method scope



}
</Script>
 
<style scoped src="@/assets/styles/taskStyles.css"/>
