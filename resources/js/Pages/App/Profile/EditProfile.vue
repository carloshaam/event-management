<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head} from '@inertiajs/vue3';

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
  <AuthenticatedLayout>
    <template v-slot:navbar>
      Meu perfil
    </template>
    <div class="container max-w-screen-7xl mx-auto">
      <div class="grid grid-cols-3 gap-4 my-4">
        <div></div>
        <div>
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
        </div>
        <div></div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
