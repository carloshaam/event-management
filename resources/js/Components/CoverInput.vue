<script>
export default {
  name: "CoverInput",
  props: {
    modelValue: File,
    defaultSrc: String,
  },
  watch: {
    modelValue: function (file) {
      if (!file) {
        this.src = this.defaultSrc;
        this.$refs.file.value = "";
      } else {
        let reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = e => {
          this.src = e.target.result;
        };
      }
    },
  },
  emits: ["update:modelValue"],
  data() {
    return {
      src: this.defaultSrc,
    };
  },
  methods: {
    browse() {
      this.$refs.file.click();
    },
    remove() {
      this.$emit("update:modelValue", null);
    },
    change(e) {
      this.$emit("update:modelValue", e.target.files[0]);
    },
  },
};
</script>

<template>
  <div>
    <input type="file" accept="image/*" class="hidden" ref="file" @change="change" />
    <div class="relative inline-block">
      <img :src="src" alt="Thumb" class="w-full h-full" />
      <div class="absolute inset-0 flex items-end p-4 bg-black bg-opacity-25">
        <div class="flex space-x-3">
          <button type="button" @click="browse()" class="bg-white text-black py-2 px-4 rounded">Browse</button>
          <button type="button" v-if="modelValue" @click="remove()" class="bg-red-600 text-white py-2 px-4 rounded">
            Remove
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.hidden {
  display: none;
}
</style>