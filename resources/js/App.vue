<template>
  <div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class=" "> 
        <li class="nav-item">
          <router-link to="/adminpanel/admin/post/create" class="nav-link">Create Post</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/adminpanel/admin/posts" class="nav-link">Posts</router-link>
        </li> 
        <li class="nav-item">
          <router-link to="/adminpanel/admin/category/create" class="nav-link">Create Category</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/adminpanel/admin/category" class="nav-link">Categories</router-link>
        </li>
      </ul>
    </nav> 
    <transition name="fade">
      <router-view></router-view>
    </transition>
  </div>
</template>


<style>
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      width: 15%;
      background-color: #ddd;
      max-height: 500px;
      position: fixed;
      overflow: auto;
      min-height: 500px;
  }

li { 
  display: grid;
}

a { 
  padding: 8px;
  background-color: #dddddd;
}
</style>

<script>

    export default{
    }
</script>