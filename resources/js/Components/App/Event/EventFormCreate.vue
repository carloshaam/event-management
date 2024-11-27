<script setup>
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import TextAreaInput from "@/Components/TextAreaInput.vue";
import CoverInput from "@/Components/CoverInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {vMaska} from "maska/vue";
import useZipCode from "@/Composables/App/useZipCode.js";
import useEvent from "@/Composables/App/Event/useEvent.js";
import {reactive} from "vue";
import {router} from "@inertiajs/vue3";
import SelectInput from "@/Components/SelectInput.vue";

const props = defineProps({
  categories: {
    type: Array,
    required: false,
  },
  visibilities: {
    type: Array,
    required: false,
  },
  states: {
    type: Array,
    required: false,
  }
})

const {isLoadingZipCode, fetchZipCode} = useZipCode();
const {isLoading, errors, createEvent} = useEvent();

const form = reactive({
  stage: null,
  visibility: null,
  cover: null,
  title: null,
  description: null,
  start_time: null,
  end_time: null,
  category_id: null,
  place_name: null,
  zip_code: null,
  street: null,
  number: null,
  neighborhood: null,
  complement: null,
  city: null,
  state: 'MG',
});

const searchZipCode = async (zipCode) => {
  if (zipCode.length === 9) {
    try {
      const address = await fetchZipCode(zipCode);
      form.street = address.logradouro;
      form.neighborhood = address.bairro;
      form.city = address.localidade;
      form.state = address.uf;
    } catch (err) {
      alert('Erro ao buscar endereço: ' + err.message);
    }
  }
};

const submitFormEvent = async (stage) => {
  try {
    form.stage = stage;
    const newEventId = await createEvent(form);

    router.get(route('app.events.edit', newEventId.data.id));
  } catch (error) {
    console.log(error);
  }
};
</script>

<template>
  <form @submit.prevent="submitFormEvent(form.stage)" :disabled="isLoading">
    <!-- Start Event Location -->
    <div class="flex flex-col bg-white border rounded shadow-lg shadow-gray-100 mb-4">
      <div class="flex justify-between items-center border-b py-3 px-8">
        <h3 class="text-lg font-bold text-gray-800">
          1. Onde o seu evento vai acontecer?
        </h3>
      </div>
      <div class="p-8">
        <div class="grid grid-cols-2 gap-4">
          <div class="col-span-2">
            <InputLabel for="place_name" value="Nome do local"/>
            <TextInput
                id="place_name"
                type="text"
                class="mt-1 block w-full"
                v-model="form.place_name"
                required
                autocomplete="place_name"
                :disabled="isLoadingZipCode"
                :class="isLoadingZipCode ? 'bg-gray-100' : ''"
            />
            <InputError
                v-if="errors && errors.place_name"
                :message="errors.place_name[0]"
            />
          </div>
          <div class="col-span-2">
            <InputLabel for="zip_code" value="CEP"/>
            <TextInput
                id="zip_code"
                type="text"
                inputmode="numeric"
                class="mt-1 block w-full"
                v-maska="'#####-###'"
                v-model="form.zip_code"
                autocomplete="zip_code"
                @keydown.tab="searchZipCode($event.target.value)"
                :disabled="isLoadingZipCode"
            />
            <InputError
                v-if="errors && errors.zip_code"
                :message="errors.zip_code[0]"
            />
          </div>
          <div class="col-span-2">
            <InputLabel for="street" value="Endereço"/>
            <TextInput
                id="street"
                type="text"
                class="mt-1 block w-full"
                v-model="form.street"
                required
                autocomplete="street"
                :disabled="isLoadingZipCode"
                :class="isLoadingZipCode ? 'bg-gray-100' : ''"
            />
            <InputError
                v-if="errors && errors.street"
                :message="errors.street[0]"
            />
          </div>
          <div class="col-span-1">
            <InputLabel for="number" value="Número"/>
            <TextInput
                id="number"
                type="text"
                inputmode="numeric"
                class="mt-1 block w-full"
                v-model="form.number"
                required
                autocomplete="number"
            />
            <InputError
                v-if="errors && errors.number"
                :message="errors.number[0]"
            />
          </div>
          <div class="col-span-1">
            <InputLabel for="complement" value="Complemento"/>
            <TextInput
                id="complement"
                type="text"
                class="mt-1 block w-full"
                v-model="form.complement"
                autocomplete="complement"
                :disabled="isLoadingZipCode"
                :class="isLoadingZipCode ? 'bg-gray-100' : ''"
            />
            <InputError
                v-if="errors && errors.complement"
                :message="errors.complement[0]"
            />
          </div>
          <div class="col-span-2">
            <InputLabel for="neighborhood" value="Bairro"/>
            <TextInput
                id="neighborhood"
                type="text"
                class="mt-1 block w-full"
                v-model="form.neighborhood"
                required
                autocomplete="neighborhood"
                :disabled="isLoadingZipCode"
                :class="isLoadingZipCode ? 'bg-gray-100' : ''"
            />
            <InputError
                v-if="errors && errors.neighborhood"
                :message="errors.neighborhood[0]"
            />
          </div>
          <div class="col-span-2">
            <InputLabel for="state" value="Estado"/>
            <SelectInput
              id="state"
              v-model="form.state"
              :options="props.states"
              :disabled="isLoadingZipCode"
              :class="isLoadingZipCode ? 'bg-gray-100' : ''"
              class="mt-1 block w-full"
            />
            <InputError
                v-if="errors && errors.state"
                :message="errors.state[0]"
            />
          </div>
          <div class="col-span-2">
            <InputLabel for="city" value="Cidade"/>
            <TextInput
                id="city"
                type="text"
                class="mt-1 block w-full"
                v-model="form.city"
                required
                autocomplete="city"
                :disabled="isLoadingZipCode"
                :class="isLoadingZipCode ? 'bg-gray-100' : ''"
            />
            <InputError
                v-if="errors && errors.city"
                :message="errors.city[0]"
            />
          </div>
        </div>
      </div>
    </div>
    <!-- End Event Location -->
    <!-- Start Info Basic -->
    <div class="flex flex-col bg-white border rounded shadow-lg shadow-gray-100 mb-4">
      <div class="flex justify-between items-center border-b py-3 px-8">
        <h3 class="text-lg font-bold text-gray-800">
          2. Informações básicas
        </h3>
      </div>
      <div class="p-8">
        <div class="grid grid-cols-2 gap-4">
          <div class="col-span-2">
            <InputLabel for="cover" value="Imagem do evento"/>
            <span class="text-sm font-normal text-gray-500">
                      A dimensão recomendada é de 1600 x 838
                      (mesma proporção do formato utilizado nas páginas de evento no Facebook).
                      Formato JPEG ou PNG de no máximo 2MB.
                    </span>
            <div class="p-2 border-2 border-dashed border-gray-200 rounded-md mt-4">
              <CoverInput
                  accepted-types="image/png, image/jpeg"
                  v-model="form.cover"
                  default-src="/images/cover-default.png"
                  @update:modelValue="form.cover_url ='/images/cover-default.png'"
              />
            </div>
            <InputError
                v-if="errors && errors.cover"
                :message="errors.cover[0]"
            />
          </div>
          <div class="col-span-2">
            <InputLabel for="title" value="Titulo do evento"/>
            <TextInput
                id="title"
                type="text"
                class="mt-1 block w-full"
                v-model="form.title"
                autocomplete="title"
            />
            <InputError
                v-if="errors && errors.title"
                :message="errors.title[0]"
            />
          </div>
          <div class="col-span-2">
            <InputLabel for="category_id" value="Categoria"/>
            <SelectInput
                id="category_id"
                v-model="form.category_id"
                :options="props.categories"
                class="mt-1 block w-full"
            />
            <InputError
                v-if="errors && errors.category_id"
                :message="errors.category_id[0]"
            />
          </div>
        </div>
      </div>
    </div>
    <!-- End Info Basic -->
    <!-- Start Description of Event -->
    <div class="flex flex-col bg-white border rounded shadow-lg shadow-gray-100 mb-4">
      <div class="flex justify-between items-center border-b py-3 px-8">
        <h3 class="text-lg font-bold text-gray-800">
          3. Descrição do evento
        </h3>
      </div>
      <div class="p-8">
        <div class="grid grid-cols-2 gap-4">
          <div class="col-span-2">
            <InputLabel for="description" value="Descrição"/>
            <TextAreaInput
                id="description"
                type="text"
                class="mt-1 block w-full"
                v-model="form.description"
                autocomplete="description"
                rows="6"
            />
            <InputError
                v-if="errors && errors.description"
                :message="errors.description[0]"
            />
          </div>
        </div>
      </div>
    </div>
    <!-- End Description of Event -->
    <!-- Start Date and Time Event -->
    <div class="flex flex-col bg-white border rounded shadow-lg shadow-gray-100 mb-4">
      <div class="flex justify-between items-center border-b py-3 px-8">
        <h3 class="text-lg font-bold text-gray-800">
          4. Data e horário
        </h3>
      </div>
      <div class="p-8">
        <div class="grid grid-cols-2 gap-4">
          <div class="col-span-1">
            <InputLabel for="start_time" value="Data de início"/>
            <TextInput
                id="start_time"
                type="datetime-local"
                class="mt-1 block w-full"
                v-model="form.start_time"
            />
            <InputError
                v-if="errors && errors.start_time"
                :message="errors.start_time[0]"
            />
          </div>
          <div class="col-span-1">
            <InputLabel for="end_time" value="Data de término"/>
            <TextInput
                id="end_time"
                type="datetime-local"
                class="mt-1 block w-full"
                v-model="form.end_time"
            />
            <InputError
                v-if="errors && errors.end_time"
                :message="errors.end_time[0]"
            />
          </div>
        </div>
      </div>
    </div>
    <!-- End Date and Time Event -->
    <!-- Start Visibility Event -->
    <div class="flex flex-col bg-white border rounded shadow-lg shadow-gray-100 mb-4">
      <div class="flex justify-between items-center border-b py-3 px-8">
        <h3 class="text-lg font-bold text-gray-800">
          5. Visibilidade do evento
          <p class="text-sm font-normal text-gray-500">
            Se você definir o seu evento como público,
            ele poderá aparecer em buscadores da internet (como Google, Bing, Yahoo),
            disponível em nossa home e poderá ser recomendado
            pelo nosso site, através de nossos newsletter ou posts nas redes sociais.
            Caso o seu evento seja exclusivo, marque-o como privado.
          </p>
        </h3>
      </div>
      <div class="p-8">
        <div class="grid grid-cols-2 gap-4">
          <template v-for="(label) in visibilities">
            <div class="col-span-1">
              <div class="flex items-center ps-4 border border-gray-200 rounded-md">
                <input
                    :id="'visibility-radio-' + label.value"
                    type="radio"
                    v-model="form.visibility"
                    :value="label.value"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                >
                <label
                    :for="'visibility-radio-' + label.value"
                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900">
                  {{ label.name }}
                </label>
              </div>
            </div>
          </template>
          <InputError
              v-if="errors && errors.visibility"
              :message="errors.visibility[0]"
          />
        </div>
      </div>
    </div>
    <!-- End Visibility Event -->
    <div class="flex items-center justify-end">
      <PrimaryButton type="button" @click="submitFormEvent('published')" class="mt-4" :disabled="isLoading">
        <template v-if="isLoading">
          <div role="status">
            <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin fill-blue-600"
                 viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                  d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                  fill="currentColor"/>
              <path
                  d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                  fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
          </div>
        </template>
        <template v-else>
          Publicar evento
        </template>
      </PrimaryButton>
      <SecondaryButton type="button" @click="submitFormEvent('draft')" class="mt-4 ml-2" :disabled="isLoading">
        <template v-if="isLoading">
          <div role="status">
            <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin fill-blue-600"
                 viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                  d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                  fill="currentColor"/>
              <path
                  d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                  fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
          </div>
        </template>
        <template v-else>
          Salvar rascunho
        </template>
      </SecondaryButton>
    </div>
  </form>
</template>

<style scoped>

</style>