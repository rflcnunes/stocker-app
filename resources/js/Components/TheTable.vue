<template>
  <div class="product-table" :class="theme">
    <table>
      <tr>
        <th>
          <input type="checkbox">
        </th>
        <th>SKU</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Description</th>
        <th>Quantity</th>
        <th></th>
      </tr>
      <tr v-for="product in products" :key="product.id">
        <td>
          <input type="checkbox">
        </td>
        <td class="font-semibold">{{ product.sku }}</td>
        <td class="font-semibold">{{ product.name }}</td>
        <td class="font-semibold">{{ product.price }}</td>
        <td class="font-semibold">
          <div id="circle"></div>
          {{ product.category }}
        </td>
        <td class="url text-slate-600">{{ product.description || "-" }}</td>
        <td class="text-slate-600">{{ product.quantity }}</td>
        <td>
          <Dropdown v-if="$page.props.auth.user.id">
            <template #trigger>
              <div class="dropdown-button-group">
                <button class="dropdown-button">
                  <h1>...</h1>
                </button>
              </div>
            </template>
            <template #content>
              <div id="options">
                <button class="dropdown-button" @click="editProduct(product.id)">
                  Edit
                </button>
                <button class="dropdown-button" @click="deleteProduct(product.id, product.name)">
                  Delete
                </button>
              </div>
            </template>
          </Dropdown>
        </td>
      </tr>
    </table>
    <Toaster v-if="toast.show" :message="toast.message" position="top-right" :queue="true" />
  </div>
</template>

<script>
import Dropdown from "@/Components/Dropdown.vue";
import Toaster from "@meforma/vue-toaster/src/Toaster.vue";
import axios from "axios";

export default {
  name: "TheTable",
  components: {
    Dropdown,
    Toaster
  },
  data() {
    return {
      toast: {
        message: '',
        show: false,
        duration: 3000,
      },
      darkMode: false,
    };
  },
  props: {
    products: Array,
  },
  created() {
    this.darkMode = (localStorage.getItem("theme") === "dark");
  },
  updated() {
    this.darkMode = (localStorage.getItem('theme') === 'dark');
  },
  computed: {
    theme() {
      return (this.darkMode) ? 'product-table-dark' : 'product-table-light';
    },
  },
  methods: {
    editProduct(id) {
      this.$inertia.visit(`/products/${id}/edit`);
    },
    deleteProduct(id, name) {
      console.log(id);
      axios.delete(`/api/product/${id}`)
        .then(response => {
          console.log(response);
          this.openToast(`Product ${name} deleted`);
          this.$inertia.reload();
        })
        .catch(error => {
          console.log(error);
        });
    },
    openToast(message) {
      this.toast.show = true;
      this.toast.message = message;
    },
    consoleNoTheme() {
      console.log(localStorage.getItem('theme'));
    }
  },
};
</script>

<style lang="scss" scoped>
@import "../../css/_variables.scss";

#circle {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  display: inline-block;
  margin-right: 5px;
}

.product-table-dark {
  border: 1px solid $border-dark-color;
  background-color: $color-secondary-dark;

  table {
    th {
      color: $color-tertiary-light;
      border-bottom: 1px solid $color-tertiary-dark;
      padding: 0.5rem;
    }

    td {
      color: $color-tertiary-light;
      border-bottom: 1px solid $color-tertiary-dark;
      padding: 0.5rem;
    }

    .url {
      color: $color-secondary-light;
    }
  }
}

.product-table-light {
  border: 1px solid $border-light-color;
  background-color: $color-primary-light;

  table {
    color: $color-primary-dark;

    th {
      border-bottom: 1px solid $color-tertiary-light;
      font-weight: $font-weight-bold;
      padding: 0.5rem;
    }

    td {
      border-bottom: 1px solid $color-tertiary-light;
      padding: 0.5rem;
    }
  }
}

.product-table {
  width: 100%;
  border-radius: 10px;

  table {
    border-collapse: collapse;

    th {
      padding: 10px;
      text-align: left;
    }

    td {
      text-align: left;

      .url {
        max-width: 90%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
      }
    }

    #options {
      display: flex;
      flex-direction: column;

      .dropdown-button {
        margin-bottom: 5px;
        width: 100%;
        display: flex;
        align-items: flex-start;
        padding: 5px;

        &:hover {
          background-color: rgb(17, 101, 246);
        }
      }
    }

    .dropdown-button-group {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      width: 100%;
      height: 100%;
      margin: 10px;
      align-content: center;
      justify-content: center;
    }
  }
}
</style>
