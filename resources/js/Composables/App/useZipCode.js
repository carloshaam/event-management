import {ref} from 'vue';
import axios from 'axios';

export default function useZipCode() {
  const isLoadingZipCode = ref(false);
  const errors = ref({});

  const fetchZipCode = async (zipCode) => {
    try {
      if (zipCode.length !== 9) {
        throw new Error('Código postal inválido.');
      }

      isLoadingZipCode.value = true;

      const response = await axios.get(`https://viacep.com.br/ws/${zipCode}/json/`);

      return response.data;
    } catch (error) {
      errors.value = error;

      throw error;
    } finally {
      isLoadingZipCode.value = false;
    }
  }

  return {
    isLoadingZipCode,
    errors,
    fetchZipCode,
  };
}
