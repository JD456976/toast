<template>
    <Head>
        <title>Viewing Warning</title>
        <meta name="description" content="Viewing Warning">
    </Head>
    <div class="p-4">
        <div class="surface-border border-round surface-card" style="min-height: 20rem">
            <div class="grid">
                <dash-menu class="col-3" :user="user" />
                <div class="col-4 px-5 flex flex-column flex-auto">
                    <div>
                        <Card style="margin-bottom: 2em">
                            <template #title>
                                Warning For: {{ warn.reason }}
                            </template>
                            <template #content>
                                <p>
                                    {{ warn.content }}
                                </p>
                            </template>
                            <template #footer>
                                <span>Expires: {{ warn.expires }}</span>
                                <span
                                    class="float-end">Issued By:
                                             <Link
                                                 :href="$route('user.show',warn.staff.slug)">
                                                    {{ warn.staff.name }}
                                            </Link>
                                    </span>
                            </template>
                        </Card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DashMenu from "@/Shared/DashMenu.vue";
import Card from "primevue/card";

export default {
    name: "Show",
    props: {
        warn: Object
    },
    components: {
        DashMenu,
        Card
    }
};
</script>

<style scoped>

</style>
