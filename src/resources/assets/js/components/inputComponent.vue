<template>
    <div class="form-group" :class="{'has-error':tmp.err}">
        <label :for="tmp.id">{{tmp.label}}</label>
        <input class="form-control" type="text" :id="tmp.id" :name="tmp.id" :placeholder="tmp.holder">
        <span v-if="tmp.err" class="help-block">{{tmp.err}}</span>
    </div>
</template>

<script>
    export default {
        props: [
            "tmp"
        ],
        name: "input-component",

    }
</script>

<style scoped>

</style>