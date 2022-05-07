<template>
    <div>
        <main class="main pages">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span> Pages <span></span> My Account
                    </div>
                </div>
            </div>
            <div class="page-content pt-50 pb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <div class="row">
                                <dash-menu />
                                <div class="col-md-9">
                                    <flash-messages />
                                    <slot />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
import DashMenu from "./DashMenu";
import FlashMessages from "./FlashMessages";

export default {
    name: "Layout",
    components: {
        DashMenu,
        FlashMessages
    }
};
</script>
