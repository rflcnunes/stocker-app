<template>
  <Head title="Products" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Products
      </h2>
    </template>
    <template #action>
      <button id="create-product-button-header" @click="createProduct()">
        Create Product
      </button>
    </template>
    <TheTable v-if="!mobile" v-bind:products="products" />
    <TheTableMobile v-if="mobile" v-bind:products="products" />
  </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import TheTable from "@/Components/TheTable.vue";
import TheTableMobile from "@/Components/TheTableMobile.vue";

export default {
  components: {
    AuthenticatedLayout,
    TheTable,
    TheTableMobile,
    Head,
  },
  data() {
    return {
      editing: false,
      mobile: false,
      tablet: false,
    };
  },
  props: {
    products: Array,
  },
  created() {
    this.mobile = window.innerWidth < 640;
  },
  methods: {
    createProduct() {
      this.$inertia.visit("/products/create");
    },
  },
};
</script>

<style lang="scss" scoped>
#create-product-button-header {
  border: 1px solid #e2e8f0;
  padding: 10px;
  border-radius: 10px;
  background-color: #e2e8f0;

  &:hover {
    background-color: #cbd5e0;
  }
}
</style>
