<script setup>

import InputError from "@/Components/InputError.vue";
import Checkbox from "@/Components/Checkbox.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import Modal from "@/Components/Modal.vue";
import {Link} from "@inertiajs/vue3";
import {nextTick, ref} from "vue";

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const confirmingUserLogin = ref(false);
const passwordInput = ref(null);
const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};

const confirmUserLogin = () => {
  confirmingUserLogin.value = true;

  nextTick(() => passwordInput.value.focus());
};

const closeModal = () => {
  confirmingUserLogin.value = false;

  form.clearErrors();
  form.reset();
};
</script>

<template>
  <Modal :show="confirmingUserLogin" @close="closeModal">
    <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
      {{ status }}
    </div>

    <form @submit.prevent="submit">
      <div>
        <InputLabel for="email" value="Email"/>

        <TextInput
            id="email"
            type="email"
            class="mt-1 block w-full"
            v-model="form.email"
            required
            autofocus
            autocomplete="username"
        />

        <InputError class="mt-2" :message="form.errors.email"/>
      </div>

      <div class="mt-4">
        <InputLabel for="password" value="Password"/>

        <TextInput
            id="password"
            type="password"
            class="mt-1 block w-full"
            v-model="form.password"
            required
            autocomplete="current-password"
        />

        <InputError class="mt-2" :message="form.errors.password"/>
      </div>

      <div class="mt-4 block">
        <label class="flex items-center">
          <Checkbox name="remember" v-model:checked="form.remember"/>
          <span class="ms-2 text-sm text-gray-600"
          >Remember me</span
          >
        </label>
      </div>

      <div class="mt-4 flex items-center justify-end">
        <Link
            v-if="canResetPassword"
            :href="route('password.request')"
            class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >
          Forgot your password?
        </Link>

        <PrimaryButton
            class="ms-4"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
        >
          Log in
        </PrimaryButton>
      </div>
    </form>
  </Modal>
</template>

<style scoped>

</style>