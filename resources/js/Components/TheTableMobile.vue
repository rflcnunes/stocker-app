<template>
  <div>
    <div v-for="product in products" :key="product.id">
        <TheNotification v-bind:title="product.name" v-bind:description="formatter(product)" />
    </div>
  </div>
</template>

<script>
import TheNotification from "@/Components/TheNotification.vue";

export default {
  name: "TheTableMobile",
  components: {
    TheNotification,
  },
  data() {
    return {
      //
    };
  },
  props: {
    products: Array,
  },
  methods: {
    formatter: function (value) {
      console.log(value);
      if (value.sku) {
        return "Your product SKU is " + value.sku + "." + " Your product quantity is " + value.quantity + ".";
      }
    },
  },
};
</script>

<style lang="scss" scoped>

</style>
