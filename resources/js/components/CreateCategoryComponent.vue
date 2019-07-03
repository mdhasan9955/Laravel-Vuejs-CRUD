<template>
  <div class="body-container">
    <h1>Create A Category</h1>
    <form @submit.prevent="addPost">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Category Title:</label>
            <input type="text" class="form-control" v-model="post.title">
          </div>
        </div>
        </div> 
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Category Status:</label>
              <select class="form-control" v-model="post.status">
                <option value="1" selected="selected">Publish</option>
                <option value="0">Unpublish</option>
              </select>
            </div>
          </div>
        </div> 
        <div class="form-group">
          <button class="btn btn-primary">Create</button>
        </div>
    </form>
  </div>
</template>
<script>
    export default {
      data(){
        return {
          post:{}
      }
    },
    methods: {
      addPost(){
        let uri = 'http://localhost/adminpanel/api/category/create';
        this.axios.post(uri, this.post).then((response) => {
           this.$router.push({name: 'category'});
        });
        console.log(this.post);   
      }
    }
  }
</script>