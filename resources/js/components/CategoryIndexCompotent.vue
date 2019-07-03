<template>
  <div class="body-container">
      <h1>Category</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'category/create' }" class="btn btn-primary">Create Category</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr> 
                <th>Title</th> 
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts" :key="post.id"> 
                    <td>{{ post.title }}</td> 
                    <td v-html="status(post.status)"></td>
                    <td><router-link :to="{name: 'category/edit', params: { id: post.id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click.prevent="deletePost(post.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          posts: []
        }
      },
      
      created() {
      let uri = 'http://localhost/adminpanel/api/category';
      this.axios.get(uri).then(response => {
        this.posts = response.data.data;
      });
      console.log(this.posts);  
    },
    methods: {
      deletePost(id)
      {
        let uri = `http://localhost/adminpanel/api/category/delete/${id}`;
        this.axios.delete(uri).then(response => {
          this.posts.splice(this.posts.indexOf(id), 1);
        });
      },
      status(val){
        if(val==1){
          return '<span class="label label-primary"> Active</span>';
        }else{
          return '<span class="label label-warning"> Inactive </span>';
        }
      }
    }
  }
</script>
