<template>
    <div class="container">
        <div class="row">
            <h2>Stored Links</h2>
        </div>

        <div class="row">
            <ul class="container">
                <link-item v-for="link in links" v-bind:item="link" v-bind:key="link.id"></link-item>
            </ul>
        </div>
    </div>
</template>

<script>
    import LinkItem from './LinkItem';

    export default {
        name: "LinkList",

        components: {
            LinkItem
        },

        data: function () {
            return {
                links: []
            };
        },

        props: {
            items: {
                type: Array,
                required: true
            }
        },

        created: function () {
            this.links = this.items;
        },

        methods: {

        }
    }
</script>

<style>

</style>
