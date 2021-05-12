<template>
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container w-2/3">
                <div class="modal-header py-2">
                    <slot name="header">
                        default header
                    </slot>
                </div>

                <div class="modal-body">
                    <slot name="body">
                        default body
                    </slot>
                </div>

                <div class="flex flex-row-reverse">
                        <button class="btn btn-primary" @click="$emit('close')">
                            Close
                        </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "modal"
}
</script>

<style scoped>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
    display: table;
    transition: opacity .3s ease;
}

.modal-wrapper {
    display: table-cell;
    vertical-align: middle;
}

.modal-container {
    margin: 0px auto;
    padding: 0px 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
    font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
    margin-top: 0;
    color: #42b983;
}

.modal-body {
    margin: 20px 0;
}

.modal-default-button {
    float: right;
}
</style>
