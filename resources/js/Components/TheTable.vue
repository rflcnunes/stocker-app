<template>
  <div class="product-table">
    <table>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Quantity</th>
        <th></th>
      </tr>
      <tr v-for="product in products" :key="product.id">
        <td class="font-semibold">{{ product.name }}</td>
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
                <button class="dropdown-button" @click="deleteProduct(product.id)">
                  Delete
                </button>
              </div>
            </template>
          </Dropdown>
        </td>
      </tr>
    </table>
    <Toaster v-if="toast.show" :message="toast.message" position="top-right"/>
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
        show: false
      }
    };
  },
  props: {
    products: Array,
  },
  methods: {
    editProduct(id) {
      this.$inertia.visit(`/products/${id}/edit`);
    },
    deleteProduct(id) {
      console.log(id);
      // this.$inertia.delete(`/api/product/${id}`);

      axios.delete(`/api/product/${id}`)
        .then(response => {
          console.log(response);
          this.$inertia.reload();
          this.openToast('Product Deleted');
        })
        .catch(error => {
          console.log(error);
        });

      
    },
    openToast(message) {
      this.toast.show = true;
      this.toast.message = message;
    }
  },
};
</script>

<style lang="scss" scoped>
.product-table {
  width: 100%;
  border: 1px solid rgba(114, 114, 114, 0.292);
  border-radius: 10px;

  table {
    border-collapse: collapse;

    tr {
      border-bottom: 1px solid rgba(114, 114, 114, 0.292);
    }

    th {
      padding: 10px;
      text-align: left;
      background-color: rgba(209, 209, 209, 0.103);

      &:first-child {
        border-top-left-radius: 10px;
      }

      &:last-child {
        border-top-right-radius: 10px;
      }
    }

    td {
      padding: 10px;
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
