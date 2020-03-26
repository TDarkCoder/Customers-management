<template>
    <div>
        <button type="button" class="my-button">Send</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style>
    .my-button{
        border:1px solid #e5e5e5;
        padding:5px 10px;
        border-radius:5px;
        background:#fff;
    }
</style>
