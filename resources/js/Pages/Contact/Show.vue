<template>
    <Head>
        <title>Contact Page</title>
        <meta name="description" content="Contact Page">
    </Head>

    <div class="surface-section">
        <div class="grid grid-nogutter">
            <div class="col-12 md:col-6 bg-no-repeat bg-cover p-8"
                 style="background-image: url('images/blocks/contact/contact-2.jpg')">
                <div class="text-white text-2xl font-medium mb-6">Contact Us</div>
                <div class="text-gray-300 line-height-3 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
                <a class="inline-flex align-items-center text-blue-300 font-bold no-underline cursor-pointer">
                    <span class="mr-3">View Address on Google Maps</span>
                    <i class="pi pi-arrow-right"></i>
                </a>
                <ul class="list-none p-0 m-0 mt-6 text-white">
                    <li class="flex align-items-center mb-3">
                        <i class="pi pi-phone mr-2"></i>
                        <span>+123456789</span>
                    </li>
                    <li class="flex align-items-center mb-3">
                        <i class="pi pi-twitter mr-2"></i>
                        <span>@prime_ng</span>
                    </li>
                    <li class="flex align-items-center">
                        <i class="pi pi-inbox mr-2"></i>
                        <span>contact@primetek.com.tr</span>
                    </li>
                </ul>
            </div>
            <div class="col-12 md:col-6">
                <form @submit.prevent="store">
                    <div class="p-fluid formgrid grid px-4 py-8 md:px-6 lg:px-8">
                        <div class="field col-12 mb-4">
                            <InputText id="name" type="text"
                                       class="py-3 px-2 text-lg"
                                       v-bind:class='{"p-invalid": form.errors.name}'
                                       v-model="form.name" placeholder="Name" />
                            <small v-if="form.errors.name" id="name-help"
                                   class="p-error">{{ form.errors.name }}</small>
                        </div>
                        <div class="field col-12 mb-4">
                            <InputText id="email" type="email" class="py-3 px-2 text-lg"
                                       v-bind:class='{"p-invalid": form.errors.email}'
                                       placeholder="Email"
                                       v-model="form.email"
                            />
                            <small v-if="form.errors.email" id="name-help"
                                   class="p-error">{{ form.errors.email }}</small>
                        </div>
                        <div class="field col-12 mb-4">
                            <InputText id="phone" type="text" class="py-3 px-2 text-lg"
                                       v-bind:class='{"p-invalid": form.errors.phone}'
                                       placeholder="Phone"
                                       v-model="form.phone"
                            />
                            <small v-if="form.errors.phone" id="name-help"
                                   class="p-error">{{ form.errors.phone }}</small>
                        </div>
                        <div class="field col-12 mb-4">
                            <Dropdown v-bind:class='{"p-invalid": form.errors.subject}'
                                      v-model="form.subject"
                                      :options="subject" optionLabel="name"
                                      optionValue="value" placeholder="Select a Subject" />
                            <div>
                                <small v-if="form.errors.subject" id="name-help"
                                       class="p-error">{{ form.errors.subject }}</small>
                            </div>
                        </div>
                        <div class="field col-12 mb-4">
                        <Textarea :autoResize="true" rows="6" cols="30" id="message"
                                  class="py-3 px-2 text-lg"
                                  v-bind:class='{"p-invalid": form.errors.message}'
                                  v-model="form.message"
                        />
                            <small v-if="form.errors.message" id="name-help"
                                   class="p-error">{{ form.errors.message }}</small>
                        </div>
                        <div class="col-12 text-right">
                            <Button type="submit" label="Submit" icon="pi pi-envelope"
                                    class="px-5 py-3 w-auto"></Button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import Button from "primevue/button";
import Textarea from "primevue/textarea";
import InputText from "primevue/inputtext";
import Dropdown from "primevue/dropdown";
import { ref } from "vue";

const subject = ref([
    { name: "Account Issue", value: "account" },
    { name: "Advertising", value: "advertising" },
    { name: "Other", value: "Other" }
]);

const form = useForm({
    name: "",
    email: "",
    phone: "",
    message: ""
});

const store = () => {
    form.post(route("contact.store"), {
        onSuccess: () => this.form.reset("name", "email", "phone", "message")
    });
};
</script>

<script>
export default {
    name: "Show"
};
</script>
