<template>
  <button class="text-red-600 hover:text-red-900 mr-5" @click.prevent="eliminarVacante">Eliminar</button>
</template>

<script>
  export default {
    props: ['vacanteId'],
    methods: {
      eliminarVacante(e) {
        this.$swal({
          title: '¿Estas seguro?',
          text: 'Esta acción no se puede deshacer',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, eliminar!',
        }).then((result) => {
          if (result.isConfirmed) {
            axios
              .delete(`/vacantes/${this.vacanteId}`)
              .then((resp) => {
                console.log(resp);
                e.target.parentNode.parentNode.parentNode.removeChild(
                  e.target.parentNode.parentNode
                );
                this.$swal('Eliminado!', resp.data, 'success');
              })
              .catch(console.log);
          }
        });
      },
    },
  };
</script>