<template>
  <div>
    <h1>Créer un nouvel événement</h1>
    <form @submit.prevent="submitForm">
      <div class="form-group">
        <label for="name">Nom de l'événement:</label>
        <input id="name" v-model="form.name" />
      </div>

      <div class="form-group">
        <label for="description">Description de l'événement:</label>
        <input id="description" v-model="form.description" />
      </div>

      <div class="form-group">
        <label for="date">Date de l'événement:</label>
        <input id="date" type="date" v-model="form.date" />
      </div>

      <button type="submit">Créer</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: "",
        description: "",
        date: ""
      }
    };
  },
  methods: {
    submitForm() {
      this.$inertia.post('/events', this.form)
        .then(() => {
        })
        .catch((error) => {
          console.error(error);
        });
    }
  }
};
</script>
