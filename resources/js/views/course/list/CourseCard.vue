<template>
  <div>
    <b-row no-gutters>
      <b-col md="6">
        <b-card-img :src="data.ava"></b-card-img>
      </b-col>
      <b-col md="6">
        <b-card-body>
        </b-card-body>
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  props: {
    data: {
      type: Object
    }
  }
};
</script>

<style>
</style>