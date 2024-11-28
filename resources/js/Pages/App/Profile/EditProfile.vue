<script setup>
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head} from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
  mustVerifyEmail: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});
</script>

<template>
  <Head title="Meu perfil"/>
  <AppLayout>
    <template v-slot:navbar>
      Meu perfil
    </template>
    <template v-slot:main>
      <div
          class="flex flex-col bg-white border rounded shadow-lg shadow-gray-100 mb-4"
      >
        <UpdateProfileInformationForm
            :must-verify-email="mustVerifyEmail"
            :status="status"
            class="max-w-xl"
        />
      </div>
      <div
          class="flex flex-col bg-white border rounded shadow-lg shadow-gray-100 mb-4"
      >
        <UpdatePasswordForm class="max-w-xl"/>
      </div>
      <div
          class="flex flex-col bg-white border rounded shadow-lg shadow-gray-100 mb-4"
      >
        <DeleteUserForm class="max-w-xl"/>
      </div>
    </template>
  </AppLayout>
</template>
