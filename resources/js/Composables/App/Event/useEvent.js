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

  const viewEvent = async (eventId) => {
    try {
      const response = await axios.get(
        route('app.events.view', eventId)
      );

      return response.data;
    } catch (error) {
      throw error;
    }
  };

  return {
    isLoading,
    errors,
    createEvent,
    viewEvent,
  };
}
