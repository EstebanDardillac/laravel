<template>
  <div>
    <input
      ref="startDateInput"
      v-model="startDate"
      @focus="showStartDatePicker"
      placeholder="Date de début"
    />
    <input
      ref="endDateInput"
      v-model="endDate"
      @focus="showEndDatePicker"
      placeholder="Date de fin"
    />

    <div v-if="showPicker" ref="picker"></div>
  </div>
</template>

<script>
import moment from 'moment';
import Pikaday from 'pikaday';

export default {
  data() {
    return {
      startDate: '',
      endDate: '',
      showPicker: false,
    };
  },
  methods: {
    showStartDatePicker() {
      this.showPicker = true;
      this.initializePicker(this.$refs.startDateInput);
    },
    showEndDatePicker() {
      this.showPicker = true;
      this.initializePicker(this.$refs.endDateInput);
    },
    initializePicker(input) {
      const picker = new Pikaday({
        field: input,
        format: 'DD/MM/YYYY',
        onSelect: (date) => {
          if (this.startDate === '') {
            this.startDate = moment(date).format('DD/MM/YYYY');
          } else {
            this.endDate = moment(date).format('DD/MM/YYYY');
          }
          this.showPicker = false;
        },
      });
      this.$refs.picker.innerHTML = ''; 
      picker.show();
    },
  },
};
</script>

