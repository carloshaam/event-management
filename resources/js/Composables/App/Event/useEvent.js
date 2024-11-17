import {reactive, ref} from 'vue';
import {router} from '@inertiajs/vue3';
import axios from 'axios';

export default function useEvent(data) {
  const isLoading = ref(false);
  const isLoadingSearchCEP = ref(false);
  const errors = ref({});
  const form = reactive({
    visibility: null,
    cover: null,
    title: null,
    description: null,
    start_time: null,
    end_time: null,
    category_id: data.categories || null,
    place_name: null,
    zip_code: null,
    street: null,
    number: null,
    complement: null,
    city: null,
    state: 'MG',
  });

  const searchCEP = (value) => {
    if (value.length === 9) {
      isLoadingSearchCEP.value = true;

      axios.get(`https://viacep.com.br/ws/${value}/json/`)
        .then((response) => {
          form.street = response.data.logradouro;
          form.neighborhood = response.data.bairro;
          form.city = response.data.localidade;
          form.state = response.data.uf;
        })
        .catch((error) => {
          console.error(error);
        })
        .finally(() => {
          isLoadingSearchCEP.value = false;
        });
    }
  }

  const submit = () => {
    isLoading.value = true;
    axios
      .post(route("app.events.store"), form, {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      })
      .then(response => {
        router.get(route("app.events.edit", response.data.data.id));
      })
      .catch(error => {
        if (error.response.status === 422) {
          errors.value = error.response.data.errors || {};
        }
      })
      .finally(() => {
        isLoading.value = false;
      });
  };

  return {
    isLoading,
    isLoadingSearchCEP,
    errors,
    form,
    searchCEP,
    submit
  };
}
