<template>
    <Head>
        <title>Contact Page</title>
        <meta name="description" content="Contact Page">
    </Head>
    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="row align-items-end mb-50">
                        <flash-messages />
                        <div class="surface-section px-4 py-8 md:px-6 lg:px-8">
                            <div class="grid">
                                <form class="contact-form-style mt-30" @submit.prevent="store">
                                    <div class="col-12 md:col-12">
                                        <div class="p-fluid pr-0 md:pr-6">
                                            <div class="field">
                                                <label for="name" class="font-medium">Name</label>
                                                <InputText id="name" type="text"
                                                           class="py-3 px-2 text-lg"
                                                           v-bind:class='{"p-invalid": form.errors.name}'
                                                           v-model="form.name"
                                                />
                                                <small v-if="form.errors.name" id="name-help"
                                                       class="p-error">{{ form.errors.name }}</small>
                                            </div>
                                            <div class="field">
                                                <label for="email" class="font-medium">Email</label>
                                                <InputText id="email" type="email" class="py-3 px-2 text-lg"
                                                           v-bind:class='{"p-invalid": form.errors.email}'
                                                           v-model="form.email"
                                                />
                                                <small v-if="form.errors.email" id="name-help"
                                                       class="p-error">{{ form.errors.email }}</small>
                                            </div>
                                            <div class="field">
                                                <label for="phone" class="font-medium">Phone</label>
                                                <InputText id="phone" type="text" class="py-3 px-2 text-lg"
                                                           v-bind:class='{"p-invalid": form.errors.phone}'
                                                           v-model="form.phone"
                                                />
                                                <small v-if="form.errors.phone" id="name-help"
                                                       class="p-error">{{ form.errors.phone }}</small>
                                            </div>
                                            <div class="field">
                                                <label for="subject" class="font-medium">Subject</label>
                                                <Dropdown v-bind:class='{"p-invalid": form.errors.subject}'
                                                          v-model="form.subject"
                                                          :options="subject" optionLabel="name"
                                                          optionValue="value" placeholder="Select a Subject" />
                                                <div>
                                                    <small v-if="form.errors.subject" id="name-help"
                                                           class="p-error">{{ form.errors.subject }}</small>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <label for="message" class="font-medium">Message</label>
                                                <Textarea :autoResize="true" rows="6" cols="30" id="message"
                                                          class="py-3 px-2 text-lg"
                                                          v-bind:class='{"p-invalid": form.errors.message}'
                                                          v-model="form.message"
                                                />
                                                <small v-if="form.errors.message" id="name-help"
                                                       class="p-error">{{ form.errors.message }}</small>
                                            </div>
                                            <Button type="submit" label="Send Message" icon="pi pi-send"
                                                    class="w-auto"></Button>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-12 md:col-6 bg-no-repeat bg-right-bottom"
                                     style="background-image: url('images/blocks/contact/contact-1.png')">
                                    <div class="text-900 text-4xl font-medium mb-6">Contact Us</div>
                                    <div class="text-700 line-height-3 mb-6">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua.
                                    </div>
                                    <a class="inline-flex align-items-center text-blue-600 font-bold no-underline cursor-pointer">
                                        <span class="mr-3">View Address on Google Maps</span>
                                        <i class="pi pi-arrow-right"></i>
                                    </a>
                                    <ul class="list-none p-0 m-0 mt-6 text-700">
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
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import Button from "primevue/button";
import Textarea from "primevue/textarea";
import InputText from "primevue/inputtext";
import Dropdown from "primevue/dropdown";
import FlashMessages from "@/Shared/FlashMessages";

export default {
    name: "Show",
    components: {
        Head,
        Dropdown,
        Textarea,
        InputText,
        Button,
        FlashMessages
    },
    remember: "form",
    data() {
        return {
            subject: [
                { name: "Account Issue", value: "account" },
                { name: "Advertising", value: "advertising" },
                { name: "Other", value: "Other" }
            ],
            form: this.$inertia.form({
                _method: "post",
                name: "",
                email: "",
                phone: "",
                message: ""
            })
        };
    },
    methods: {
        store() {
            this.form.post(route("contact.store"), {
                onSuccess: () => this.form.reset("name", "email", "phone", "message")
            });
        }
    }
};
</script>
