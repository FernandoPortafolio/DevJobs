<template>
  <span
    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full cursor-pointer"
    :class="activa ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'"
    @click="cambiarEstado"
  >{{activa ? 'Activa' : 'Inactiva'}}</span>
</template>

<script>
  export default {
    props: ['estado', 'vacanteId'],
    data: function () {
      return {
        activa: this.estado,
      };
    },
    methods: {
      cambiarEstado() {
        axios
          .put(`/vacantes/${this.vacanteId}/status`)
          .then((resp) => {
            console.log(resp);
            this.activa = !this.activa;
          })
          .catch(console.log);
      },
    },
  };
</script>