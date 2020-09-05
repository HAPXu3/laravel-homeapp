<template>

    <transition name="link-item-edit" @before-leave="beforeLeave" @after-leave="afterLeave" @enter="enter" appear>

        <div v-if="show">
            <div class="form-group">

                <div class="col-sm-12">
                    <label class="col-sm-12 control-label">
                        Name
                        <input type="text" class="form-control" v-bind:value="link.name">
                    </label>
                </div>

                <div class="col-sm-12">
                    <label class="col-sm-12 control-label">
                        Url
                        <input type="text" class="form-control" v-bind:value="link.url">
                    </label>
                </div>

                <div class="col-sm-12">
                    <label class="col-sm-12 control-label">
                        Description
                        <input type="text" class="form-control" v-bind:value="link.description">
                    </label>
                </div>

                <div class="col-sm-12">
                    <button @click="$emit('linkSave')" class="btn btn-success" title="Save"><i class="fa fa-floppy-o fa-lg"></i></button>
                </div>

            </div>
        </div>

    </transition>

</template>

<script>
    export default {
        name: "LinkItemEdit",

        data: function () {
            return {
                link: {}
            };
        },

        props: {
            item: {
                type: Object,
                required: true
            },
            show: {
                type: Boolean,
                required: true,
                default: false
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
                this.$emit('editClose');
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
            }
        }
    }
</script>

<style>
    .link-item-edit-enter-active, .link-item-edit-leave-active {
        transition: all 0.5s ease;
        overflow: hidden;
    }
</style>
