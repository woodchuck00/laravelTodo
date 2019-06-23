<template>
  <li v-if="task.completed == this.completed" :id="task._id" :created="task.created_at" :updated="task.updated_at" >
    <input type="checkbox" v-model="task.completed" @click="check(task._id,$event)">   
    <span v-show="!isEditing">{{ task.title }}</span>
    <input type="text" :value="task.title" v-show="isEditing" v-on:keyup.enter="edit(task._id, $event)">
    <div class="buttons">
      <a v-if="task.completed == 0" class="button is-info" @click="isEditing = true">edit</a>
      <a class="button is-danger" @click="remove(task._id)">delete</a>
    </div>
  </li>
</template>

<script>
  export default {
    props: {
      task: Object,
      completed: Number
    },
    data() {
      return {
        isEditing: false,
      }
    },
    methods: {
      //change the title of a task
      edit(id, e) {
        axios.put(`api/task/${id}`, {
          title: e.target.value,
          updated_at: new Date(),
        }).then(result => {
          this.$parent.getTasks()
          this.isEditing = false
        }).catch(err => {
          console.log(err)
        })
      },
      //update db when task is completed or un-completed
      check(id, e) {
        let checked = e.target.checked

        if (checked)
          checked = 1
        else
          checked = 0

        axios.put(`api/task/${id}`, {
          completed: checked,
          updated_at: new Date(),
        }).then(result => {
          //update local todo  list
          this.$parent.getTasks()
        }).catch(err => {
          console.log(err)
        })

      },
      //delete task from db
      remove(id) {
        axios.delete(`api/task/${id}`).then(result => {
          //update local todo  list
          this.$parent.getTasks()
        }).catch(err => {
          console.log(err)
        })
      }

    },
  }
</script>
