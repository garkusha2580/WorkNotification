<template>
    <div class="form-group" :class="{'has-error':input.err}">
        <label :for="input.id">{{input.label}}</label>
        <input @focus="hideErr" class="form-control" :type="input.type?input.type:''" :id="input.id" :name="input.id"
               :placeholder="input.holder">
        <span v-if="input.err" class="help-block">{{input.err}}</span>
    </div>
</template>

<script>
    export default {
        props: [
            "input"
        ],
        name: "input-component",
        methods: {
            hideErr: function () {
                this.input.err = ''
            }
        }

    }
</script>

<style scoped>

</style>