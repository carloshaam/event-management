import {useForm} from '@inertiajs/vue3';

// TODO: organizar nomeclartura e tirar o form.
export default function useEventUserFilter() {
  const filterForm = useForm({
    title: '',
  });

  const submitFilterForm = () => {
    filterForm.get(route('app.events.index'), {
      only: ['events'],
      preserveState: true,
    });
  };

  return {
    filterForm,
    submitFilterForm,
  };
}
