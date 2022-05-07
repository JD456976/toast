<template>
    <file-pond
        name="avatar"
        ref="pond"
        label-idle="Upload Avatar"
        @init="filepondInitialized"
        accepted-file-types="image/jpg, image/jpeg, image/png"
        @processfile="handleProcessedFile"
        max-file-size="1MB"
        :allowImageCrop="true"
    />
</template>

<script>
// Import Vue FilePond
import vueFilePond, { setOptions } from "vue-filepond";

// Import FilePond styles
import "filepond/dist/filepond.min.css";

// Import image preview plugin styles
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginImageCrop from "filepond-plugin-image-crop";

// Import the plugin code
import FilePondPluginImageEdit from "filepond-plugin-image-edit";

// Import the plugin styles
import "filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css";

// Import the plugin code
import FilePondPluginImageTransform from "filepond-plugin-image-transform";

let serverMessage = {};
setOptions({
    server: {
        process: {
            url: "/account/upload/",
            onerror: (response) => {
                serverMessage = JSON.parse(response);
            },
            headers: {
                "X-CSRF-TOKEN": document.head.querySelector("meta[name=\"csrf_token\"]").content
            }
        }
    },
    labelFileProcessingError: () => {
        return serverMessage.error;
    }
});

// Create component
const FilePond = vueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview,
    FilePondPluginImageCrop,
    FilePondPluginImageEdit,
    FilePondPluginImageTransform
);

export default {
    name: "ImageUpload",
    components: {
        FilePond
    },
    data() {
        return {
            images: []
        };
    },
    methods: {
        filepondInitialized() {
            console.log("Filepond is ready!");
            console.log("Filepond object:", this.$refs.pond);
        },
        handleProcessedFile(error, file) {
            if (error) {
                console.error(error);
                return;
            }
            // add the file to our images array
            this.images.unshift(file.serverId);
        }
    }
};
</script>

<style scoped>

</style>
