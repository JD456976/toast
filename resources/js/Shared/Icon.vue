<template>
    <i v-if="name === 'dashboard'" class="fa-solid fa-house"></i>
    <i v-else-if="name === 'deals'" class="fa-brands fa-ideal"></i>
    <i v-else-if="name === 'bounties'" class="fa-solid fa-life-ring"></i>
    <i v-else-if="name === 'notifications'" class="fa-solid fa-circle-exclamation"></i>
    <i v-else-if="name === 'bounties'" class="fa-solid fa-user-bounty-hunter"></i>
    <i v-else-if="name === 'following'" class="fa-solid fa-arrows-down-to-people"></i>
    <i v-else-if="name === 'details'" class="fa-solid fa-pencil"></i>
    <i v-else-if="name === 'logout'" class="fa-solid fa-right-from-bracket"></i>
    <i v-else-if="name === 'flag'" class="fa-solid fa-flag"></i>
</template>

<script>
export default {
    props: {
        name: String
    }
};
</script>
