/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');
 import axios from 'axios';

 window.Vue = require('vue');
 window.axios = axios;

 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


 Vue.component('todo-list', require('./components/todoList.vue').default);

 const app = new Vue({
  el: '#app',
  data: {
    //store todo items locally
    todoList: [],
  },
  methods: {
    //get todo items from db
    getTasks() {
      axios.get('api/get')
      .then( response => {
        this.todoList = response.data
      })
      .catch(error =>{
        console.log(error)
      })
    },
    //insert new todo task
    newTask() {
      axios.post('api/task', {
        title: document.querySelector('#app .todo input').value,
        completed: 0,
        updated_at: new Date(),
        created_at: new Date()
      }).then(response => {
        //update local todo  list
        this.getTasks()
        document.querySelector('#app .todo input').value = ''
      }).catch(error =>{
        console.log(error)
      })
    },
  },
  computed: {
    //get number of all uncompleted tasks
    count() {
      return this.todoList.filter(i => i.completed == 0).length
    }
  },
  mounted() {
    //get tasks ass soon as app loads
    this.getTasks()
  }
});
