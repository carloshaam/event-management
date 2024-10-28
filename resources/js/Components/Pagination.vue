<script>
export default {
  name: "Pagination",
  props: {
    pagination: Object,
  },
  data() {
    return {
      page: this.pagination.current_page,
    };
  },
  watch: {
    "pagination.current_page": function (page) {
      this.page = page;
    },
  },
  methods: {
    loadPage(page) {
      this.$inertia.get(
        this.$page.url,
        {page: page},
        {
          preserveState: true,
        }
      );
    },
  },
  computed: {
    noPreviousPage() {
      return this.pagination.current_page - 1 <= 0;
    },
    noNextPage() {
      return this.pagination.current_page + 1 > this.pagination.last_page;
    },
  },
};
</script>

<template>
  <div>
    <div class="flex items-center justify-between p-4">
      <div>
        <p class="mb-0">
          Exibindo
          <span class="font-medium">{{ pagination.from }}</span>
          até
          <span class="font-medium">{{ pagination.to }}</span>
          de
          <span class="font-medium">{{ pagination.total }}</span>
          resultados
        </p>
      </div>
      <div>
      <!-- Pagination -->
      <nav class="flex items-center gap-x-1" aria-label="Pagination">
        <button
          type="button"
          class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
          :disabled="noPreviousPage"
          aria-label="Previous"
          @click="loadPage(1)"
        >
          <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 16-4-4 4-4m-6 8-4-4 4-4"/>
          </svg>
          <span class="sr-only">Previous</span>
        </button>
        <button
          type="button"
          class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
          :disabled="noPreviousPage"
          aria-label="Previous"
          @click="loadPage(pagination.current_page - 1)"
        >
          <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14 8-4 4 4 4"/>
          </svg>
          <span class="sr-only">Previous</span>
        </button>
        <div class="flex items-center gap-x-1">
          <span class="min-h-[38px] min-w-[38px] flex justify-center items-center border border-gray-200 text-gray-800 py-2 px-3 text-sm rounded-lg focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
            {{ pagination.current_page }}
          </span>
          <span class="min-h-[38px] flex justify-center items-center text-gray-500 py-2 px-1.5 text-sm">
            de
          </span>
          <span class="min-h-[38px] flex justify-center items-center text-gray-500 py-2 px-1.5 text-sm">
            {{ pagination.last_page }}
          </span>
        </div>
        <button
          type="button"
          class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
          :disabled="noNextPage"
          aria-label="Next"
          @click="loadPage(pagination.current_page + 1)"
        >
          <span class="sr-only">Next</span>
          <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4"/>
          </svg>
        </button>
        <button
          type="button"
          class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
          :disabled="noNextPage"
          aria-label="Next"
          @click="loadPage(pagination.last_page)"
        >
          <span class="sr-only">Next</span>
          <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 16 4-4-4-4m6 8 4-4-4-4"/>
          </svg>
        </button>
      </nav>
      <!-- End Pagination -->
      </div>
    </div>
  </div>
</template>

<style scoped></style>
