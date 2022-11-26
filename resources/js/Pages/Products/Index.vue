<template>
  <Head title="Products" />
  <AuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products</h2>
    </template>
    <div>{{ products }}</div>

    <!-- <div v-for="user in users" :key="user.id">
      <Link :href="`/users/${user.id}`">
        {{ user.name }}
      </Link>
      <div>{{ user.email }}</div>
    </div> -->
  </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Head } from "@inertiajs/inertia-vue3";

export default {
  components: {
    AuthenticatedLayout,
    Head,
  },
  props: {
    products: Array,
  },
};
</script>
