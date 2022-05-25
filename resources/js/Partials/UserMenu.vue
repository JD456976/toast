<template>
    <Button type="button"
            class="p-button-text p-button-success"
            label="Account" @click="toggle" aria-haspopup="true"
            aria-controls="overlay_menu">
        <i class="pi pi-user"></i>
        <span class="ml-10">Account</span>
    </Button>
    <Menu id="overlay_menu" ref="menu" :model="items" :popup="true" />
</template>

<script>
import Menu from "primevue/menu";
import Button from "primevue/button";


export default {
    name: "UserMenu",
    components: {
        Menu,
        Button
    },
    data() {
        return {
            form: this.$inertia.form(),
            items: [
                {
                    label: "My Account",
                    icon: "pi pi-fw pi-whatsapp",
                    url: route("account")
                },
                {
                    label: "Post New Deal",
                    icon: "pi pi-fw pi-pencil",
                    url: route("deal.create")
                },
                {
                    label: "Post New Bounty",
                    icon: "pi pi-fw pi-user",
                    url: route("bounty.create")
                },
                {
                    label: "Logout",
                    icon: "pi pi-fw pi-pencil",
                    command: () => {
                        this.form.post(route("logout"));
                    }
                }
            ]
        };
    },
    methods: {
        toggle(event) {
            this.$refs.menu.toggle(event);
        },
        logout() {
            this.form.post(route("logout"));
        }
    }
};
</script>

<style scoped>

</style>
