<template>
  <div class="container">
    <div class="form-group">
      <label for="title">標題</label>
      <input type="text" class="form-control" v-model="title">
    </div>
    <div class="form-group">
      <label for="content">內容</label>
      <textarea class="form-control" name="content" cols="30" rows="10" v-model="content"></textarea>
    </div>
    <router-link class="btn btn-default" :to="`/${post.id}`">返回</router-link>
    <button type="button" class="btn btn-primary" @click="send">送出</button>
  </div>
</template>

<script>
export default {
  data: () => {
    return {
      post: null,
      title: '',
      content: ''
    };
  },
  created() {
    const id = this.$route.params.id;

    axios.get(`/web/public/api/crud/${id}`).then(response => {
      const post = response.data.post;
      this.post = post;
      this.title = post.title;
      this.content = post.content;
    });
  },
  methods: {
    send() {
      const title = this.title.trim();
      const content = this.content.trim();
      axios
        .put(`/web/public/api/crud/${this.post.id}`, {
          title: title,
          content: content
        })
        .then(response => {
          const post = response.data.post;
          this.$router.push(`/${this.post.id}`);
        });
    }
  }
};
</script>
