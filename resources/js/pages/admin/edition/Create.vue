<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Button } from '@/components/ui/button';
import TinyMCEEditor from '@/components/velvet/TinyMCEEditor.vue';

const breadcrumbs = [
  {
    title: 'Dashboard2',
    href: '/dashboard',
  },
];

const props = defineProps<{
  edition: {
    title?: string;
    biografia?: string;
  };
}>();

const form = useForm({
  title: props.edition.title ?? '',
  biografia: props.edition.biografia ?? '',
});

const store = () => {
  form.post('/admin/edition');
};
</script>

<template>
  <Head title="Editor" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <h1 class="text-xl font-semibold text-gray-800">Crear edición</h1>
    <form @submit.prevent="store">
      <div class="grid grid-cols-12 gap-4 my-2">
        <div class="col-span-12">
          <div class="grid gap-2">
            <Label for="nombre">Título</Label>
            <Input type="text" autofocus v-model="form.title" />
            <div v-if="form.errors.title">{{ form.errors.title }}</div>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-12 gap-4 my-2">
        <div class="col-span-12">
          <!-- Usamos el componente TinyMCEEditor -->
          <TinyMCEEditor v-model="form.title" />
        </div>
        <div class="col-span-12">
          <Button type="submit">Guardar</Button>
        </div>
      </div>
    </form>
  </AppLayout>
</template>