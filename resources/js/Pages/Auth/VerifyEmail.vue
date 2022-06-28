<template>
    <Head>
        <title>Verify Email</title>
        <meta name="description" content="Verify Email">
    </Head>
    <div class="row">
        <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h1 class="mb-5">Verify Your Email Address</h1>
                                <p class="mb-30">Didn't get the link? After giving it a few seconds and checking your
                                    spam folder
                                    feel free to press the button below to try again
                                </p>

                            </div>
                            <form @submit.prevent="verify">
                                <div class="form-group mb-30">
                                    <Button type="submit" label="Submit" class="p-button-raised p-button-rounded"
                                            icon="pi pi-check"
                                            iconPos="right" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import FlashMessages from "@/Shared/FlashMessages";

export default {
    name: "VerifyEmail",
    components: {
        FlashMessages
    },
    data() {
        return {
            form: this.$inertia.form({
                _method: "post"
            })
        };
    },
    methods: {
        verify() {
            this.form.post(route("verification.send"));
        }
    }
};
</script>

<style scoped>

</style>
