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
    <router-link class="btn btn-default" :to="`/${pid}`">返回</router-link>
    <button type="button" class="btn btn-primary" @click="send">送出</button>
  </div>
</template>

<script>
export default {
  data: () => {
    return {
      post: null,
      title: '',
      content: '',
      pid:'',
    };
  },
  created() {
    const id = this.$route.params.id;
    this.pid = id;
    console.log(this.pid)
    // '/' api/crud 最前面的斜線必須添加 否則會以目前URL為基準增加網址上去
    // 有了最前面的斜線會從domain開始組URL
    axios.get(`/api/crud/${this.pid}`).then(response => {
       console.log(response.data.post)
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
        .put(`/api/crud/${this.post.id}`, {
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
