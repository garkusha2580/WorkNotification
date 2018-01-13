<template>
    <tr>
        <td>{{row.num}}</td>
        <td>{{row.name}}</td>
        <td><a :href="row.home_url"></a>{{row.home_url}}</td>
        <td><i class="fa fa-times"></i></td>
    </tr>
</template>

<script>
    export default {
        props: ["row"],
        name: "home-row-component"
    }
</script>

<style scoped>

</style>