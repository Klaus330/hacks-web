<template>
    <form class="col-8 mt-10" v-if="show">
        <div class="form-group col-12 p-0">
            <label for="title">Titlu:</label>
            <input id="title" class="form-control" type="text" name="title" placeholder="Titlu">

        </div>
        <div class="form-group">
            <label for="textarea-docs">Informații:</label>
            <textarea class="form-control" id="textarea-docs"></textarea>
        </div>

        <div class="col-12 mt-3 p-0">
            <button type="submit" class="btn btn-primary">Modifică!</button>
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
