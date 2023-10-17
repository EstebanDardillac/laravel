<template>
  <div>
    <h1>Liste des événements</h1>
    <ul>
      <li v-for="event in events" :key="event.id">
        {{ event.name }} - {{ event.description }} - {{ event.date }}
      </li>
    </ul>
    <router-link :to="{ name: 'events.create' }">
      <button>Créer un nouvel événement</button>
    </router-link>
  </div>
    <div>
    <h1>Choisissez une plage de dates</h1>
    <DateRangePicker @input="updateDateRange" />
    <p>Plage de dates sélectionnée: {{ selectedDateRange }}</p>
  </div>
</template>

<script>
export default {
  props: ['events'],
};
import DateRangePicker from './DateRangePicker.vue';

export default {
  components: {
    DateRangePicker,
  },
  data() {
    return {
      selectedDateRange: [],
    };
  },
  methods: {
    updateDateRange(dateRange) {
      this.selectedDateRange = dateRange;
    },
  },
};
</script>