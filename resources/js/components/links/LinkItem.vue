<template>

    <li class="row">
        <transition name="link-item" @before-leave="beforeLeave" @after-leave="afterLeave" @enter="enter">

            <div v-show="showItem" class="row col">
                <div class="col"><a v-bind:href="link.url">{{ link.name }}</a></div>
                <div class="col">{{ link.description }}</div>
                <div class="col">
                    <button @click="edit" class="btn btn-info" title="Edit"><i class="fa fa-pencil fa-lg"></i></button>
                    <button @click="deleteOne" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o fa-lg"></i></button>
                </div>
            </div>

        </transition>

        <link-item-edit v-bind:item="link" v-bind:show="showEdit" v-bind:key="link.id" @linkSave="save" @editClose="show"></link-item-edit>
    </li>

</template>

<script>
    import LinkItemEdit from './LinkItemEdit';

    export default {
        name: "LinkItem",

        components: {
            LinkItemEdit
        },

        data: function () {
            return {
                link: {},
                showItem: true,
                showEdit: false
            };
        },

        props: {
            item: {
                type: Object,
                required: true
            }
        },

        created: function () {
            this.link = Object.assign({}, this.link, this.item);
        },

        methods: {
            beforeLeave: function (el) {
                el.style.height = getComputedStyle(el).height;
                getComputedStyle(el).height;

                setImmediate(() => {
                    el.style.height = 0;
                });
            },

            afterLeave: function () {
                this.showEdit = true;
            },

            enter: function (el) {
                el.style.visibility = "hidden";
                el.style.position = "absolute";
                el.style.height = "auto";

                const height = getComputedStyle(el).height;

                el.style.visibility = null;
                el.style.position = null;
                el.style.height = 0;
                getComputedStyle(el).height;

                setImmediate(() => {
                    el.style.height = height;
                });
            },

            edit: function () {
                this.showItem = false;
            },

            save: function () {
                this.showEdit = false;
                //
            },

            show: function () {
                this.showItem = true;
            },

            deleteOne: function () {

            }
        }
    }
</script>

<style>
    .link-item-enter-active, .link-item-leave-active {
        transition: all 0.5s ease-in-out;
        overflow: hidden;
    }
</style>
