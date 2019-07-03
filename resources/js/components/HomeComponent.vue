<template>
  <div class="leftcolumn" >
    <div class="card" >
      <h2>TITLE HEADING</h2>
      <h5>Title description, Dec 7, 2017</h5>
      <div class="fakeimg" style="height:200px;">Image</div>
      <p>Some text..</p>
    </div>
  </div> 
</template>

<script>
  export default {
      data() {
        return {
          posts: [],
          category:[]
        }
      },
      
      created() {
      let uri = 'http://localhost/adminpanel/api/posts';
        this.axios.get(uri).then(response => {
          this.posts = response.data.data;
        });
         console.log(this.posts); 
      },
      category(id) {
        let uri = `http://localhost/adminpanel/api/category/edit/${id}`;
        this.axios.get(uri).then((response) => {
            this.category = response.data;
        });
      },
    methods: {
      deletePost(id)
      {
        let uri = `http://localhost/adminpanel/api/post/delete/${id}`;
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