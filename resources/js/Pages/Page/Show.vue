<template>
    <Head>
        <title>Viewing Page: {{ page.title }}</title>
        <meta name='description' content='Viewing Page'>
    </Head>
    <div class='page-content pt-50'>
        <div class='container'>
            <div class='row'>
                <div class='col-xl-10 col-lg-12 m-auto'>
                    <div class='row'>
                        <div class='col-lg-12'>
                            <div class='single-page pr-30 mb-lg-0 mb-sm-5'>
                                <div class='single-header style-2'>
                                    <h2>{{ page.title }}</h2>
                                    <div class='entry-meta meta-1 meta-3 font-xs mt-15 mb-15'>
                                        <span class='post-on'>Last Updated: {{ page.updated_at }}</span>
                                    </div>
                                </div>
                                <div class='single-content mb-50'>
                                    {{ page.content }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import SiteHeader from '@/Partials/SiteHeader';

export default {
    name: 'Show',
    props: {
        page: Object
    },
    components: {
        SiteHeader
    }
};
</script>

<style scoped>

</style>
