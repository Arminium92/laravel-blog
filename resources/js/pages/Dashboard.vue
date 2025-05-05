<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">

        <nav class="mx-4 p-4 gap-2 w-full flex">
            <a href="/" class="btn btn-primary bg-gray-500 px-4 py-2 rounded-lg">Home</a>
            <a :href="route('posts.create')" class="btn btn-primary bg-gray-500 px-4 py-2 rounded-lg">Create Post</a>
            <a :href="route('categories.create')" class="btn btn-primary bg-gray-500 px-4 py-2 rounded-lg">Create
                Category</a>
            <a :href="route('posts.index')" class="btn btn-primary bg-gray-500 px-4 py-2 rounded-lg">Posts</a>
            <a :href="route('categories.index')" class="btn btn-primary bg-gray-500 px-4 py-2 rounded-lg">Categories</a>
            <a :href="route('comments.index')" class="btn btn-primary bg-gray-500 px-4 py-2 rounded-lg">Comments</a>
            <a :href="route('user-posts')"
                class="btn btn-secondary bg-gray-600 px-4 py-2 cursor-pointer rounded-lg">My Posts</a>
            <Link :href="route('logout')" method="post"
                class="btn btn-secondary bg-gray-600 px-4 py-2 cursor-pointer rounded-lg">Logout</Link>
        </nav>
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
            </div>
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <PlaceholderPattern />
            </div>
        </div>
    </AppLayout>

</template>
