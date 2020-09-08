<template>
  <div class="container" v-if="post">
    <h1>{{ post.title }}</h1>
    <div>{{ post.content }}</div>
    <router-link class="btn btn-default" to="/indexx">456返回</router-link>
    <router-link class="btn btn-primary" :to="`/${post.id}/edit`">編輯</router-link>
    <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">刪除</button>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h4>是否刪除？</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" @click="destroy">刪除</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  //定義狀態 post
  data: () => {
    return {
      post: null,
    };
  },
  //created為vue生命週期
  created() {
    // 取得route帶的參數
    const id = this.$route.params.id;
    axios.get(`/api/crud/${id}`).then((response) => {
      this.post = response.data.post;
    });
  },
  //給call的方法
  methods: {
    destroy() {
      axios.delete(`/api/crud/${this.post.id}`).then(() => {
        this.$router.push("/indexx");
      });
    },
  },
};
</script>
