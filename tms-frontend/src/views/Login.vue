<template>
    <div class="form-wrap">

        <form>

            <h1>Login</h1>
            <input type="text" placeholder="Id" />
            <input type="text" placeholder="Password" />
            <input type="button" />

        </form>

    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'Login',

}
</script>

<style>
*{
    margin:0;
    padding:0;
}

body {
    background: #ecf1f4;
    font-family: sans-serif;
}

.form-wrap {
    width: 320px;
    background: teal;
    padding: 40px 20px;
    box-sizing: border-box;
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

h1 {
    text-align: center;
    color: #fff;
    font-weight: normal;
    margin-bottom: 20px;
}

input {
    width: 100%;
    background: none;
    border: 1px solid #fff;
    border-radius: 3px;
    padding: 6px 15px;
    box-sizing: border-box;
    margin-bottom: 20px;
    font-size: 16px;
    color: #fff;
}
</style>