<template>
  <div class="bg-white p-4 rounded-lg shadow animate-fade-in-down">
    <div class="flex justify-between border-b-2 pb-3">
      <div class="flex items-center">
        <span class="whitespace-nowrap mr-3">Per Page</span>
        <select
          @change="getFeedbacks(null)"
          v-model="perPage"
          class="appearance-none relative block w-24 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
        >
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="20">20</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
        <span class="ml-3">Found {{ feedbacks.total }} orders</span>
      </div>
      <div>
        <input
          v-model="search"
          @change="getFeedbacks(null)"
          class="appearance-none relative block w-48 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
          placeholder="Type to Search orders"
        />
      </div>
    </div>
    <table class="table-auto w-full">
      <thead>
      <tr>
        <TableHeaderCell field="id" :sort-field="sortField" :sort-direction="sortDirection" @click="sortOrders('id')">
          ID
        </TableHeaderCell>
        <TableHeaderCell :sort-field="sortField" :sort-direction="sortDirection">
          Feedbacks Message
        </TableHeaderCell>
       
      </tr>
      </thead>
      <tbody v-if="feedbacks.loading || !feedbacks.data.length">
      <tr>
        <td colspan="6">
          <Spinner v-if="feedbacks.loading"/>
          <p v-else class="text-center py-8 text-gray-700">
            There are no feedbacks
          </p>
        </td>
      </tr>
     
      </tbody>
      <tbody v-else>
      <tr v-for="(feedback, index) of feedbacks.data">
        <td class="border-b p-2 ">{{ feedback.id }}</td>
        <td class="border-b p-2 ">
          {{feedback.message  }}
        </td>
        
       
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { computed, onMounted, ref } from "vue";
import store from "../../store";
import Spinner from "../../components/core/Spinner.vue";
import { PRODUCTS_PER_PAGE } from "../../constants";
import TableHeaderCell from "../../components/core/Table/TableHeaderCell.vue";
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import {
  DotsVerticalIcon,
  PencilIcon,
  TrashIcon,
} from "@heroicons/vue/outline";

const perPage = ref(PRODUCTS_PER_PAGE);
const search = ref("");
const feedbacks = computed(() => store.state.feedbacks);
const sortField = ref("updated_at");
const sortDirection = ref("desc");

const order = ref({});
const showOrderModal = ref(false);

const emit = defineEmits(["clickEdit"]);

onMounted(() => {
  getFeedbacks();
});

function getForPage(ev, link) {
  ev.preventDefault();
  if (!link.url || link.active) {
    return;
  }

  getFeedbacks(link.url);
}

function getFeedbacks(url = null) {
  store.dispatch("getFeedbacks", {
    url,
    search: search.value,
    per_page: perPage.value,
    sort_field: sortField.value,
    sort_direction: sortDirection.value,
  });
}

function sortOrders(field) {
  if (field === sortField.value) {
    if (sortDirection.value === "desc") {
      sortDirection.value = "asc";
    } else {
      sortDirection.value = "desc";
    }
  } else {
    sortField.value = field;
    sortDirection.value = "asc";
  }

  getFeedbacks();
}

function showAddNewModal() {
  showOrderModal.value = true;
}

function deleteOrder(order) {
  if (!confirm(`Are you sure you want to delete the order?`)) {
    return;
  }
  store.dispatch("deleteOrder", order.id).then((res) => {
    // TODO Show notification
    store.dispatch("getFeedbacks");
  });
}

function showOrder(p) {
  emit("clickShow", p);
}
</script>

<style scoped></style>
