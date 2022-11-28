<template>

    <Head :title="product.name" />

    <AuthenticatedLayout>
        <div id="form">
            <div id="editable-row">
                <h1 class="text-center">{{ product.name }}</h1>

                <button @click="isEditable()">
                    <PencilIcon :class="{ 'editable-active': editable }" />
                </button>
            </div>
            <div id="sku-group" class="input-group">
                <InputLabel for="sku" value="SKU" />
                <TextInput id="sku" class="input" type="text" :class="{ 'border-transparent': !editable }"
                    :disabled="!editable" v-model="form.sku" />
            </div>

            <div id="name-group" class="input-group">
                <InputLabel for="name" value="Name" />
                <TextInput id="name" class="input" type="text" :class="{ 'border-transparent': !editable }"
                    :disabled="!editable" v-model="form.name" />
            </div>

            <div id="description" class="input-group">
                <InputLabel for="description" value="Description" />
                <TextInput id="description" class="input" type="text" :class="{ 'border-transparent': !editable }"
                    :disabled="!editable" v-model="form.description" />
            </div>

            <div id="quantity" class="input-group">
                <InputLabel for="quantity" value="Quantity" />
                <TextInput id="quantity" class="input" type="number" :class="{ 'border-transparent': !editable }"
                    :disabled="!editable" v-model="form.quantity" />
            </div>
            <PrimaryButton :class="{ 'opacity-25': !editable }" :disabled="!editable" @click="updatedProduct()">
                Save
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
import PencilIcon from 'vue-material-design-icons/Pencil.vue';
import axios from 'axios';

export default {
    name: "EditTest",
    components: {
        Head,
        AuthenticatedLayout,
        TextInput,
        InputLabel,
        PrimaryButton,
        PencilIcon
    },
    data() {
        return {
            form: {
                sku: '',
                name: '',
                description: '',
                quantity: 0,
            },
            editable: false,
        };
    },
    props: {
        product: Object,
    },
    mounted() {
        this.form = this.product;
    },
    methods: {
        isEditable() {
            this.editable = !this.editable;
        },
        updatedProduct() {
            axios.put(`/api/product/${this.product.id}`, this.form)
                .then((response) => {
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>

<style lang="scss" scoped>
#form {
    width: 40%;
    margin: 0 auto;

    #editable-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
    }
}

.input-group {
    margin-bottom: 1rem;

    .input {
        width: 100%;
    }
}

.editable-active {
    color: rgb(2, 121, 241);
}
</style>