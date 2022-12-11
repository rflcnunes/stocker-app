<template>

  <Head title="Create Product" />

  <AuthenticatedLayout>
    <div id="form">
      <h1 class="text-center">CREATE PRODUCT</h1>

      <div id="sku-group" class="input-group">
        <InputLabel for="sku" value="SKU" />
        <TextInput id="sku" class="input" type="text" v-model="form.sku" />
      </div>

      <div id="name-group" class="input-group">
        <InputLabel for="name" value="Name" />
        <TextInput id="name" class="input" type="text" v-model="form.name" />
      </div>

      <div id="description" class="input-group">
        <InputLabel for="description" value="Description" />
        <TextInput id="description" class="input" type="text" v-model="form.description" />
      </div>

      <div id="quantity" class="input-group">
        <InputLabel for="quantity" value="Quantity" />
        <TextInput id="quantity" class="input" type="number" v-model="form.quantity" />
      </div>

      <div id="price" class="input-group">
        <InputLabel for="price" value="Price" />
        <TextInput id="price" class="input" type="number" v-model="form.price" />
      </div>

      <div id="category" class="input-group">
        <InputLabel for="category" value="Category" />
        <TextInput id="category" class="input" type="text" v-model="form.category" />
      </div>

      <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="createProduct()">
        Register
      </PrimaryButton>
    </div>

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
        price: 0,
        category: '',
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
#form {
  width: 40%;
  margin: 0 auto;
}

.input-group {
  margin-bottom: 1rem;

  .input {
    width: 100%;
  }
}
</style>
