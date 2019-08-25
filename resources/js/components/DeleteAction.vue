<template>
  <th v-if="isHeader">Ação</th>
  <td v-else>
    <button
      class="btn btn-danger btn-sm"
      v-confirm="{ok: destroy, message: 'Deseja excluir o registro?'}"
    >Excluir</button>
  </td>
</template>

<script>
import Vue from "vue";
import VuejsDialog from "vuejs-dialog";
import VuetableFieldMixin from "vuetable-2/src/components/VuetableFieldMixin";

import "vuejs-dialog/dist/vuejs-dialog.min.css";

Vue.use(VuejsDialog, {
  okText: "Sim",
  cancelText: "Não"
});

export default {
  mixins: [VuetableFieldMixin],
  methods: {
    destroy() {
      axios
        .delete("/users/" + this.rowData.id)
        .then(response => {
          this.$root.$emit("refresh-table");
        })
        .catch(e => console.log("There was an error: " + e));
    }
  }
};
</script>
