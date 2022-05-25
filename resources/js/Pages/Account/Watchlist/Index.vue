<template>
    <Head>
        <title>Your Watchlist</title>
        <meta name='description' content='Your Watchlist'>
    </Head>
    <main class='main'>
        <div class='container mb-30 mt-50'>
            <div class='row'>
                <div class='col-xl-10 col-lg-12 m-auto'>
                    <div class='mb-50'>
                        <flash-messages />
                        <h1 class='heading-2 mb-10'>Your Watchlist</h1>
                        <h6 class='text-body'>There are <span
                            class='text-brand'>{{ items.length }} </span> products in your list
                        </h6>
                    </div>
                    <DataTable
                        :value='items'
                        responsiveLayout='scroll'
                        :paginator='true' :rows='10'
                    >
                        <Column field='product.name' header='Product' :sortable='true'></Column>
                        <Column field='is_active' header='Status' :sortable='true'>
                            <template #body='slotProps'>
                                <Link v-if='slotProps.data.is_active'
                                      method='post'
                                      :href="$route('watchlist.deactivate',slotProps.data.id)">
                                    <Button
                                        label='Deactivate'
                                        class='p-button-danger p-button-raised p-button-sm'
                                        icon='pi pi-times'
                                        iconPos='right'
                                    />
                                </Link>
                                <Link v-else method='post'
                                      :href="$route('watchlist.activate',slotProps.data.id)">
                                    <Button
                                        label='Activate'
                                        class='p-button-success p-button-raised p-button-sm'
                                        icon='pi pi-check'
                                        iconPos='right'
                                    />
                                </Link>
                            </template>
                        </Column>
                        <Column field='created_at' header='Added On' :sortable='true'></Column>
                        <Column field='id' header='Actions'>
                            <template #body='slotProps'>
                                <Link method='delete' :href="$route('watchlist.delete',slotProps.data.id)">
                                    <Button
                                        label='Delete'
                                        class='p-button-danger p-button-raised p-button-sm'
                                        icon='pi pi-times'
                                        iconPos='right'
                                    />
                                </Link>
                            </template>
                        </Column>
                    </DataTable>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import FlashMessages from '../../../Shared/FlashMessages';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import Badge from 'primevue/badge';
import ContextMenu from 'primevue/contextmenu';
import Breadcrumb from 'primevue/breadcrumb';
import ToggleButton from 'primevue/togglebutton';
import { Link } from '@inertiajs/inertia-vue3';
import Toast from 'primevue/toast';


export default {
    name: 'Index',
    components: {
        Head,
        FlashMessages,
        DataTable,
        Column,
        Button,
        Badge,
        ContextMenu,
        Breadcrumb,
        ToggleButton,
        Link,
        Toast

    },
    props: {
        items: Array,
        item: Object
    }
};
</script>
