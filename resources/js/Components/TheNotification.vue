<template>
  <div id="notification">
    <div id="notification-body">
      <h1 class="font-semibold">{{ title }}</h1>
      <h1 class="url" v-if="description">
        {{ description }}
      </h1>
    </div>
    <div id="notification-actions">
      <Dropdown>
        <template #trigger>
          <div class="dropdown-button-group">
            <button class="dropdown-button">
              <h1>...</h1>
            </button>
          </div>
        </template>
        <template #content>
          <button class="dropdown-button" @click="editing = true">Edit</button>
        </template>
      </Dropdown>
    </div>
  </div>
</template>

<script>
import Dropdown from "@/Components/Dropdown.vue";

export default {
  name: "TheNotification",
  components: {
    Dropdown,
  },
  data() {
    return {
      editing: false,
    };
  },
  props: {
    product: Object,
    title: String,
    description: String,
  },
};
</script>

<style lang="scss" scoped>
#notification {
  border: 1px solid rgba(114, 114, 114, 0.292);
  padding: 10px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
  border-radius: 20px;
  box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.2);
  width: 100%;

  #notification-body {
    width: 90%;
    display: flex;
    flex-direction: column;
  }

  #notification-actions {
    width: 10%;
    margin-left: 20px;
    display: flex;
    justify-content: flex-end;
  }

  .url {
    width: 98%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;

    &:hover {
      overflow: visible;
      white-space: normal;
    }
  }
}
</style>
