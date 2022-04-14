require("./bootstrap");

import FileUploader from "laravel-file-uploader";
import InstantSearch from "vue-instantsearch/vue3/es";

Vue.use(FileUploader);

window.Vue = require("vue");

Vue.use(InstantSearch);

Vue.component("my-search", require("./components/MySearch.vue").default);
