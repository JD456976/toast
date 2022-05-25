<template>
    <div class='page-header breadcrumb-wrap'>
        <div class='container'>
            <Breadcrumb :home='home' :model='items'>
                <template #item='{item}'>
                    <a :href='item.url'>{{ item.label }}</a>
                </template>
            </Breadcrumb>
        </div>
    </div>
</template>

<script>

import Breadcrumb from 'primevue/breadcrumb';

export default {
    name: 'SiteBreadcrumbs',
    data() {
        return {
            home: {
                icon: 'pi pi-home',
                to: '/'
            },
            items: [
                { label: 'Computer' },
                { label: 'Notebook' },
                { label: 'Accessories' },
                { label: 'Backpacks' },
                { label: 'Item' }
            ]
        };
    },
    components: {
        Breadcrumb
    }
};
</script>

<style scoped>

</style>
