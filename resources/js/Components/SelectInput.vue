<script setup>
import {ref, watchEffect} from "vue";

const props = defineProps({
  options: {
    type: Array,
    required: true,
  },
  modelValue: {
    type: String,
    required: true,
  },
});

const emit = defineEmits(["update:modelValue"]);

const selected = ref(props.modelValue);

watchEffect(() => {
  selected.value = props.modelValue;
});

const onChange = event => {
  emit("update:modelValue", event.target.value);
};
</script>

<template>
  <select
    @change="onChange"
    :value="modelValue"
    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
  >
    <option disabled value="">Select...</option>
    <option
        v-for="(item, index) in options"
        :key="index"
        :value="item.value"
        :disabled="item.deleted_at"
    >
      {{ item.name }}
    </option>
  </select>
</template>

<style scoped>

</style>