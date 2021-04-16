<template>
    <form class="col-8 mt-10" v-if="show">
        <div class="form-group col-12 p-0">
            <label for="title">Title:</label>
            <input id="title" class="form-control" type="text" name="title" placeholder="Title">

        </div>
        <div class="form-group">
            <label for="textarea-docs">Informations:</label>
            <textarea class="form-control" id="textarea-docs"></textarea>
        </div>

        <div class="col-12 mt-3 p-0">
            <button type="submit" class="btn btn-primary">Modifica!</button>
        </div>
    </form>
</template>

<script>
export default {
    name: "EditForm",
    props: ['show', 'firstOption', 'secondOption']
}
</script>

<style scoped>

</style>
