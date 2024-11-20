import {ref} from 'vue';
import axios from 'axios';

export default function useEvent() {
  const isLoading = ref(false);
  const errors = ref({});

  const createEvent = async (event) => {
    try {
      isLoading.value = true;

      const response = await axios
        .post(route('app.events.store'), event, {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        });

      return response.data;
    } catch (error) {
      if (error.response.status === 422) {
        errors.value = error.response.data.errors || {};
      }

      throw error;
    } finally {
      isLoading.value = false;
    }
  };

  return {
    isLoading,
    errors,
    createEvent
  };
}
