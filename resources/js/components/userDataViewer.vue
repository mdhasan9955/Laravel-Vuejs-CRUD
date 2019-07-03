<template>
  <div class="dv">
    <div class="dv-header">
      <div class="dv-header-title">
        {{title}}
      </div>  
      <div class="dv-header-search">
        <input type="text" class="dv-header-input"
          placeholder="Search"
          v-model="query.search_input"
          @keyup="fetchIndexData()">
      </div> 
    </div>
    <div class="dv-body">
      <table class="dv-table table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th v-for="(thead, key) in theads" @click="toggleOrder(columns[key])">
              <span>{{thead}}</span> 
              <span v-if="thead =='Action'">
              </span>
              <span v-else> 
              <span v-if="query.direction === 'desc'" class="filter"> &darr;</span>
              <span v-else class="filter">&uarr;</span> 
              </span>  
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="row in model.data">
            <td>#{{row.id}}</td>
            <td>{{row.company_name}}</td>
            <td><a :href="'mailto:'+row.email" target="_top"> {{row.email}}</a></td> 
            <td>{{row.contact_no}}</td>
            <td>{{row.expiry_date}}</td> 
            <td>{{row.product_used}}</td>
            <td>{{row.name}}</td>
            <td>{{row.designation}}</td>
            <td>{{row.address}}</td>
            <td v-html="status(row.status)"></td>
            <td> 
            <a v-if="authData.type !='User'" @click="singleData(row.id)" title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-list"></i></a>

            <a v-if="authData.type !='User'" :href="'customer/show/'+ row.id" title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-list"></i></a>
            <a v-if="authData.type !='User'" :href="'customer/edit/'+ row.id" title="Edit" class="tip btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
            <a v-if="authData.type !='User'" :href="'customer/delete/'+ row.id" title="Delete"  onclick="return confirm('Are you sure you want to Delete Customer? will be all data deleted this customer')"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>            
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="dv-footer">
      <div class="dv-footer-item">
        <span>Displaying {{model.from}} - {{model.to}} of {{model.total}} rows</span>
      </div>
      <div class="dv-footer-item">
        <div class="dv-footer-sub">
          <span>Rows per page</span>
          <input type="text" v-model="query.per_page"
            class="dv-footer-input" @keyup="fetchIndexData()">
        </div>
        <div class="dv-footer-sub">
          <button class="dv-footer-btn" @click="prev()">&laquo;</button>
          <input type="text" v-model="query.page"
            class="dv-footer-input" @keyup="fetchIndexData()">
          <button class="dv-footer-btn" @click="next()">&raquo;</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import Vue from 'vue'
  import axios from 'axios'
  //similar to vue-resource
  export default {
    props: ['source', 'title'],
    data() {
      return {
        model: {},
        columns: {},
        theads: {},
        authData: {},
        query: {
          page: 1,
          column: 'id',
          direction: 'desc',
          per_page: 10,
          search_column: 'id',
          search_operator: 'equal',
          search_input: ''
        }, 
      }
    },
    created() {
      this.fetchIndexData()
    },
    methods: {
      next() {
        if(this.model.next_page_url) {
          this.query.page++
          this.fetchIndexData()
        }
      },
      prev() {
        if(this.model.prev_page_url) {
          this.query.page--
          this.fetchIndexData()
        }
      },
      toggleOrder(column) { 
        if(column === this.query.column) { 
          if(this.query.direction === 'desc') {
            this.query.direction = 'asc'
          } else {
            this.query.direction = 'desc'
          }
        } else {
          this.query.column = column
          this.query.direction = 'asc'
        }
        this.fetchIndexData()
      }, 
      
      status(val){
        if(val==1){
          return '<span class="label label-primary"> Active</span>';
        }else{
          return '<span class="label label-warning"> Inactive </span>';
        }
      },
      delUrl(val){ 
        return window.location.val;
      },
      editUrl(val){ 
        return window.location.val;
      },
      fetchIndexData() {
        var vm = this;         
        axios.get(`${this.source}?column=${this.query.column}&direction=${this.query.direction}&page=${this.query.page}&per_page=${this.query.per_page}&search_column=${this.query.search_column}&search_operator=${this.query.search_operator}&search_input=${this.query.search_input}`)
          .then(function(response) {
            console.log(response);
            Vue.set(vm.$data, 'model', response.data.model)
            Vue.set(vm.$data, 'columns', response.data.columns)
            Vue.set(vm.$data, 'theads', response.data.theads)
            Vue.set(vm.$data, 'authData', response.data.authData)
          })
          .catch(function(response) {
            console.log(response)
          })
      }
    }
  }
</script>