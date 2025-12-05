<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    client: Object,
});
</script>

<template>
    <Head :title="client.name" />

    <div class="max-w-2xl mx-auto py-6 px-4">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-foreground">{{ client.name }}</h1>
            <div class="flex gap-2">
                <Link
                    :href="`/clients/${client.id}/edit`"
                    class="bg-primary text-primary-foreground px-4 py-2 rounded-md hover:bg-primary/90"
                >
                    Edit
                </Link>
                <Link
                    href="/clients"
                    class="text-muted-foreground hover:text-foreground px-4 py-2"
                >
                    ← Back
                </Link>
            </div>
        </div>

        <!-- Client Details Card -->
        <div class="bg-card border border-border rounded-lg p-6 space-y-4">
            <!-- Email -->
            <div v-if="client.email">
                <p class="text-sm text-muted-foreground">Email</p>
                <p class="text-foreground">{{ client.email }}</p>
            </div>

            <!-- Phone -->
            <div v-if="client.phone">
                <p class="text-sm text-muted-foreground">Phone</p>
                <p class="text-foreground">{{ client.phone }}</p>
            </div>

            <!-- Address -->
            <div v-if="client.address_line_1">
                <p class="text-sm text-muted-foreground">Address</p>
                <p class="text-foreground">
                    {{ client.address_line_1 }}<br>
                    <span v-if="client.city">{{ client.city }}, </span>
                    <span v-if="client.state">{{ client.state }} </span>
                    <span v-if="client.postal_code">{{ client.postal_code }}</span>
                    <span v-if="client.country"><br>{{ client.country }}</span>
                </p>
            </div>

            <!-- Notes -->
            <div v-if="client.notes">
                <p class="text-sm text-muted-foreground">Notes</p>
                <p class="text-foreground whitespace-pre-wrap">{{ client.notes }}</p>
            </div>

            <!-- Empty state if no details -->
            <p
                v-if="!client.email && !client.phone && !client.address_line_1 && !client.notes"
                class="text-muted-foreground"
            >
                No additional details.
            </p>
        </div>
    </div>
</template>