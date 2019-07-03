<template>
  <div class="body-container">
    <h1>Create A Post</h1>
    <form @submit.prevent="addPost" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Post Title:</label>
            <input type="text" class="form-control" v-model="post.title">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Post Content:</label>
              <textarea class="form-control" v-model="post.content" rows="5"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Post Status:</label>
              <select class="form-control" v-model="post.status">
                <option value="1">Publish</option>
                <option value="0">Unpublish</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Category</label>
              <select class="form-control" v-model="post.category_id" >
                <option v-for="cat in category" :value="cat.id">{{cat.title}}</option> 
              </select>
            </div>
          </div>
        </div> 
        <br />
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
          post:{},
          category:{}
      }
    },
    created() {
      let uri = 'http://localhost/adminpanel/api/category';
      this.axios.get(uri).then(response => {
        this.category = response.data.data;
      });
    },
    methods: {
      onImageChange(e){
        this.post.images = e.target.files[0];
        this.post.thumbnail = e.target.files[0]; 
      },
      addPost(){ 
        //let formData = new FormData();
        //formData.append('thumbnail', this.post); 

        let uri = 'http://localhost/adminpanel/api/post/create';
        this.axios.post(uri, this.post).then((response) => {
           this.$router.push({name: 'posts'});
        });
        console.log(this.post);   
      }
    }
  }
</script>