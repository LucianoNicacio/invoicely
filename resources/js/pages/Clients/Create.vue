<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    address_line_1: '',
    city: '',
    state: '',
    postal_code: '',
    country: '',
    notes: '',
});

const submit = () => {
    form.post('/clients');
};
</script>

<template>
    <Head title="Add Client" />

    <div class="max-w-2xl mx-auto py-6 px-4">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-foreground">Add Client</h1>
            <Link
                href="/clients"
                class="text-muted-foreground hover:text-foreground"
            >
                ← Back to Clients
            </Link>
        </div>

        <!-- Form -->
        <form @submit.prevent="submit" class="bg-card border border-border rounded-lg p-6 space-y-6">

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-foreground mb-1">
                    Name <span class="text-destructive">*</span>
                </label>
                <input
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                />
                <p v-if="form.errors.name" class="text-sm text-destructive mt-1">
                    {{ form.errors.name }}
                </p>
            </div>

            <!-- Email & Phone (2 columns) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-foreground mb-1">
                        Email
                    </label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="w-full px-3 py-2 border border-border rounded-md bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                    />
                    <p v-if="form.errors.email" class="text-sm text-destructive mt-1">
                        {{ form.errors.email }}
                    </p>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-foreground mb-1">
                        Phone
                    </label>
                    <input
                        id="phone"
                        v-model="form.phone"
                        type="text"
                        class="w-full px-3 py-2 border border-border rounded-md bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                    />
                    <p v-if="form.errors.phone" class="text-sm text-destructive mt-1">
                        {{ form.errors.phone }}
                    </p>
                </div>
            </div>

            <!-- Address -->
            <div>
                <label for="address_line_1" class="block text-sm font-medium text-foreground mb-1">
                    Address
                </label>
                <input
                    id="address_line_1"
                    v-model="form.address_line_1"
                    type="text"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                />
                <p v-if="form.errors.address_line_1" class="text-sm text-destructive mt-1">
                    {{ form.errors.address_line_1 }}
                </p>
            </div>

            <!-- City, State, Postal Code (3 columns) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="city" class="block text-sm font-medium text-foreground mb-1">
                        City
                    </label>
                    <input
                        id="city"
                        v-model="form.city"
                        type="text"
                        class="w-full px-3 py-2 border border-border rounded-md bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                    />
                    <p v-if="form.errors.city" class="text-sm text-destructive mt-1">
                        {{ form.errors.city }}
                    </p>
                </div>

                <div>
                    <label for="state" class="block text-sm font-medium text-foreground mb-1">
                        State
                    </label>
                    <input
                        id="state"
                        v-model="form.state"
                        type="text"
                        class="w-full px-3 py-2 border border-border rounded-md bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                    />
                    <p v-if="form.errors.state" class="text-sm text-destructive mt-1">
                        {{ form.errors.state }}
                    </p>
                </div>

                <div>
                    <label for="postal_code" class="block text-sm font-medium text-foreground mb-1">
                        Postal Code
                    </label>
                    <input
                        id="postal_code"
                        v-model="form.postal_code"
                        type="text"
                        class="w-full px-3 py-2 border border-border rounded-md bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                    />
                    <p v-if="form.errors.postal_code" class="text-sm text-destructive mt-1">
                        {{ form.errors.postal_code }}
                    </p>
                </div>
            </div>

            <!-- Country -->
            <div>
                <label for="country" class="block text-sm font-medium text-foreground mb-1">
                    Country
                </label>
                <select
                    id="country"
                    v-model="form.country"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                >
                    <option value="">Select a country</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="GB">United Kingdom</option>
                    <option value="AU">Australia</option>
                    <option value="DE">Germany</option>
                    <option value="FR">France</option>
                    <option value="BR">Brazil</option>
                    <option value="MX">Mexico</option>
                </select>
                <p v-if="form.errors.country" class="text-sm text-destructive mt-1">
                    {{ form.errors.country }}
                </p>
            </div>

            <!-- Notes -->
            <div>
                <label for="notes" class="block text-sm font-medium text-foreground mb-1">
                    Notes
                </label>
                <textarea
                    id="notes"
                    v-model="form.notes"
                    rows="4"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-primary"
                ></textarea>
                <p v-if="form.errors.notes" class="text-sm text-destructive mt-1">
                    {{ form.errors.notes }}
                </p>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end gap-4">
                <Link
                    href="/clients"
                    class="px-4 py-2 text-muted-foreground hover:text-foreground"
                >
                    Cancel
                </Link>
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="bg-primary text-primary-foreground px-4 py-2 rounded-md hover:bg-primary/90 disabled:opacity-50"
                >
                    {{ form.processing ? 'Saving...' : 'Save Client' }}
                </button>
            </div>
        </form>
    </div>
</template>