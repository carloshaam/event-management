import {useForm} from '@inertiajs/vue3';

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
