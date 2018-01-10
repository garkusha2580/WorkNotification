<template>
    <div class="form-group">
        <label :for="id"></label>
        <input type="text" :id="id" :name="id">
    </div>
</template>

<script>
    export default {
        data: {
            id: "",
        },
        name: "input-component"

    }
</script>

<style scoped>

</style>