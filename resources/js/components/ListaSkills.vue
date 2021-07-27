<template>
  <div>
    <ul class="flex flex-wrap justify-center">
      <li
        v-for="(skill, index) in skills"
        :key="index"
        class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4 cursor-pointer"
        :class="verifyActiveClass(skill)"
        @click="activate"
      >{{skill}}</li>
    </ul>
    <input type="hidden" name="skills" ref="skills" />
  </div>
</template>

<script>
  export default {
    props: ['skills', 'oldskills'],
    data: function () {
      return {
        habilidades: new Set(),
      };
    },
    created() {
      if (this.oldskills) {
        const skillsArray = this.oldskills.split(',');
        skillsArray.forEach((skill) => {
          this.habilidades.add(skill);
        });
      }
    },
    mounted() {
      this.$refs.skills.value = this.oldskills;
    },
    methods: {
      activate(e) {
        const skill = e.target.textContent;
        if (e.target.classList.contains('bg-green-600')) {
          e.target.classList.remove('bg-green-600');
          this.habilidades.delete(skill);
        } else {
          e.target.classList.add('bg-green-600');
          this.habilidades.add(skill);
          console.log(this.habilidades);
        }
        this.$refs.skills.value = [...this.habilidades];
      },
      verifyActiveClass(skill) {
        return this.habilidades.has(skill) ? 'bg-green-600' : '';
      },
    },
  };
</script>
