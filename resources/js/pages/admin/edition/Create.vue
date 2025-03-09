<script setup lang="ts">
import { onMounted, nextTick, ref, reactive, watch } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Button } from '@/components/ui/button';

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
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

const props = defineProps<{
    errors: {
        title?: string;
    };
    edition: {
        title?: string;
        biografia?: string;
    };

}>();

const form = reactive({
    title: props.edition.title ?? '',
    biografia: props.edition.biografia ?? '',
});

// Crear una referencia para el editor
const editorRef = ref<any>(null);

onMounted(async () => {
    await nextTick();
    
    tinymce.remove(editorRef.value); // Asegurarse de que no haya instancias previas
    tinymce.init({
        selector: '.tinymce',
        height: 300,
        menubar: false,
        license_key: 'gpl',
        toolbar: 'undo redo | bold italic removeformat | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',      
        setup(editor) {
            editorRef.value = editor; // Guardar la instancia del editor en la referencia

            // Escuchar por los cambios en el editor y sincronizarlos con el modelo reactivo
            editor.on('change', () => {
                form.biografia = editor.getContent();
            });
        },
    });
});

// Vigilar cambios en `form.biografia` y actualizar el editor
watch(() => form.biografia, (newValue) => {
    console.log('form.biografia', newValue);
    if (editorRef.value) {
        // Asegurarse de que el editor esté sincronizado con el modelo reactivo
        editorRef.value.setContent(newValue);
        editorRef.value.save(); // Forzar la actualización
    }
});


const store = () => {
    router.post('/admin/edition', form);
};
</script>

<template>
    <Head title="Editor" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <h1 class="text-xl font-semibold text-gray-800">Crear edición</h1>
        <form @submit.prevent="store">
        <div class="grid grid-cols-12 gap-4 my-2">
            <div class="col-span-12 lg:col-span-6">
                <div class="grid gap-2">
                    <Label for="nombre">Título</Label>
                    <Input type="text" autofocus v-model="form.title"/>
                    <div v-if="$props.errors.title">{{ $props.errors.title }}</div>                    
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6">
                <div class="grid gap-2">
                    <Label for="apellido">Apellido</Label>
                    <Input id="apellido" type="text" required v-model="form.title"/>                    
                </div>
            </div>            
        </div>
        <div class="grid grid-cols-12 gap-4 my-2">
            <div class="col-span-12">
                <!-- Usamos una referencia para el tinymce -->
                <textarea class="w-full border tinymce" v-model="form.biografia"></textarea>
            </div>
            <div class="col-span-12">
                <Button type="submit">Guardar</Button>
            </div>
        </div> 
        </form>       
    </AppLayout>
</template>