<script setup lang="ts">
import { ref, onMounted, nextTick, watch, defineProps, defineEmits } from 'vue';
import tinymce from 'tinymce';
import 'tinymce/skins/content/default/content.js';
import 'tinymce/skins/ui/oxide/content.js';
import 'tinymce/skins/ui/oxide/content.inline.min.css';
import 'tinymce/icons/default/icons.min.js';
import 'tinymce/themes/silver/theme.min.js';
import 'tinymce/models/dom/model.min.js';
import 'tinymce/skins/ui/oxide/skin.js';
import 'tinymce/plugins/advlist';
import 'tinymce/plugins/autolink';
import 'tinymce/plugins/code';
import 'tinymce/plugins/emoticons';
import 'tinymce/plugins/emoticons/js/emojis';
import 'tinymce/plugins/link';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/table';

// Usar modelValue en lugar de value
const props = defineProps<{
  modelValue: string;
  height?: number;
}>();

const emit = defineEmits<{
  (event: 'update:modelValue', value: string): void;
}>();

const editorRef = ref<any>(null);

onMounted(async () => {
  await nextTick();

  // Eliminar instancias previas
  tinymce.remove(editorRef.value);
  
  // Inicializar el editor
  tinymce.init({
    selector: '.tinymce',
    height: props.height ?? 300,
    menubar: false,
    license_key: 'gpl',
    toolbar: 'undo redo | bold italic removeformat | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
    setup(editor) {
      editorRef.value = editor;

      // Sincronizar contenido del editor con la propiedad 'modelValue'
      editor.on('change', () => {
        emit('update:modelValue', editor.getContent());
      });
    },
  });
});

// Vigilar los cambios en la propiedad 'modelValue' para actualizar el editor
watch(() => props.modelValue, (newValue) => {
  if (editorRef.value) {
    editorRef.value.setContent(newValue);
    editorRef.value.save();
  }
});
</script>

<template>
  <textarea class="w-full border tinymce" :value="modelValue"></textarea>
</template>
