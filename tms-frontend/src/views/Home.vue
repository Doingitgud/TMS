<template>
    <div class="space"></div>
    <div v-for="count in result" v-bind:key="count.id" class="head">
        <div class="output">
            <textarea readonly class="tex">{{ count }}</textarea>
        </div>
    </div>


    <label class="lab">Task left</label>
    <label class="lab">Administrator !</label>
    <label class="lab">Vehicle Actively Working</label>
    <label class="lab">Drivers</label>
</template>
 
<script>
import axios from 'axios';

export default {
    name: 'Home',
    data() {
        return {
            result: {},
            count: [],

        }
    },
    created() {
        this.countLoad();
    },
    mounted() {

    },
    methods: {
        countLoad() {
            var page = "http://127.0.0.1:8000/api/home";
            axios.get(page)
                .then(
                    ({ data }) => {
                        console.log(data);
                        this.result = data;
                    }
                );
        },
    }
}
</Script>
 
<style scoped>
.head {
    width: 100%;
}

.head div {
    float: left;
    width: 25%;
    padding: 10px;
    box-sizing: border-box;
}

.head div span {
    display: block;
}

.head div textbox {
    box-sizing: border-box;
    width: 100%
}

textarea{
    font-size: xx-large;
    font-weight: 800;
    text-align: center;
    background-color: teal;
    height: 2em;
    resize: none;
}

.space {
    padding: 5em 5em;
}

.lab {
    font-weight: 500;
    padding: 6.75em;
}
</style>