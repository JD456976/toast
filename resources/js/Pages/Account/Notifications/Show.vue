<template>
    <Head>
        <title>Viewing Warning</title>
        <meta name="description" content="Viewing Warning">
    </Head>
    <div class="page-content pt-50 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <dash-menu />
                        <div class="col-md-9">
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
    </div>
</template>

<script>
import DashMenu from "@/Shared/DashMenu";
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
