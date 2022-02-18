<template>
<ul>
    <li v-for="post in laravelData.data" :key="post.id">{{ post.name }}</li>
</ul>
</template>