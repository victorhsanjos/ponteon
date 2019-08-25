<template>
  <div>
    <vuetable
      ref="vuetable"
      api-url="/users"
      :fields="fields"
      :css="css.table"
      pagination-path
      @vuetable:pagination-data="onPaginationData"
    ></vuetable>
    <vuetable-pagination-bootstrap ref="pagination" @vuetable-pagination:change-page="onChangePage"></vuetable-pagination-bootstrap>
  </div>
</template>

<script>
import Vuetable from "vuetable-2/src/components/Vuetable";
import VuetablePaginationBootstrap from "./VuetablePaginationBootstrap";
import DeleteAction from "./DeleteAction";

export default {
  data() {
    return {
      fields: [
        {
          name: "name",
          title: "Nome Completo"
        },
        {
          name: "email",
          title: "E-mail"
        },
        {
          name: "cellphone",
          title: "Celular"
        },
        {
          name: "display_city_state",
          title: "Cidade / UF"
        },
        {
          name: "display_created_at",
          title: "Cadastrado em"
        },
        {
          name: DeleteAction,
        }
      ],
      css: {
        table: {
          tableClass: "table table-bordered"
        }
      }
    };
  },

  mounted() {
    this.$root.$on("refresh-table", () => {
      this.$refs.vuetable.refresh();
    });
  },

  methods: {
    onPaginationData(paginationData) {
      this.$refs.pagination.setPaginationData(paginationData);
    },
    onChangePage(page) {
      this.$refs.vuetable.changePage(page);
    }
  },

  components: {
    Vuetable,
    VuetablePaginationBootstrap
  }
};
</script>

<style>
</style>