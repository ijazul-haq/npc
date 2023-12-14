<template>
  <div>
    <div v-for="(sent, index) in sents" :key="sent.id">
      <sentence-component
        :sentence="sent"
        :baseurl="baseurl"
        :user="user"
        :csrf="csrf"
        :query="query"
        @remove-item="removeItem(index)"
      ></sentence-component>
    </div>
  </div>
</template>

<script>
export default {
  watch: {
    sents(newValue, oldValue) {
        console.log(newValue);
      if (newValue.length < 1) {
        window.location.href = this.baseurl + "/annotation";
      }
    },
  },
  props: { sentences: Array, baseurl: String, csrf: String, user: Object, query: String },
  data() {
    return {
      sents: [],
    };
  },
  methods: {
    removeItem(index) {
      console.log("indeeeeeexxxxx", index);
      this.sents.splice(index, 1);
      //   this.$set(this.sentences, index, []);
    },
  },
  mounted() {
    this.sents = this.sentences;
  },
};
</script>

<style>
</style>