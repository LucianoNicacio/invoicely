<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    clients: Array,
});
</script>

<template>
    <Head title="Clients" />

    <div class="max-w-7xl mx-auto py-6 px-4">
        <!-- Header with title and button -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-foreground">Clients</h1>
            <Link
                href="/clients/create"
                class="bg-primary text-primary-foreground px-4 py-2 rounded-md hover:bg-primary/90"
            >
                Add Client
            </Link>
        </div>

        <!-- Table -->
        <table class="w-full bg-card rounded-lg shadow border border-border">
            <thead>
            <tr class="border-b border-border">
                <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase">Phone</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase">Actions</th>
            </tr>
            </thead>
            <tbody>
            <!-- Empty state -->
            <tr v-if="clients.length === 0">
                <td colspan="4" class="px-6 py-8 text-center text-muted-foreground">
                    No clients yet. Add your first client!
                </td>
            </tr>

            <!-- Client rows -->
            <tr
                v-for="client in clients"
                :key="client.id"
                class="border-b border-border hover:bg-muted"
            >
                <td class="px-6 py-4 text-sm text-foreground">{{ client.name }}</td>
                <td class="px-6 py-4 text-sm text-muted-foreground">{{ client.email }}</td>
                <td class="px-6 py-4 text-sm text-muted-foreground">{{ client.phone }}</td>
                <td class="px-6 py-4 text-sm space-x-3">
                    <Link
                        :href="`/clients/${client.id}`"
                        class="text-primary hover:underline"
                    >
                        View
                    </Link>
                    <Link
                        :href="`/clients/${client.id}/edit`"
                        class="text-primary hover:underline"
                    >
                        Edit
                    </Link>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>