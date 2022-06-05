<template>
    <file-pond
        name="image"
        ref="pond"
        credits=""
        :files="files"
        :allowMultiple="allowMultiple"
        :maxFiles="maxFiles"
        label-idle="Click to choose image, or drag here..."
        accepted-file-types="image/jpg, image/jpeg, image/png"
        max-file-size="3MB"
        @processfile="handleFilePondProcess"
        @removefile="handleFilePondRemoveFile"
    />
</template>

<script>
import vueFilePond, { setOptions } from "vue-filepond";
import "filepond/dist/filepond.min.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";

// Import the plugin styles
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";

let serverMessage = {};
setOptions({
    server: {
        url: "/filepond",
        revert: {
            url: "/revert",
            method: "DELETE"
        },
        headers: {
            "X-CSRF-TOKEN": document.head.querySelector("meta[name=\"csrf_token\"]").content
        }
    },
    labelFileProcessingError: () => {
        return serverMessage.error;
    }
});

const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginFileValidateSize, FilePondPluginImagePreview);

export default {
    name: "ImageUploader",
    components: {
        FilePond
    },
    props: {
        allowMultiple: Boolean,
        maxFiles: Number,
        files: Array
    },
    methods: {
        handleFilePondProcess: function(error, file) {
            // Set the server id from response
            this.form.image.push({ id: file.id, serverId: file.serverId });

        },
        handleFilePondRemoveFile: function(error, file) {
            // Remove the server id on file remove
            this.form.image = this.form.image.filter(item => item.id !== file.id);
        }
    }
};
</script>

<style scoped>

</style>
