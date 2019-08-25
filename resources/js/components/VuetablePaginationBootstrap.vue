<template>
  <ul class="pagination justify-content-end">
    <li class="page-item" :class="{'disabled': isOnFirstPage}">
      <a class="page-link" href @click.prevent="loadPage('prev')">
        <span>&laquo;</span>
      </a>
    </li>

    <template v-if="notEnoughPages">
      <li v-for="n in totalPage" class="page-item" :class="{'active': isCurrentPage(n)}">
        <a class="page-link" href @click.prevent="loadPage(n)" v-html="n"></a>
      </li>
    </template>
    <template v-else>
      <li v-for="n in windowSize" class="page-item" :class="{'active': isCurrentPage(windowStart+n-1)}">
        <a class="page-link" href @click.prevent="loadPage(windowStart+n-1)" v-html="windowStart+n-1"></a>
      </li>
    </template>

    <li class="page-item" :class="{'disabled': isOnLastPage}">
      <a class="page-link" href @click.prevent="loadPage('next')">
        <span>&raquo;</span>
      </a>
    </li>
  </ul>
</template>

<script>
import VuetablePaginationMixin from "vuetable-2/src/components/VuetablePaginationMixin";
export default {
  mixins: [VuetablePaginationMixin]
};
</script>