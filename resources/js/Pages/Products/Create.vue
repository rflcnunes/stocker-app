<template>
  <Head title="Create Product" />

  <AuthenticatedLayout>
    <h1>Create a new Product</h1>

    <div id="sku-group" class="input-group">
      <InputLabel for="sku" value="SKU" />
      <TextInput id="sku" type="text" v-model="form.sku" />
    </div>

    <div id="name-group" class="input-group">
      <InputLabel for="name" value="Name" />
      <TextInput id="name" type="text" v-model="form.name" />
    </div>

    <div id="description" class="input-group">
      <InputLabel for="description" value="Description" />
      <TextInput id="description" type="text" v-model="form.description" />
    </div>

    <div id="quantity" class="input-group">
      <InputLabel for="quantity" value="Quantity" />
      <TextInput id="quantity" type="number" v-model="form.quantity" />
    </div>

    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="createProduct()">
      Register
    </PrimaryButton>

  </AuthenticatedLayout>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

export default {
  components: {
    Head,
    AuthenticatedLayout,
    TextInput,
    InputLabel,
    PrimaryButton
  },
  data() {
    return {
      form: {
        sku: '',
        name: '',
        description: '',
        quantity: 0,
        processing: false,
      },
    };
  },
  props: {
    //
  },
  methods: {
    createProduct() {
      this.$inertia.post('/api/product', this.form);
      console.log(this.form);
    },
  },
};
</script>

<style lang="scss" scoped>
.input-group {
  margin-bottom: 1rem;
}
</style>
